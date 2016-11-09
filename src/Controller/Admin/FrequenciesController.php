<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Time;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use ImageTool;
/**
 * Frequencies Controller
 *
 * @property \App\Model\Table\FrequenciesTable $Frequencies
 */
class FrequenciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $frequencies = $this->paginate($this->Frequencies);

        $this->set(compact('frequencies'));
        $this->set('_serialize', ['frequencies']);
    }

    /**
     * View method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frequency = $this->Frequencies->get($id, [
            'contain' => ['Contests']
        ]);

        $this->set('frequency', $frequency);
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $frequency = $this->Frequencies->newEntity();
        if ($this->request->is('post')) {
            # upload image
            if (!empty($_FILES['icon_url']) ) {
                $img = $_FILES['icon_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['icon_url']['tmp_name'];
                $pathimg = WWW_ROOT . "uploads" . DS . "icons" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>100,
                    'height' => 100,
                    'mode' => 'fit'
                ));
                $this->request->data['icon_url'] = $rename;
            }
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->data);
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
            }
        }
        $frequencies = $this->Frequencies->find('all');
        $this->set(compact('frequency','frequencies'));
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $frequency = $this->Frequencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frequency = $this->Frequencies->patchEntity($frequency, $this->request->data);
            if ($this->Frequencies->save($frequency)) {
                $this->Flash->success(__('The frequency has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The frequency could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('frequency'));
        $this->set('_serialize', ['frequency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Frequency id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frequency = $this->Frequencies->get($id);
        if ($this->Frequencies->delete($frequency)) {
            $this->Flash->success(__('The frequency has been deleted.'));
        } else {
            $this->Flash->error(__('The frequency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
