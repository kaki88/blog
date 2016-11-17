<?php
namespace App\View\Cell;
use Cake\ORM\TableRegistry;
use Cake\View\Cell;

/**
 * Login cell
 */
class AlertCell extends Cell
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
        $tblalert = TableRegistry::get('Alerts');
        $alert = $tblalert->find('all')->count();

        $this->set(compact('alert'));
    }
}
