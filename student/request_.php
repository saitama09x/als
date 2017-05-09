<?php
date_default_timezone_set('Asia/Manila');

 

if(isset($_POST['request_code']) && isset($_COOKIE['u_acc_auth'])){
	
	if($_POST['request_code']==7882){
		echo json_encode(GetAssessment($_POST['id']));
		
	}else if($_POST['request_code']==7883){
		$req_dump = print_r(json_decode($_POST['answer'],true), TRUE);
	    $fp = fopen('request.log', 'a');
	    fwrite($fp, $req_dump);
	    fclose($fp);

	    $req_dump = print_r(json_decode($_POST['ASSESSMENT_EXAMINEES'],true), TRUE);
	    $fp = fopen('request.log', 'a');
	    fwrite($fp, $req_dump);
	    fclose($fp);
	    CheckAnswer(json_decode($_POST['answer'],true),json_decode($_POST['ASSESSMENT_EXAMINEES'],true));
	}
	if($_POST['request_code']==1512){
		SendComposeMessage($_POST);
	}
	if($_POST['request_code']==5123){
		GetRecipient();
	}
	if($_POST['request_code']==2152){
		echo getMessageList($_POST['search']);
	}
	if($_POST['request_code']==1623){
		readMessage($_POST['id']);
	}
	if($_POST['request_code']==6324){
		reply_message($_POST);
	}
}else{
	
}

