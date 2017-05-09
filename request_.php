<?php
date_default_timezone_set('Asia/Manila');
if(isset($_GET['request_code']) && isset($_COOKIE['u_acc_auth'])){
	if($_GET['request_code']==5124){
		RemoveLearningMaterials($_GET);
	}
	if($_GET['request_code']==5322){
		RemoveAccessLearningMaterials($_GET);
	}
}

if(isset($_POST['request_code']) && isset($_COOKIE['u_acc_auth'])){
	if($_POST['request_code']==1101){
		GetStudentListInSubjectForTable($_POST['subject']);
	}
	if($_POST['request_code']==1102){
		addAssessment($_POST);
	}
	if($_POST['request_code']==1103){
		GetExaminee();
	}
	if($_POST['request_code']==5123){
		getRecipeint();
	}
	if($_POST['request_code']==1104){
		SaveAddExaminees($_POST);
	}
	if($_POST['request_code']==4421){
		ViewStudentAssessmentSingle($_POST['examineesid'],$_POST['Assessment_id']);
	}
	if($_POST['request_code']==4422){
		echo SubmitSelectedExaminees($_POST['examinees_result']);
	}
	if($_POST['request_code']==1513){
		echo GetCourseForGradebook();
	}
	if($_POST['request_code']==5151){
		GetCourseAndStudent();
	}
	if($_POST['request_code']==1592){
		echo GetCourseForLearningMaterials($_POST);
	}
	if($_POST['request_code']==1141){
		echo CreateGradebook($_POST);
	}
	if($_POST['request_code']==5512){
		echo QueryGradebook($_POST);
	}
	if($_POST['request_code']==5698){
		echo UpdateGradebookRecord($_POST['record']);
	}
	if($_POST['request_code']==1512){
		echo SendComposeMessage($_POST);
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
	if($_POST['request_code']==5235){
		addWorkSheetGroup($_POST);
	}
	if($_POST['request_code']==5236){
		addSheetToGroup($_POST);
	}
	if($_POST['request_code']==5661){
		GetSheetFromGroup($_POST['id']);
	}
	if($_POST['request_code']==8452){
		AddAccessToSheet($_POST);
	}
	if($_POST['request_code']==6136){
		GetAccessToSheet($_POST['id']);
	}
	if($_POST['request_code']==5122){
		ShareLearningMaterials($_POST);
	}
	if($_POST['request_code']==5632){
		GetLearningMaterialsAccess($_POST);
	}
	if($_POST['request_code']==6331){
		UpdateLearningMaterials($_POST);
	}
	
	if($_POST['request_code']==5671){
		GetCalendarCourseAndStudent($_POST);
	}
	
	
}

function BackPage($page,$stat){
	header("location:".$page."?status=".$stat);
}
function WriteLog($data,$action,$type=false){

if($action=="a" && $type){

	$req_dump = print_r($data, TRUE);
    $fp = fopen('request.log', 'a');
    fwrite($fp, $req_dump);
    fclose($fp);

}else if($action=="a"){

    $fp = fopen('request.log', 'a');
    fwrite($fp, $data);
    fclose($fp);

}else if($action=="rw" && $type){

	$req_dump = print_r($data, TRUE);
	file_put_contents('request.log', $req_dump);

}else if($action=="rw"){

	file_put_contents('request.log', $data);

}
	
}

function GetStudentListInSubjectForTable($subjectID){
	include 'db_init.php';
	$resultRegistered = mysql_query("SELECT * FROM students where _subject_id = '".$subjectID."'",$con);

	$content = "";
	while($row_registered=mysql_fetch_assoc($resultRegistered))
	{

		$student_result = mysql_query("SELECT * FROM accounts where _account_id='".$row_registered['_student_id']."'",$con);
		$student_info = mysql_fetch_object($student_result);

				if($row_registered['_status'] == '1'){
                  $student_status_ = '<span class="badge badge-success"> Active </span>';
                }else if($row_registered['_status'] == '2'){
                  $student_status_ = '<span class="badge badge-warning"> Warned </span>';
                }else if($row_registered['_status'] == '3'){
                  $student_status_ = '<span class="badge badge-important"> Dropped </span>';
                }

		$content .= '<tr class="gradeX">
	                  <td class="center">'.$student_info->_fn.' '.$student_info->_sn.'</td>
	                  <td class="center">'.$student_info->_email.'</td>
	                  <td class="center">'.$student_status_.'</td>
	                  <td class="center">
	                  	<a href="student.php?stdid='.$student_info->_account_id.'" class="btn btn-mini btn-success"><i class="icon-eye-open"></i> View</a>
	                  </td>
	                </tr>';
	    

	}

	 echo $content;
	 die();
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
function addAssessment($data){
	// $req_dump = print_r($data, TRUE);
	//     $fp = fopen('request.log', 'a');
	//     fwrite($fp, $req_dump);
	//     fclose($fp);
	    
	include 'db_init.php';
	$assessmentID = 'assessment_'.time().'_'.GenerateString(25);

	$index = 0;
	foreach ($data['assessment_type'] as $type) {

		$_owners_id = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$answer = "";
		$c_a = "";
		$c_b = "";
		$c_c = "";
		$c_d = "";
		if($type=="m_c"){
			$answer = $data['answer_'.$data['answer_id'][$index]];
			$c_a = $data['lttr_chces_'.$data['answer_id'][$index]][0];
			$c_b = $data['lttr_chces_'.$data['answer_id'][$index]][1];
			$c_c = $data['lttr_chces_'.$data['answer_id'][$index]][2];
			$c_d = $data['lttr_chces_'.$data['answer_id'][$index]][3];
		}else if($type=="t_f"){
			$answer = $data['answer_'.$data['answer_id'][$index]];
			$c_a 	= "N/A";
			$c_b 	= "N/A";
			$c_c 	= "N/A";
			$c_d 	= "N/A";
		}else{
			$answer = "N/A";
			$c_a 	= "N/A";
			$c_b 	= "N/A";
			$c_c 	= "N/A";
			$c_d 	= "N/A";
		}

		$question = $data['question'][$index];

        if($r=mysql_query("INSERT INTO  assessment_meta (
        	assessment_id,
        	_type,
        	_answer,
        	_question,
        	_choice_a,
        	_choice_b,
        	_choice_c,
        	_choice_d
        	)
            values (
            '$assessmentID',
            '$type',
            '$answer',
            '$question',
            '$c_a',
            '$c_b',
            '$c_c',
            '$c_d'
        )",$con))
        {
            echo 200;
        }else{
        	echo 500;
        }

		$index++;
	}
	$_duration = $t = EXPLODE(":", $data['duration']); 
	$_hours = $_duration[0] * 60;
	$total_duration =  $_hours + $_duration[1];

	$rand_numb = 0;
	$rand_chces = 0;
	if (isset($data['random_numbers'])) {
    	$rand_numb = 1;
	}
	if (isset($data['random_choices'])) {
    	$rand_chces = 1;
	}

	$assessment_name = $data['assessment_name'];
	echo $dateTimeStart = date('Y-m-d H:i',strtotime($data['date_start'].' '.$data['time_start']));
	echo $dateTimeEnd = date('Y-m-d H:i',strtotime($data['date_end'].' '.$data['time_end']));
	$message = $data['message'];
	if($r=mysql_query("INSERT INTO  assessment (
        	_id,
        	_account_id,
        	_assessment_name,
        	_data_time_start,
        	_data_time_end,
        	_duration,
        	_random_numbers,
        	_random_choices,
        	message,
        	date_registered
        	)
            values (
            '$assessmentID',
            '$_owners_id',
            '$assessment_name',
            '$dateTimeStart',
            '$dateTimeEnd',
            '$total_duration',
            '$rand_numb',
            '$rand_chces',
            '$message',
            NOW()
        )",$con))
        {
            echo 200;
        }else{
        	echo 500;
        }


// echo mysql_errno($con) . ": " . mysql_error($con) . "\n";
// 	echo '<pre>';
// 	print_r($data);
// 	echo '</pre>';

	header("location:assessment_manage.php");
	die();
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

function GetExaminee(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$content = "";

		$subject = mysql_query("SELECT * FROM subjects where _owners_id = '".$userID."'",$con);
		while($row_subject=mysql_fetch_assoc($subject)){ 
			$content .= '<option value="subject/'.$row_subject['_id'].'">'.$row_subject['_code'].' ('.$row_subject['_name'].')</option>';

			$student = mysql_query("SELECT * FROM students where _subject_id = '".$row_subject['_id']."'",$con);
			while($row_student=mysql_fetch_assoc($student)){ 

				$student_result = mysql_query("SELECT * FROM accounts where _account_id='".$row_student['_student_id']."'",$con);
				$studen_info = mysql_fetch_object($student_result);

				$content .= '<option value="student/'.$row_student['_id'].'">'.$studen_info->_fn.' '.$studen_info->_sn.' ('.$row_subject['_code'].')</option>';

			}
		}

		echo $content;

}

function getRecipeint(){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$content = "";

		$subject = mysql_query("SELECT * FROM subjects where _owners_id = '".$userID."'",$con);
		while($row_subject=mysql_fetch_assoc($subject)){ 
			$content .= '<option value="subject/'.$row_subject['_id'].'">'.$row_subject['_code'].' ('.$row_subject['_name'].')</option>';

			$student = mysql_query("SELECT * FROM students where _subject_id = '".$row_subject['_id']."'",$con);
			while($row_student=mysql_fetch_assoc($student)){ 

				$student_result = mysql_query("SELECT * FROM accounts where _account_id='".$row_student['_student_id']."'",$con);
				$studen_info = mysql_fetch_object($student_result);

				$content .= '<option value="student/'.$row_student['_id'].'">'.$studen_info->_fn.' '.$studen_info->_sn.' ('.$row_subject['_code'].')</option>';

			}
		}

		$fetchInstructor = mysql_query("SELECT * FROM accounts where _account_access = '0'",$con);

		while($fetchInstructorResult=mysql_fetch_assoc($fetchInstructor))
		{
			$content .= '<option value="instructor/'.$fetchInstructorResult['_account_id'].'">'.$fetchInstructorResult['_fn'].' '.$fetchInstructorResult['_sn'].' (Instructor)</option>';
		}

		echo $content;

}

function SaveAddExaminees($data){
	echo '<pre>';
	echo print_r($data);
	echo '</pre>';
	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	foreach ($data['examinieslist'] as $val) {
		$examinieslist_explode = explode("/", $val);
		if($examinieslist_explode[0]=='subject'){
			$subject = mysql_query("SELECT * FROM subjects where _owners_id = '".$userID."' and _id = '".$examinieslist_explode[1]."'",$con);
			while($row_subject=mysql_fetch_assoc($subject)){ 

				$student = mysql_query("SELECT * FROM students where _subject_id = '".$row_subject['_id']."'",$con);
				while($row_student=mysql_fetch_assoc($student)){

				$student_result = mysql_query("SELECT * FROM accounts where _account_id='".$row_student['_student_id']."'",$con);
				$studen_info = mysql_fetch_object($student_result);

				// echo $studen_info->_fn."<br>";

				$_duration = $t = EXPLODE(":", $data['duration']); 
				$_hours = $_duration[0] * 60;
				$total_duration =  $_hours + $_duration[1];

				$rand_numb = 0;
				$rand_chces = 0;
				if (isset($data['random_numbers'])) {
			    	$rand_numb = 1;
				}
				if (isset($data['random_choices'])) {
			    	$rand_chces = 1;
				}

				$parameters = array();
				$parameters[] = $row_student['_student_id'];
				$parameters[] = $row_subject['_id'];
				$parameters[] = $data['assessment_id'];
				$parameters[] = date('Y-m-d H:i',strtotime($data['date_start'].' '.$data['time_start']));
				$parameters[] = date('Y-m-d H:i',strtotime($data['date_end'].' '.$data['time_end']));
				$parameters[] = $total_duration;
				$parameters[] = $rand_numb;
				$parameters[] = $rand_chces;
				$parameters[] = $data['message'];
				$parameters[] = 'pending';
				$parameters[] = '0';

				addExaminees($parameters);
					// echo '<pre>';
					// echo print_r($parameters);
					// echo '</pre>';
				} 
			}
		}
		else if($examinieslist_explode[0]=='student'){
				


				$student = mysql_query("SELECT * FROM students where _id = '".$examinieslist_explode[1]."'",$con);
				while($row_student=mysql_fetch_assoc($student)){

				$student_result = mysql_query("SELECT * FROM accounts where _account_id='".$row_student['_student_id']."'",$con);
				$studen_info = mysql_fetch_object($student_result);

				// echo $studen_info->_fn."<br>";

				$_duration = $t = EXPLODE(":", $data['duration']); 
				$_hours = $_duration[0] * 60;
				$total_duration =  $_hours + $_duration[1];

				$rand_numb = 0;
				$rand_chces = 0;
				if (isset($data['random_numbers'])) {
			    	$rand_numb = 1;
				}
				if (isset($data['random_choices'])) {
			    	$rand_chces = 1;
				}

				$parameters = array();
				$parameters[] = $row_student['_student_id'];
				$parameters[] = $row_student['_subject_id'];
				$parameters[] = $data['assessment_id'];
				$parameters[] = date('Y-m-d H:i',strtotime($data['date_start'].' '.$data['time_start']));
				$parameters[] = date('Y-m-d H:i',strtotime($data['date_end'].' '.$data['time_end']));
				$parameters[] = $total_duration;
				$parameters[] = $rand_numb;
				$parameters[] = $rand_chces;
				$parameters[] = $data['message'];
				$parameters[] = 'pending';
				$parameters[] = '0';

				addExaminees($parameters);
					// echo '<pre>';
					// echo print_r($parameters);
					// echo '</pre>';
				} 
			
		}
	}

	header("location:assessment_manage_view.php?id=".$data['assessment_id']);
	die();
}

function addExaminees($parameters){
		include 'db_init.php';
		if($r=mysql_query("INSERT INTO  assessment_examinees (
        	_student_id,
        	_subject_enrolled,
        	_assessment_id,
        	_date_time_start,
        	_date_time_end,
        	_duration,
        	_random_numbers,
        	_random_choices,
        	_message,
        	_status,
        	_score,
        	_date_submitted
        	)
            values (
            '$parameters[0]',
            '$parameters[1]',
            '$parameters[2]',
            '$parameters[3]',
            '$parameters[4]',
            '$parameters[5]',
            '$parameters[6]',
            '$parameters[7]',
            '$parameters[8]',
            '$parameters[9]',
            '$parameters[10]',
            NOW()
        )",$con))
        {
            echo 200;
        }else{
        	echo 500;
        }

}

function ViewStudentAssessmentSingle($examineesid,$Assessment_id){

	include 'db_init.php';

				  $result = GetAssessmentMeta($Assessment_id); 
                  $assessmentNumber = 0;

                  

                $assessment_examinees_result = mysql_query("SELECT * FROM assessment_examinees where _id='".$examineesid."' ",$con);
                $assessment_examinees_info = mysql_fetch_assoc($assessment_examinees_result);
				$CONTENT['examinees'] = $assessment_examinees_info;

               	$assessment_result = mysql_query("SELECT * FROM assessment where _id='".$assessment_examinees_info['_assessment_id']."'",$con);
                $assessment_info = mysql_fetch_assoc($assessment_result);
                $CONTENT['assessment'] = $assessment_info;

                $assessment_status_result = mysql_query("SELECT * FROM assessment_examinies_metadata where examinees_id='".$examineesid."'",$con);
                $assessment_status = mysql_fetch_assoc($assessment_status_result);
                $CONTENT['assessment_status'] = $assessment_status;


                  $CONTENT['QuestionAndAnswer'] =""; 

                  $assessment_result_per_type = array();
                  $assessment_result_per_type['MC_answered'] 		= 0;
                  $assessment_result_per_type['TF_answered'] 		= 0;
                  $assessment_result_per_type['FB_answered'] 		= 0;
                  $assessment_result_per_type['ESSAY_answered'] 	= 0;
                  $assessment_result_per_type['ACTIVITY_answered'] 	= 0;

                  $assessment_result_per_type['MC_Points'] 		= 0;
                  $assessment_result_per_type['TF_Points'] 		= 0;
                  $assessment_result_per_type['FB_Points'] 		= 0;
                  $assessment_result_per_type['ESSAY_Points'] 	= 0;
                  $assessment_result_per_type['ACTIVITY_Points']= 0;

                  $assessment_result_per_type['MC_Total_Numb'] 		= 0;
                  $assessment_result_per_type['TF_Total_Numb'] 		= 0;
                  $assessment_result_per_type['FB_Total_Numb'] 		= 0;
                  $assessment_result_per_type['ESSAY_Total_Numb'] 	= 0;
                  $assessment_result_per_type['ACTIVITY_Total_Numb']= 0;


                  $examineesResult = array();
                  while($row=mysql_fetch_assoc($result)){ 


                  	$ExamineesAnswer = mysql_query("SELECT * FROM assessment_examinies_metadata_answer where  question_meta_id='".$row['meta_id']."' and examinees_id='".$assessment_examinees_info['_id']."'",$con);
                  	$ExamineesAnswerData = mysql_fetch_assoc($ExamineesAnswer);

                  	$examineesResult[$assessmentNumber]['question_id'] = $ExamineesAnswerData['question_meta_id'];
                  	$examineesResult[$assessmentNumber]['answer_status'] = $ExamineesAnswerData['status'];
                  	$examineesResult[$assessmentNumber]['remarks'] = $ExamineesAnswerData['remarks'];
                  	$examineesResult[$assessmentNumber]['points'] = $ExamineesAnswerData['points'];

                  	$Button 	='';
                  	$choices 	='';
                  	$answer 	='';
                  	if($row['_type']=='m_c'){
                  		$assessment_result_per_type['MC_Total_Numb']++;

                  		if(sizeof($ExamineesAnswerData)>1){
                  			$assessment_result_per_type['MC_answered']++;
                  		}else{
                  			$choices .=  '<div class="alert alert-danger"><b>No Answer</b></div>';
                  		}

						if(strtoupper($row['_answer'])==strtoupper($ExamineesAnswerData['answer'])){
							$assessment_result_per_type['MC_Points'] += $ExamineesAnswerData['points'];
							if(strtoupper($row['_answer'])=='A'){
								$choices .=  '<div class="alert alert-success"><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-normal"><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-normal"><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-normal"><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}else if(strtoupper($row['_answer'])=='B'){
								$choices .=  '<div class="alert alert-normal"><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-success"><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-normal"><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-normal"><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}else if(strtoupper($row['_answer'])=='C'){
								$choices .=  '<div class="alert alert-normal"><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-normal"><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-success"><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-normal"><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}else if(strtoupper($row['_answer'])=='D'){
								$choices .=  '<div class="alert alert-normal"><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-normal"><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-normal"><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-success"><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}

							$Button='
									 <input type="hidden" name="ass_stat[]" value="1" id="ass_stat_'.$assessmentNumber.'">
									 <button class="btn btn-mini button_status btn-success button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
                  		}else{

                  			if(strtoupper($row['_answer'])=='A'){
								$choices .=  '<div class="alert alert-success"><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='B' ? 'alert-error' : '').' "><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='C' ? 'alert-error' : '').' "><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='D' ? 'alert-error' : '').'"><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}else if(strtoupper($row['_answer'])=='B'){
								$choices .=  '<div class="alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='A' ? 'alert-error' : '').' "><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-success"><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='C' ? 'alert-error' : '').' "><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='D' ? 'alert-error' : '').' "><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}else if(strtoupper($row['_answer'])=='C'){
								$choices .=  '<div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='A' ? 'alert-error' : '').' "><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='B' ? 'alert-error' : '').' "><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-success"><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='D' ? 'alert-error' : '').' "><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}else if(strtoupper($row['_answer'])=='D'){
								$choices .=  '<div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='A' ? 'alert-error' : '').' "><b>A. </b>'.$row['_choice_a'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='B' ? 'alert-error' : '').' "><b>B. </b>'.$row['_choice_b'].'</div>
											 <div class="alert alert-normal '.(strtoupper($ExamineesAnswerData['answer'])=='D' ? 'alert-error' : '').' "><b>C. </b>'.$row['_choice_c'].'</div>
											 <div class="alert alert-success"><b>D. </b>'.$row['_choice_d'].'</div>
											';
							}


                  			$Button='
									 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
									 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
                            		 <button class="btn btn-mini button_status btn-danger button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
                  		}
                  	}else if($row['_type']=='t_f'){
                  		$assessment_result_per_type['TF_Total_Numb']++;

                  		if(sizeof($ExamineesAnswerData)>1){
                  			$assessment_result_per_type['TF_answered']++;
                  		}else{
                  			$choices .=  '<div class="alert alert-danger"><b>No Answer</b></div>';
                  		}

                  		if(strtoupper($row['_answer'])==strtoupper($ExamineesAnswerData['answer'])){
                  			if(strtoupper($row['_answer'])=='TRUE'){
                  				$choices .=  '<div class="alert alert-success"><b>TRUE</b></div>
											 <div class="alert alert-normal"><b>FALSE</b></div>
											';
							}else if(strtoupper($row['_answer'])=='FALSE'){
								$choices .=  '<div class="alert alert-normal"><b>TRUE</b></div>
											 <div class="alert alert-success"><b>FALSE</b></div>
											';
							}

							$Button='
									 <input type="hidden" name="ass_stat[]" value="1" id="ass_stat_'.$assessmentNumber.'">
									 <button class="btn btn-mini button_status btn-success button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
                  			
                  			$assessment_result_per_type['TF_Points'] += $ExamineesAnswerData['points'];
                  		}else{
                  			if(strtoupper($row['_answer'])=='TRUE'){
                  				$choices .=  '<div class="alert alert-success"><b>TRUE</b></div>
											 <div class="alert alert-error"><b>FALSE</b></div>
											';
							}else if(strtoupper($row['_answer'])=='FALSE'){
								$choices .=  '<div class="alert alert-error"><b>TRUE</b></div>
											 <div class="alert alert-success"><b>FALSE</b></div>
											';
							}
							$Button='
									 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
									 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
                            		 <button class="btn btn-mini button_status btn-danger button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
                  		}
                  	}else if($row['_type']=='f_b'){

                  			

                  		    $assessment_result_per_type['FB_Total_Numb']++;
                  			$choices = '<div class="alert">
                  						'.$ExamineesAnswerData['answer'].'
                  						</div>';

                  			if(sizeof($ExamineesAnswerData)>1){
                  				$assessment_result_per_type['FB_answered']++;
                  			}else{
                  				$choices =  '<div class="alert alert-danger"><b>No Answer</b></div>';
                  			}

                  			if($ExamineesAnswerData['status']!='NULL'){
                  				if($ExamineesAnswerData['status']==1){
                  				$assessment_result_per_type['FB_Points'] += $ExamineesAnswerData['points'];
                  				$Button='
									 <input type="hidden" name="ass_stat[]" value="1" id="ass_stat_'.$assessmentNumber.'">
									 <button class="btn btn-mini button_status btn-success button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
	                  			}else{
	                  				$Button='
										 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
										 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
	                            		 <button class="btn btn-mini button_status btn-danger button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
	                  			}
                  			}else{
                  				$Button='
										 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
										 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
	                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
                  			}
                  			
                  	}else if($row['_type']=='essay'){

                  			

                  			$assessment_result_per_type['ESSAY_Total_Numb']++;
                  			$choices = '<div class="alert">
                  						'.$ExamineesAnswerData['answer'].'
                  						</div>';

                  			if(sizeof($ExamineesAnswerData)>1){
                  				$assessment_result_per_type['ESSAY_answered']++;
                  			}else{
                  				$choices =  '<div class="alert alert-danger"><b>No Answer</b></div>';
                  			}

                  			if($ExamineesAnswerData['status']!='NULL'){
                  				if($ExamineesAnswerData['status']==1){
                  				$assessment_result_per_type['ESSAY_Points'] += $ExamineesAnswerData['points'];
                  				$Button='
									 <input type="hidden" name="ass_stat[]" value="1" id="ass_stat_'.$assessmentNumber.'">
									 <button class="btn btn-mini button_status btn-success button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
	                  			}else{
	                  				$Button='
										 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
										 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
	                            		 <button class="btn btn-mini button_status btn-danger button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
	                  			}
                  			}else{
                  				$Button='
										 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
										 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
	                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
                  			}
                  	}else if($row['_type']=='activity'){

                  			

                  			$assessment_result_per_type['ACTIVITY_Total_Numb']++;
                  			$dir = "student/uploader_asset/php/uploads";
                  			$files = scandir($dir);

                  			$CONTENT['val'] = "";
                  			$NumberofFile = 0;
                  			foreach ($files as $value) {
                  				if(strpos($value, '-') !== false){
                  					$file_id = explode('-',$value);
                  					
                  					if(strpos($value, '-') !== false){
	                  					$file_meta = explode('(',$file_id[1]);
	                  				}else{
	                  					$file_meta = $file_id[1];
	                  				}

	                  				if(strpos($value, '.') !== false){
	                  					$Final_file_meta = explode('.',$file_meta[0]);
	                  				}else{
	                  					$Final_file_meta = $file_id[0];
	                  				}

	                  				if($file_id[0]==$assessment_examinees_info['_student_id'] && $Final_file_meta[0]==$row['meta_id']){
	                  					$NumberofFile++;

	                  					$GetStudentInfo = mysql_query("SELECT * FROM accounts where  _account_id='".$assessment_examinees_info['_student_id']."'",$con);
                  						$GetStudentInfoData = mysql_fetch_assoc($GetStudentInfo);
	                  					$asName = $GetStudentInfoData['_fn']." ".$GetStudentInfoData['_sn']."-".($assessmentNumber+1);
	                  					$choices .= '<a class="btn btn-success" href="download.php?name='.$value.'&asname='.$asName.' ">FILE '.$NumberofFile.'</a> ';
	                  				}
                  				}
                  				
                  			}
                  			if(sizeof($ExamineesAnswerData)>1){
                  				$assessment_result_per_type['ACTIVITY_answered']++;
                  			}else{
                  				$choices =  '<div class="alert alert-danger"><b>No Answer</b></div>';
                  			}
                  			if($ExamineesAnswerData['status']!='NULL'){
                  				if($ExamineesAnswerData['status']==1){
                  				$assessment_result_per_type['ACTIVITY_Points'] += $ExamineesAnswerData['points'];
                  				$Button='
									 <input type="hidden" name="ass_stat[]" value="1" id="ass_stat_'.$assessmentNumber.'">
									 <button class="btn btn-mini button_status btn-success button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
	                  			}else{
	                  				$Button='
										 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
										 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
	                            		 <button class="btn btn-mini button_status btn-danger button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
	                  			}
                  			}else{
                  				$Button='
										 <input type="hidden" name="ass_stat[]" value="0" id="ass_stat_'.$assessmentNumber.'">
										 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$row['meta_id'].'" data-id="'.$assessmentNumber.'" data-button="1"><i class="icon-ok"></i> Right</button>
	                            		 <button class="btn btn-mini button_status button_status_'.$assessmentNumber.'" id="" data-questionnumber="'.$ExamineesAnswerData['question_meta_id'].'" data-id="'.$assessmentNumber.'" data-button="0"><i class="icon-remove"></i> Wrong</button>';
                  			}
                  			
                  			}



                  $CONTENT['QuestionAndAnswer'] .= '<li>
                          <p class="question">
                            '.$row['_question'].'
                          </p>
                          <p class="answer_label">
                            <label class="">ANSWER:</label>
                            '.$choices.'
                          </p>

                          <div class="remarks">
                          <p>
                            <input type="hidden" name="ass_id[]" value="'.$row['meta_id'].'">

                            '.
                            $Button
                            .'
                            
                            <button class="btn btn-mini white_remarks pull-right" id="button_remarks_'.$assessmentNumber.'" data-remarksnumber="'.$assessmentNumber.'">Write Remarks</button>
                            <button class="btn btn-mini score pull-right" data-scoreid="'.$assessmentNumber.'">Score</button> 
                          </p>
                           
                           <input type="hidden" name="q_a_'.$assessmentNumber.'">
                         
                           <textarea class="span12 hide remarks_" name="remarks_'.$assessmentNumber.'" id="remarks_'.$assessmentNumber.'" placeholder="Write Remarks">'.$ExamineesAnswerData['remarks'].'</textarea>
                          
                           <input type="text" name="score_'.$assessmentNumber.'" class="hide span4 score_" id="score_'.$assessmentNumber.'" value="'.($ExamineesAnswerData['points']<1 ? "" : $ExamineesAnswerData['points']).'" placeholder="Points">
                           
                          </div>
                        </li>'; 

                        $assessmentNumber++;
                  } 

                  	$seconds = strtotime($assessment_status['meta_date_ended']) - strtotime($assessment_status['meta_date_started']);

					$days    = floor($seconds / 86400);
					$hours   = floor(($seconds - ($days * 86400)) / 3600);
					$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
					$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));

					$TotalSpentTime = "Days: ".$days." Hours: ".$hours." Minutes: ".$minutes." Seconds: ".$seconds;

					$student_info_result = mysql_query("SELECT * FROM accounts where _account_id='".$assessment_examinees_info['_student_id']."' ",$con);
                	$student_info = mysql_fetch_assoc($student_info_result);
				

                    $CONTENT['assessment_header'] = '<table class="table table-bordered table-invoice">
									                  <tbody>
									                    <tr>
									                      <th colspan="2" class="width30 bg_lg text-center">Student Details</th>
									                    </tr>
									                    <tr>
									                    </tr><tr>
									                      <td class="width30" width="30%">Name:</td>
									                      <td class="width70" width="70%"><strong>'.ucfirst($student_info['_sn']).', '.ucfirst($student_info['_fn']).' '.ucfirst($student_info['_mn'][0]).'</strong>
									                          
									                      </td>
									                    </tr>
									                    <tr>
									                      <td>Student ID:</td>
									                      <td><strong>'.$student_info['_personal_id'].'</strong>
									                      </td>
									                    </tr>
									                    <tr>
									                      <td>Email Address:</td>
									                      <td><strong>'.$student_info['_email'].'</strong>
									                    </tr>
									                    <tr>
									                      <td colspan="2">
									                       <a href="student.php?stdid='.$assessment_examinees_info['_student_id'].'" class="btn btn-mini">View Info</a> 
									                       <a href="#" class="btn btn-mini">Message</a> 
									                       <a href="#" class="btn btn-mini">Sms</a>
									                       <a href="#" class="btn btn-mini">Email</a>
									                      </td>
									                    </tr>
									                   </tbody>
									                </table>

									                <div class="AssessmentResult_View"> 
									                <table class="table "> 
									                  <tbody>
									                    <tr> 
									                    <td class="text-left">Assessment Name</td> 
									                    <th class="text-left">'.$assessment_info['_assessment_name'].'</th>
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">Duration</td> 
									                    <th class="text-left">'.$assessment_examinees_info['_duration'].'mins</th>
									                    </tr> 
									                    <tr> 
									                    <td class="text-left"></td>
									                    <td class="text-left"></td> 
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">Start Date Time</td> 
									                    <th class="text-left">'.($assessment_status['meta_date_started'] != NULL ?  date("F j, Y, g:i a",strtotime($assessment_status['meta_date_started'])) : "---").'</th>
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">End Date Time</td> 
									                    <th class="text-left">'.($assessment_status['meta_date_ended'] != NULL ?  date("F j, Y, g:i a",strtotime($assessment_status['meta_date_ended'])) : "---").'</th>
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">Total Spent Time</td> 
									                    <th class="text-left">'.($assessment_status['meta_date_ended'] != NULL ?  $TotalSpentTime : "---").'</th>
									                    </tr> 
									                  </tbody>
									                </table> 
												</div>';
				  				 $examPreresult = '<table class="table "> 
									                  <tbody>
									                    <tr> 
									                    <th class="text-left bg_ly">Type of Assessment </th>
									                    <th class="text-center bg_ly">Total Answered </th>
									                    <th class="text-center bg_ly">Total Score </th>
									                    <th class="text-center bg_ly">Total Question </th>
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">Multiple Choice</td> 
									                    <td class="text-center">'.$assessment_result_per_type['MC_answered'].'</td> 
									                    <td class="text-center">'.$assessment_result_per_type['MC_Points'].'</td> 
									                    <td class="text-center">'.$assessment_result_per_type['MC_Total_Numb'].'</td> 
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">True or False</td> 
									                    <td class="text-center">'.$assessment_result_per_type['TF_answered'].'</td> 
									                    <td class="text-center">'.$assessment_result_per_type['TF_Points'].'</td> 
									                    <td class="text-center">'.$assessment_result_per_type['TF_Total_Numb'].'</td> 
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">Fill in the blank</td> 
									                    <td class="text-center">'.$assessment_result_per_type['FB_answered'].'</td> 
									                    '.(
									                    	$ExamineesAnswerData['status'] == 'NULL' ?
									                    	'<td class="text-center bg_lo">UNCHECK</td> ' : '<td class="text-center">'.$assessment_result_per_type['FB_Points'].'</td> '
									                    ).'
									                    <td class="text-center">'.$assessment_result_per_type['FB_Total_Numb'].'</td> 
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">Essay</td> 
									                    <td class="text-center">'.$assessment_result_per_type['ESSAY_answered'].'</td> 
									                    '.(
									                    	$ExamineesAnswerData['status'] == 'NULL' ?
									                    	'<td class="text-center bg_lo">UNCHECK</td> ' : '<td class="text-center">'.$assessment_result_per_type['ESSAY_Points'].'</td> '
									                    ).'
									                    <td class="text-center">'.$assessment_result_per_type['ESSAY_Total_Numb'].'</td> 
									                    </tr> 
									                    <tr> 
									                    <td class="text-left">Activity</td> 
									                    <td class="text-center">'.$assessment_result_per_type['ACTIVITY_answered'].'</td> 
									                    '.(
									                    	$ExamineesAnswerData['status'] == 'NULL' ?
									                    	'<td class="text-center bg_lo">UNCHECK</td> ' : '<td class="text-center">'.$assessment_result_per_type['ACTIVITY_Points'].'</td> '
									                    ).'
									                    <td class="text-center">'.$assessment_result_per_type['ACTIVITY_Total_Numb'].'</td> 
									                    </tr> 
									                    <tr> 
									                    <th class="text-left bg_low_lg">
									                    <b>Total:</b> 
									                    </th>
									                    <th class="text-center bg_low_lg">
									                    '.(
									                    	$assessment_result_per_type['MC_answered'] + 
									                    	$assessment_result_per_type['TF_answered'] + 
									                    	$assessment_result_per_type['FB_answered'] + 
									                    	$assessment_result_per_type['ESSAY_answered'] + 
									                    	$assessment_result_per_type['ACTIVITY_answered']
									                    ).'</th>
									                    <th class="text-center bg_low_lg">
									                    '.(
									                    	$assessment_result_per_type['MC_Points'] + 
									                    	$assessment_result_per_type['TF_Points'] + 
									                    	$assessment_result_per_type['FB_Points'] + 
									                    	$assessment_result_per_type['ESSAY_Points'] + 
									                    	$assessment_result_per_type['ACTIVITY_Points']
									                    ).'
									                    </th>
									                    <th class="text-center bg_low_lg">
									                    '.(
									                    	$assessment_result_per_type['MC_Total_Numb'] + 
									                    	$assessment_result_per_type['TF_Total_Numb'] + 
									                    	$assessment_result_per_type['FB_Total_Numb'] + 
									                    	$assessment_result_per_type['ESSAY_Total_Numb'] + 
									                    	$assessment_result_per_type['ACTIVITY_Total_Numb']
									                    ).'</th>
									                    </tr> 
									                  </tbody>
									                </table>';
                   $CONTENT['examinees_result'] = $examineesResult;
                  // print_r($CONTENT);
                   if(mysql_num_rows($assessment_status_result)>0){
                   	$CONTENT['data_html'] = '<div class="row-fluid">
                   							'.$CONTENT['assessment_header']. $examPreresult.'
           									</div>
								            	<button class="btn btn-success" id="showhideAssessment">Show Assessment</button>
								            <hr/>

								            <div class="question_and_answer">
									            
								              <ul id="question_and_answer_list" class="hide">
								              '.$CONTENT['QuestionAndAnswer'].'
								              </ul>

								              <hr/>
								            <div class="question_and_answer_footer text-right">
								              <input type="submit" value="Save" id="question_and_answer_submit" class="btn btn-success"> 
								              <input type="submit" value="Reset" id="question_and_answer_reset" class="btn btn-danger">
								              <input type="submit" value="Remove Examinees" class="btn btn-danger pull-left">
								            </div>
								            </div>';
                   }else{
                   	$CONTENT['data_html'] = '<div class="row-fluid">
                   							'.$CONTENT['assessment_header'].'
           									</div>
           									<div class="question_and_answer">
									           
								            <div class="question_and_answer_footer text-right">
								              <input type="submit" value="Remove Examinees" class="btn btn-danger pull-left">

								              <hr>
								            </div>
								            </div>
								            ';
                   }
                   
                  

                  echo json_encode($CONTENT);
}

