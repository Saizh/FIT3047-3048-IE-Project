<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShortAnswersAttempts Model
 *
 * @property \App\Model\Table\ExerciseAttemptsTable|\Cake\ORM\Association\BelongsTo $ExerciseAttempts
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsTo $Questions
 *
 * @method \App\Model\Entity\ShortAnswersAttempt get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShortAnswersAttempt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShortAnswersAttempt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShortAnswersAttempt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShortAnswersAttempt|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShortAnswersAttempt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShortAnswersAttempt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShortAnswersAttempt findOrCreate($search, callable $callback = null, $options = [])
 */
class ShortAnswersAttemptsTable extends Table
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

        $this->setTable('short_answers_attempts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('ExerciseAttempts', [
            'foreignKey' => 'exercise_attempt_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('attempted_answer')
            ->maxLength('attempted_answer', 1000)
            ->requirePresence('attempted_answer', 'create')
            ->notEmpty('attempted_answer');

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
        $rules->add($rules->existsIn(['question_id'], 'Questions'));

        return $rules;
    }
}
