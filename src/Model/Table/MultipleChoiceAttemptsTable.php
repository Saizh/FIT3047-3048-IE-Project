<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MultipleChoiceAttempts Model
 *
 * @property \App\Model\Table\ExerciseAttemptsTable|\Cake\ORM\Association\BelongsTo $ExerciseAttempts
 * @property \App\Model\Table\MultipleChoicesTable|\Cake\ORM\Association\BelongsTo $MultipleChoices
 *
 * @method \App\Model\Entity\MultipleChoiceAttempt get($primaryKey, $options = [])
 * @method \App\Model\Entity\MultipleChoiceAttempt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceAttempt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceAttempt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MultipleChoiceAttempt|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MultipleChoiceAttempt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceAttempt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceAttempt findOrCreate($search, callable $callback = null, $options = [])
 */
class MultipleChoiceAttemptsTable extends Table
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

        $this->setTable('multiple_choice_attempts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExerciseAttempts', [
            'foreignKey' => 'exercise_attempt_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MultipleChoices', [
            'foreignKey' => 'multiple_choice_id',
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
            ->integer('score')
            ->allowEmpty('score');

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
        $rules->add($rules->existsIn(['exercise_attempt_id'], 'ExerciseAttempts'));
        $rules->add($rules->existsIn(['multiple_choice_id'], 'MultipleChoices'));

        return $rules;
    }
}
