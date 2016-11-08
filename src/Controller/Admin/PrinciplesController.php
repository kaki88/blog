<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Principles Controller
 *
 * @property \App\Model\Table\PrinciplesTable $Principles
 */
class PrinciplesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $principles = $this->paginate($this->Principles);

        $this->set(compact('principles'));
        $this->set('_serialize', ['principles']);
    }

    /**
     * View method
     *
     * @param string|null $id Principle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $principle = $this->Principles->get($id, [
            'contain' => []
        ]);

        $this->set('principle', $principle);
        $this->set('_serialize', ['principle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $principle = $this->Principles->newEntity();
        if ($this->request->is('post')) {
            $principle = $this->Principles->patchEntity($principle, $this->request->data);
            if ($this->Principles->save($principle)) {
                $this->Flash->success(__('The principle has been saved.'));

                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The principle could not be saved. Please, try again.'));
            }
        }
        $principles = $this->Principles->find('all');
        $this->set(compact('principle','principles'));
        $this->set('_serialize', ['principle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Principle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $principle = $this->Principles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $principle = $this->Principles->patchEntity($principle, $this->request->data);
            if ($this->Principles->save($principle)) {
                $this->Flash->success(__('The principle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The principle could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('principle'));
        $this->set('_serialize', ['principle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Principle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $principle = $this->Principles->get($id);
        if ($this->Principles->delete($principle)) {
            $this->Flash->success(__('The principle has been deleted.'));
        } else {
            $this->Flash->error(__('The principle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
