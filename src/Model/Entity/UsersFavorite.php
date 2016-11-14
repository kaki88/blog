<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersFavorite Entity
 *
 * @property int $user_id
 * @property int $contest_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contest $contest
 */
class UsersFavorite extends Entity
{

}
