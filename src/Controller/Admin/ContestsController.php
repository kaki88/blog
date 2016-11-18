<?php
namespace App\Controller\Admin;
use Cake\I18n\Time;
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
            'contain' => ['Categories', 'Frequencies', 'Principles']
        ];

        if ($this->request->is('get')) {
            $array = [];
            if (!empty($this->request->query['category'])) {
                $push = $this->request->query['category'];
                $pushall = "Contests.category_id = $push";
                array_push($array, $pushall);
            }
            if (!empty($this->request->query['active'])) {
                if ($this->request->query['active'] == 'publie'){
                    $pushall = "Contests.active = 1";
                    array_push($array, $pushall);
                }
                if ($this->request->query['active'] == 'nonpublie'){
                    $pushall = "Contests.active = 0";
                    array_push($array, $pushall);
                }
            }
            if (!empty($this->request->query['name'])) {
                $push = $this->request->query['name'];
                $pushall = "Contests.name LIKE '%$push%'";
                array_push($array, $pushall);
            }

            $contests = $this->paginate($this->Contests->find('all')
                ->where([ $array]));
            $this->set(compact('contests'));
            $this->set('_serialize', ['contests']);
        }

            else{

                $contests = $this->paginate($this->Contests->find('all'));
                $this->set(compact('contests'));
                $this->set('_serialize', ['contests']);
            }



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
