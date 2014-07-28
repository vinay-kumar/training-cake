<div class="container">
	<h2><?php echo __('Features'); ?></h2>
	<table class="table table-hover" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('page_content'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($features as $feature): ?>
	<tr>
		<td><?php echo h($feature['Feature']['id']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['name']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['description']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['modified']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($feature['User']['username'], array('controller' => 'users', 'action' => 'view', $feature['User']['id'])); ?>
		</td>
		<td><?php echo h($feature['Feature']['status']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['page_content']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $feature['Feature']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feature['Feature']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feature['Feature']['id']), null, __('Are you sure you want to delete # %s?', $feature['Feature']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>


<?php
	$this->start('left_area');
	?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Feature'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feature Pages'), array('controller' => 'feature_pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature Page'), array('controller' => 'feature_pages', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>
