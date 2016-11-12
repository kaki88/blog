<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Search cell
 */
class SearchCell extends Cell
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
        $this->loadModel('Contests');
        $tablecat = $this->Contests->Categories;

        $type = $tablecat->find('list', [
            'keyField' => 'id',
            'valueField' => 'type'
        ]);

        $this->set(compact('type'));
    }
}
