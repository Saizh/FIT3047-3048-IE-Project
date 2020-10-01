<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MultipleAnswersAttempts Model
 *
 * @property \App\Model\Table\ExerciseAttemptsTable|\Cake\ORM\Association\BelongsTo $ExerciseAttempts
 * @property \App\Model\Table\MultipleAnswersTable|\Cake\ORM\Association\BelongsTo $MultipleAnswers
 *
 * @method \App\Model\Entity\MultipleAnswersAttempt get($primaryKey, $options = [])
 * @method \App\Model\Entity\MultipleAnswersAttempt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MultipleAnswersAttempt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MultipleAnswersAttempt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MultipleAnswersAttempt|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MultipleAnswersAttempt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleAnswersAttempt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleAnswersAttempt findOrCreate($search, callable $callback = null, $options = [])
 */
class MultipleAnswersAttemptsTable extends Table
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

        $this->setTable('multiple_answers_attempts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExerciseAttempts', [
            'foreignKey' => 'exercise_attempt_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('MultipleAnswers', [
            'foreignKey' => 'multiple_answer_id',
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
        $rules->add($rules->existsIn(['multiple_answer_id'], 'MultipleAnswers'));

        return $rules;
    }
}
