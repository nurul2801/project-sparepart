
<?php
require_once("includes/initialize.php");
include('db.php');


$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case 'changepf' :
        $title="Change Profile";	
		$content='changepf.php';		
		break;
	case '1' :
        $title="Home";	
		$content='home.php';			
		break;
	default :
	    $title="Home";	
		$content ='home.php';		
}
require_once 'theme/frontendTemplate.php';
?>
