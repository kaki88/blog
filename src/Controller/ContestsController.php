<?php
namespace App\Controller;

require_once(ROOT . DS . 'src'. DS . 'Controller'. DS . 'Component' . DS . 'ImageTool.php');
use App\Controller\AppController;
use Cake\I18n\Time;
use ImageTool;
use Cake\ORM\TableRegistry;

/**
 * Contests Controller
 *
 * @property \App\Model\Table\ContestsTable $Contests
 */
class ContestsController extends AppController
{


    public function home($id= null)
    {

        if ($this->request->is('post')) {
            $array = [];
            if (!empty($this->request->data['category'])) {
                $push = $this->request->data['category'];
                $pushall = "category_id = '$push'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['name'])) {
                $push = $this->request->data['name'];
                $pushall = "name LIKE '%$push%'";
                array_push($array, $pushall);
            }
            $this->paginate = [
                'contain' => ['Categories', 'Frequencies', 'Principles','Users','UsersVotes',
                    'Posts' => function($q) {
                        return $q->select(['contest_id']);}]];

            $contests = $this->paginate($this->Contests->find('all')
                ->where(['Contests.active' => 1, $array]));
        }

else{

    if ($id){
        $this->paginate = [
            'contain' => ['Categories', 'Frequencies', 'Principles','Users','UsersVotes',
                'Posts' => function($q) {
                    return $q->select(['contest_id']);}]];

        $contests = $this->paginate($this->Contests->find('all')
            ->where(['Contests.active' => 1, ['category_id '=> $id]]));
    }
    else{
        $this->paginate = [
            'contain' => ['Categories', 'Frequencies', 'Principles','Users','UsersVotes',
                'Posts' => function($q) {
                        return $q->select(['contest_id']);}]];

        $contests = $this->paginate($this->Contests->find('all')
            ->where(['Contests.active' => 1]));
}
}

        $categories = $this->Contests->Categories->find('all')
        ->contain(['Contests' => function($q) {
            return $q->select(['Contests.category_id']);}
        ]);

        $markers = $this->loadModel('UsersMarkers');
        $marker = $markers->find('all')
            ->select('contest_id')
            ->where(['UsersMarkers.user_id' => $this->Auth->User('id')]);
        $markerlist = [];
        foreach ( $marker as $item) {
            array_push($markerlist, $item->contest_id);
        }

        $favos = $this->loadModel('UsersFavorites');
        $fav = $favos->find('all')
            ->select('contest_id')
            ->where(['UsersFavorites.user_id' => $this->Auth->User('id')]);
        $favlist = [];
        foreach ( $fav as $item) {
            array_push($favlist, $item->contest_id);
        }

        $votes = $this->loadModel('UsersVotes');
        $vot = $votes->find('all')
            ->where(['UsersVotes.user_id' => $this->Auth->User('id')]);
        $votelist = [];
        foreach ( $vot as $item) {
            array_push($votelist,  $item->contest_id);
        }

        $now = Time::now();
        $time = $now->i18nFormat('yyyy-MM-dd HH:mm');
        
        $countquery  = $this->Contests->find();
        $counttotal = $countquery->select(['count' => $countquery->func()->count('*')])->first();
        $restrictions = $this->Contests->Restrictions->find('all');
        $zones = $this->Contests->Zones->find('all');
        $this->set(compact('contests','categories','id','counttotal','restrictions','zones','markerlist','favlist','votelist','time'));
        $this->set('_serialize', ['contests']);
    }

