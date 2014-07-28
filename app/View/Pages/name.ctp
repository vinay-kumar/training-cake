<h1><?php echo h($page['Page']['name']); ?></h1>
<p>category: <?php echo $this->Html->link($page['PageGroup']['name'], array('controller' => 'page_groups', 'action' => 'view', $page['PageGroup']['id'])); ?></p>

<div class="row">
<div class="col-md-12">
			<?php echo ($page['Page']['page_content']); ?>
</div>
</div>

<p>created by: <?php echo $this->Html->link($page['User']['username'], array('controller' => 'users', 'action' => 'view', $page['User']['id'])); ?> on <?php echo h($page['Page']['created']); ?> updated on <?php echo h($page['Page']['modified']); ?></p>


<?php
	$this->start('left_area');
	?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Page'), array('action' => 'edit', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Page'), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Page Groups'), array('controller' => 'page_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page Group'), array('controller' => 'page_groups', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>

