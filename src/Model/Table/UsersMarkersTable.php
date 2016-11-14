<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersMarkers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Contests
 *
 * @method \App\Model\Entity\UsersMarker get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersMarker newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersMarker[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersMarker|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersMarker patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersMarker[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersMarker findOrCreate($search, callable $callback = null)
 */
class UsersMarkersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('users_markers');
        $this->primaryKey('user_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Contests', [
            'foreignKey' => 'contest_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['contest_id'], 'Contests'));

        return $rules;
    }
}
