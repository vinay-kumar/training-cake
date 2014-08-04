<?php echo $this->Form->create('Page',array('action'=>'search'));?>
    <fieldset>
        <legend><?php echo __('Page Search');?></legend>
        <table class="table"  cellpadding="0" cellspacing="0"><tr>
		<td><?php echo $this->Form->input('Search.name', array('class'=>"form-control", 'value'=>$search_data['name']));?></td>
		<td>    <?php echo $this->Form->input('Search.status', array('class'=>"form-control", 'options'=>array('Active'=>'Active', 'Inactive'=>'Inactive'), 'empty'=>true, 'selected'=>$search_data['status']));?></td>
        <td><?php echo $this->Form->submit('Search');?></td>
        <td><?php echo $this->Form->submit('Clear', array('onclick'=>"document.getElementById('SearchOperationType').value='Clear';"));?>
        <?php echo $this->Form->input('Search.operation_type', array('type'=>'hidden', 'value'=>'Search'));?>
        </td>
    </table>
    </fieldset>
<?php echo $this->Form->end();?>



<div class="container">
	<h2><?php echo __('Pages'); ?></h2>
	<table class="table table-hover" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('page_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pages as $page): ?>
	<tr>
		<td><?php echo h($page['Page']['id']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['name']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['modified']); ?>&nbsp;</td>
		<td><?php echo h($page['Page']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($page['User']['username'], array('controller' => 'users', 'action' => 'view', $page['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($page['PageGroup']['name'], array('controller' => 'page_groups', 'action' => 'view', $page['PageGroup']['id'])); ?>
		</td>
		<td><?php echo h($page['Page']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $page['Page']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $page['Page']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Page'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Page Groups'), array('controller' => 'page_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page Group'), array('controller' => 'page_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>
