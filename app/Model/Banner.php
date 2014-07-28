<?php
App::uses('AppModel', 'Model');
/**
 * Banner Model
 *
 * @property User $User
 * @property Feature $Feature
 */
class Banner extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


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
		'Feature' => array(
			'className' => 'Feature',
			'foreignKey' => 'feature_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
