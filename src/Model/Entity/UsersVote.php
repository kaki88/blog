<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersVote Entity
 *
 * @property int $user_id
 * @property int $contest_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contest $contest
 */
class UsersVote extends Entity
{

}
