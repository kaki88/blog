<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContestsZones Controller
 *
 * @property \App\Model\Table\ContestsZonesTable $ContestsZones
 */
class ContestsZonesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contests', 'Zones']
        ];
        $contestsZones = $this->paginate($this->ContestsZones);

        $this->set(compact('contestsZones'));
        $this->set('_serialize', ['contestsZones']);
    }

    /**
     * View method
     *
     * @param string|null $id Contests Zone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contestsZone = $this->ContestsZones->get($id, [
            'contain' => ['Contests', 'Zones']
        ]);

        $this->set('contestsZone', $contestsZone);
        $this->set('_serialize', ['contestsZone']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contestsZone = $this->ContestsZones->newEntity();
        if ($this->request->is('post')) {
            $contestsZone = $this->ContestsZones->patchEntity($contestsZone, $this->request->data);
            if ($this->ContestsZones->save($contestsZone)) {
                $this->Flash->success(__('The contests zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contests zone could not be saved. Please, try again.'));
            }
        }
        $contests = $this->ContestsZones->Contests->find('list', ['limit' => 200]);
        $zones = $this->ContestsZones->Zones->find('list', ['limit' => 200]);
        $this->set(compact('contestsZone', 'contests', 'zones'));
        $this->set('_serialize', ['contestsZone']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contests Zone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contestsZone = $this->ContestsZones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contestsZone = $this->ContestsZones->patchEntity($contestsZone, $this->request->data);
            if ($this->ContestsZones->save($contestsZone)) {
                $this->Flash->success(__('The contests zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contests zone could not be saved. Please, try again.'));
            }
        }
        $contests = $this->ContestsZones->Contests->find('list', ['limit' => 200]);
        $zones = $this->ContestsZones->Zones->find('list', ['limit' => 200]);
        $this->set(compact('contestsZone', 'contests', 'zones'));
        $this->set('_serialize', ['contestsZone']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contests Zone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contestsZone = $this->ContestsZones->get($id);
        if ($this->ContestsZones->delete($contestsZone)) {
            $this->Flash->success(__('The contests zone has been deleted.'));
        } else {
            $this->Flash->error(__('The contests zone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
