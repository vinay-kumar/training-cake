<?php
App::uses('AppModel', 'Model');
/**
 * Page Model
 *
 * @property User $User
 * @property PageGroup $PageGroup
 */
class Page extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	
	public $searchFields = array('name'=>array('type'=>'text'), 'status'=>array('type'=>'options'));
	
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PageGroup' => array(
			'className' => 'PageGroup',
			'foreignKey' => 'page_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	
	public function isOwnedBy($page_id, $user_id) {
		return $this->field('id', array('id' => $page_id, 'user_id' => $user_id)) !== false;
	}
	
}
