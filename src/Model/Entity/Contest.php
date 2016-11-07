<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contest Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $game_url
 * @property string $rule_url
 * @property bool $on_facebook
 * @property int $frequency_id
 * @property \Cake\I18n\Time $deadline
 * @property string $img_url
 * @property string $prize
 * @property string $answer
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Frequency $frequency
 * @property \App\Model\Entity\Restriction[] $restrictions
 * @property \App\Model\Entity\Zone[] $zones
 */
class Contest extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
