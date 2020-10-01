<?php
/**
 * Created by PhpStorm.
 * User: angga
 * Date: 22/08/2018
 * Time: 4:18 PM
 */
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
//    public function checkCharacters($password, array $context)
//    {
//         //number
//        if (!preg_match("#[0-9]#", $password)) {
//        //    return false;
//        }
//        // Uppercase
//        if (!preg_match("#[A-Z]#", $password)) {
//            return false;
//        }
//        // lowercase
//        if (!preg_match("#[a-z]#", $password)) {
//            return false;
//        }
//        // special characters
//        if (!preg_match("#\W+#", $password) ) {
//            return false;
//        }
//        return true;
//    }

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('class', [
            'foreignKey' => 'class_id']);
        $this->addBehavior('Timestamp');
        $this->hasMany('ExerciseAttempts', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('ExerciseNotes', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('User_Units', [
            'foreignKey' => 'user_id'
        ]);
    }
    public function validationDefault(Validator $validator)
    {


        return $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->requirePresence('email', 'create')
            ->notEmpty('email', 'An email address is required')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'])
            ->notEmpty('password', 'A password is required')
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 8],
                    'message' => 'Passwords must be at least 8 characters long.',
                ]
            ])
            ->requirePresence('confirm_password', 'create')
            ->notEmpty('confirm_password')
            ->allowEmpty('confirm_password', 'update')
            ->add('confirm_password', 'compareWith', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Passwords do not match.'
            ])

            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin','teacher','student','unverified']],
                'message' => 'Please enter a valid role'
            ])

            ;


        $validator
            ->scalar('school')
            ->maxLength('school', 20)
            ->requirePresence('school', 'create')
            ->notEmpty('school');


        $validator
            ->integer('year_level')
            ->requirePresence('year_level', 'create')
            ->notEmpty('year_level');


        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 20)
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->scalar('surname')
            ->maxLength('surname', 20)
            ->requirePresence('surname', 'create')
            ->notEmpty('surname');

        $validator
            ->scalar('passkey')
            ->maxLength('passkey', 13)
            ->allowEmpty('passkey');

        $validator
            ->dateTime('timeout')
            ->allowEmpty('timeout');



        return $validator;

    }

    public function validationUpdate_profile(Validator $validator)
    {
        $validator

            ->notEmpty('first_name')
            ->notEmpty('surname')
            ->notEmpty('email', 'An email address is required')
            ->notEmpty('year_level');
        return $validator;
    }

    public function validationBooking(Validator $validator)
    {

        $validator->add('accept_terms', 'custom', [
            'rule' => [$this, 'AcceptTerm'],
            'message' => 'You must agreed Term and Condition'
        ]);
        return $validator;
    }
    //make function
    public function AcceptTerm($value,$context){
        if($context['data']['accept_terms']==1)
            return true;
        else
            return false;
    }


}