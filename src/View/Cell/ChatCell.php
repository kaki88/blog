<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\I18n\Time;

/**
 * Chat cell
 */
class ChatCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Chat');

        if ($this->request->is('post')) {
            $time = Time::now();
            $alert = $this->Chat->query();
            $alert->insert(['user_id', 'message','created'])
                ->values([
                    'user_id' => $this->request->session()->read('Auth.User.id'),
                    'message' => $this->request->data['message'],
                    'created' => $time
                ])
                ->execute();
        }

        $messages = $this->Chat->find('all')
            ->contain('Users')
            ->limit('30')
            ->order(['Chat.created' => 'DESC']);

        $this->set(compact('chat','messages'));
    }
}
