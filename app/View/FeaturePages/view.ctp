<div class="featurePages view">
<h2><?php echo __('Feature Page'); ?></h2>
	<dl  class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($featurePage['FeaturePage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($featurePage['FeaturePage']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($featurePage['FeaturePage']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($featurePage['FeaturePage']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($featurePage['FeaturePage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($featurePage['User']['username'], array('controller' => 'users', 'action' => 'view', $featurePage['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feature'); ?></dt>
		<dd>
			<?php echo $this->Html->link($featurePage['Feature']['name'], array('controller' => 'features', 'action' => 'view', $featurePage['Feature']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Page'); ?></dt>
		<dd>
			<?php echo $this->Html->link($featurePage['Page']['name'], array('controller' => 'pages', 'action' => 'view', $featurePage['Page']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sequence'); ?></dt>
		<dd>
			<?php echo h($featurePage['FeaturePage']['sequence']); ?>
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
		<li><?php echo $this->Html->link(__('Edit Feature Page'), array('action' => 'edit', $featurePage['FeaturePage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Feature Page'), array('action' => 'delete', $featurePage['FeaturePage']['id']), null, __('Are you sure you want to delete # %s?', $featurePage['FeaturePage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Feature Pages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature Page'), array('action' => 'add')); ?> </li>
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

