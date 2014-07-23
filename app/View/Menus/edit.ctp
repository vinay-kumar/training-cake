<div class="menus form">
<?php echo $this->Form->create('Menu', array('role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Edit Menu'); ?></legend>
	<?php
		echo $this->Form->input('id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('slug', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('default', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('sequence', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('user_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('parent_type', array('options'=>array(''=>'Select Parent', 'page_groups' => 'Page Group', 'pages' => 'Page', 'features' => 'Featured'), 'div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('parent_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('status', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(array('label' =>__('Submit'), 'class' => 'btn btn-primary')); ?>
</div>
<?php
	$this->start('left_area');
	?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Menu.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Menu.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>