    /**
     * View method
     *
     * @param string|null $id Contest id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function gameview($id = null)
    {
        $contest = $this->Contests->get($id, [
            'contain' => ['Categories', 'Frequencies', 'Principles', 'Users.Roles']
        ]);


        $markers = $this->loadModel('UsersMarkers');
        $marker = $markers->find('all')
            ->select('contest_id')
            ->where(['UsersMarkers.user_id' => $this->Auth->User('id')]);
        $markerlist = [];
        foreach ( $marker as $item) {
            array_push($markerlist, $item->contest_id);
        }

        $favos = $this->loadModel('UsersFavorites');
        $fav = $favos->find('all')
            ->select('contest_id')
            ->where(['UsersFavorites.user_id' => $this->Auth->User('id')]);
        $favlist = [];
        foreach ( $fav as $item) {
            array_push($favlist, $item->contest_id);
        }

        $this->paginate = [
            'contain' => ['Users'],
            'limit' => 20,
        ];
        $posts = $this->paginate($this->Contests->Posts->find('all')
            ->where(['contest_id' => $id])
            ->order(['Posts.created' => 'DESC'])
        );



        $restrictions = $this->Contests->Restrictions->find('all');
        $zones = $this->Contests->Zones->find('all');
        $this->set(compact('contest','id','restrictions','zones','markerlist','favlist'));
        $this->set('_serialize', ['contest']);
        $this->set(compact('posts','id'));
        $this->set('_serialize', ['posts']);
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
                    'width' =>350,
                    'height' => 350,
                    'mode' => 'fit'
                ));
                $this->request->data['img_url'] = $rename;
            }

            $this->request->data['zone'] = '';
            $this->request->data['restriction'] = '';

            if (isset($this->request->data['zonez'])){
                $zones = $this->request->data['zonez'];
                $zon = [];
                if ($zones){
                    foreach ($zones as $zone){
                        array_push($zon, $zone);
                    }
                }
                $totext = implode(",", $zon);
                $this->request->data['zone'] = $totext;
            }

            if (isset($this->request->data['restrictionz'])){
                $restrictions = $this->request->data['restrictionz'];
                $restrict = [];
                if ($restrictions){
                    foreach ($restrictions as $restriction){
                        array_push($restrict, $restriction);
                    }
                }
                $restricttotext = implode(",", $restrict);
                $this->request->data['restriction'] = $restricttotext;
            }
            $contest = $this->Contests->patchEntity($contest, $this->request->data);
            $contest->user_id = $this->request->session()->read('Auth.User.id');
            if ($this->Contests->save($contest)) {

                $this->Flash->success(__('Le concours a été sauvegardé.'));

                return $this->redirect(['action' => 'home']);
            } else {
                $this->Flash->error(__('Le concours n\'a pas pu être sauvegardé. Svp, réessayez.'));
            }
        }
        $categories = $this->Contests->Categories->find('list', ['limit' => 200]);
        $frequencies = $this->Contests->Frequencies->find('list', ['limit' => 200]);
        $restrictions = $this->Contests->Restrictions->find('all');
        $zones = $this->Contests->Zones->find('all');
        $principles = $this->Contests->Principles->find('list', ['limit' => 200]);
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
        $contest = $this->Contests->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $img = $contest->img_url;
            # upload image
            if ($_FILES['img_edit']['name'] !== ''  ) {
                $img = $_FILES['img_edit']['name'];
                $extention = explode('.', $img);
                $rename = str_replace($extention[0], Time::now()->format("Ymdhms"), $img);
                $temp = $_FILES['img_edit']['tmp_name'];
                $pathimg = WWW_ROOT . "uploads" . DS . "img" . DS . $rename;
                move_uploaded_file($temp, $pathimg);
                ImageTool::resize(array(
                    'input' => $pathimg,
                    'output' => $pathimg,
                    'width' =>350,
                    'height' => 350,
                    'mode' => 'fit'
                ));
                $img = $rename;
            }

            $this->request->data['zone'] = '';
            $this->request->data['restriction'] = '';

            if (isset($this->request->data['zonez'])){
            $zones = $this->request->data['zonez'];
                $zon = [];
                if ($zones){
                    foreach ($zones as $zone){
                        array_push($zon, $zone);
                    }
                }
                $totext = implode(",", $zon);
                $this->request->data['zone'] = $totext;
            }

            if (isset($this->request->data['restrictionz'])){
            $restrictions = $this->request->data['restrictionz'];
                $restrict = [];
                if ($restrictions){
                    foreach ($restrictions as $restriction){
                        array_push($restrict, $restriction);
                    }
                }
                $restricttotext = implode(",", $restrict);
                $this->request->data['restriction'] = $restricttotext;
            }
            $contest = $this->Contests->patchEntity($contest, $this->request->data);
            $contest->img_url = $img;
            if ($this->Contests->save($contest)) {

                $this->Flash->success(__('Le concours a été modifié.'));
                return $this->redirect(['action' => 'home']);
            } else {
                $this->Flash->error(__('Le concours n\'a pas pu être sauvegardé. Svp, réessayez.'));
            }
        }
        $categories = $this->Contests->Categories->find('list', ['limit' => 200]);
        $frequencies = $this->Contests->Frequencies->find('list', ['limit' => 200]);
        $restrictions = $this->Contests->Restrictions->find('all');
        $zones = $this->Contests->Zones->find('all');
        $principles = $this->Contests->Principles->find('list', ['limit' => 200]);
        $this->set(compact('contest', 'categories', 'frequencies', 'restrictions', 'zones','principles'));
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
