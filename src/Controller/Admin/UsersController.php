<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class UsersController extends AppController
{

    public function isAuthorized($user)
    {
        // Tous les utilisateurs enregistrés peuvent ajouter des articles
        if ($this->request->action === 'add') {
            return true;
        }

        // Le propriétaire d'un article peut l'éditer et le supprimer
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $articleId = (int)$this->request->params['pass'][0];
            if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities', 'Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $id =  $this->Auth->user('id');
                $connected = $this->Users->get($id);
                $time = Time::now();
                $time->i18nFormat('yyyy-MM-dd HH:mm:ss');
                $data = [
                    'connected' => $time
                ];
                $connected = $this->Users->patchEntity($connected,$data);
                $this->Users->save($connected);
                $this->Flash->success('Vous êtes maintenant connecté.');
                return $this->redirect(['controller'=>'Contests', 'action' => 'home']);
            }
            $this->Flash->error('Votre identifiant ou mot de passe est incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('Vous êtes maintenant deconnecté.');
        return $this->redirect($this->Auth->logout());
    }

}
