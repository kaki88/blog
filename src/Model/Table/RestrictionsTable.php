<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Restrictions Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Contests
 *
 * @method \App\Model\Entity\Restriction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Restriction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Restriction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Restriction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Restriction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Restriction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Restriction findOrCreate($search, callable $callback = null)
 */
class RestrictionsTable extends Table
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

        $this->table('restrictions');
        $this->displayField('sort');
        $this->primaryKey('id');

        $this->belongsToMany('Contests', [
            'foreignKey' => 'restriction_id',
            'targetForeignKey' => 'contest_id',
            'joinTable' => 'contests_restrictions'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('sort', 'create')
            ->notEmpty('sort');

        return $validator;
    }
}
