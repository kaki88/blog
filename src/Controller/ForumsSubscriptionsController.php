<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * ForumsSubscriptions Controller
 *
 * @property \App\Model\Table\ForumsSubscriptionsTable $Subscriptions
 */
class ForumsSubscriptionsController extends AppController
{

    public function add()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $this->loadModel('ForumsSubscriptions');
            $subscription = $this->ForumsSubscriptions->newEntity();
            $user = $this->Auth->user('id');
            $this->request->data['user_id'] = $user;
            $subscription = $this->ForumsSubscriptions->patchEntity($subscription, $this->request->data);
            $this->ForumsSubscriptions->save($subscription);
        }
    }


    public function delete()
    {
        $this->autoRender = false;
        $this->loadModel('ForumsSubscriptions');
        $user = $this->Auth->user('id');
        $id = $this->request->data['thread_id'];
        $this->request->allowMethod(['post', 'delete']);
        $subscription = $this->ForumsSubscriptions->find()
            ->where(['user_id'=> $user , 'thread_id'=> $id])
            ->first();
        $this->ForumsSubscriptions->delete($subscription);
    }
}
