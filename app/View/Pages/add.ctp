<div class="pages form">
<?php echo $this->NewForm->create('Page', array('role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Add Page'); ?></legend>
	<?php
		echo $this->NewForm->input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->NewForm->tinymce('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->NewForm->input('user_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->NewForm->input('page_group_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->NewForm->input('status', array('div' => array('class' => 'form-group'), 'class' => 'form-control', 'options'=>array('Active'=>'Active', 'Inactive' => 'Inactive')));
		echo $this->NewForm->tinymce('page_content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->NewForm->end(array('label' =>__('Submit'), 'class' => 'btn btn-primary')); ?>
</div>


<?php
	$this->start('left_area');
	?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Page Groups'), array('controller' => 'page_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page Group'), array('controller' => 'page_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>
