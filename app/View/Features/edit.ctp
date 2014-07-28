<div class="features form">
<?php echo $this->Form->create('Feature', array('role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Edit Feature'); ?></legend>
	<?php
		echo $this->Form->input('id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('user_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('status', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('page_content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Feature.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Feature.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Features'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feature Pages'), array('controller' => 'feature_pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature Page'), array('controller' => 'feature_pages', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>
