<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypeOfQuestions Model
 *
 * @method \App\Model\Entity\TypeOfQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypeOfQuestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypeOfQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypeOfQuestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeOfQuestion|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypeOfQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypeOfQuestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypeOfQuestion findOrCreate($search, callable $callback = null, $options = [])
 */
class TypeOfQuestionsTable extends Table
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

        $this->setTable('type_of_questions');
        $this->setDisplayField('question_type');
        $this->setPrimaryKey('id');
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
            ->scalar('question_type')
            ->maxLength('question_type', 255)
            ->requirePresence('question_type', 'create')
            ->notEmpty('question_type')
            ->add('question_type', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['question_type']));

        return $rules;
    }
}
