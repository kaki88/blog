<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\ORM\Query;
use Cake\View\Helper\PaginatorHelper;
use Cake\Event\Event;


class ForumsController extends AppController
{
    public $paginate = [
        'limit' => 12,
        'order' => [
            'Threads.id' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }


    public function index()
    {
        $role = $this->Auth->user('role_id');

            $cat = $this->Forums->ForumsCategories->find('all')
                ->contain(['Forums.Users',
                    'Forums' => function ($q) {
                    return $q
                        ->order(['Forums.sort' => 'ASC']);
                },
                    'Forums.ForumsThreads' => function ($z) {
                    return $z
                        ->order(['ForumsThreads.id' => 'DESC'])
                        ->limit(1);
                }
                ])
                ->order(['ForumsCategories.sort' => 'ASC']);



            $countpost = $this->Forums->ForumsThreads->ForumsPosts->find('all')
                ->contain(['ForumsThreads.Forums.ForumsCategories'])
                ->count();

            $countthread = $this->Forums->ForumsThreads->find('all')
                ->contain(['Forums.ForumsCategories'])
                ->count();

        $countuser = $this->Forums->Users->find('all')->count();
        $lastuser = $this->Forums->Users->find('all')
            ->select(['id', 'login'])
            ->order(['Users.created' => 'DESC'])->first();

        $this->set(compact('cat', 'countpost', 'countthread', 'countuser', 'lastuser', 'role'));
    }



    public function view($slug = null, $id = null)
    {
        $role = $this->Auth->user('role_id');

        $forum = $this->Forums->ForumsThreads->find('all')
            ->contain(['Users', 'ForumsPosts'])
            ->where(['forum_id' => $id]);

        $forumname = $this->Forums->find('all')
            ->select(['name'])
            ->where(['id' => $id])
            ->first();

        $this->set(compact('forumname', 'id', 'role'));
        $this->set('forum', $this->paginate($forum));
    }

    public function search()
    {
        if ($this->request->is(['post'])) {
            $array = [];
            if (!empty($this->request->data['query'])) {
                $push = $this->request->data['query'];
                $pushall = "subject LIKE '%$push%' OR text LIKE '%$push%'";
                array_push($array, $pushall);
            }


            $results = $this->Forums->Threads->find('all', [
                'contain' => ['Users', 'Posts', 'Lastuserthread', 'Forums']
            ])
                ->where(['Threads.id >' => 0, $array]);

            $this->set(compact('results'));
        }
    }


}
