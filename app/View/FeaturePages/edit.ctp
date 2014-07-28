<div class="featurePages form">
<?php echo $this->Form->create('FeaturePage', array('role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Edit Feature Page'); ?></legend>
	<?php
		echo $this->Form->input('id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('user_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('feature_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('page_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('sequence', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FeaturePage.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FeaturePage.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Feature Pages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Features'), array('controller' => 'features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>