function GetAssessmentMeta($id){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		
		return mysql_query("SELECT * FROM assessment_meta where assessment_id = '".$id."'",$con);
	}

function SubmitSelectedExaminees($data){
		
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

		$errors = 0;
		foreach ($data as $value) {

			if($r=mysql_query("UPDATE assessment_examinies_metadata_answer SET 
			status='".$value['answer_status']."',
			remarks='".$value['remarks']."',
			points='".$value['points']."',
			date_submitted = NOW()
			where question_meta_id = '".$value['question_id']."'",$con))
			{	
				
			}else{
				ErrorMysqlLogs($con);
				$errors++;
			}

		}

		if($errors < 1){
			return true;
			die();
		}else{
			return false;
			die();
		}
}

function GetCourseForGradebook(){
	include 'db_init.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
	
	$result = mysql_query("SELECT * FROM subjects where _owners_id = '".$userID."'  AND NOT EXISTS ( Select * FROM gradebook where gradebook_owner= '".$userID."' AND _id = course_id )",$con);
	$content = "";
	while($row=mysql_fetch_assoc($result)){ 
	 	$content .= "<option value='".$row['_id']."''>".$row['_code']."</option>"; 
	}

	return $content;
}

function GetCourseAndStudent(){
	include 'db_init.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
	
	$result = mysql_query("SELECT * FROM subjects where _owners_id = '".$userID."'",$con);
	$content = array();
	$x = 0;
	$i = 0;
	while($row=mysql_fetch_assoc($result)){ 
	 	$content['subject'][$x] = $row['_code']." - ".$row['_name']; 

	 	// $arrayStudent = array();
	 	// $arrayStudent['subject'] = $row['_name'];
	 	// $numberOfStudent = 0;

	 	// $result_ = mysql_query("SELECT * FROM students where _subject_id = '".$row['_id']."'",$con);
	 	// while($rowStudent = mysql_fetch_assoc($result_)){ 
	 	// 		$result_student = mysql_query("SELECT * FROM accounts where _account_id = '".$rowStudent['_student_id']."'",$con);
			// 	$student_info = mysql_fetch_assoc($result_student);
	 	// 	$arrayStudent['student'][$numberOfStudent] =  $student_info['_fn']." ".$student_info['_sn']." / ".$row['_name'];
	 	// 	$numberOfStudent++;
	 	// }
	 	// if($numberOfStudent>0){
	 	// 	$content['studentSubject'][$x] = $arrayStudent;
	 	// }

	 	$result_ = mysql_query("SELECT * FROM students where _subject_id = '".$row['_id']."'",$con);
	 	while($rowStudent = mysql_fetch_assoc($result_)){ 
	 			$result_student = mysql_query("SELECT * FROM accounts where _account_id = '".$rowStudent['_student_id']."'",$con);
				$student_info = mysql_fetch_assoc($result_student);

	 		$content['student'][$i] =  $student_info['_fn']." ".$student_info['_sn']." / ".$row['_name'];
	 		$i++;
	 	}
	 	// if($numberOfStudent>0){
	 	// 	$content['studentSubject'][$x] = $arrayStudent;
	 	// }
	 	

	 	WriteLog($content,'rw',true);
	 	$x++;
	}

	// $result = mysql_query("SELECT * FROM students INNER JOIN subjects ON subjects._id = students._subject_id where subjects._owners_id = '".$userID."'",$con);
	
	// $x = 0;
	// while($row=mysql_fetch_assoc($result)){ 

	// 	$result_student = mysql_query("SELECT * FROM accounts where _account_id = '".$row['_student_id']."'",$con);
	// 	$student_info = mysql_fetch_assoc($result_student);
	//  	$content['student'][$x] = $student_info['_fn']." ".$student_info['_sn']; 
	//  	$x++;
	// }


	echo json_encode($content);
	die();
}

function GetCourseForLearningMaterials($post){
	include 'db_init.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$material_id = $post['material_id'];
	
	$result = mysql_query("SELECT * FROM subjects where _owners_id = '".$userID."' AND NOT EXISTS ( Select * FROM learning_materials_access where learning_materials_access.subject_id = subjects._id and learning_materials_access._material_id = '".$material_id."')",$con);
	$content = "";
	while($row=mysql_fetch_assoc($result)){ 
	 	$content .= "<option value='".$row['_id']."''>".$row['_code']."</option>"; 
	}

	return $content;
}

function GetLearningMaterialsAccess($post){
	include 'db_init.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
	
	$material_id = $post['material_id'];

	// $result = mysql_query("
	// 	SELECT * FROM learning_materials_access 
	// 	INNER JOIN subject
	// 	ON 
	// 	learning_materials_access.subject_id = subject._id
	// 	where learning_materials_access.material_id = '".$material_id."'",$con);
	$result = mysql_query("
		SELECT * FROM learning_materials_access 
		INNER JOIN subjects
		ON 
		learning_materials_access.subject_id = subjects._id
		where learning_materials_access._material_id = '".$material_id."'",$con);
	$content = "";
	while($row=mysql_fetch_assoc($result)){ 
	 	$content .= '<tr class="gradeX">
                              <td><b>'.$row['_name'].'</b></td>
                              <td><b>'.$row['date_submitted'].'</b></td>
                              <td class="center" width="10%"><a href="request_.php?material_id='.$row['_material_id'].'&subject_id='.$row['subject_id'].'&request_code=5322" data-id="'.$row['_id'].'" data-name="'.$row['_name'].'" class="btn btn-mini btn-danger view_child">Revoke</a></td>
                            </tr>'; 
	}

	echo $content;
}

function CreateGradebook($data){
	include 'db_init.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$courselist = $data['courselist'];
	$schoolyear = $data['schoolyear'];

	$PrelimPeriod = "";
	$MidtermPeriod = "";
	$FinalPeriod = "";

	$PrelimPeriod = $data['Prelim_start_date']." - ";
	if(isset($data['Prelim_start_date_checkbox'])){
		$PrelimPeriod .= "Present";
	}else{
		$PrelimPeriod .=  $data['Prelim_end_date'];
	}

	if(isset($data['Midterm_enable'])){
		$MidtermPeriod = $data['Midterm_start_date']." - ";
		if(isset($data['Midterm_end_date_checkbox'])){
			$MidtermPeriod .= "Present";
		}else{
			$MidtermPeriod .=  $data['Midterm_end_date'];
		}
	}else{
		$MidtermPeriod =  "NOT AVAILABLE";
	}

	if(isset($data['Final_enable'])){
		$FinalPeriod = $data['Final_start_date']." - ";
		if(isset($data['Final_end_date_checkbox'])){
			$FinalPeriod .= "Present";
		}else{
			$FinalPeriod .=  $data['Final_end_date_'];
		}
	}else{
		$FinalPeriod =  "NOT AVAILABLE";
	}

	$content = "";
	$content .= "\n".print_r($courselist);
	$content .= "\n".$schoolyear;
	$content .= "\n".$PrelimPeriod;
	$content .= "\n".$MidtermPeriod;
	$content .= "\n".$FinalPeriod;

	$req_dump = print_r($content, TRUE);
	    $fp = fopen('request.log', 'a');
	    fwrite($fp, $req_dump);
	    fclose($fp);
	 
	 $generatedID = GenerateString(25);   
	 foreach ($courselist as $value) {
	 	if($r=mysql_query("INSERT INTO  gradebook (
        	gradebook_generated_id,
        	gradebook_owner,
        	course_id,
        	school_year,
        	prelim_span,
        	midterm_span,
        	final_span,
        	date_created
        	)
            values (
            '$generatedID',
            '$userID',
            '$value',
            '$schoolyear',
            '$PrelimPeriod',
            '$MidtermPeriod',
            '$FinalPeriod',
            NOW()
        )",$con))
        {
            echo 200;
        }else{
        	echo 500;
        }
	 }
	

}

function Concat($content,$limitString){
	return substr($content, 0, $limitString) . '...';
}
function QueryGradebook($data){


	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$GradeBookMeta = getGradebookMetaID($data['gradebook'],$data['SelectedActivity']);
	if(mysql_num_rows($GradeBookMeta)>0){
		// Get all data

		FetchGradebookRecord(mysql_fetch_assoc($GradeBookMeta)['meta_id']);
		
	}else{
		//Create New Meta

		$Generate_ID = "PARENT-".GenerateString(4).time();
		$GradeBookResult = mysql_query("SELECT * FROM gradebook INNER JOIN subjects ON gradebook.course_id = subjects._id where gradebook.gradebook_id = '".$data['gradebook']."'",$con);
		$GradeBookResultDATA = mysql_fetch_assoc($GradeBookResult);

		InsertGradebookMeta($Generate_ID,'subject_id',$GradeBookResultDATA['_id'],$data['SelectedActivity']);
		InsertGradebookMeta($Generate_ID,'owner_id',$userID,'NULL');
		InsertGradebookMeta($Generate_ID,'gradebook_id',$data['gradebook'],$data['SelectedActivity']);


		$StudentsResult = mysql_query("SELECT * FROM students LEFT JOIN accounts ON students._student_id = accounts._account_id where students._subject_id='".$GradeBookResultDATA['_id']."'",$con);
		$x= 0;
		while ($stud = mysql_fetch_assoc($StudentsResult)) {
			$Child_ID = "CHILD-".GenerateString(4).time()."-".$x;
			InsertGradebookMeta($Generate_ID,'student_id',$stud['_account_id'],$Child_ID);
			$x++;
		}

		FetchGradebookRecord($Generate_ID);
	}

	

	
	// $DATARESULT = array();

	// $GradeBookResult = mysql_query("SELECT * FROM gradebook INNER JOIN subjects ON gradebook.course_id = subjects._id where gradebook.gradebook_id = '".$data['course']."'",$con);
	// $GradeBookResultDATA = mysql_fetch_assoc($GradeBookResult);

	// $DATARESULT['gradebook'] = $GradeBookResultDATA;
	// $StudentsResult = mysql_query("SELECT * FROM students LEFT JOIN accounts ON students._student_id = accounts._account_id where students._subject_id='".$GradeBookResultDATA['_id']."'",$con);
	// $x = 0;
	// while ($stud = mysql_fetch_assoc($StudentsResult)) {
	// 	$DATARESULT['students'][$x] = $stud;
	// 	$x++;
	// }

	// $InstructorResultData = mysql_query("SELECT * FROM accounts where _account_id='".$userID."' ",$con);
	// $DATARESULT['instructor'] =  mysql_fetch_assoc($InstructorResultData);



	// return json_encode($DATARESULT);
}

function FetchGradebookRecord($meta_id){
	include 'db_init.php';
	$DATARESULT = array();
	$GRADEBOOK = array();

	$DATARESULT['Meta_ID'] = $meta_id;

	$fetchGradeBook = mysql_query("SELECT * FROM gradebook_meta where meta_id='".$meta_id."'",$con);
	$numberOfStudent = 0;
	while($gradebook = mysql_fetch_assoc($fetchGradeBook)){
		if( $gradebook['meta_key'] == 'student_id' ){
			$GRADEBOOK['student'][$numberOfStudent]['ID'] = $gradebook['meta_value'];
			$GRADEBOOK['student'][$numberOfStudent]['CHILD_ID'] = $gradebook['meta_extra'];
			$numberOfStudent++;
		}else{
			$GRADEBOOK[$gradebook['meta_key']]['meta_value'] = $gradebook['meta_value'];
			$GRADEBOOK[$gradebook['meta_key']]['meta_extra'] = $gradebook['meta_extra'];
		}

	}
	$numberOfStudent = 0;
	foreach ($GRADEBOOK['student'] as $value) {
		$FETCH_student_info = mysql_query("SELECT * FROM accounts INNER JOIN gradebook_meta ON accounts._account_id = gradebook_meta.meta_value where accounts._account_id='".$value['ID']."' and gradebook_meta.meta_id='".$meta_id."'",$con);
		$Student_info = mysql_fetch_assoc($FETCH_student_info);
		$DATARESULT['students'][$numberOfStudent]['name'] = $Student_info['_sn'].", ".$Student_info['_fn'];
		$DATARESULT['students'][$numberOfStudent]['ID'] = $Student_info['_account_id'];
		$DATARESULT['students'][$numberOfStudent]['meta_extra'] = $Student_info['meta_extra'];

		$fetchStudentScore = mysql_query("SELECT * FROM gradebook_meta where meta_key='column_val' and meta_id='".$Student_info['meta_extra']."'",$con);
		$scoreColumn = 0;
		while($score = mysql_fetch_assoc($fetchStudentScore)){
			$DATARESULT['score'][$numberOfStudent][$scoreColumn] = $score['meta_value'];
			$scoreColumn++;
		}

		$numberOfStudent++;
	}

	$fetchGradeBookHeader = mysql_query("SELECT * FROM gradebook_meta where meta_id='".$meta_id."' and meta_key='column_total_val'",$con);
	$index = 0;
	while($GradeBookHeader = mysql_fetch_assoc($fetchGradeBookHeader)){
		$DATARESULT['columnHeader'][$index] = $GradeBookHeader;
		$index++;
	}


	$GradeBookResult = mysql_query("SELECT * FROM gradebook INNER JOIN subjects ON gradebook.course_id = subjects._id where gradebook.gradebook_id = '".$GRADEBOOK['gradebook_id']['meta_value']."'",$con);
	$DATARESULT['gradebook'] = mysql_fetch_assoc($GradeBookResult);


	echo json_encode($DATARESULT);
	
}

function getGradebookMetaID($courseID,$SelectedActivity){
	include 'db_init.php';
	return mysql_query("SELECT * FROM gradebook_meta where meta_key='gradebook_id' and meta_value ='".$courseID."' and meta_extra ='".$SelectedActivity."'",$con);
}

function InsertGradebookMeta($meta_id,$meta_key,$meta_value,$meta_extra){
	include 'db_init.php';
	if($r=mysql_query("INSERT INTO  gradebook_meta (
        	meta_id,
        	meta_key,
        	meta_value,
        	meta_extra,
        	_datetime
        	)
            values (
            '$meta_id',
            '$meta_key',
            '$meta_value',
            '$meta_extra',
            NOW()
        )",$con))
        {
            return 200;
        }else{
        	return 500;
        }
}

Function RemoveGradeBookMeta($meta_id,$meta_key){
	include 'db_init.php';
	if($r=mysql_query("DELETE FROM gradebook_meta WHERE meta_id='".$meta_id."' and meta_key='".$meta_key."'",$con))
        {
            return 200;
        }else{
        	return 500;
        }
}

function UpdateGradebookRecord($record){

	
	
	include 'db_init.php';
	// Decleration of value

	$studentList 	= $record['students'];
	$gradebookInfo 	= $record['gradebook'];
	$StudentValue 	= $record['value'];
	$MetaID 		= $record['Meta_ID'];

	// -------END-------

	// Check if gradebook exist
	$fetchGradeBook = mysql_query("SELECT * FROM gradebook where gradebook_id='".$gradebookInfo['gradebook_id']."'",$con);

	if(mysql_num_rows($fetchGradeBook)<1){
		// Gradebook not found
		return 404;
	}

	// Remove existing column header value
	RemoveGradeBookMeta($MetaID,'column_total_val');

	foreach ($StudentValue as $column_value) {

			$column_ID 		= $column_value['ID'];
			$column_Total 	= $column_value['total'];

			// Insert new header value for this gradebook
			InsertGradebookMeta($MetaID,'column_total_val',$column_Total,$column_ID);

	}

	$index = 0;
	foreach ($studentList as $student) {

		$studentID 			= $student['ID'];
		$studentExtraID 	= $student['meta_extra'];

		RemoveGradeBookMeta($studentExtraID,'column_val');
		foreach ($StudentValue as $column_value) {
			$studentValue 	= $column_value['scores'][$index];
			$column_ID 		= $column_value['ID'];
			// Insert new value for every student
			InsertGradebookMeta($studentExtraID,'column_val',$studentValue,$column_ID);


		}

		$index++;
	}


	
}
function ErrorMysqlLogs($con){

	$message = date("F j, Y, g:i a")+"=> "+mysql_errno($con) . ": " . mysql_error($con) . "\n";

	    $fp = fopen('error.log', 'a');
	    fwrite($fp, $message);
	    fclose($fp);
}
function SendComposeMessage($POST){
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

		mysql_query("UPDATE messages SET status='1' where _id='".$id."'",$con);
		

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
		        	mysql_query("UPDATE messages SET status='0' where _id_generated='".$reply_id."' OR _reply_id = '".$reply_id."'",$con);
		         echo 200;  
		        }else{
		         echo 500;
		        }
}

function addSheetToGroup($POST){

				$WSName = $POST['name'];
				$WSDescription = $POST['description'];
				//$WSFilerID = $POST['filerID'];
				$WSParent = $POST['worksheetParent'];
				$WSFilenames = $POST['fileId'];
				$WSFiletype = $POST['fileId_type'];

				include 'db_init.php';
				$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
				
				for($x = 0; $x < count($WSFilenames); $x++){
					$filename = $WSFilenames[$x];
					$filetype = $WSFiletype[$x];

					mysql_query("INSERT INTO  worksheet_meta (
			        	_account_id,
			        	_parent_id,
			        	_name,
			        	_description,
			        	_files,
			        	_file_type,
			        	status,
			        	_date
			        	)
			            values (
			            '$userID',
			            '$WSParent',
			            '$WSName',
			            '$WSDescription',
			            '$filename',
			            '$filetype',
			            'VISIBLE',
			            NOW()
			            
			        )",$con);	
			    }	        

				header("location:worksheet.php");
			}
function addWorkSheetGroup($POST){

				$WSName = $POST['name'];

				include 'db_init.php';
				$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

				if($r=mysql_query("INSERT INTO  worksheet (
		        	_account_id,
		        	_name,
		        	_date
		        	)
		            values (
		            '$userID',
		            '$WSName',
		            NOW()
		            
		        )",$con))
		        {

				}

				header("location:worksheet.php");
			}

function GetSheetFromGroup($id){
	include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		$WorksheetList = mysql_query("SELECT * FROM worksheet_meta where _account_id = '".$userID."' and _parent_id='".$id."'",$con);

		$content = "";
		while ($value = mysql_fetch_assoc($WorksheetList)) {
                $content .= '<tr class="gradeX">
                              <td><b>'.$value['_name'].'</b></td>
                              <td class="center" width="10%"><button class="btn btn-mini btn-success selectedSheet" data-id="'.$value['_id'].'"  data-name="'.$value['_name'].'" data-description="'.$value['_description'].'"><i class="icon-chevron-right"></i></button></td>
                            </tr>';
                   
                    }
        echo $content;
}
function AddAccessToSheet($post){

				include 'db_init.php';
				$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

				$dateStartAndTime	= date('Y-m-d H:i:s',strtotime($post['date_start']." ".$post['time_start']));
				$dateEndAndTime		= date('Y-m-d H:i:s',strtotime($post['date_end']." ".$post['time_end']));

				$worksheetID = $post['worksheetID'];

				$Studentlist = $post['studentlist'];
				foreach ($Studentlist as $key) {
					$valueSplit = explode('/', $key);
					if($valueSplit[0] == 'subject'){

						$fetchStudentList = mysql_query("SELECT * FROM students where _subject_id='".$valueSplit[1]."'",$con);
			
						while($student = mysql_fetch_assoc($fetchStudentList)){

							$StudentID = $student['_student_id'];
							$SubjectID = $valueSplit[1];
							if($r=mysql_query("INSERT INTO  worksheet_access (
					        	_account_id,
					        	_student_id,
					        	_student_enrolled,
					        	_sheet_id,
					        	_date_time_start,
					        	_date_time_end,
					        	date_submitted
					        	)
					            values (
					            '$userID',
					            '$StudentID',
					            '$SubjectID',
					            '$worksheetID',
					            '$dateStartAndTime',
					            '$dateEndAndTime',
					            NOW()
					            
					        )",$con))
					        {

							}
							ErrorMysqlLogs($con);
						}

					}else if($valueSplit[0] == 'student'){
						$fetchStudentList = mysql_query("SELECT * FROM students where _id='".$valueSplit[1]."'",$con);
						$accountName = mysql_fetch_assoc($fetchStudentList);


						$StudentID = $accountName['_student_id'];
						$SubjectID = $accountName['_subject_id'];

							if($r=mysql_query("INSERT INTO  worksheet_access (
					        	_account_id,
					        	_student_id,
					        	_student_enrolled,
					        	_sheet_id,
					        	_date_time_start,
					        	_date_time_end,
					        	date_submitted
					        	)
					            values (
					            '$userID',
					            '$StudentID',
					            '$SubjectID',
					            '$worksheetID',
					            '$dateStartAndTime',
					            '$dateEndAndTime',
					            NOW()
					            
					        )",$con))
					        {

							}

							ErrorMysqlLogs($con);
					}
				}

				header("location:worksheet_manage.php");
}
function GetAccessToSheet($id){
		include 'db_init.php';
		$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
		$WorksheetList = mysql_query("SELECT * FROM worksheet_access INNER JOIN accounts ON accounts._account_id = worksheet_access._student_id where worksheet_access._sheet_id = '".$id."' and worksheet_access._account_id='".$userID."'",$con);

		$content = "";
		while ($value = mysql_fetch_assoc($WorksheetList)) {

				$fetchSubjectEnrolled = mysql_query("SELECT * FROM subjects where _id='".$value['_student_enrolled']."'",$con);
				$SubjectEnrolled = mysql_fetch_assoc($fetchSubjectEnrolled);

                $content .= '<tr class="gradeX">
                              <td><b>'.$value['_sn'].', '.$value['_fn'].'</b></td>
                              <td>'.$SubjectEnrolled['_code'].'</td>
                              <td class="center" width="10%"><button class="btn btn-mini btn-success selectedSheet" data-id="'.$value['_id'].'"  data-name="'.$value['_fn'].'">View</button></td>
                            </tr>';
                   
                    }
        echo $content;
}

function ShareLearningMaterials($post){

	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$ShareID = $post['ShareLearningMaterialsList'];
	$Material_id = $post['material_id'];

	foreach ($ShareID as $value) {
		if($r=mysql_query("INSERT INTO  learning_materials_access (
		_material_id,
		subject_id,
		date_submitted
		)
		values (
		'$Material_id',
		'$value',
		NOW()			            
		)",$con))
		{
			echo "200";
		}
		ErrorMysqlLogs($con);
	}
	
}

function UpdateLearningMaterials($post){

	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$Material_id = $post['material_id'];
	$name = $post['name'];
	$description = $post['description'];

	if(mysql_query("UPDATE learning_materials SET _name='".$name."',_description='".$description."'  where _id='".$Material_id."' and _account_id='".$userID."'",$con)){
		echo "ok";
	}else{
		echo "bad";
	}
	
}

function RemoveLearningMaterials($get){

	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$Material_id = $get['material_id'];

	if($r=mysql_query("DELETE FROM learning_materials WHERE _account_id='".$userID."' and _id='".$Material_id."'",$con))
        {
            BackPage("learningmaterials.php","ok");
        }else{
        	BackPage("learningmaterials.php","192");
        }
	
}
function RemoveAccessLearningMaterials($get){
	
	include 'db_init.php';
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);

	$Material_id = $get['material_id'];
	$subject_id = $get['subject_id'];

	if($r=mysql_query("DELETE FROM learning_materials_access WHERE _material_id='".$Material_id."' and subject_id='".$subject_id."'",$con))
        {
            BackPage("learningmaterials.php","ok");
        }else{
        	BackPage("learningmaterials.php","192");
        }
}
function GetCalendarCourseAndStudent($post){
include 'db_init.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
	
	
	$result = mysql_query("
		SELECT * FROM  subjects where _owners_id ='".$userID."' ",$con);
	$content = array();

	$x = 0;
	while($row=mysql_fetch_assoc($result)){ 
	 	$content[$x]['key'] = $row['_id'];
	 	$content[$x]['label'] = "'".$row['_name']."'";
	}

	echo json_encode($content);
	die();
}


// ERROR CODE 
// # 192 = DELETING DATA 

?>


