<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserClass Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ClassTable|\Cake\ORM\Association\BelongsTo $Class
 *
 * @method \App\Model\Entity\UserClass get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserClass newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserClass[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserClass|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserClass|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserClass[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserClass findOrCreate($search, callable $callback = null, $options = [])
 */
class UserClassTable extends Table
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

        $this->setTable('user_class');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey(['user_id', 'class_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Class', [
            'foreignKey' => 'class_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['class_id'], 'Class'));

        return $rules;
    }
}
