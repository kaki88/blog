<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Zones Controller
 *
 * @property \App\Model\Table\ZonesTable $Zones
 */
class ZonesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $zones = $this->paginate($this->Zones);

        $this->set(compact('zones'));
        $this->set('_serialize', ['zones']);
    }

    /**
     * View method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zone = $this->Zones->get($id, [
            'contain' => ['Contests']
        ]);

        $this->set('zone', $zone);
        $this->set('_serialize', ['zone']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zone = $this->Zones->newEntity();
        if ($this->request->is('post')) {
            $zone = $this->Zones->patchEntity($zone, $this->request->data);
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zone could not be saved. Please, try again.'));
            }
        }
        $contests = $this->Zones->Contests->find('list', ['limit' => 200]);

        $zones = $this->Zones->find('all');
        $this->set(compact('zone', 'contests','zones'));
        $this->set('_serialize', ['zone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zone = $this->Zones->get($id, [
            'contain' => ['Contests']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zone = $this->Zones->patchEntity($zone, $this->request->data);
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The zone could not be saved. Please, try again.'));
            }
        }
        $contests = $this->Zones->Contests->find('list', ['limit' => 200]);
        $this->set(compact('zone', 'contests'));
        $this->set('_serialize', ['zone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zone = $this->Zones->get($id);
        if ($this->Zones->delete($zone)) {
            $this->Flash->success(__('The zone has been deleted.'));
        } else {
            $this->Flash->error(__('The zone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
