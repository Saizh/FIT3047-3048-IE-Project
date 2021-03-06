<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Class Model
 *
 * @method \App\Model\Entity\Clas get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clas newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Clas[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clas|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clas|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clas patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clas[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clas findOrCreate($search, callable $callback = null, $options = [])
 */
class ClassTable extends Table
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

        $this->setTable('class');
        $this->setDisplayField('class_name');
        $this->setPrimaryKey('class_id');
        $this->hasMany('users', [
            'foreignKey' => 'class_id']);
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
            ->integer('class_id')
            ->allowEmpty('class_id', 'create');

        $validator
            ->scalar('class_name')
            ->maxLength('class_name', 20)
            ->allowEmpty('class_name');

        return $validator;
    }
}
