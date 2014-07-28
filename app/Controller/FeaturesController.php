<?php
App::uses('AppController', 'Controller');
/**
 * Features Controller
 *
 * @property Feature $Feature
 * @property PaginatorComponent $Paginator
 */
class FeaturesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	//public $actsAs = array('Containable');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Feature->recursive = 0;
		$this->set('features', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Feature->exists($id)) {
			throw new NotFoundException(__('Invalid feature'));
		}
		//$this->Feature->recursive = 2;
		$this->Feature->Behaviors->load('Containable');
		//$this->Feature->contain('FeaturePage.Page');
		$options = array('contain'=>'FeaturePage.Page', 'conditions' => array('Feature.' . $this->Feature->primaryKey => $id));
		$this->set('feature', $this->Feature->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Feature->create();
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash(__('The feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.'));
			}
		}
		$users = $this->Feature->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Feature->exists($id)) {
			throw new NotFoundException(__('Invalid feature'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Feature->save($this->request->data)) {
				$this->Session->setFlash(__('The feature has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Feature.' . $this->Feature->primaryKey => $id));
			$this->request->data = $this->Feature->find('first', $options);
		}
		$users = $this->Feature->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Feature->id = $id;
		if (!$this->Feature->exists()) {
			throw new NotFoundException(__('Invalid feature'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Feature->delete()) {
			$this->Session->setFlash(__('The feature has been deleted.'));
		} else {
			$this->Session->setFlash(__('The feature could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
