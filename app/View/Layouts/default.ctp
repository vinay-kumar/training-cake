<?php
/**
 *
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$company_name = __d('cake_dev', 'My CMS');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<?php echo $this->Html->charset(); ?>
<title><?php echo $company_name ?>: <?php echo $title_for_layout; ?>
</title>
<?php
echo $this->Html->meta('icon');

echo $this->Html->css('bootstrap.min');

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->Html->script('jquery.js');
echo $this->Html->script('bootstrap.min.js');
echo $this->fetch('script');
?>
</head>
<body>

	<?php echo $this->element('header_menu');?>

	<div class="container">


		<div class="row">
			<div class="col-md-2">


				<?php  echo $this->fetch('left_area');  ?>


			</div>
			<div class="col-md-8">
				
				<?php echo $this->fetch('banner_area'); ?>
			
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>

				<div class="footer">
					<?php echo $this->Html->link(
							$this->Html->image('cake.power.gif', array('alt' => $company_name, 'border' => '0')),
							'http://www.cakephp.org/',
							array('target' => '_blank', 'escape' => false)
					);
					?>
				</div>
				<?php echo $this->element('sql_dump'); ?>

			</div>
			<div class="col-md-2">
				<?php echo $this->element('right_sidebar'); ?>

			</div>
		</div>






		<?php echo $this->fetch('script_bottom');?>
		<?php echo $this->Js->writeBuffer();?>
</body>
</html>
