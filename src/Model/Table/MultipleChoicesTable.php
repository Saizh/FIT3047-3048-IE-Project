<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MultipleChoices Model
 *
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsTo $Questions
 *
 * @method \App\Model\Entity\MultipleChoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\MultipleChoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MultipleChoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MultipleChoice|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MultipleChoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoice findOrCreate($search, callable $callback = null, $options = [])
 */
class MultipleChoicesTable extends Table
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

        $this->setTable('multiple_choices');
        $this->setDisplayField('answer');
        $this->setPrimaryKey('id');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
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
            ->scalar('answer')
            ->maxLength('answer', 255)
            ->requirePresence('answer', 'create')
            ->notEmpty('answer');

        $validator
            ->boolean('correct')
            ->requirePresence('correct', 'create')
            ->notEmpty('correct');

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
        $rules->add($rules->existsIn(['question_id'], 'Questions'));

        return $rules;
    }
}
