<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\View\Helper\PaginatorHelper;
use Cake\Event\Event;


class ForumsThreadsController extends AppController
{

    public $paginate = [
        'limit' => 12,
        'order' => [
            'Posts.id' => 'asc'
        ]
    ];
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Upload');
    }

    public function view($fid = null, $forum = null, $slug = null, $id = null)
    {
        $role = $this->Auth->user('role_id');
        $sub = $this->ForumsThreads->ForumsSubscriptions;
        $user = $this->Auth->user('id');
        $subscription = $sub->find()
            ->select('id')
            ->where(['user_id'=> $user , 'thread_id'=> $id])
            ->first();

        $thread = $this->ForumsThreads->find()
            ->contain(['Users.Roles','Files'])
        ->where(['ForumsThreads.id' => $id])
        ->first();

        $posts = $this->ForumsThreads->ForumsPosts->find('all')
           ->contain(['Users.Roles','Files'])
            ->where(['ForumsPosts.thread_id' => $id]);

        $query = $this->ForumsThreads->query();
        $query->update()
            ->set($query->newExpr('countview = countview + 1'))
            ->where(['id' => $id])
            ->execute();

        $this->set(compact('thread','subscription','fid','forum','slug','id','role','threads'));
        $this->set('posts', $this->paginate($posts));
    }


    public function add($slug = null, $id = null)
    {
        $user = $this->Auth->user('id');

        $thread = $this->ForumsThreads->newEntity();

        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $user;
            $this->request->data['forum_id'] = $id;
            $thread = $this->ForumsThreads->patchEntity($thread, $this->request->data);
            if ($this->ForumsThreads->save($thread)) {
#upload de fichier
                $picture = $this->Upload->getFile($this->request->data['upload'],'files');
                $this->request->data['upload'] = $picture;
                $file = $this->ForumsThreads->Files->newEntity();
                $this->request->data['name'] = $picture ;
                $this->request->data['post_id'] = $thread->id ;
                $file = $this->ForumsThreads->Files->patchEntity($file, $this->request->data);
                $this->ForumsThreads->Files->save($file);
                $data = [
                    'thread_id' => $thread->id
                    ,
                    'file_id' => $file->id

                ];
                $fp = TableRegistry::get('forum_threads_files');
                $postsFiles = $fp->newEntity();
                $postsFiles = $fp->patchEntity($postsFiles,$data);
                $fp->save($postsFiles);

                $query = $this->ForumsThreads->Forums->query();
                $query->update()
                    ->set($query->newExpr('countthread = countthread + 1'))
                    ->where(['id' => $id])
                    ->execute();

                $this->Flash->success(__('The thread has been saved.'));
                return $this->redirect(['controller'=>'Forums','action' => 'view' , 'slug' => strtolower(str_replace(' ', '-', $slug)), 'id' => $id]);
            } else {
                $this->Flash->error(__('The thread could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('thread', 'user', 'forums'));
        $this->set('_serialize', ['thread']);
    }



    public function edit($fid = null, $forum = null, $slug = null, $id = null)
    {
        $thread = $this->Threads->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $thread = $this->Threads->patchEntity($thread, $this->request->data);
            if ($this->Threads->save($thread)) {
                $this->Flash->success(__('The thread has been saved.'));

                return $this->redirect(['controller'=>'Threads','action' => 'view' , 'fid' => $fid, 'forum' => strtolower(str_replace(' ', '-', $forum)), 'slug' => strtolower(str_replace(' ', '-', $slug)), 'id' => $id ]);

            } else {
                $this->Flash->error(__('The thread could not be saved. Please, try again.'));
            }
        }
        $users = $this->Threads->Users->find('list', ['limit' => 200]);
        $forums = $this->Threads->Forums->find('list', ['limit' => 200]);
        $this->set(compact('thread', 'users', 'forums'));
        $this->set('_serialize', ['thread']);
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $thread = $this->ForumsThreads->get($id);
        $this->ForumsThreads->delete($thread);
        return $this->redirect($this->referer());
    }

}
