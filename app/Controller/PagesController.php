<?php
App::uses('AppController', 'Controller');
/**
 * Pages Controller
 *
 * @property Page $Page
 * @property PaginatorComponent $Paginator
*/
class PagesController extends AppController {
	//public $components = array();
	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator','RequestHandler');

	public $helpers = array('Js' => array('Jquery'), 'SearchForm');

	public function testcases(){
		//App::uses('HtmlHelper', 'View/Helper');
		//debug(App::path('View'));
		//debug(App::paths());
		//debug(App::core('Cache/Engine'));
		//debug(App::location('Page'));
		
		//App::build(array('Model' => array('/a/full/path/to/models/')));
		//debug(App::path('Model'));
		
		//will setup the path as the only valid path for searching models
		//App::build(array('Model' => array('/path/to/models/')), App::RESET);
		//debug(App::path('Model'));
		
		//will setup multiple search paths for helpers
		//App::build(array(
		//'View/Helper' => array('/path/to/helpers/', '/another/path/')
		//));
		
		//New Package Addition
		//App::build(array(
		//'Service' => array('%s' . 'Service' . DS)
		//), App::REGISTER);
		
		
		//debug(App::paths());
		
		
		
		
		//debug(App::objects('controller'));
		
		//debug(App::pluginPath('Testing'));
		
		App::import('Controller', 'Users', array('file'=>'a/a.php'));
		
		exit;
	}

	public function isAuthorized($user) {
		// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}

		// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Page->isOwnedBy($postId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {

		$this->set("search_data" , $this->_populateSearchArray());
 
		$this->Page->recursive = 0;
		$this->set('pages', $this->Paginator->paginate());
	}


	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->Page->recursive = 0;
		
		$this->set('pages', $this->Paginator->paginate());
		$this->set('_serialize', array('pages'));
		
		
	}
	public function view_pdf($id = null) {
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		// increase memory limit in PHP
		ini_set('memory_limit', '512M');
		$this->set('page', $this->Page->find('first', $id));
	}
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
		$this->set('page', $this->Page->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		}
		$users = $this->Page->User->find('list');
		$pageGroups = $this->Page->PageGroup->find('list');
		$this->set(compact('users', 'pageGroups'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->helpers[] = 'NewForm';
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
			$this->request->data = $this->Page->find('first', $options);
		}
		$users = $this->Page->User->find('list');
		$pageGroups = $this->Page->PageGroup->find('list');
		$this->set(compact('users', 'pageGroups'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Page->delete()) {
			$this->Session->setFlash(__('The page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * Displays a view
	 *
	 * @param mixed What page to display
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *	or MissingViewException in debug mode.
	 */
	public function admin_display() {

	}


	public function check(){

	}

}