function Concat($content,$limitString){
	return substr($content, 0, $limitString) . '...';
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
function ShowPre($data){
		return "<pre>".print_r($data)."</pre>";
	}

function GetAssessment($id){
	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$req_dump = print_r($userID." = ".$id, TRUE);
	    $fp = fopen('request.log', 'a');
	    fwrite($fp, $req_dump);
	    fclose($fp);

	$CONTENT = array();

	$CheckingStatus = mysql_query("SELECT * FROM assessment_examinies_metadata where examinees_id='".$id."' and status='ANSWERED'",$con);
	if(mysql_num_rows($CheckingStatus) > 0) {
		$CONTENT['assessment_status'] = "1";
		return $CONTENT;
	}

	

	$assessment_examinees_result = mysql_query("SELECT * FROM assessment_examinees 
									where 
									_student_id='".$userID."' and 
									_id='".$id."' and 
									(NOW() BETWEEN  _date_time_start and _date_time_end) and
									_status != 'ANSWERED' 
									",$con);
	$assessment_examinees_info = mysql_fetch_assoc($assessment_examinees_result);

	

	ErrorMysqlLogs($con);
	$CONTENT['examinees'] = $assessment_examinees_info;

	$assessment_result = mysql_query("SELECT * FROM assessment 
									where 
									_id='".$assessment_examinees_info['_assessment_id']."'
									",$con);
	$assessment_info = mysql_fetch_assoc($assessment_result);
	$CONTENT['assessment'] = $assessment_info;

	$assessment_meta = mysql_query("SELECT * FROM assessment_meta where assessment_id='".$assessment_info['_id']."' ",$con);

	$assessment_meta_array = array();
	$assessment_meta_number = 0;
	while($assessment_meta_row=mysql_fetch_assoc($assessment_meta)){
		$assessment_meta_array[$assessment_meta_number] = $assessment_meta_row;
		$assessment_meta_number++;
	}

	$CONTENT['meta'] = $assessment_meta_array;

			// Register the examinees to examinees_meta
		$metaID = $assessment_examinees_info['_id'];

		$courseCheck = mysql_query("SELECT * FROM assessment_examinies_metadata where examinees_id='".$metaID."'",$con);
		if(mysql_num_rows($courseCheck) != 0) {

				$assessment_examinees_metadata_result = mysql_query("SELECT * FROM assessment_examinies_metadata 
									where 
									examinees_id='".$metaID."' and 
									status != 'ANSWERED' 
									",$con);
				$CONTENT['examinees_current_metadata'] = mysql_fetch_assoc($assessment_examinees_metadata_result);

				$currentDate 	= date("F j, Y, g:i:s a");
				$endDate = date("F j, Y, g:i:s a",strtotime($CONTENT['examinees_current_metadata']['meta_date_ended']));
				$CONTENT['datetime_left'] = strtotime($endDate) - strtotime($currentDate);
				$CONTENT['datetime_start'] 	= $currentDate;
				$CONTENT['datetime_end'] 	= $endDate;
				return $CONTENT;

		}else{

			 
			if(mysql_query("INSERT INTO  assessment_examinies_metadata (
				examinees_id,
				meta_date_started,
				meta_date_ended,
				status,
				logs,
				date_submitted
				)
            values (
            '$metaID',
            NOW(),
            DATE_ADD(NOW(), INTERVAL '".$assessment_examinees_info['_duration']."' MINUTE),
            'ANSWERING',
            '',
            NOW()
	        )",$con)){

				$assessment_examinees_metadata_result = mysql_query("SELECT * FROM assessment_examinies_metadata 
									where 
									examinees_id='".$metaID."' and 
									status != 'ANSWERED' 
									",$con);
				$CONTENT['examinees_current_metadata'] = mysql_fetch_assoc($assessment_examinees_metadata_result);

				$currentDate 	= date("F j, Y, g:i:s a");
				$endDate = date("F j, Y, g:i:s a",strtotime($CONTENT['examinees_current_metadata']['meta_date_ended']));
				$CONTENT['datetime_left'] = strtotime($endDate) - strtotime($currentDate);
				$CONTENT['datetime_start'] 	= $currentDate;
				$CONTENT['datetime_end'] 	= $endDate;
				return $CONTENT;
			}
		}

			

}

function CheckAnswer($answer,$examiness){
	
	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$answerStatus = array();
	$errorMessage = array();
	$answerStatus['m_c'] = 0;
	$answerStatus['t_f'] = 0;

	$answerStatus['COUNT_m_c'] = 0;
	$answerStatus['COUNT_t_f'] = 0;
	$answerStatus['COUNT_f_b'] = 0;
	$answerStatus['COUNT_essay'] = 0;
	$answerStatus['COUNT_activity'] = 0;

	$answerStatus['TOTAL_COUNT_m_c'] = 0;
	$answerStatus['TOTAL_COUNT_t_f'] = 0;
	$answerStatus['TOTAL_COUNT_f_b'] = 0;
	$answerStatus['TOTAL_COUNT_essay'] = 0;
	$answerStatus['TOTAL_COUNT_activity'] = 0;


	$choices = ['a','b','c','d'];
	

	if($userID != $examiness['_student_id']){
		// Student ID and submited id in not the same.
		$errorMessage['status'] = "error";
		$errorMessage['code'] = 334;
		echo json_encode($errorMessage);
	}

	$assessmentCheck = mysql_query("SELECT * FROM assessment_examinees where _id='".$examiness['_id']."' and _student_id='".$examiness['_student_id']."'",$con);
	if(mysql_num_rows($assessmentCheck)>0){

		foreach ($answer as $value) {
			
		$assessmentMeta = mysql_query("SELECT * FROM assessment_meta where meta_id='".$value['id']."'",$con);
		$assessmentData = mysql_fetch_assoc($assessmentMeta);

		if($assessmentData['_type'] == 'm_c'){
			if(strtoupper($assessmentData['_answer'])==strtoupper($choices[($value['answer']-1)])){
				if(SaveAnswer($examiness['_id'],$assessmentData['meta_id'],$choices[$value['answer']-1],'1','1')){
					$answerStatus['m_c'] +=1;
				}else{
					// Error Occur while saving answer
					$errorMessage['status'] = "error";
					$errorMessage['code'] = 433;
					echo json_encode($errorMessage);
				}
			}else{
				if(SaveAnswer($examiness['_id'],$assessmentData['meta_id'],$choices[$value['answer']-1],'0','0')){
					
				}else{
					// Error Occur while saving answer
					$errorMessage['status'] = "error";
					$errorMessage['code'] = 433;
					echo json_encode($errorMessage);
				}
			}
			$answerStatus['COUNT_m_c'] +=1;
		}else if($assessmentData['_type'] == 't_f'){
			if(strtoupper($assessmentData['_answer'])==strtoupper($value['answer'])){
				if(SaveAnswer($examiness['_id'],$assessmentData['meta_id'],strtoupper($value['answer']),'1','1')){
					$answerStatus['t_f'] +=1;
				}else{
					// Error Occur while saving answer
					$errorMessage['status'] = "error";
					$errorMessage['code'] = 433;
					echo json_encode($errorMessage);
				}
			}else{
				if(SaveAnswer($examiness['_id'],$assessmentData['meta_id'],strtoupper($value['answer']),'0','0')){
					
				}else{
					// Error Occur while saving answer
					$errorMessage['status'] = "error";
					$errorMessage['code'] = 433;
					echo json_encode($errorMessage);
				}
			}
			$answerStatus['COUNT_t_f'] +=1;
		}else if($assessmentData['_type'] == 'f_b'){
			if(SaveAnswer($examiness['_id'],$assessmentData['meta_id'],$value['answer'],'NULL','0')){
					
				}else{
					// Error Occur while saving answer
					$errorMessage['status'] = "error";
					$errorMessage['code'] = 433;
					echo json_encode($errorMessage);
				}
				$answerStatus['COUNT_f_b'] +=1;
		}else if($assessmentData['_type'] == 'essay'){
			if(SaveAnswer($examiness['_id'],$assessmentData['meta_id'],$value['answer'],'NULL','0')){
					
				}else{
					// Error Occur while saving answer
					$errorMessage['status'] = "error";
					$errorMessage['code'] = 433;
					echo json_encode($errorMessage);
				}
				$answerStatus['COUNT_essay'] +=1;
		}else if($assessmentData['_type'] == 'activity'){

			if(SaveAnswer($examiness['_id'],$assessmentData['meta_id'],sizeof($value['answer']),'NULL','0')){
					
				}else{
					// Error Occur while saving answer
					$errorMessage['status'] = "error";
					$errorMessage['code'] = 433;
					echo json_encode($errorMessage);
				}
				$answerStatus['COUNT_activity'] +=1;
		}else{
			// Error Assessment Type
			$errorMessage['status'] = "error";
			$errorMessage['code'] = 336;
			echo json_encode($errorMessage);
		}

		}
		$totalAnswer = ($answerStatus['t_f'] + $answerStatus['m_c']);
		if(UpdateExaminiesStatus($examiness['_id'],"ANSWERED",$totalAnswer)){

			$assessment = mysql_query("SELECT * FROM assessment where _id='".$examiness['_assessment_id']."'",$con);
			$assessmentContent = mysql_fetch_assoc($assessment);

			$assessmentStatus = mysql_query("SELECT * FROM assessment_examinies_metadata where examinees_id='".$examiness['_id']."'",$con);
			$assessmentStatusContent = mysql_fetch_assoc($assessmentStatus);

			$TypeCount = mysql_query("SELECT * FROM assessment_meta where assessment_id='".$examiness['_assessment_id']."' ",$con);
			while($row=mysql_fetch_assoc($TypeCount)){ 
				if($row['_type']=='m_c'){
					$answerStatus['TOTAL_COUNT_m_c'] += 1;
				}else if($row['_type']=='t_f'){
					$answerStatus['TOTAL_COUNT_t_f'] += 1;
				}else if($row['_type']=='f_b'){
					$answerStatus['TOTAL_COUNT_f_b'] += 1;
				}else if($row['_type']=='essay'){
					$answerStatus['TOTAL_COUNT_essay'] += 1;
				}else if($row['_type']=='activity'){
					$answerStatus['TOTAL_COUNT_activity'] += 1;
				}


			}

			$answerStatus['status'] 						= "ok";
		    $answerStatus['assessment_duration'] 			= $examiness['_duration']."mins";
			$answerStatus['assessment_name'] 				= $assessmentContent['_assessment_name'];
			$answerStatus['examinees_start_datetime'] 		= date("F j, Y, g:i a",strtotime($assessmentStatusContent['meta_date_started']));
			$answerStatus['examinees_end_datetime'] 		= date("F j, Y, g:i a",strtotime($assessmentStatusContent['meta_date_ended']));

			$seconds = strtotime($assessmentStatusContent['meta_date_ended']) - strtotime($assessmentStatusContent['meta_date_started']);

			$days    = floor($seconds / 86400);
			$hours   = floor(($seconds - ($days * 86400)) / 3600);
			$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
			$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));

			$answerStatus['examinees_spent'] 				= "Days: ".$days." Hours: ".$hours." Minutes: ".$minutes." Seconds: ".$seconds;
			echo json_encode($answerStatus);
		}else{
			$errorMessage['status'] = "error";
			$errorMessage['code'] = 350;
			echo json_encode($errorMessage);
		}
		

	}else{
		//assessment ID is not exsist or examinees is not allowed to take this assessment.
		$errorMessage['status'] = "error";
		$errorMessage['code'] = 332;
		echo json_encode($errorMessage);
	}
}

function SaveAnswer($examinees_id,$question_meta_id,$answer,$status,$points){
	include 'db_init.php';

	if($r=mysql_query("INSERT INTO  assessment_examinies_metadata_answer (
		examinees_id,
		question_meta_id,
		answer,
		status,
		remarks,
		points,
		date_submitted
		)
	         values (
	         '$examinees_id',
	         '$question_meta_id',
	         '$answer',
	         '$status',
	         '',
	         '$points',
	         NOW()
		     )",$con))
		     {	
		         return true;
		     }else{
		     	ErrorMysqlLogs($con);
		     	return false;
		     }
}

function UpdateExaminiesStatus($examinees_id,$status,$score,$log = ''){
	include 'db_init.php';

	if($r=mysql_query("UPDATE assessment_examinies_metadata SET status='".$status."', meta_date_ended=NOW(), logs ='".$log."' where examinees_id = '".$examinees_id."'",$con))
		     {	
		     if($r=mysql_query("UPDATE assessment_examinees SET _status='".$status."',_score='".$score."' where _id = '".$examinees_id."'",$con))
			     {	
			     
			        return true;
			     }else{
			     	ErrorMysqlLogs($con);
			     	return false;
			     }
		     }else{
		     	ErrorMysqlLogs($con);
		     	return false;
		     }
	
}

function ErrorMysqlLogs($con){

	$message = date("F j, Y, g:i a")+"=> "+mysql_errno($con) . ": " . mysql_error($con) . "\n";

	    $fp = fopen('error.log', 'a');
	    fwrite($fp, $message);
	    fclose($fp);
}

function GetRecipient(){
	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$fetchStudent = mysql_query("SELECT * FROM students where _student_id = '".$userID."'",$con);

	$content = "";
	while($fetchStudentResult=mysql_fetch_assoc($fetchStudent))
	{


		$subject = mysql_query("SELECT * FROM subjects where _id = '".$fetchStudentResult['_subject_id']."'",$con);
		while($row_subject=mysql_fetch_assoc($subject)){ 
			$content .= '<option value="subject/'.$row_subject['_id'].'">'.$row_subject['_code'].' ('.$row_subject['_name'].')</option>';

			$student = mysql_query("SELECT * FROM students where _subject_id = '".$row_subject['_id']."' and _student_id != '".$userID."'",$con);
			while($row_student=mysql_fetch_assoc($student)){ 

				$student_result = mysql_query("SELECT * FROM accounts where _account_id='".$row_student['_student_id']."'",$con);
				$studen_info = mysql_fetch_object($student_result);

				$content .= '<option value="student/'.$row_student['_id'].'">'.$studen_info->_fn.' '.$studen_info->_sn.' ('.$row_subject['_code'].') (Student)</option>';

			}
		}
	}

	$fetchInstructor = mysql_query("SELECT * FROM accounts where _account_access = '0'",$con);

	while($fetchInstructorResult=mysql_fetch_assoc($fetchInstructor))
	{
		$content .= '<option value="instructor/'.$fetchInstructorResult['_account_id'].'">'.$fetchInstructorResult['_fn'].' '.$fetchInstructorResult['_sn'].' (Instructor)</option>';
	}


	echo $content;
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

function SendComposeMessage($POST){
	print_r($POST);
	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
	$recipient = $POST['recipient'];
	$recipientArray = array();
	$from = $userID;
	$subject = $POST['subject'];
	$message = $POST['message'];
	$messageType = $POST['type'];

	$attached_id = 'NULL';
	$reply_id = 'NULL';

	$generatedID ='message_'.time().'_'.GenerateString(25);
	
	// Get Recipient List 
	$x = 0;
	foreach ($recipient as $value) {
		$split = explode('/',$value);
		if($split[0]=='subject'){
			$fetchStudentList = mysql_query("SELECT * FROM students where _subject_id='".$split[1]."'",$con);
			
			while($student = mysql_fetch_assoc($fetchStudentList)){

				$fetchaccount = mysql_query("SELECT * FROM accounts where _account_id='".$student['_student_id']."'",$con);
				$accountName = mysql_fetch_assoc($fetchaccount);

				$recipientArray [$x] = $accountName['_fn']." ".$accountName['_sn'];

				$x++;
			}
	  	

	     ErrorMysqlLogs($con);
		}else if($split[0]=='student'){

			$fetchStudent = mysql_query("SELECT * FROM students where _id='".$split[1]."'",$con);
			$recipient_id = mysql_fetch_assoc($fetchStudent)['_student_id'];

			$fetchaccount = mysql_query("SELECT * FROM accounts where _account_id='".$recipient_id."'",$con);
			$accountName = mysql_fetch_assoc($fetchaccount);

			$recipientArray [$x] = $accountName['_fn']." ".$accountName['_sn'];
			$x++;
		}else if($split[0]=='instructor'){

			$fetchaccount = mysql_query("SELECT * FROM accounts where _account_id='".$split[1]."'",$con);
			$accountName = mysql_fetch_assoc($fetchaccount);

			$recipientArray [$x] = $accountName['_fn']." ".$accountName['_sn'];
			$x++;
			
		}
	}

	$recipientString = implode(', ',$recipientArray);
	// Proceed to Insert new message
	
	foreach ($recipient as $value) {
		$split = explode('/',$value);
		if($split[0]=='subject'){
			$fetchStudentList = mysql_query("SELECT * FROM students where _subject_id='".$split[1]."'",$con);
			
			while($student = mysql_fetch_assoc($fetchStudentList)){

				$recipient_id = $student['_student_id'];
				if($r=mysql_query("INSERT INTO  messages (
		        	_id_generated,
		        	_from_id,
		        	_to_id,
		        	_to_string,
		        	_subject,
		        	_message,
		        	_attached_id,
		        	_date_send,
		        	_message_type,
		        	_reply_id,
		        	status
		        	)
		            values (
		            '$generatedID',
		            '$from',
		            '$recipient_id',
		            '$recipientString',
		            '$subject',
		            '$message',
		            '$attached_id',
		             NOW(),
		            '$messageType',
		            '$reply_id',
		            '0'
		            
		        )",$con))
		        {
		           
		        }else{
		        	
		        }
			}
	  	

	     ErrorMysqlLogs($con);
		}else if($split[0]=='student'){

			$fetchStudent = mysql_query("SELECT * FROM students where _id='".$split[1]."'",$con);
			$recipient_id = mysql_fetch_assoc($fetchStudent)['_student_id'];

			
			if($r=mysql_query("INSERT INTO  messages (
		        	_id_generated,
		        	_from_id,
		        	_to_id,
		        	_to_string,
		        	_subject,
		        	_message,
		        	_attached_id,
		        	_date_send,
		        	_message_type,
		        	_reply_id,
		        	status
		        	)
		            values (
		            '$generatedID',
		            '$from',
		            '$recipient_id',
		            '$recipientString',
		            '$subject',
		            '$message',
		            '$attached_id',
		             NOW(),
		            '$messageType',
		            '$reply_id',
		            '0'
		            
		        )",$con))
		        {
		           
		        }else{
		        	
		        }
		}else if($split[0]=='instructor'){

			$recipient_id = $split[1];

			
			if($r=mysql_query("INSERT INTO  messages (
		        	_id_generated,
		        	_from_id,
		        	_to_id,
		        	_to_string,
		        	_subject,
		        	_message,
		        	_attached_id,
		        	_date_send,
		        	_message_type,
		        	_reply_id,
		        	status
		        	)
		            values (
		            '$generatedID',
		            '$from',
		            '$recipient_id',
		            '$recipientString',
		            '$subject',
		            '$message',
		            '$attached_id',
		             NOW(),
		            '$messageType',
		            '$reply_id',
		            '0'
		            
		        )",$con))
		        {
		           
		        }else{
		        	ErrorMysqlLogs($con);
		        }
		}
	}
}

function getMessageList($search){
	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$fetchMessageList = mysql_query("SELECT * FROM messages where 
		(_from_id='".$userID."' OR _to_id = '".$userID."')
		AND
		(
		_message LIKE '%".$search."%' OR
		_subject LIKE '%".$search."%' OR
		_to_string LIKE '%".$search."%'
		)
		AND _message_type='0'
		GROUP BY _id_generated",$con);
		$scoreColumn = 0;
		$content = "";

		while($Message = mysql_fetch_assoc($fetchMessageList)){

			$getNameOfSender = mysql_query("SELECT * FROM accounts where _account_id='".$Message['_from_id']."'",$con);
			$info = mysql_fetch_assoc($getNameOfSender);

			$content .= '<li class="message_holder '.($Message['status']==0 ? 'unread' : '').'" data-id="'.$Message['_id'].'">
		                <div class="message"> <i class="icon-envelope-alt"></i> <span class="user-info">'.$info['_fn'].' '.$info['_sn'].'</span> <span class="date-message pull-right">'.time_elapsed_string($Message['_date_send']).'</span>
		                  <p class="short_message">'.Concat('<b>'.$Message['_subject'].'</b> - '.$Message['_message'],100).' </p>
		                  <div class="text-right"> 
		                  <button class="tip remove" data-id="'.$Message['_id'].'" data-original-title="Remove"><i class="icon-trash"></i></button> 
		                  </div>
		                </div>';

			
		}

		echo $content;
}

function readMessage($id){

	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);


	$fetchMessage = mysql_query("SELECT * FROM messages where _id='".$id."'",$con);
	$MessageDetails = mysql_fetch_assoc($fetchMessage);

		// mysql_query("UPDATE messages SET status='1' where _id='".$id."'",$con);
		

		$content = '<h4>'.$MessageDetails['_subject'].'</h4>
	                <hr/>';


		$fetchaccount = mysql_query("SELECT * FROM accounts where _account_id='".$MessageDetails['_from_id']."'",$con);
		$account = mysql_fetch_assoc($fetchaccount);

		$content .= '<div class="message_reply">
	                  <span class="user-info">'.$account['_fn'].' '.$account['_sn'].'</span> 
	                  <span class="date-message pull-right">
	                    '.time_elapsed_string($MessageDetails['_date_send']).'
	                  </span>
	                  <p class="recipient_list">to '.Concat($MessageDetails['_to_string'],100).'</p>
	                  <p class="message">'.$MessageDetails['_message'].'</p>
	                  </div>
	                  <hr/>';


	    $fetchMessageReply = mysql_query("SELECT * FROM messages where _message_type='1' and _reply_id='".$MessageDetails['_id_generated']."' order by _date_send",$con);
		while($MessageReply = mysql_fetch_assoc($fetchMessageReply)){

							$fp = fopen('request.log', 'a');
						   fwrite($fp, $MessageDetails['_id_generated']."\n");
						   fclose($fp);
					$reply_fetchaccount = mysql_query("SELECT * FROM accounts where _account_id='".$MessageReply['_from_id']."'",$con);
					$reply_account = mysql_fetch_assoc($reply_fetchaccount);
					$content .= '<div class="message_reply">
	                  <span class="user-info">'.$reply_account['_fn'].' '.$reply_account['_sn'].'</span> 
	                  <span class="date-message pull-right">
	                    '.time_elapsed_string($MessageReply['_date_send']).'
	                  </span>
	                  <p class="recipient_list">to '.Concat($MessageDetails['_to_string'],100).'</p>
	                  <p class="message">'.$MessageReply['_message'].'</p>
	                  </div>
	                  <hr/>';
		}             

	    $content .= '<div class="message_reply">
                  <textarea class="textarea_editor span11 reply_message" id="reply_message" rows="8" placeholder="Reply ..."></textarea>
                  </div>
                  <div class="message_reply text-right">
                  <input type="hidden" id="reply_id" value=>
                  <button class="btn btn-primary" id="SendReply" data-id="'.$MessageDetails['_id_generated'].'" >Send</button>
                  </div>';




	echo $content;

}

function reply_message($POST){

		// $fp = fopen('request.log', 'a');
	 //    fwrite($fp, print_r($POST,true));
	 //    fclose($fp);

	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$recipient = 'NULL';
	$recipientArray = array();
	$from = $userID;
	$subject = 'NULL';
	$message = $POST['reply_content'];
	$messageType = '1';

	$attached_id = 'NULL';
	$reply_id = $POST['reply_id'];

	$generatedID ='message_'.time().'_'.GenerateString(25);

	// mysql_query("UPDATE messages SET status='0' where _id_generated='message_1490474611_LfL0Q6rP5E90A4IuV6uKdYjL3'",$con);

	if($r=mysql_query("INSERT INTO  messages (
		        	_id_generated,
		        	_from_id,
		        	_to_id,
		        	_to_string,
		        	_subject,
		        	_message,
		        	_attached_id,
		        	_date_send,
		        	_message_type,
		        	_reply_id,
		        	status
		        	)
		            values (
		            '$generatedID',
		            '$from',
		            'NULL',
		            'NULL',
		            'NULL',
		            '$message',
		            'NULL',
		             NOW(),
		            '$messageType',
		            '$reply_id',
		            '0'
		            
		        )",$con))
		        {
		        	
		        	ErrorMysqlLogs($con);
		         echo 200;  
		        }else{
		         echo 500;
		        }
}
?>