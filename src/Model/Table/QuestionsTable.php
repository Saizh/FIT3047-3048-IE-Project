<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @property \App\Model\Table\ExercisesTable|\Cake\ORM\Association\BelongsTo $Exercises
 * @property \App\Model\Table\TypeOfQuestionsTable|\Cake\ORM\Association\BelongsTo $TypeOfQuestions
 * @property \App\Model\Table\MultipleAnswersTable|\Cake\ORM\Association\HasMany $MultipleAnswers
 * @property \App\Model\Table\MultipleChoicesTable|\Cake\ORM\Association\HasMany $MultipleChoices
 * @property \App\Model\Table\ShortAnswersTable|\Cake\ORM\Association\HasMany $ShortAnswers
 * @property \App\Model\Table\ShortAnswersAttemptsTable|\Cake\ORM\Association\HasMany $ShortAnswersAttempts
 *
 * @method \App\Model\Entity\Question get($primaryKey, $options = [])
 * @method \App\Model\Entity\Question newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Question[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Question|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Question patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Question[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Question findOrCreate($search, callable $callback = null, $options = [])
 */
class QuestionsTable extends Table
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

        $this->setTable('questions');
        $this->setDisplayField('question');
        $this->setPrimaryKey('id');

        $this->belongsTo('Exercises', [
            'foreignKey' => 'exercise_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TypeOfQuestions', [
            'foreignKey' => 'type_of_question_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('MultipleAnswers', [
            'foreignKey' => 'question_id'
        ]);
        $this->hasMany('MultipleChoices', [
            'foreignKey' => 'question_id'
        ]);
        $this->hasMany('ShortAnswers', [
            'foreignKey' => 'question_id'
        ]);
        $this->hasMany('ShortAnswersAttempts', [
            'foreignKey' => 'question_id'
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
            ->scalar('question')
            ->requirePresence('question', 'create')
            ->notEmpty('question');

        $validator
            ->integer('max_score')
            ->requirePresence('max_score', 'create')
            ->notEmpty('max_score');

        $validator
            ->scalar('feedback')
            ->allowEmpty('feedback');

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
        $rules->add($rules->existsIn(['exercise_id'], 'Exercises'));
        $rules->add($rules->existsIn(['type_of_question_id'], 'TypeOfQuestions'));

        return $rules;
    }
}
