<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
Time::setToStringFormat('yyyy/MM/dd HH:mm');
use Cake\Mailer\Email;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 */
class ForumsPostsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Upload');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Threads']
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        $this->set('_serialize', ['posts']);
    }


    public function view( $id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Threads', 'Files']
        ]);

        $this->set('post', $post);
        $this->set('_serialize', ['post']);
    }


    public function add($fid = null, $forum = null, $slug = null, $id = null)
    {


        $time = Time::now();
        $user = $this->Auth->user('id');

        $sub = $this->ForumsPosts->ForumsThreads->ForumsSubscriptions->find()
            ->contain('Users')
            ->select('Users.email')
            ->where(['thread_id' => $id]);

$pastquote = null;

        $username = $this->ForumsPosts->Users->find()
            ->select('login')
            ->where(['id' => $user])
            ->first();

        $forumid = $this->ForumsPosts->ForumsThreads->find()
            ->select(['forum_id','subject'])
            ->where(['id' => $id])
            ->first();

        $forumname = $this->ForumsPosts->ForumsThreads->Forums->find()
            ->select(['name'])
            ->where(['id' => $forumid->forum_id])
            ->first();

        $post = $this->ForumsPosts->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $user;
            $this->request->data['thread_id'] = $id;
            $post = $this->ForumsPosts->patchEntity($post, $this->request->data);
            if ($this->ForumsPosts->save($post)) {
#mettre a jour la date du topic
                $query = $this->ForumsPosts->ForumsThreads->query();
                $query->update()
                    ->set(['lastdate' => $time ])
                    ->where(['id' => $id])
                    ->execute();
#upload de fichier
                if (!empty($this->request->data['upload']['name'])) {
                    $picture = $this->Upload->getFile($this->request->data['upload'], 'files');
                    $this->request->data['upload'] = $picture;
                    $file = $this->ForumsPosts->Files->newEntity();
                    $this->request->data['name'] = $picture;
                    $this->request->data['post_id'] = $post->id;
                    $file = $this->ForumsPosts->Files->patchEntity($file, $this->request->data);
                    $this->ForumsPosts->Files->save($file);
                    $data = [
                        'post_id' => $post->id
                        ,
                        'file_id' => $file->id

                    ];
                    $fp = TableRegistry::get('forum_posts_files');
                    $postsFiles = $fp->newEntity();
                    $postsFiles = $fp->patchEntity($postsFiles, $data);
                    $fp->save($postsFiles);
                }
                #envoyer un mail aux abonnés
                if($sub){
                    $data = [$username->username , $id];
                    foreach ($sub as $item) {
                        if($item->has('Users')) {
                            $email = new Email('default');
                            $email->viewVars(['data' => $data]);
                            $email->template('default', 'default')
                                ->emailFormat('html');
                            $email->to($item->Users->email)
                                ->subject('Suivi du sujet : '.$this->request->data['title'].'')
                                ->send($this->request->data['message']);
                        }
                    }
                }

                $this->Flash->success(__('The post has been saved.'));


                return $this->redirect(['controller'=>'ForumsThreads','action' => 'view' , 'fid' => $forumid->forum_id, 'forum' => strtolower(str_replace(' ', '-', $forumname->name)), 'slug' => strtolower(str_replace(' ', '-', $forumid->subject)), 'id' => $id ]);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('post','forum','forumid','pastquote','add','sub','quote'));
        $this->set('_serialize', ['post']);
    }

    public function addquote($fid = null, $forum = null, $slug = null, $id = null, $quote = null)
    {
        $time = Time::now();
        $user = $this->Auth->user('id');

        $sub = $this->Posts->Threads->Subscriptions->find()
            ->contain('Users')
            ->select('Users.email')
            ->where(['thread_id' => $id]);

        if($quote) {
            if ($quote !== 'quotetopic') {
                $pastquote = $this->Posts->get($quote);
            }
            if ($quote == 'quotetopic') {
                $pastquote = $this->Posts->Threads->get($id);
            }
        }

        $username = $this->Posts->Users->find()
            ->select('username')
            ->where(['id' => $user])
            ->first();

        $forumid = $this->Posts->Threads->find()
            ->select(['forum_id','subject'])
            ->where(['id' => $id])
            ->first();

        $forumname = $this->Posts->Threads->Forums->find()
            ->select(['name'])
            ->where(['id' => $forumid->forum_id])
            ->first();

        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['user_id'] = $user;
            $this->request->data['thread_id'] = $id;
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {

                #upload de fichier
                if (!empty($this->request->data['upload']['name'])) {
                    $picture = $this->Upload->getFile($this->request->data['upload'], 'files');
                    $this->request->data['upload'] = $picture;
                    $file = $this->Posts->Files->newEntity();
                    $this->request->data['name'] = $picture;
                    $this->request->data['post_id'] = $post->id;
                    $file = $this->Posts->Files->patchEntity($file, $this->request->data);
                    $this->Posts->Files->save($file);
                    $data = [
                        'post_id' => $post->id
                        ,
                        'file_id' => $file->id

                    ];
                    $fp = TableRegistry::get('posts_files');
                    $postsFiles = $fp->newEntity();
                    $postsFiles = $fp->patchEntity($postsFiles, $data);
                    $fp->save($postsFiles);
                }

                #envoyer un mail aux abonnés
                if($sub){
                    $data = [$username->username , $id];
                    foreach ($sub as $item) {
                        if($item->has('Users')) {
                            $email = new Email('default');
                            $email->viewVars(['data' => $data]);
                            $email->template('default', 'default')
                                ->emailFormat('html');
                            $email->to($item->Users->email)
                                ->subject('Suivi du sujet : '.$this->request->data['title'].'')
                                ->send($this->request->data['message']);
                        }
                    }
                }

                $this->Flash->success(__('The post has been saved.'));
                $query = $this->Posts->Threads->forums->query();
                $query->update()
                    ->set([$query->newExpr('countpost = countpost + 1'),'lastuser' => $user ,
                        'lasttopic' => $post->id ])
                    ->where(['id' => $forumid->forum_id])
                    ->execute();

                $threadlast = $this->Posts->Threads->query();
                $threadlast->update()
                    ->set(['lastuser' => $user ,
                        'lastpost' => $time ])
                    ->where(['id' => $id])
                    ->execute();

                return $this->redirect(['controller'=>'Threads','action' => 'view' , 'fid' => $forumid->forum_id, 'forum' => strtolower(str_replace(' ', '-', $forumname->name)), 'slug' => strtolower(str_replace(' ', '-', $forumid->subject)), 'id' => $id ]);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }


        $this->set(compact('post','forum','forumid','pastquote','add','sub','quote'));
        $this->set('_serialize', ['post']);
    }

    public function edit($fid = null, $forum = null, $slug = null, $id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => ['Files']
        ]);

        $forumid = $this->Posts->Threads->find()
            ->select(['forum_id','subject'])
            ->where(['id' => $post->thread_id])
            ->first();

        $forumname = $this->Posts->Threads->Forums->find()
            ->select(['name'])
            ->where(['id' => $forumid->forum_id])
            ->first();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['controller'=>'Threads','action' => 'view' , 'fid' => $forumid->forum_id, 'forum' => strtolower(str_replace(' ', '-', $forumname->name)), 'slug' => strtolower(str_replace(' ', '-', $forumid->subject)), 'id' => $post->thread_id ]);
            } else {
                $this->Flash->error(__('The post could not be saved. Please, try again.'));
            }
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200]);
        $threads = $this->Posts->Threads->find('list', ['limit' => 200]);
        $files = $this->Posts->Files->find('list', ['limit' => 200]);
        $this->set(compact('post', 'users', 'threads', 'files'));
        $this->set('_serialize', ['post']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $threadid = $this->Posts->find()
            ->select('thread_id')
            ->where(['id' => $id])
            ->first();
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
            $query = $this->Posts->Threads->query();
            $query->update()
                ->set($query->newExpr('countpost = countpost - 1'))
                ->where(['id' => $threadid->thread_id])
                ->execute();
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }
}
