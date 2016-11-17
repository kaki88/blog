<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use Cake\ORM\TableRegistry;
use ImageTool;
use Cake\Database\Query;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout','index']);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities', 'Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null , $login = null)
    {
        $uid =  $this->Auth->User('id');
        $ugp =  $this->Auth->User('role_id');

        $user = $this->Users->get($id, [
            'contain' => ['Cities', 'Roles']
        ]);

        $this->paginate = [
            'contain' => ['Contests'],
            'limit' => 5,
        ];

        $posts = $this->paginate($this->Users->Posts->find('all')
            ->where(['Posts.user_id' => 5]));

        $this->set('posts', $posts);
        $this->set('user', $user);
        $this->set('uid', $uid);
        $this->set('ugp', $ugp);
        $this->set('_serialize', ['user']);
    }

    public function lastcom($id = null)
    {
        $this->paginate = [
            'contain' => ['Contests'],
            'limit' => 5,
        ];

        $posts = $this->paginate($this->Users->Posts->find('all')
            ->where(['Posts.user_id' => $id]));

        $this->set('posts', $posts);
        $this->set('id', $id);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['role_id'] = 2;
            
# upload image
            if (!empty($_FILES['avatar']) ) {
                $img = $_FILES['avatar']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['avatar']['tmp_name'];
                $pathimg = WWW_ROOT . "uploads" . DS . "avatars" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>100,
                    'height' => 100,
                    'mode' => 'fit'
                ));
                $this->request->data['avatar'] = $rename;
            }

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                return $this->redirect(['controller'=>'Contests','action' => 'home']);
            }
            $this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $login = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Cities']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $img = $user->avatar;
            # upload image
            if ($_FILES['avatar-edit']['name'] !== ''  ) {
                $img = $_FILES['avatar-edit']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['avatar-edit']['tmp_name'];
                $pathimg = WWW_ROOT . "uploads" . DS . "avatars" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>100,
                    'height' => 100,
                    'mode' => 'fit'
                ));
                $img = $rename;
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->avatar = $img;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Les modifications ont été enregistré.'));

                return $this->redirect(['action' => 'view', $id]);
            } else {
                $this->Flash->error(__('Les modifications n\'ont pas pu être sauvegardées. Svp, réessayez.'));
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('L\'utilisateur a été supprimé.'));
        } else {
            $this->Flash->error(__('L\'utilisateur n\'a pas été supprimé. Svp, réessayez.'));
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

    public function isAuthorized($user)
    {

        // un membre peut éditer et supprimer uniquement son compte
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $uid =  $this->Auth->user('id');
            if ((int)$this->request->params['pass'][0] == $uid
            || $user['role_id'] === 1) {
                return true;
            }
            else{
                return false;
            }
        }

        return parent::isAuthorized($user);
    }

    public function addmark()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $tblmarker = TableRegistry::get('UsersMarkers');
            $mark = $tblmarker->query();
            $mark->insert(['contest_id','user_id'])
                ->values([
                    'contest_id' => $this->request->data['id'],
                    'user_id' => $this->Auth->User('id')
                ])
                ->execute();
        }
    }

    public function removemark()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $tblmarker = TableRegistry::get('UsersMarkers');
            $mark = $tblmarker->query();
            $mark->delete()
                ->where(['user_id' => $this->Auth->User('id')])
                ->andWhere(['contest_id' => $this->request->data['id']])
                ->execute();
        }
    }

    public function addfav()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $tblfav = TableRegistry::get('UsersFavorites');
            $fav = $tblfav->query();
            $fav->insert(['contest_id','user_id'])
                ->values([
                    'contest_id' => $this->request->data['id'],
                    'user_id' => $this->Auth->User('id')
                ])
                ->execute();
        }
    }

    public function removefav()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $tblfav = TableRegistry::get('UsersFavorites');
            $fav = $tblfav->query();
            $fav->delete()
                ->where(['user_id' => $this->Auth->User('id')])
                ->andWhere(['contest_id' => $this->request->data['id']])
                ->execute();
        }
    }


}
