<?php 
require_once(APP . 'Vendor' . DS . 'dompdf061' . DS . 'dompdf_config.inc.php');
spl_autoload_register('DOMPDF_autoload');
$dompdf = new DOMPDF();
$dompdf->set_paper = 'A4';
$dompdf->load_html($this->fetch('content'), Configure::read('App.encoding'));
$dompdf->render();
echo $dompdf->output();
