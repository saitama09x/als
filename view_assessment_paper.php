<?php
include 'init_include.php';
	
	$userID = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
	$assessment_result = mysql_query("SELECT * FROM assessment where _id='".$_GET['id']."' and _account_id='".$userID."'",$con);
	$assessment_info = mysql_fetch_object($assessment_result);

	// MC Section
	$MCAssessment = "";
	$TFAssessment = "";
	$FBAssessment = "";
	$EssayAssessment = "";
	$ActivityAssessment = "";

	$content = "";
	$result = GetAssessmentMeta($_GET['id']); 
    while($row=mysql_fetch_assoc($result)){ 
    	if($row['_type']=='m_c'){
			$choices[] =  $row['_choice_a'];
	    	$choices[] =  $row['_choice_b'];
	    	$choices[] =  $row['_choice_c'];
	    	$choices[] =  $row['_choice_d'];

	    	shuffle($choices);
	    	$MCAssessment .= '<li>
									<p>
										'.$row['_question'].'
									</p>
									<div class="choices">
									<ul>
										<li>'.$choices[0].'</li>
										<li>'.$choices[1].'</li>
										<li>'.$choices[2].'</li>
										<li>'.$choices[3].'</li>
									</ul>
									</div>
								</li>';
    	}else if($row['_type']=='t_f'){
    		$TFAssessment .= '<li>
								<p> _________
									'.$row['_question'].'
								</p>
							 </li>';
    	}else if($row['_type']=='f_b'){
    		$question = str_replace("@BLANK","______________",$row['_question']);
    		$FBAssessment .= '<li>
								<p> 
									'.$question.'
								</p>
							 </li>';
    	}else if($row['_type']=='essay'){
    		$EssayAssessment .= '<li>
								<p> 
									'.$row['_question'].'
								</p>
							 </li>';
    	}else if($row['_type']=='activity'){
    		$ActivityAssessment .= '<li>
								<p> 
									'.$row['_question'].'
								</p>
							 </li>';
    	}

 //    	$MCAssessment = "";
	// $TFAssessment = "";
	// $FBAssessment = "";
	// $EssayAssessment = "";
	// $ActivityAssessment = "";
    	
    }

    	$content .= ($MCAssessment !=""?'<li>
						<h5 class="assessment_type">Multiple Choice</h5>
						<ul>
							'.$MCAssessment.'
						</ul>
					</li>':'');
  		
  		$content .= ($TFAssessment !=""?'<li>
						<h5 class="assessment_type">True or False</h5>
						<ul>
							'.$TFAssessment.'
						</ul>
					</li>':'');
  		$content .= ($FBAssessment !=""?'<li>
						<h5 class="assessment_type">Fill in the blank</h5>
						<ul>
							'.$FBAssessment.'
						</ul>
					</li>':'');
  		$content .= ($EssayAssessment !=""?'<li>
						<h5 class="assessment_type">Essay</h5>
						<ul>
							'.$EssayAssessment.'
						</ul>
					</li>':'');
  		$content .= ($ActivityAssessment !=""?'<li>
						<h5 class="assessment_type">Activity</h5>
						<ul>
							'.$ActivityAssessment.'
						</ul>
					</li>':'');

?>

<html>
	<head>
		<style type="text/css">
			/*.main {
			    padding: 30px 25%;
			}*/

			.header {
			    text-align: center;
			    font-size: 25px;
			    font-weight: 600;
			}
			.instruction {
			    /*line-height: 5px;*/
			    font-size: 16px;
			}
			.instruction p {
			    font-weight: 600;
			}
			ul.ass_type {
			    list-style-type: upper-roman;
			}
			.ass_type ul {
			    list-style-type: decimal;
			}
			.choices ul {
			    list-style-type: lower-alpha;
			}
			.choices li {
			    /*width: 50%;
			    float: left;*/
			}
		</style>
	</head>
	<body onload="window.print()">
		<div class="main">
			<div class="header"><?php echo $assessment_info->_assessment_name; ?></div>
			<div class="instruction">
				<p>Instruction:</p>
				<?php echo $assessment_info->message; ?>
			</div>
			<div class="assessment_body">
				<ul class="ass_type">
					
					<?php echo $content; ?>

				</ul>
				
			</div>
		</div>
	</body>
</html>