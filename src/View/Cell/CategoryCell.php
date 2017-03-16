<?php
namespace App\View\Cell;
use Cake\ORM\TableRegistry;
use Cake\View\Cell;

/**
 * Login cell
 */
class CategoryCell extends Cell
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
        $this->loadModel('Categories');
        $cats= $this->Categories->find('all');

        $this->set(compact('cats'));
    }
}
