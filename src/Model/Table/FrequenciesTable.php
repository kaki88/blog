<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Frequencies Model
 *
 * @property \Cake\ORM\Association\HasMany $Contests
 *
 * @method \App\Model\Entity\Frequency get($primaryKey, $options = [])
 * @method \App\Model\Entity\Frequency newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Frequency[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Frequency|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Frequency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Frequency[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Frequency findOrCreate($search, callable $callback = null)
 */
class FrequenciesTable extends Table
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

        $this->table('frequencies');
        $this->displayField('period');
        $this->primaryKey('id');

        $this->hasMany('Contests', [
            'foreignKey' => 'frequency_id'
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
            ->requirePresence('period', 'create')
            ->notEmpty('period');

        return $validator;
    }
}
