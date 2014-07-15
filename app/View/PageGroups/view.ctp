<div class="pageGroups view">
<h2><?php echo __('Page Group'); ?></h2>
	<dl  class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pageGroup['PageGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($pageGroup['PageGroup']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($pageGroup['PageGroup']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pageGroup['PageGroup']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pageGroup['PageGroup']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pageGroup['User']['username'], array('controller' => 'users', 'action' => 'view', $pageGroup['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($pageGroup['PageGroup']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php
	$this->start('left_area');
	?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Page Group'), array('action' => 'edit', $pageGroup['PageGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Page Group'), array('action' => 'delete', $pageGroup['PageGroup']['id']), null, __('Are you sure you want to delete # %s?', $pageGroup['PageGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Page Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>

