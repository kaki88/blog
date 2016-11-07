<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Restrictions Controller
 *
 * @property \App\Model\Table\RestrictionsTable $Restrictions
 */
class RestrictionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $restrictions = $this->paginate($this->Restrictions);

        $this->set(compact('restrictions'));
        $this->set('_serialize', ['restrictions']);
    }

    /**
     * View method
     *
     * @param string|null $id Restriction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $restriction = $this->Restrictions->get($id, [
            'contain' => ['Contests']
        ]);

        $this->set('restriction', $restriction);
        $this->set('_serialize', ['restriction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $restriction = $this->Restrictions->newEntity();
        if ($this->request->is('post')) {
            $restriction = $this->Restrictions->patchEntity($restriction, $this->request->data);
            if ($this->Restrictions->save($restriction)) {
                $this->Flash->success(__('The restriction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The restriction could not be saved. Please, try again.'));
            }
        }
        $contests = $this->Restrictions->Contests->find('list', ['limit' => 200]);
        $this->set(compact('restriction', 'contests'));
        $this->set('_serialize', ['restriction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Restriction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $restriction = $this->Restrictions->get($id, [
            'contain' => ['Contests']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $restriction = $this->Restrictions->patchEntity($restriction, $this->request->data);
            if ($this->Restrictions->save($restriction)) {
                $this->Flash->success(__('The restriction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The restriction could not be saved. Please, try again.'));
            }
        }
        $contests = $this->Restrictions->Contests->find('list', ['limit' => 200]);
        $this->set(compact('restriction', 'contests'));
        $this->set('_serialize', ['restriction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Restriction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $restriction = $this->Restrictions->get($id);
        if ($this->Restrictions->delete($restriction)) {
            $this->Flash->success(__('The restriction has been deleted.'));
        } else {
            $this->Flash->error(__('The restriction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
