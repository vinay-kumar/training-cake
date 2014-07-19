<div class="pages form">
<?php echo $this->Form->create('Page', array('role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Add Page'); ?></legend>
	<?php
		echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('user_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('page_group_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('status', array('div' => array('class' => 'form-group'), 'class' => 'form-control', 'options'=>array('Active'=>'Active', 'Inactive' => 'Inactive')));
		echo $this->Form->input('page_content', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
	?>
	</fieldset>
<?php echo $this->Form->end(array('label' =>__('Submit'), 'class' => 'btn btn-primary')); ?>
</div>

<?php echo $this->Html->script('tinymce/tinymce.min.js');?>
<script type="text/javascript">
tinymce.init({
    selector: "#PagePageContent",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>

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
