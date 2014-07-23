<div class="menus form">
<?php echo $this->Form->create('Menu', array('role'=>'form')); ?>
	<fieldset>
		<legend><?php echo __('Add Menu'); ?></legend>
	<?php
		echo $this->Form->input('name', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('slug', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('default', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('sequence', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('description', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('user_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('parent_type', array('onchange' => 'populate_parent(this.value)', 'options'=>array(''=>'Select Parent', 'page_groups' => 'Page Group', 'pages' => 'Page', 'features' => 'Featured'), 'div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('parent_id', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
		echo $this->Form->input('status', array('div' => array('class' => 'form-group'), 'class' => 'form-control'));
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

		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	$this->end();
	?>
	
	<?php $this->start('script_bottom');?>
<script type="text/javascript">
<!--
function populate_parent(val, id){
	$.ajax({
		'url': '<?php echo $this->webroot;?>/menus/populate/'+val,
		'success': function(res){
			if(objs = $.parseJSON(res)){
				var options = '';
				for(obj in objs){
					options += '<option value="'+obj+'">'+ objs[obj] +'</option>';
				}
				$('#MenuParentId').html(options);
				console.log(options);
			}
		}
	});
}
//-->
</script>
	
	
<?php $this->end();?>