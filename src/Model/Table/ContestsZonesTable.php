<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ContestsZones Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Contests
 * @property \Cake\ORM\Association\BelongsTo $Zones
 *
 * @method \App\Model\Entity\ContestsZone get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContestsZone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContestsZone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContestsZone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContestsZone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContestsZone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContestsZone findOrCreate($search, callable $callback = null)
 */
class ContestsZonesTable extends Table
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

        $this->table('contests_zones');
        $this->primaryKey('contest_id');

        $this->belongsTo('Contests', [
            'foreignKey' => 'contest_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id',
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
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));

        return $rules;
    }
}
