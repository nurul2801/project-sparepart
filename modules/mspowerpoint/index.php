
<?php
require_once("../../includes/initialize.php");
include('../../db.php');

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
	case 'add' :
        $title="add";	
		$content='uploaderpage.php';		
		break;
	case 'barcode' :
        $title="barcode";	
		$content='barcode/index.php';		 
		break;
	case 'absences' :
        $title="absences";	
		$content='absences.php';		 
		break;
	case 'edit' :
        $title="edit";	
		$content='edit.php';		
		break;
	case '1' :
        $title="list";	
		$content='list.php';			
		break;
	default :
	    $title="list";	
		$content ='list.php';		
}
require_once '../../theme/frontendTemplate.php';
?>
