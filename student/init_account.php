<?php

	// Initialize program to call the user values
	if(isset($_COOKIE['u_acc_auth'])){
		include 'db_init.php';
	
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		
		$r=mysql_query("SELECT * FROM accounts where _account_id='".$userID."'",$con);
		$account_info = mysql_fetch_object($r);

		

	}else{
		if(basename($_SERVER['REQUEST_URI'])!='login.php'){
			header("location:../login.php");
		}
	}
	// End Here

?>