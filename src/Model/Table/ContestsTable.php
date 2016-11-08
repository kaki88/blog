<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contests Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Frequencies
 * @property \Cake\ORM\Association\BelongsToMany $Restrictions
 * @property \Cake\ORM\Association\BelongsToMany $Zones
 *
 * @method \App\Model\Entity\Contest get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contest findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContestsTable extends Table
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

        $this->table('contests');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Frequencies', [
            'foreignKey' => 'frequency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Restrictions', [
            'foreignKey' => 'contest_id',
            'targetForeignKey' => 'restriction_id',
            'joinTable' => 'contests_restrictions'
        ]);
        $this->belongsToMany('Zones', [
            'foreignKey' => 'contest_id',
            'targetForeignKey' => 'zone_id',
            'joinTable' => 'contests_zones'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('game_url', 'create')
            ->notEmpty('game_url');

        $validator
            ->requirePresence('rule_url', 'create')
            ->notEmpty('rule_url');

        $validator
            ->boolean('on_facebook')
            ->requirePresence('on_facebook', 'create')
            ->notEmpty('on_facebook');

        $validator
            ->date('deadline')
            ->requirePresence('deadline', 'create')
            ->notEmpty('deadline');

        $validator
            ->requirePresence('img_url', 'create')
            ->notEmpty('img_url');

        $validator
            ->requirePresence('prize', 'create')
            ->notEmpty('prize');

        $validator
            ->requirePresence('answer', 'create')
            ->notEmpty('answer');


        return $validator;
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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['frequency_id'], 'Frequencies'));

        return $rules;
    }
}
