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
                ->contain(['Forums.Endtopic'=> function ($z) {
                    return $z
                        ->select(['id','created','subject']);
                },
                    'Forums.Endpost'=> function ($z) {
                        return $z
                            ->select(['id','created','title']);
                    },
                    'Forums.Endpost.Usersd'=> function ($z) {
                        return $z
                            ->select(['id','login']);
                    },
                    'Forums.Endtopic.Users'=> function ($z) {
                    return $z
                        ->select(['id','login']);
                },
                    'Forums.ForumsThreads' => function ($z) {
                    return $z
                        ->select(['id','forum_id','created','subject']);
                },
                    'Forums.ForumsThreads.Users' => function ($z) {
                        return $z
                            ->select(['id','login']);
                    },
                    'Forums.ForumsThreads.ForumsPosts'  => function ($z) {
                        return $z
                            ->select(['thread_id','created']);
                    },
                ])
                ->order(['ForumsCategories.sort' => 'ASC']);

        $this->set(compact('cat'));
    }



    public function view($slug = null, $id = null)
    {
        $role = $this->Auth->user('role_id');

        $forum = $this->Forums->ForumsThreads->find()
            ->contain(['ForumsPosts'=> function ($z) {
                return $z
                    ->select(['thread_id']);
            },'Users', 'ForumsPs.Users'
            ])
            ->select(['Users.login', 'Users.id','ForumsThreads.id','ForumsThreads.created','ForumsThreads.subject',
                'ForumsThreads.countview'
            ])
            ->where(['forum_id' => $id])->order(['ForumsThreads.lastdate' => 'DESC' ]);

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
