<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CulturalNotes Model
 *
 * @property |\Cake\ORM\Association\HasMany $Exercises
 *
 * @method \App\Model\Entity\CulturalNote get($primaryKey, $options = [])
 * @method \App\Model\Entity\CulturalNote newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CulturalNote[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CulturalNote|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CulturalNote|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CulturalNote patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CulturalNote[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CulturalNote findOrCreate($search, callable $callback = null, $options = [])
 */
class CulturalNotesTable extends Table
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

        $this->setTable('cultural_notes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Exercises', [
            'foreignKey' => 'cultural_note_id'
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('note')
            ->maxLength('note', 65535)
            ->requirePresence('note', 'create')
            ->notEmpty('note');

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
        $rules->add($rules->isUnique(['id']));

        return $rules;
    }
}
