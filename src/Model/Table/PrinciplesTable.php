<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Principles Model
 *
 * @method \App\Model\Entity\Principle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Principle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Principle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Principle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Principle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Principle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Principle findOrCreate($search, callable $callback = null)
 */
class PrinciplesTable extends Table
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

        $this->table('principles');
        $this->displayField('description');
        $this->primaryKey('id');
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
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        return $validator;
    }
}
