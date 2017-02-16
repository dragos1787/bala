<?php
App::uses('AppModel','Model');
App::uses('SimplePasswordHasher','Controller/Component/Auth');

class User extends AppModel{
	public $name = 'User';
	public function beforeSave($option = array()){
		if (isset($this->data[$this->alias]['password'])){
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
			
		}
		return true;
	}
	
	public $validate = array(
	  'username' => array(
			'required' => array(
				'rule' => array('custom', '/.+/'),
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Please enter a username.'
			),
			'alpha' => array(
				'rule' => array('alphaNumeric'),
				'message' => 'The username must be alphanumeric.'
			),
			'unique_username' => array(
				'rule' => array('isUnique', 'username'),
				'message' => 'This username is already in use.'
			),
			'username_min' => array(
				'rule' => array('minLength', '3'),
				'message' => 'The username must have at least 3 characters.'
			)
		),
		'email' => array(
			'isValid' => array(
				'rule' => 'email',
				'required' => true,
				'message' => 'Please enter a valid email address.'
			),
			'isUnique' => array(
				'rule' => array('isUnique', 'email'),
				'message' => 'This email is already in use.'
			)
		),
		'password' => array(
			'too_short' => array(
				'rule' => array('minLength', '6'),
				'message' => 'The password must have at least 6 characters.'
			),
		),
		'temppassword' => array(
			'rule' => 'confirmPassword',
			'message' => 'The passwords are not equal, please try again.'
		),
		'tos' => array(
			'rule' => array('custom','[1]'),
			'message' => 'You must agree to the terms of use.'
		)
	); 
	// Custom Validation
	
	function indenticalFieldValues($field=array(), $compare_field=null ){
		foreach($filed as $key => $value){
			$v1 = $value;
			$v2 = $this->data[$this->name][$compare_field];
			if($v1!== $v2) {
				return FALSE;
				
			} else {
				continue;
			}
		}
		return TRUE;
	}
	
}