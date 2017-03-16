<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dotation Entity
 *
 * @property int $user_id
 * @property int $contest_id
 * @property string $description
 * @property \Cake\I18n\Time $date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contest $contest
 */
class Dotation extends Entity
{

}
