<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */



$this->start('banner_area');?>
<div class="jumbotron">
	<div class="page-header">
		<h1>
			My CMS Admin Panel <small> backend area :)</small>
		</h1>
	</div>
	<a class="btn btn-primary btn-lg" role="button">Learn more</a>
	</p>
</div>
<?php $this->end();?>


<?php
$this->start('left_area');
echo $this->element('left_sidebar');
$this->end();
?>