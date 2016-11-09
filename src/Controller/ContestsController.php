<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use ImageTool;
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
        $contests = $this->paginate($this->Contests->find('all')
            ->where(['active' => 1]));

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
            'contain' => ['Categories', 'Frequencies', 'Principles', 'Zones', 'Restrictions']
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
            # upload image
            if (!empty($_FILES['img_url']) ) {
                $img = $_FILES['img_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['img_url']['tmp_name'];
                $pathimg = WWW_ROOT . "uploads" . DS . "img" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>100,
                    'height' => 100,
                    'mode' => 'fit'
                ));
                $this->request->data['img_url'] = $rename;
            }
            $contest = $this->Contests->patchEntity($contest, $this->request->data);
            if ($this->Contests->save($contest)) {
                $count = count($this->request->data['zones']['_ids']);
                foreach ($this->request->data['zones']['_ids'] as $id){
                    if (--$count <= 0) {
                        break;
                    }
                    $query = $this->Contests->ContestsZones->query();
                    $query->insert(['contest_id','zone_id'])->values(['contest_id' => $contest->id,'zone_id' => $id])->execute();
                }
                $count = count($this->request->data['zones']['_ids']);
                foreach ($this->request->data['restrictions']['_ids'] as $id){
                    if (--$count <= 0) {
                        break;
                    }
                    $query = $this->Contests->ContestsRestrictions->query();
                    $query->insert(['contest_id','restriction_id'])->values(['contest_id' => $contest->id,'restriction_id' => $id])->execute();
                }
                $this->Flash->success(__('The contest has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The contest could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Contests->Categories->find('list', ['limit' => 200]);
        $frequencies = $this->Contests->Frequencies->find('list', ['limit' => 200]);
        $restrictions = $this->Contests->Restrictions->find('list', ['limit' => 200]);
        $principles = $this->Contests->Principles->find('list', ['limit' => 200]);
        $zones = $this->Contests->Zones->find('list', ['limit' => 200]);
        $this->set(compact('contest', 'categories', 'frequencies', 'restrictions', 'zones', 'principles'));
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
