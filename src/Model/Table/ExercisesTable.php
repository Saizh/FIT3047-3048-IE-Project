<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exercises Model
 *
 * @property \App\Model\Table\UnitsTable|\Cake\ORM\Association\BelongsTo $Units
 * @property \App\Model\Table\CulturalNotesTable|\Cake\ORM\Association\BelongsTo $CulturalNotes
 * @property \App\Model\Table\ExerciseAttemptsTable|\Cake\ORM\Association\HasMany $ExerciseAttempts
 * @property \App\Model\Table\ExerciseNotesTable|\Cake\ORM\Association\HasMany $ExerciseNotes
 * @property \App\Model\Table\ExerciseTagsTable|\Cake\ORM\Association\HasMany $ExerciseTags
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\HasMany $Questions
 *
 * @method \App\Model\Entity\Exercise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exercise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exercise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exercise|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise findOrCreate($search, callable $callback = null, $options = [])
 */
class ExercisesTable extends Table
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

        $this->setTable('exercises');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Units', [
            'foreignKey' => 'unit_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('CulturalNotes', [
            'foreignKey' => 'cultural_note_id'
        ]);
        $this->hasMany('ExerciseAttempts', [
            'foreignKey' => 'exercise_id'
        ]);
        $this->hasMany('ExerciseNotes', [
            'foreignKey' => 'exercise_id'
        ]);
        $this->hasMany('ExerciseTags', [
            'foreignKey' => 'exercise_id'
        ]);
        $this->hasMany('Questions', [
            'foreignKey' => 'exercise_id'
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
            ->scalar('exerciseAudioPath')
            ->maxLength('exerciseAudioPath', 255)
            ->requirePresence('exerciseAudioPath', 'create')
            ->notEmpty('exerciseAudioPath');

        $validator
            ->scalar('transcript_eng')
            ->allowEmpty('transcript_eng');

        $validator
            ->scalar('transcript_fr')
            ->allowEmpty('transcript_fr');

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
        $rules->add($rules->existsIn(['unit_id'], 'Units'));
        $rules->add($rules->existsIn(['cultural_note_id'], 'CulturalNotes'));

        return $rules;
    }
}
