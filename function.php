<?php
	date_default_timezone_set('Asia/Manila');
	$_BackAddress = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	include 'init_account.php';
	function GetCurrentPageName(){
		return explode(".", basename($_SERVER['PHP_SELF']))[0];
	}
	function SetCookies($value,$type){
		setcookie("u_acc_auth", $value, time()+86400); 
		setcookie("u_acc_type", $type, time()+86400); 
	}

	function EndCookies(){
		setcookie("u_acc_auth", "", time() - 86400);
		setcookie("u_acc_type", "", time() - 86400);
	}
	function Logout(){
		header("location:login.php");
	}
	function GenerateString($length) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function HeaderSideMenu(){
		include 'header_side_menu.php';
	}

	function Footer(){
		include 'footer.php';
	}
	function Decimal($number){
		return number_format((float)$number, 2, '.', '');
	}
	function Auth_account($email, $password){

		include 'db_init.php';

		$email_input = filter_var($email, FILTER_SANITIZE_EMAIL);
		$password_input = filter_var($password, FILTER_SANITIZE_STRING);

		$r = mysql_query("SELECT * FROM accounts where _email='".$email_input."' and _password = '".$password_input."'",$con);
		$Account_info = mysql_fetch_object($r);

		if(count($Account_info)>0){
			if($Account_info->_account_access=="0"){
				SetCookies($Account_info->_account_id);
				//SetCookies($Account_type->_account_access);
				header("Location:account.php");
			}else if($Account_info->_account_access=="1"){
				SetCookies($Account_info->_account_id);
				//SetCookies($Account_type->_account_access);
				header("Location:student/account.php");
			}
			
		}else{
			echo "Error Login";
		}
	}
	function LOADING(){
		return '<div class="cs-loader">
				  <div class="cs-loader-inner">
				    <label>	●</label>
				    <label>	●</label>
				    <label>	●</label>
				    <label>	●</label>
				    <label>	●</label>
				    <label>	●</label>
				  </div>
				  <div class="cs-loader-text">
				  Loading...
				  </div>
				</div>';
	}
	function GetStudentList(){
		include 'db_init.php';
		return mysql_query("SELECT * FROM accounts where _account_access = 1",$con);
	}


	function GetSubjectList(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		return mysql_query("SELECT * FROM subjects where _owners_id = '".$userID."'",$con);
	}

	function GetWorkSheetGroupList(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		return mysql_query("SELECT * FROM worksheet where _account_id = '".$userID."'",$con);
	}
	function GetSheetList($parentID){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		return mysql_query("SELECT * FROM worksheet_meta where _account_id = '".$userID."' and _parent_id='".$parentID."'",$con);
	}
	function GetAssessmentList(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		return mysql_query("SELECT * FROM assessment where _account_id = '".$userID."'",$con);
	}

	function GetLearningMaterialsList(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		return mysql_query("SELECT * FROM learning_materials where _account_id = '".$userID."' ORDER BY _date_upload DESC",$con);
	}

	function GetAssessment($id){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		return mysql_query("SELECT * FROM assessment where _id = '".$id."' and _account_id = '".$userID."'",$con);
	}
	function GetAssessmentMeta($id){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		
		return mysql_query("SELECT * FROM assessment_meta where assessment_id = '".$id."'",$con);
	}

	function GetStudentCountInSubjectList($id){
		include 'db_init.php';
		return mysql_query("SELECT * FROM students where _subject_id = '".$id."'",$con);
	}

	function ttruncat($text,$numb) {
	if (strlen($text) > $numb) { 
	  $text = substr($text, 0, $numb); 
	  // $text = substr($text,0,strrpos($text," ")); 
	  $etc = " ...";  
	  $text = $text.$etc; 
	  }
	return $text; 
	}

	 function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}

	function AddSubject($backaddress,$_code,$_name,$_schedule,$_description,$_registration_code,$_status,$_max_student){
		include 'db_init.php';

		/* Status Index */ 
		// 1 - public 
		// 2 - private
		// 3 - closed 
		// 4 - inactive
		// 5 - removed 

		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

        if($r=mysql_query("INSERT INTO  subject_infos (_owners_id,_code,_name,_schedule,_description,_registration_code,_status,_max_student,_date_added)
            values (
            '$_owners_id',
            '$_code',
            '$_name',
            '$_schedule',
            '$_description',
            '$_registration_code',
            '$_status',
            '$_max_student',
            NOW()
        )",$con))
        {
            return 200;
        }else{
        	return 500;
        }
	}

	function _calendar($data){
		include 'db_init.php';

		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		$content = "";
		$content2 = "";

		foreach ($data as $value) {
			$content2 .= $value->id;
			$ifexist = mysql_query("SELECT * FROM calendar where _cal_id = '".$value->id."' and _account_id='".$_owners_id."' ",$con);
			if(mysql_num_rows($ifexist) == 0) {
			    
			    if($r=mysql_query("INSERT INTO  calendar (_cal_id,_account_id,_text,_description,_share_with,_start_date,_end_date,_date_submitted)
		            values (
		            '$value->id',
		            '$_owners_id',
		            '$value->text',
		            '$value->details',
		            '$value->courseOrStudent',
		            '".date("Y-m-d H:i:s",strtotime($value->start_date))."',
		            '".date("Y-m-d H:i:s",strtotime($value->end_date))."',
		            NOW()
		        )",$con))
		        {
		            $content .= "Success";
		        }else{
		        	$content .= "Error";
	        	}
			} else {
			 	if(mysql_query("Update calendar SET 
			 		_text = '".$value->text."',
			 		_description = '".$value->details."', 
			 		_share_with = '".$value->courseOrStudent."', 
			 		_start_date = '".date("Y-m-d H:i:s",strtotime($value->start_date))."',
			 		_end_date = '".date("Y-m-d H:i:s",strtotime($value->end_date))."',
			 		_date_submitted = NOW()
			 		WHERE _cal_id = '".$value->id."' and _account_id='".$_owners_id."'
		       		",$con)){
			 		$content .= "Success_Update";
				}else{
					$content .= "Error_Update";
				}
			}

		}
		
		file_put_contents("data.text",$content);
		file_put_contents("data2.text",$content2);
	}

	function _calendar_get_data(){
		include 'db_init.php';

		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$calendar_data = mysql_query("SELECT * FROM calendar where _account_id='".$_owners_id."' ",$con);

		 $data = array();
		 $i = 0;
		 while($row=mysql_fetch_assoc($calendar_data)){ 
		 	$data[$i]['id'] = $row['_cal_id'];
		 	$data[$i]['start_date'] = date("Y-m-d H:i",strtotime($row['_start_date']));
		 	$data[$i]['end_date'] = date("Y-m-d H:i",strtotime($row['_end_date']));
		 	$data[$i]['text'] = $row['_text'];
		 	$data[$i]['details'] = $row['_description'];
		 	$data[$i]['courseOrStudent'] = $row['_share_with'];
			$i++;
		 }

		



		 return $data;
	}

	function NotificationBar($status,$message){
		if($status == 'success'){
      		$message = '<div class="alert alert-success">
            		<button class="close" data-dismiss="alert">×</button>
            		<strong>Success!</strong> '.$message.'.</div>';
		}
		else if($status == 'warning'){
      		$message = '<div class="alert">
              		<button class="close" data-dismiss="alert">×</button>
              		<strong>Warning!</strong> '.$message.'.</div>';
		}
		else if($status == 'error'){
      		$message = '<div class="alert alert-error">
              		<button class="close" data-dismiss="alert">×</button>
              		<strong>Error!</strong> '.$message.'.</div>';
		}

		return $message;
	}

	function getExamineesByAssessment($assessment_id){
		include 'db_init.php';
		
		$assessment_list = mysql_query("SELECT * FROM assessment_examinees where _assessment_id = '".$assessment_id."'",$con);
		
		$assessmentNumber = 0;
		$ExamineesList = array();
		while($row_assessment_list=mysql_fetch_assoc($assessment_list)){ 

			$student_result = mysql_query("SELECT * FROM accounts where _account_id='".$row_assessment_list['_student_id']."'",$con);
			$studen_info = mysql_fetch_object($student_result);

			$subject_result = mysql_query("SELECT * FROM subjects where _id='".$row_assessment_list['_subject_enrolled']."'",$con);
			$subject_info = mysql_fetch_object($subject_result);

			$ExamineesList[$assessmentNumber]['assessmentExamineeID'] 	= $row_assessment_list['_id'];
			$ExamineesList[$assessmentNumber]['name'] 					= $studen_info->_fn.' '.$studen_info->_sn;
			$ExamineesList[$assessmentNumber]['subject'] 				= $subject_info->_code.' ('.$subject_info->_name.')';
			$ExamineesList[$assessmentNumber]['status'] 				= $row_assessment_list['_status'];
			$ExamineesList[$assessmentNumber]['score'] 					= $row_assessment_list['_score'];
			$ExamineesList[$assessmentNumber]['date'] 					= $row_assessment_list['_date_submitted'];
			$ExamineesList[$assessmentNumber]['duration'] 				= $row_assessment_list['_duration'];
			$assessmentNumber++;
		}

		return $ExamineesList;
	}

	function GetGradeBookList(){
	include 'db_init.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
	
	return mysql_query("SELECT * FROM gradebook INNER JOIN subjects ON gradebook.course_id = subjects._id where gradebook.gradebook_owner = '".$userID."'",$con);
	
	}

?>