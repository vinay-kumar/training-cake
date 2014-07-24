<h1><?php echo h($pageGroup['PageGroup']['name']); ?></h1>

<div class="row">
<div class="col-md-12">
			<?php echo ($pageGroup['PageGroup']['description']); ?>
</div>
</div>

<p>created by: <?php echo $this->Html->link($pageGroup['User']['username'], array('controller' => 'users', 'action' => 'view', $pageGroup['User']['id'])); ?> on <?php echo h($pageGroup['PageGroup']['created']); ?> updated on <?php echo h($pageGroup['PageGroup']['modified']); ?></p>

<div class="panel panel-default">
  <div class="panel-heading">Group Pages</div>
  <div class="panel-body">
  <?php foreach ($pages as  $page):?>
<div class="panel panel-primary">
  <div class="panel-heading"><?php echo h($page['Page']['name']); ?></div>
  <div class="panel-body">
    <?php echo ($page['Page']['description']); ?>
    <p><?php echo $this->Html->link(__('read more>>'), array('controller' => 'pages', 'action' => 'view', $page['Page']['id'])); ?></p>
  </div>
</div>
<?php endforeach;?>

	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<ul class="pagination">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'disabled'));
	?>
	</ul>
</div>
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

