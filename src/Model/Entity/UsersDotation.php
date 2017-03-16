<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersDotation Entity
 *
 * @property int $user_id
 * @property int $contest_id
 * @property string $description
 * @property \Cake\I18n\Time $date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contest $contest
 */
class UsersDotation extends Entity
{

}
