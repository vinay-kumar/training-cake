<?php

App::uses('FormHelper', 'View/Helper');

class NewFormHelper extends FormHelper {
	
	public $helpers = array('Html');
	
	public function tinymce($field, $options = array()) {
		$options['type'] = 'textarea';
		// Logic to create specially formatted link goes here...
		$textarea =  parent::input($field, $options);
		$textarea .= $this->Html->script('tinymce/tinymce.min.js');
		$textarea .= '<script type="text/javascript">
tinymce.init({
    selector: "#'.$this->defaultModel.Inflector::camelize($field).'",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>';
		
		return $textarea;
		
	}
}

/*<?php echo $this->Html->script('tinymce/tinymce.min.js');?>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
  */