<?php
App::uses('AppController', 'Controller');
/**
 * FeaturePages Controller
 *
 * @property FeaturePage $FeaturePage
 * @property PaginatorComponent $Paginator
 */
class FeaturePagesController extends AppController {

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
		$this->FeaturePage->recursive = 0;
		$this->set('featurePages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FeaturePage->exists($id)) {
			throw new NotFoundException(__('Invalid feature page'));
		}
		$options = array('conditions' => array('FeaturePage.' . $this->FeaturePage->primaryKey => $id));
		$this->set('featurePage', $this->FeaturePage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FeaturePage->create();
			if ($this->FeaturePage->save($this->request->data)) {
				$this->Session->setFlash(__('The feature page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature page could not be saved. Please, try again.'));
			}
		}
		$users = $this->FeaturePage->User->find('list');
		$features = $this->FeaturePage->Feature->find('list');
		$pages = $this->FeaturePage->Page->find('list');
		$this->set(compact('users', 'features', 'pages'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FeaturePage->exists($id)) {
			throw new NotFoundException(__('Invalid feature page'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FeaturePage->save($this->request->data)) {
				$this->Session->setFlash(__('The feature page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The feature page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FeaturePage.' . $this->FeaturePage->primaryKey => $id));
			$this->request->data = $this->FeaturePage->find('first', $options);
		}
		$users = $this->FeaturePage->User->find('list');
		$features = $this->FeaturePage->Feature->find('list');
		$pages = $this->FeaturePage->Page->find('list');
		$this->set(compact('users', 'features', 'pages'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FeaturePage->id = $id;
		if (!$this->FeaturePage->exists()) {
			throw new NotFoundException(__('Invalid feature page'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FeaturePage->delete()) {
			$this->Session->setFlash(__('The feature page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The feature page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
