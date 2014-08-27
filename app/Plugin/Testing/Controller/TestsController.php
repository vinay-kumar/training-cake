<?php 

App::uses('TestingAppController', 'Testing.Controller');


class TestsController extends TestingAppController {
	
	public $uses = array('Testing.Test');
	
	public $components = array('Paginator');
	
	public function index() {
		$this->Test->recursive = 0;
		$this->set('tests', $this->Paginator->paginate());
	}
}
