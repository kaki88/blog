<?php
namespace App\View\Cell;
use Cake\ORM\TableRegistry;
use Cake\View\Cell;

/**
 * Login cell
 */
class WincountCell extends Cell
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
        $tblalert = TableRegistry::get('UsersDotations');
        $wincount = $tblalert->find('all')->count() + 23000;

        $this->set(compact('wincount'));
    }
}
