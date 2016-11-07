<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContestsRestrictions Controller
 *
 * @property \App\Model\Table\ContestsRestrictionsTable $ContestsRestrictions
 */
class ContestsRestrictionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contests', 'Restrictions']
        ];
        $contestsRestrictions = $this->paginate($this->ContestsRestrictions);

        $this->set(compact('contestsRestrictions'));
        $this->set('_serialize', ['contestsRestrictions']);
    }

    /**
     * View method
     *
     * @param string|null $id Contests Restriction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contestsRestriction = $this->ContestsRestrictions->get($id, [
            'contain' => ['Contests', 'Restrictions']
        ]);

        $this->set('contestsRestriction', $contestsRestriction);
        $this->set('_serialize', ['contestsRestriction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contestsRestriction = $this->ContestsRestrictions->newEntity();
        if ($this->request->is('post')) {
            $contestsRestriction = $this->ContestsRestrictions->patchEntity($contestsRestriction, $this->request->data);
            if ($this->ContestsRestrictions->save($contestsRestriction)) {
                $this->Flash->success(__('The contests restriction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contests restriction could not be saved. Please, try again.'));
            }
        }
        $contests = $this->ContestsRestrictions->Contests->find('list', ['limit' => 200]);
        $restrictions = $this->ContestsRestrictions->Restrictions->find('list', ['limit' => 200]);
        $this->set(compact('contestsRestriction', 'contests', 'restrictions'));
        $this->set('_serialize', ['contestsRestriction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contests Restriction id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contestsRestriction = $this->ContestsRestrictions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contestsRestriction = $this->ContestsRestrictions->patchEntity($contestsRestriction, $this->request->data);
            if ($this->ContestsRestrictions->save($contestsRestriction)) {
                $this->Flash->success(__('The contests restriction has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contests restriction could not be saved. Please, try again.'));
            }
        }
        $contests = $this->ContestsRestrictions->Contests->find('list', ['limit' => 200]);
        $restrictions = $this->ContestsRestrictions->Restrictions->find('list', ['limit' => 200]);
        $this->set(compact('contestsRestriction', 'contests', 'restrictions'));
        $this->set('_serialize', ['contestsRestriction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contests Restriction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contestsRestriction = $this->ContestsRestrictions->get($id);
        if ($this->ContestsRestrictions->delete($contestsRestriction)) {
            $this->Flash->success(__('The contests restriction has been deleted.'));
        } else {
            $this->Flash->error(__('The contests restriction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
