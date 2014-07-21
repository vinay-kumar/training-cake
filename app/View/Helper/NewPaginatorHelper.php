<?php 
App::uses('PaginatorHelper', 'View/Helper');

/**
 * Pagination Helper class for easy generation of pagination links.
 *
 * PaginationHelper encloses all methods needed when working with pagination.
 *
 * @package       Cake.View.Helper
 * @property      HtmlHelper $Html
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/paginator.html
 */
class NewPaginatorHelper extends PaginatorHelper {

	public function numbers($options = null){
		
		$options['tag'] = 'li';
		$options['currentClass'] = 'active';
		$options['currentTag'] = 'span';
		return parent::numbers($options);
		
	}

	public function prev($title = '<< Previous', $options = array(), $disabledTitle = null, $disabledOptions = array()){
	
		$options['tag'] = 'li';
		$disabledOptions['tag'] = 'li';
		$disabledOptions['disabledTag'] = 'span';
		return parent::prev($title, $options, $disabledTitle, $disabledOptions);
	
	}
	
	public function next($title = 'Next >>', $options = array(), $disabledTitle = null, $disabledOptions = array()){
	
		$options['tag'] = 'li';
		$disabledOptions['tag'] = 'li';
		$disabledOptions['disabledTag'] = 'span';
		return parent::next($title, $options, $disabledTitle, $disabledOptions);
	
	}
}