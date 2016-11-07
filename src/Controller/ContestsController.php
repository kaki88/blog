<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contests Controller
 *
 * @property \App\Model\Table\ContestsTable $Contests
 */
class ContestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Frequencies']
        ];
        $contests = $this->paginate($this->Contests);

        $this->set(compact('contests'));
        $this->set('_serialize', ['contests']);
    }

    /**
     * View method
     *
     * @param string|null $id Contest id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contest = $this->Contests->get($id, [
            'contain' => ['Categories', 'Frequencies', 'Restrictions', 'Zones']
        ]);

        $this->set('contest', $contest);
        $this->set('_serialize', ['contest']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contest = $this->Contests->newEntity();
        if ($this->request->is('post')) {
            $contest = $this->Contests->patchEntity($contest, $this->request->data);
            if ($this->Contests->save($contest)) {
                $this->Flash->success(__('The contest has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contest could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Contests->Categories->find('list', ['limit' => 200]);
        $frequencies = $this->Contests->Frequencies->find('list', ['limit' => 200]);
        $restrictions = $this->Contests->Restrictions->find('list', ['limit' => 200]);
        $zones = $this->Contests->Zones->find('list', ['limit' => 200]);
        $this->set(compact('contest', 'categories', 'frequencies', 'restrictions', 'zones'));
        $this->set('_serialize', ['contest']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contest id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contest = $this->Contests->get($id, [
            'contain' => ['Restrictions', 'Zones']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contest = $this->Contests->patchEntity($contest, $this->request->data);
            if ($this->Contests->save($contest)) {
                $this->Flash->success(__('The contest has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contest could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Contests->Categories->find('list', ['limit' => 200]);
        $frequencies = $this->Contests->Frequencies->find('list', ['limit' => 200]);
        $restrictions = $this->Contests->Restrictions->find('list', ['limit' => 200]);
        $zones = $this->Contests->Zones->find('list', ['limit' => 200]);
        $this->set(compact('contest', 'categories', 'frequencies', 'restrictions', 'zones'));
        $this->set('_serialize', ['contest']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contest id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contest = $this->Contests->get($id);
        if ($this->Contests->delete($contest)) {
            $this->Flash->success(__('The contest has been deleted.'));
        } else {
            $this->Flash->error(__('The contest could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
