<?php
	$_BackAddress = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	date_default_timezone_set('Asia/Manila');
	include 'init_account.php';

	function SetCookies($value){
		setcookie("u_acc_auth", $value, time()+86400); 
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
	function EndCookies(){
		setcookie("u_acc_auth", "", time() - 86400);
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

	function DateFormat($data){
		return date("F j, Y, g:i a",strtotime($data));
	}
	function time_elapsed_string($datetime, $full = false) {
		
			$now = new DateTime;
		
		
		$ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	function DateString($data,$dateEnd = null,$inverse=false){

		 $fp = fopen('error.log', 'a');
	    fwrite($fp, $data.'-'.$dateEnd);
	    fclose($fp);
		date_default_timezone_set('Asia/Manila');
		//Convert to date
		$date=strtotime($data);//Converted to a PHP date (a second count)

		//Calculate difference
		$diff=$date-time();//time returns current time in seconds
		$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
		$hours=round(($diff-$days*60*60*24)/(60*60));
		if(!$inverse){
			if($days >= 0 ){
				if($days<1){
					return "<span class='badge badge-important'> $days days $hours hours remain</span>";
				}else if($days<=3){
					return "<span class='badge badge-warning'> $days days $hours hours remain</span>";
				}else if($days<=7){
					return "<span class='badge badge-success'> $days days $hours hours remain</span>";
				}else{
					return "<span class='badge badge-info'> $days days $hours hours remain</span>";
				}
			}else{
				return "<span class='badge'> ".time_elapsed_string($dateEnd)." </span>";
			}
		}else{
			$seconds = strtotime($data) - time();

			$days = floor($seconds / 86400);
			$seconds %= 86400;

			$hours = floor($seconds / 3600);
			$seconds %= 3600;

			$minutes = floor($seconds / 60);
			$seconds %= 60;

			$phrase = "";
			// if($days>0 && $hours >0){
			// 	return "$days days and $hours hours left";
			// }else if ($hours >0 && $minutes > 0){
			// 	return "$hours hours and $minutes minutes left";
			// }else if ($minutes > 0 && $seconds > 0){
			// 	return "$minutes minutes and $seconds seconds left";
			// }else{
			// 	return "$seconds seconds left";
			// }

			return "$days days, $hours hours, $minutes minutes and $seconds seconds left";
			 
		}
		
		

	}
	function ShowPre($data){
		return "<pre>".print_r($data)."</pre>";
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

	function GetStudentList(){
		include 'db_init.php';
		return mysql_query("SELECT * FROM accounts where _account_access = 1",$con);
	}
	function GetSubjectList(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		return mysql_query("SELECT * FROM subjects",$con);
	}
	function GetJoinedSubjectList(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$dataContent = array();

		$getJoinedCourse = mysql_query("SELECT * FROM students where _student_id='".$userID."' ",$con);

		 $NumberofCourse = 0;
		 while($row=mysql_fetch_assoc($getJoinedCourse)){ 

		 	$CoursesResult = mysql_query("SELECT * FROM subjects where _id = '".$row['_subject_id']."'",$con);
		 	$Course_info = mysql_fetch_object($CoursesResult);

		 	$dataContent[$NumberofCourse]['_id'] = $row['_id'];
		 	$dataContent[$NumberofCourse]['_student_id'] = $row['_student_id'];
		 	$dataContent[$NumberofCourse]['_subject_id'] = $row['_subject_id'];

		 	/* Status Index */ 
			// 0 - pending 
			// 1 - joined
			// 2 - warned
			// 3 - droped 

		 	if($row['_status']==0){
		 		$Status = '<span class="label"> Pending </span>';
		 	}else if($row['_status']==1){
		 		$Status = '<span class="label label-success"> Joined </span>';
		 	}else if($row['_status']==2){
		 		$Status = '<span class="label label-warning"> Warned </span>';
		 	}else if($row['_status']==3){
		 		$Status = '<span class="label label-important"> Droped </span>';
		 	}

		 	$dataContent[$NumberofCourse]['_status'] = $Status;

		 	$dataContent[$NumberofCourse]['_date_registered'] = DateFormat($row['_date_registered']);
		 	$dataContent[$NumberofCourse]['course_owners_id'] = $Course_info->_owners_id;
		 	$dataContent[$NumberofCourse]['course_code'] = $Course_info->_code;
		 	$dataContent[$NumberofCourse]['course_name'] = $Course_info->_name;
		 	$dataContent[$NumberofCourse]['course_status'] = $Course_info->_status;
		 	$dataContent[$NumberofCourse]['course_date_added'] = $Course_info->_date_added;
		 	$NumberofCourse++;
		 }

		 return $dataContent;
	}
	function JoinCourse($data){

		include 'db_init.php';

		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$courseCheck = mysql_query("SELECT * FROM subjects where _id='".$data['course']."' and _registration_code='".$data['code']."' ",$con);
		if(mysql_num_rows($courseCheck) != 0) {

			$courseResult = mysql_query("SELECT * FROM subjects where _id='".$data['course']."' and _registration_code='".$data['code']."' ",$con);
			$Course_info = mysql_fetch_object($courseResult);
			if($r=mysql_query("INSERT INTO  students (_student_id,_subject_id,_status,_date_registered)
            values (
            '$_owners_id',
            '$Course_info->_id',
            '1',
            NOW()
	        )",$con))
	        {	
	            return NotificationBar('success','You now joined to '.$Course_info->_code);
	        }
		} else{
	        	return NotificationBar('error','Invalid Registration Code. Please contact the instructor of this course.');
	    }
	}
	function GetCourseCompleteInfo($id){
		include 'db_init.php';

		$id = filter_var($id, FILTER_SANITIZE_STRING);

		// Check if student is registered to this course
		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		$checkCourseRegistered = mysql_query("SELECT * FROM students where _student_id='".$_owners_id."' and _subject_id='".$id."'",$con);
		// If student is not registered, die
		if(mysql_num_rows($checkCourseRegistered) == 0){
			return "You're not registered to this course.";
			die();
		}

		// Data container
		$dataContent = array();

		// Get Course Parameters

		$courseResult = mysql_query("SELECT * FROM subjects where _id='".$id."'",$con);
		$course_content = mysql_fetch_assoc($courseResult);
		$dataContent ['course'] = $course_content;

		 // Get Instructor Parameters
		$instructorResult = mysql_query("SELECT * FROM accounts where _account_id='".$course_content['_owners_id']."'",$con);
		$instructor_content = mysql_fetch_assoc($instructorResult);
		$dataContent ['instructor'] = $instructor_content;

		return $dataContent;

	}

	function getUpComingSchedule($id){

		include 'db_init.php';

		$id = filter_var($id, FILTER_SANITIZE_STRING);

		// Check if student is registered to this course
		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		// Data container
		$dataContent = array();

		$assessmentResult = mysql_query("SELECT * FROM assessment_examinees where _student_id='".$_owners_id."' and _subject_enrolled='".$id."' and _date_time_start>NOW()  ORDER BY _date_time_start ASC",$con);
		$rep = 0;
		while($row=mysql_fetch_assoc($assessmentResult)){ 

			$assessmentInfoResult = mysql_query("SELECT * FROM assessment where _id='".$row['_assessment_id']."'",$con);
			$assessmentInfo_content = mysql_fetch_assoc($assessmentInfoResult);

			$dataContent [$rep]['type'] = "Assessment";
			$dataContent [$rep]['desc'] = "<h5>".$assessmentInfo_content['_assessment_name']."</h5>".$assessmentInfo_content['message'];
			$dataContent [$rep]['date'] = DateString($row['_date_time_start']);
			$rep++;
		}

		return $dataContent;
	}

	function GetAssessmentListByStudent($id){
		include 'db_init.php';

		$id = filter_var($id, FILTER_SANITIZE_STRING);

		// Check if student is registered to this course
		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		// Data container
		$dataContent = array();

		$assessmentResult = mysql_query("SELECT * FROM assessment_examinees where _student_id='".$_owners_id."' and _subject_enrolled='".$id."' ORDER BY _date_time_start DESC",$con);
		$rep = 0;
		while($row=mysql_fetch_assoc($assessmentResult)){ 

			$assessmentInfoResult = mysql_query("SELECT * FROM assessment where _id='".$row['_assessment_id']."'",$con);
			$assessmentInfo_content = mysql_fetch_assoc($assessmentInfoResult);

			$dataContent [$rep]['examinees_id'] = $row['_id'];
			$dataContent [$rep]['assessment_id'] = $row['_assessment_id'];
			$dataContent [$rep]['title'] = $assessmentInfo_content['_assessment_name'];
			$dataContent [$rep]['desc'] = $assessmentInfo_content['message'];
			$dataContent [$rep]['duration'] = $row['_duration']."mins";
			$dataContent [$rep]['status'] = $row['_status'];
			$dataContent [$rep]['score'] = $row['_score'];
			
			$currentDate 	= date("F j, Y, g:i a");
			$startDate 		= date("F j, Y, g:i a",strtotime($row['_date_time_start']));
			$endDate 		= date("F j, Y, g:i a",strtotime($row['_date_time_end']));
			if ((strtotime($currentDate) > strtotime($startDate)) && (strtotime($currentDate) < strtotime($endDate)))
		    {

		      if($row['_status']=='pending'){
		      	$dataContent [$rep]['button'] = "<a href='takeassessment.php?id=".$row['_id']."' class='btn btn-mini btn-success'>Take Assessment</a>";
		      	$dataContent [$rep]['date'] = "<span class='badge badge-success'>On going</span><br><span class='badge badge-inverse'>".DateString($endDate,null,true)."</span>";
		      }else{
		      	$dataContent [$rep]['button'] = "<a class='btn btn-mini' disabled>Take Assessment</a>";  
		      	$dataContent [$rep]['date'] = DateString($row['_date_time_start'],$row['_date_time_end']);
		      }
		      
		    }
		    else
		    {
		      $dataContent [$rep]['button'] = "<a class='btn btn-mini' disabled>Take Assessment</a>";  
		      $dataContent [$rep]['date'] = DateString($row['_date_time_start'],$row['_date_time_end']);
		    }

			$rep++;
		}

		return $dataContent;
	}

	function Loading(){
		return '<div class="loading_css">
			        <svg  viewBox="0 0 600 600" >
			          <defs>
			            <mask id="liquidMask">
			              <path id="tubeLiquidShape" fill="#FFFFFF" d="M246.6,358.9l110.2-0.6c0.6,0,1.1-0.2,1.5-0.6c0.1-0.1,0.2-0.3,0.3-0.4
			          c0.4-0.6,0.5-1.4,0.2-2c0,0-12.3-28.7-17.9-41.9c-28.6,6.6-55.4-3.9-78.1,0.1c-9,21-18.2,42.5-18.2,42.5c-0.2,0.7-0.2,1.4,0.2,2
			          C245.2,358.6,245.9,358.9,246.6,358.9z" />
			              <g id="bubbleGroup">
			                <circle cx="267.3" cy="371" r="10.3" fill="#000000" />
			                <circle cx="324.3" cy="390" r="10.3" fill="#111111" />
			                <circle cx="288.6" cy="386.3" r="6.6" fill="#7f7f7f" />
			                <circle cx="288.6" cy="368.5" r="7.6" fill="#2d2d2d" />
			                <circle cx="340.3" cy="370" r="3" fill="#333333" />
			                <circle cx="300" cy="378.3" r="3" />
			                <circle cx="279.4" cy="379.7" r="2" />
			                <circle cx="337.3" cy="363" r="2" />
			                <circle cx="309.7" cy="383.2" r="2" />
			                <circle cx="309.7" cy="371" r="4.3" />
			                <circle cx="327" cy="368.5" r="6.1" />
			              </g>
			            </mask>
			          </defs>
			          <g id="tubeGroup">
			            <path id="tubeOutline" fill="#333333" d="M268.4,224.7c-4.1,0-8,1.6-10.9,4.5c-2.9,2.9-4.5,6.8-4.5,10.9l0,12.3
			          c0,4.1,1.6,8,4.5,10.9c2,2,4.6,3.5,7.3,4.1l-35.4,82.8c-2.2,5.7-1.5,12.1,1.9,17.1c3.4,5.1,9.2,8.1,15.3,8.1l110.1-0.6
			          c4.8,0,9.3-1.8,12.7-5.1c0.1-0.1,0.3-0.3,0.3-0.3c0.9-0.9,1.7-1.9,2.4-2.9c3.4-5.2,4-11.8,1.5-17.4l-35-81.5c2.9-0.6,5.6-2,7.7-4.2
			          c2.9-2.9,4.5-6.8,4.5-10.9l0-12.3c0-4.1-1.6-8-4.5-10.9s-6.8-4.5-10.9-4.5L268.4,224.7z M283.3,255.5l-14.9,0
			          c-1.7,0-3.1-1.4-3.1-3.1l0-12.3c0-1.7,1.4-3.1,3.1-3.1l67.3,0c1.7,0,3.1,1.4,3.1,3.1v12.3c0,1.7-1.4,3.1-3.1,3.1l-15.4,0l42.2,98.3
			          c0.8,1.9,0.6,4.1-0.5,5.8c-0.3,0.4-0.6,0.8-0.9,1.1c-1.1,1.1-2.6,1.7-4.2,1.7L246.6,363c-2,0-3.9-1-5.1-2.7
			          c-1.1-1.7-1.4-3.8-0.6-5.7L283.3,255.5z" />
			            <g id="maskedLiquid" mask="url(#liquidMask)">
			              <path id="tubeLiquid" fill="#1872EA" d="M246.6,358.9l110.2-0.6c0.6,0,1.1-0.2,1.5-0.6c0.1-0.1,0.2-0.3,0.3-0.4
			          c0.4-0.6,0.5-1.4,0.2-2c0,0-12.3-28.7-17.9-41.9c-28.6,6.6-55.4-3.9-78.1,0.1c-9,21-18.2,42.5-18.2,42.5c-0.2,0.7-0.2,1.4,0.2,2
			          C245.2,358.6,245.9,358.9,246.6,358.9z" />
			            </g>
			          </g>

			        </svg>
			        <h3>LOADING...</h3>
			        </div>';
	}

	function GetSubjectMaterialList($subject){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		return mysql_query("SELECT * FROM learning_materials_access INNER JOIN learning_materials ON learning_materials._id = learning_materials_access._material_id where learning_materials_access.subject_id = '".$subject."'",$con);
	}
?>


