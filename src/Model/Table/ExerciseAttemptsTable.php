<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ExerciseAttempts Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ExercisesTable|\Cake\ORM\Association\BelongsTo $Exercises
 * @property \App\Model\Table\MultipleAnswersAttemptsTable|\Cake\ORM\Association\HasMany $MultipleAnswersAttempts
 * @property \App\Model\Table\MultipleChoiceAttemptsTable|\Cake\ORM\Association\HasMany $MultipleChoiceAttempts
 * @property \App\Model\Table\ShortAnswersAttemptsTable|\Cake\ORM\Association\HasMany $ShortAnswersAttempts
 *
 * @method \App\Model\Entity\ExerciseAttempt get($primaryKey, $options = [])
 * @method \App\Model\Entity\ExerciseAttempt newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ExerciseAttempt[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ExerciseAttempt|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExerciseAttempt|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ExerciseAttempt patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ExerciseAttempt[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ExerciseAttempt findOrCreate($search, callable $callback = null, $options = [])
 */
class ExerciseAttemptsTable extends Table
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

        $this->setTable('exercise_attempts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Exercises', [
            'foreignKey' => 'exercise_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MultipleAnswersAttempts', [
            'foreignKey' => 'exercise_attempt_id'
        ]);
        $this->hasMany('MultipleChoiceAttempts', [
            'foreignKey' => 'exercise_attempt_id'
        ]);
        $this->hasMany('ShortAnswersAttempts', [
            'foreignKey' => 'exercise_attempt_id'
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
            ->dateTime('attempt_date')
            ->requirePresence('attempt_date', 'create')
            ->notEmpty('attempt_date');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['exercise_id'], 'Exercises'));

        return $rules;
    }
}
