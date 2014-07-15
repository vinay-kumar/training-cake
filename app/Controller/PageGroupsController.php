<?php
App::uses('AppController', 'Controller');
/**
 * PageGroups Controller
 *
 * @property PageGroup $PageGroup
 * @property PaginatorComponent $Paginator
 */
class PageGroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PageGroup->recursive = 0;
		$this->set('pageGroups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PageGroup->exists($id)) {
			throw new NotFoundException(__('Invalid page group'));
		}
		$options = array('conditions' => array('PageGroup.' . $this->PageGroup->primaryKey => $id));
		$this->set('pageGroup', $this->PageGroup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PageGroup->create();
			if ($this->PageGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The page group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page group could not be saved. Please, try again.'));
			}
		}
		$users = $this->PageGroup->User->find('list');
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
		if (!$this->PageGroup->exists($id)) {
			throw new NotFoundException(__('Invalid page group'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PageGroup->save($this->request->data)) {
				$this->Session->setFlash(__('The page group has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page group could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PageGroup.' . $this->PageGroup->primaryKey => $id));
			$this->request->data = $this->PageGroup->find('first', $options);
		}
		$users = $this->PageGroup->User->find('list');
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
		$this->PageGroup->id = $id;
		if (!$this->PageGroup->exists()) {
			throw new NotFoundException(__('Invalid page group'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PageGroup->delete()) {
			$this->Session->setFlash(__('The page group has been deleted.'));
		} else {
			$this->Session->setFlash(__('The page group could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
