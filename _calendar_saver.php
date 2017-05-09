<?php

include 'init_include.php';

if($_GET['action'] == 'save'){
	$obj = json_decode($_POST["data"]);
	_calendar($obj);
}else{

	echo json_encode(_calendar_get_data());

}

?>