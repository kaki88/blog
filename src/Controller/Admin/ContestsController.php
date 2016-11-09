<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
/**
 * Contests Controller
 *
 * @property \App\Model\Table\ContestsTable $Contests
 */
class ContestsController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Frequencies', 'Principles', 'Zones', 'Restrictions']
        ];
        $contests = $this->paginate($this->Contests);

        $this->set(compact('contests'));
        $this->set('_serialize', ['contests']);
    }

    public function activate($id =null)
    {
        $this->autoRender = false;
        if ($this->request->is(['post'])) {
            $id = $this->request->data['id'];
            $contest = $this->Contests->get($id);
            if($contest->active)
            {
                $value = 0;
            }
            else {
                $value = 1;
            }
            $data = [
                'active' => $value
            ];
            $contest = $this->Contests->patchEntity($contest,$data);
            $this->Contests->save($contest);
        }
    }

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
