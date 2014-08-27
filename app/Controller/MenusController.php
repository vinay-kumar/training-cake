<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 */
class MenusController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('populate', 'header_menu', 'default_page');
	}
	
	public function populate($table = ''){
		
		if (empty($table)) {
			echo '{}'; exit;
		}
		
		$modelName = Inflector::classify($table);
		$this->loadModel($modelName);
		
		echo json_encode($this->$modelName->find('list'));
		exit;	
	}
	
	public function header_menu() {
		
		if (empty($this->request->params['requested'])) {
			throw new ForbiddenException();
		}
		
		$options = array('conditions' => array('Menu.status' => 'Active'));
		return $this->Menu->find('all', $options);
		
	}
	
	public function default_page() {
	
		$options = array('conditions' => array('Menu.status' => 'Active', 'Menu.default' => 1));
		
		$menu = $this->Menu->find('first', $options);
		
		$this->redirect(array('controller'=>$menu['Menu']['parent_type'], 'action' => 'name',$menu['Menu']['id'],$menu['Menu']['slug']));
		
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		//$this->Menu->removeFromTree(14, true);
		//debug($this->Menu->generateTreeList());
		
		//debug($this->Menu->getPath(13));
		$this->Menu->recursive = 0;
		$this->set('menus', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->Menu->locale = array('en_uk', 'en_us');
		$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
		$this->set('menu', $this->Menu->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		}
		$users = $this->Menu->User->find('list');
		$parent_menu = $this->Menu->generateTreeList(null, null, null, " - ");
		$this->set(compact('users', 'parent_menu'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Menu->locale = 'en_uk';
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
			$this->request->data = $this->Menu->find('first', $options);
		}
		$users = $this->Menu->User->find('list');
		$parent_menu = $this->Menu->generateTreeList(null, null, null, " - ");
		$this->set(compact('users', 'parent_menu'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menu->delete()) {
			$this->Session->setFlash(__('The menu has been deleted.'));
		} else {
			$this->Session->setFlash(__('The menu could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
