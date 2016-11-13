<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Time;
require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use ImageTool;
/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Contests']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            # upload image
            if (!empty($_FILES['icon_url']) ) {
                $img = $_FILES['icon_url']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['icon_url']['tmp_name'];
                $pathimg = WWW_ROOT . "img" . DS . "menu" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>40,
                    'height' => 40,
                    'mode' => 'fit'
                ));
                $this->request->data['icon_url'] = $rename;
            }
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('La catégorie a été sauvegardé.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La catégorie n\'a pas été sauvegardé. Svp, réessayez.'));
            }
        }

        $categories = $this->Categories->find('all');
        $this->set(compact('category','categories'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The category could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
