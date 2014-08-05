<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller {



	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect' => array(
							'controller' => 'pages',
							'action' => 'index'
					),
					'logoutRedirect' => array(
							'controller' => 'pages',
							'action' => 'index',
							'home'
					),
					'authenticate' => array(
							'Form' => array(
									'passwordHasher' => 'Blowfish'
							)
					),
					'authorize' => array('Controller')
			)
	);

	public function isAuthorized($user) {
		// Admin can access every action
		if (isset($user['role']) && $user['role'] === 'admin') {
			return true;
		}
		$this->Session->setFlash(__('You Do Not Have Access To This Area.'), 'failure');
		// Default deny
		return false;
	}


	protected function _populateSearchArray(){
			
		$data = array();
			
			
		if(isset($this->passedArgs['Search.operation_type']) && "Clear" == $this->passedArgs['Search.operation_type']) {
			$this->passedArgs = array();
			$url['action'] = 'admin_index';
			$this->redirect($url, null, true);
		}

		$modelClass = $this->modelClass;
		foreach ($this->$modelClass->searchFields as $field => $options){

			if(isset($this->passedArgs['Search.'.$field]) ) {
				if ($this->passedArgs['Search.'.$field] !="") {
					$operator = ' = ';
					$field_value = $this->passedArgs['Search.'.$field];
					if(isset($options['type'])){
						switch ($options['type']){
							case 'text':
								$operator = ' LIKE ';
								$field_value = "{$field_value}%";
								break;

						}

					}
					if (isset($options['table'])) {
						//$modelClass = Inflector::classify($options['table']);
						$this->Paginator->settings['conditions'][][Inflector::classify($options['table']).'.name '.$operator.' '] = "{$field_value}";
					}else{
						$this->Paginator->settings['conditions'][][$modelClass.'.'.$field.' '.$operator.' '] = "{$field_value}";
					}
				}
				$data[$field] = $this->passedArgs['Search.'.$field];
			}else{
				$data[$field] = '';
			}

		}
			
		return $data;
			

	}

	public function beforeFilter(){
		$this->helpers = array(
				'Paginator' => array(
						'className' => 'NewPaginator'
				)
		);
		$this->Auth->allow('name', 'view', 'index');
	}


	/**
	 * search method
	 *
	 * @return void
	 */
	public function admin_search() {
		// the page we will redirect to
		$url['action'] = 'admin_index';

		foreach ($this->data as $k=>$v){
			foreach ($v as $kk=>$vv){
				$url[$k.'.'.$kk]=$vv;
			}
		}

		// redirect the user to the url
		$this->redirect($url, null, true);
	}



	public function name($id=null, $slug = null){

		if (!isset($this->Menu)) {

			$this->loadModel('Menu');

		}

		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}

		$menu = $this->Menu->find('first', array('conditions' => array('Menu.id'=>$id)));

		$this->view($menu['Menu']['parent_id']);
		$this->render('view');
	}

}
