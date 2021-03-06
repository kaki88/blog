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
        $votplus = $this->Contests->find('all')
            ->order(['vote' => 'DESC'])
            ->where(['Contests.active' => 1])
            ->limit(3);

        $playplus = $this->Contests->find('all')
            ->order(['play' => 'DESC'])
            ->where(['Contests.active' => 1])
            ->limit(3);

        $maxwin = $this->Contests->find()
            ->contain(['UsersDotations'])
        ->select(['Contests.id','Contests.name','Contests.prize'])
            ->where(['Contests.active' => 1]);

        $countcont = [];
        foreach ($maxwin as $test){
            array_push($countcont,  ['id'=>$test->id ,
                'name'=>$test->name ,
                'prize'=>$test->prize ,
                'counted'=>count($test->users_dotations)]);
        }

        foreach ($countcont as $key => $row)
        {
            $price[$key] = $row['counted'];
        }
        array_multisort($price, SORT_DESC, $countcont);
        $countcontestwin = array_splice($countcont, 0, 3);
        $countcontestwin = json_decode(json_encode((object) $countcontestwin), FALSE);

        $lastwins = $this->Contests->UsersDotations->find()
            ->contain(['Users','Contests'])
        ->order('date DESC');

        $lastcontests = $this->Contests->find()
            ->contain(['Users','Categories'])
            ->order('Contests.created DESC')
            ->where(['Contests.active' => 1])
        ->limit(12);

        $topwin = $this->Contests->Users->find();
        $topwin->select(['total_win' => $topwin->func()->count('UsersDotations.user_id'), 'Users.login'])
            ->leftJoinWith('UsersDotations')
            ->group('UsersDotations.user_id')
        ->order('total_win DESC')
        ->limit(10);

        $topcreate = $this->Contests->Users->find();
        $topcreate->select(['total' => $topcreate->func()->count('Contests.user_id'), 'Users.login'])
            ->leftJoinWith('Contests')
            ->group('Contests.user_id')
            ->order('total DESC')
            ->limit(10);

        $this->set(compact('votplus','countcontestwin','playplus','lastwins','lastcontests','topwin','topcreate'));
    }

    public function category($id= null)
    {

        $params = [];
        $name = 'Contests.created';
        $sens = 'DESC';
        $state = 1;

        if(isset ( $_GET['status'] ) ){
            if ($this->request->query('status') !== 'a') {
            $state = 0;
        }
        }

        if(isset ( $_GET['freq'] ) ){
                $freq = $this->request->query('freq');
            if ($freq !== 'a') {
            $request = "frequency_id = '$freq'";
            array_push($params, $request);
        }
        }

        if(isset ( $_GET['zone'] ) ){
            $zone = $this->request->query('zone');
            if ($zone !== 'a') {
                $request = "zone LIKE  '%$zone%'";
                array_push($params, $request);
            }
        }

        if(isset ( $_GET['twitter'] ) ){
            $tw= $this->request->query('twitter');
            if ($tw !== 'a' && $tw == '1') {
                $request = "game_url LIKE  '%twitter%'";
                array_push($params, $request);
            }
        }

        if(isset ( $_GET['fb'] ) ){
            $fb= $this->request->query('fb');
            if ($fb !== 'a' && $fb == '1') {
                $request = "game_url LIKE  '%facebook%'";
                array_push($params, $request);
            }
            if ($fb !== 'a' && $fb == '0') {
                $request = "game_url NOT LIKE  '%facebook%'";
                array_push($params, $request);
            }
        }

        if(isset ( $_GET['rechercher'] ) ){
            $search = $this->request->query('rechercher');
                $request = "(name LIKE  '%$search%' OR  prize LIKE  '%$search%') ";
                array_push($params, $request);
        }

        if(isset ( $_GET['ordre'] ) ){
            $sens = $this->request->query('ordre');
        }

        if(isset ( $_GET['tri'] ) ){
            $tri = $this->request->query('tri');
            if ($tri == 'publication'){
                $name =  'Contests.created';
            }
            if ($tri == 'date'){
                $name =  'Contests.deadline';
            }
            if ($tri == 'gagnant'){
                $name =  'Contests.dotation_count';
            }
            if ($tri == 'commentaire'){
                $name =  'Contests.post_count';
            }
            if ($tri == 'recommandation'){
                $name =  'Contests.vote';
            }
        }

        $order = $name. ' ' .$sens;

            if ($id){
                $this->paginate = [
                    'contain' => ['Categories', 'Frequencies', 'Principles','Users','UsersVotes','UsersDotations',
                        'Posts' => function($q) {
                            return $q->select(['contest_id']);}]];

                $contests = $this->paginate($this->Contests->find('all')
                    ->where(['Contests.active' => $state, ['category_id '=> $id],$params])
                    ->order($order));
            }
            else{
                $this->paginate = [
                    'contain' => ['Categories', 'Frequencies', 'Principles','Users','UsersVotes','UsersDotations',
                        'Posts' => function($q) {
                            return $q->select(['contest_id']);}]];

                $contests = $this->paginate($this->Contests->find('all')
                    ->where(['Contests.active' => $state ,$params])
                    ->order($order));
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


        $votplus = $this->Contests->find('all')
            ->order(['vote' => 'DESC'])
            ->where(['Contests.active' => 1])
            ->limit(3);

        $playplus = $this->Contests->find('all')
            ->order(['play' => 'DESC'])
            ->where(['Contests.active' => 1])
            ->limit(3);

        $maxwin = $this->Contests->find()
            ->contain(['UsersDotations'])
            ->select(['Contests.id','Contests.name','Contests.prize'])
            ->where(['Contests.active' => 1]);

        $countcont = [];
        foreach ($maxwin as $test){
            array_push($countcont,  ['id'=>$test->id ,
                'name'=>$test->name ,
                'prize'=>$test->prize ,
                'counted'=>count($test->users_dotations)]);
        }

        foreach ($countcont as $key => $row)
        {
            $price[$key] = $row['counted'];
        }
        array_multisort($price, SORT_DESC, $countcont);
        $countcontestwin = array_splice($countcont, 0, 3);
        $countcontestwin = json_decode(json_encode((object) $countcontestwin), FALSE);

        $freq = $this->Contests->frequencies->find('all');
        $des = $this->Contests->principles->find('all');
        $zon = $this->Contests->zones->find('all');

        $uid = $this->Auth->user('id');

        $countquery  = $this->Contests->find();
        $counttotal = $countquery->select(['count' => $countquery->func()->count('*')])->first();
        $restrictions = $this->Contests->Restrictions->find('all');
        $zones = $this->Contests->Zones->find('all');
        $this->set(compact('state','uid','zon','des','freq','contests','categories','id','counttotal','restrictions','zones','markerlist','favlist','votelist','time','votplus','countcontestwin','playplus'));
        $this->set('_serialize', ['contests']);
        $this->set('frek', $this->Contests->frequencies->find('list'));
        $this->set('zonelist', $this->Contests->zones->find('list'));
        $this->set('countcontest', $contests->count());
    }



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
            $contest->active = 0;
            $contest->dotation_count = 0;
            $contest->post_count = 0;
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

    public function dotation($id = null)
    {


        $users = $this->Contests->UsersDotations->find('all')
            ->contain(['Users'])
            ->where(['UsersDotations.contest_id' => $id])
            ->order(['date' => 'DESC']);


        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    public function playcount()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
        $count = $this->Contests->query();
            $count->update()
                ->set($count->newExpr('play = play + 1'))
            ->where(['id' => $this->request->data['id']])
            ->execute();
    }
    }

    public function edittype()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $type= intval($this->request->data['type']);
            $count->update()
                ->set(['category_id' => $type])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }

    public function editfreq()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $type= intval($this->request->data['freq']);
            $count->update()
                ->set(['frequency_id' => $type])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }


    public function editname()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $name= $this->request->data['name'];
            $count->update()
                ->set(['name' => $name])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }

    public function editdot()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $dot= $this->request->data['dot'];
            $count->update()
                ->set(['prize' => $dot])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }

    public function editdes()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $des= intval($this->request->data['des']);
            $count->update()
                ->set(['principle_id' => $des])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }

    public function editzone()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $zones = $this->request->data['zone'];
            $count->update()
                ->set(['zone' => $zones])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }

    public function editres()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $res = $this->request->data['res'];
            $count->update()
                ->set(['restriction' => $res])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }

    public function editq()
{
    $this->autoRender = false;

    if ($this->request->is('post')) {
        $count = $this->Contests->query();
        $dot= $this->request->data['q'];
        $count->update()
            ->set(['answer' => $dot])
            ->where(['id' => $this->request->data['id']])
            ->execute();
    }
}

    public function editdate()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $count = $this->Contests->query();
            $date= $this->request->data['date'];
            $count->update()
                ->set(['deadline' => $date])
                ->where(['id' => $this->request->data['id']])
                ->execute();
        }
    }

}
