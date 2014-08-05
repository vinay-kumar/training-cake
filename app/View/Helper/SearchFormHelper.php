<?php

App::uses('FormHelper', 'View/Helper');

class SearchFormHelper extends FormHelper {
	
	public $helpers = array('Html');
	
	public function create_form($name, $search_data, $options = array()) {
		
		$string_form = "";
		$action = 'search';
		if (isset($options['action']) && !empty($options['action'])){
			$action = $options['action'];
		}
		
		$string_form .= $this->create($name, array('action'=>$action));
		foreach ($this->_models[$this->defaultModel]->searchFields as $field => $field_options){
			
			if(isset($field_options['type'])){
				$string_form .= $this->input('Search.'.$field, array('type'=>"{$field_options['type']}", 'class'=>"form-control", 'value'=>$search_data[$field]));
			}else{
				$string_form .= $this->input('Search.'.$field, array('class'=>"form-control", 'value'=>$search_data[$field]));
			}
			
			
		}
		$string_form .= $this->submit('Search');
		$string_form .= $this->submit('Clear', array('onclick'=>"document.getElementById('SearchOperationType').value='Clear';"));
		$string_form .= $this->end();
		
		return $string_form;
		
	}
}
