<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContestsRestrictions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Contests
 * @property \Cake\ORM\Association\BelongsTo $Restrictions
 *
 * @method \App\Model\Entity\ContestsRestriction get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContestsRestriction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContestsRestriction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContestsRestriction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContestsRestriction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContestsRestriction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContestsRestriction findOrCreate($search, callable $callback = null)
 */
class ContestsRestrictionsTable extends Table
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

        $this->table('contests_restrictions');

        $this->belongsTo('Contests', [
            'foreignKey' => 'contest_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Restrictions', [
            'foreignKey' => 'restriction_id',
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
        $rules->add($rules->existsIn(['contest_id'], 'Contests'));
        $rules->add($rules->existsIn(['restriction_id'], 'Restrictions'));

        return $rules;
    }
}
