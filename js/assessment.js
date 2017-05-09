$( window ).load(function() {

	
	// Adding sections depending on the button clicked.
	$('.add_assessment_type').click(function(){
		var selectedButtonType = $(this).data('type');
		AddAssessmentSection(selectedButtonType);
	});

	$('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 30,
    dynamic: false,
    dropdown: true,
    scrollbar: false
});
	$('.duration').timepicker({
    timeFormat: 'h:mm:ss',
    minTime: '1',
    interval: 30,
    dynamic: false,
    dropdown: true,
    scrollbar: false
});

GetExaminiesList();
ViewStudentAssessmentInit();

});

function ShowHideAssessment(){
	$('#showhideAssessment').click(function(){
		$('#question_and_answer_list').toggle('slow');
	});


	$('#resizeWidht').toggle(function () {
		$( "#assessment_taker_list" ).hide();
			$("#assessment_selected_details").addClass("span11");
    	    $("#assessment_selected_details").removeClass("span6");
		
    	
		$(this).html(' <i class="icon-chevron-right"></i> ');
		$(this).attr('title','Minimize');
	}, function () {
		$( "#assessment_taker_list" ).show();
			$("#assessment_selected_details").removeClass("span11");
	    	$("#assessment_selected_details").addClass("span6");
		
	    $(this).html(' <i class="icon-chevron-left"></i> ');
	    $(this).attr('title','Full Width');
	});
	
	
	
}
function assessmentAction(){
	$('.lttr_chces').click(function(){
  	var selectedID = $(this).data('id');
  	console.log(selectedID);
  	// Release Selected Button
  	$('.lttr_chces_'+selectedID).removeClass('selected');

  	// Change the background color of the selected button
  	$(this).addClass('selected');
  	$('#answer_'+selectedID).val($(this).data('value'));
  });

  $('.true_false_btn').click(function(){
  	var selectedID = $(this).data('id');
  	$('#answer_'+selectedID).val($(this).data('value'));
  });

  $('.remove_question').click(function(){
  	var selectedID = $(this).data('id');
  	$('#assess_count_'+selectedID).remove();
  });
}

var numberOfAssessments = 0;

function AddAssessmentSection(type){
	if(type=='mc'){
		$( ".choices_btn_list" ).before('<div class="multiplechoice assessment " id="assess_count_'+numberOfAssessments+'"> <input type="hidden" name="assessment_type[]" value="m_c"> <input type="hidden" name="answer_id[]" value="'+numberOfAssessments+'"> <div class="question"> <label class="control-label"><b class="number remove_question" data-id="'+numberOfAssessments+'">Remove</b><span class="badge badge-success pull-right">Multiple Choice</span></label> <textarea class="span11" name="question[]" placeholder="Question"></textarea> </div> <div class="choices"> <input type="hidden" name="answer_'+numberOfAssessments+'" id="answer_'+numberOfAssessments+'"> <div class="letter_choices"> <button type=button class="btn lttr_chces lttr_chces_'+numberOfAssessments+'" data-id="'+numberOfAssessments+'" data-value="A">A</button> <input type="text" name="lttr_chces_'+numberOfAssessments+'[0]"> </div> <div class="letter_choices"> <button type=button class="btn lttr_chces lttr_chces_'+numberOfAssessments+'" data-id="'+numberOfAssessments+'" data-value="C">C</button> <input type="text" name="lttr_chces_'+numberOfAssessments+'[2]"> </div> <div class="letter_choices"> <button type=button class="btn lttr_chces lttr_chces_'+numberOfAssessments+'" data-id="'+numberOfAssessments+'" data-value="B">B</button> <input type="text" name="lttr_chces_'+numberOfAssessments+'[1]"> </div> <div class="letter_choices"> <button type=button class="btn lttr_chces lttr_chces_'+numberOfAssessments+'" data-id="'+numberOfAssessments+'" data-value="D">D</button> <input type="text" name="lttr_chces_'+numberOfAssessments+'[3]"> </div> </div> </div>');
		numberOfAssessments++;
	}else if(type=='tf'){
		$( ".choices_btn_list" ).before('<div class="true_false assessment" id="assess_count_'+numberOfAssessments+'"> <input type="hidden" name="assessment_type[]" value="t_f"> <input type="hidden" name="answer_id[]" value="'+numberOfAssessments+'"> <div class="question"> <label class="control-label"><b class="number remove_question" data-id="'+numberOfAssessments+'">Remove</b><span class="badge badge-info pull-right">True or False</span> </label> <textarea class="span11" name="question[]" placeholder="Question"></textarea> </div> <div class="choices"> <div class="controls"> <div data-toggle="buttons-radio" class="btn-group"> <input type="hidden" name="answer_'+numberOfAssessments+'" id="answer_'+numberOfAssessments+'"> <button class="btn true_false_btn" data-id="'+numberOfAssessments+'" data-value="true" type="button">TRUE</button> <button class="btn true_false_btn" data-id="'+numberOfAssessments+'" data-value="false" type="button">FALSE</button> </div> </div> </div> </div>');
		numberOfAssessments++;
	}else if(type=='fb'){
		$( ".choices_btn_list" ).before('<div class="true_false assessment " id="assess_count_'+numberOfAssessments+'"> <input type="hidden" name="assessment_type[]" value="f_b"> <input type="hidden" name="answer_id[]" value="0"> <div class="question"> <label class="control-label"><b class="number remove_question" data-id="'+numberOfAssessments+'">Remove</b><span class="badge badge-warning pull-right">Fill in the blank</span> </label> <textarea class="span11" name="question[]" placeholder="Question"></textarea> </div> </div>');
		numberOfAssessments++;
	}else if(type=='essay'){
		$( ".choices_btn_list" ).before('<div class="essay assessment " id="assess_count_'+numberOfAssessments+'"> <input type="hidden" name="assessment_type[]" value="essay"> <input type="hidden" name="answer_id[]" value="0"> <div class="question"> <label class="control-label"><b class="number remove_question" data-id="'+numberOfAssessments+'">Remove</b><span class="badge badge-important pull-right">Essay</span> </label> <textarea class="span11" name="question[]" placeholder="Question"></textarea> </div> </div>');
		numberOfAssessments++;
	}else if(type=='activity'){
		$( ".choices_btn_list" ).before('<div class="activity assessment " id="assess_count_'+numberOfAssessments+'"> <input type="hidden" name="assessment_type[]" value="activity"> <input type="hidden" name="answer_id[]" value="0"> <div class="question"> <label class="control-label"><b class="number remove_question" data-id="'+numberOfAssessments+'">Remove</b><span class="badge badge-inverse pull-right">Activity</span> </label> <textarea class="span11" name="question[]" placeholder="Question"></textarea> </div> </div>');
		numberOfAssessments++;
	}

	assessmentAction();
}


function ScriptViewAssessment(){

  	$('.white_remarks').click(function(){
  		var id = $(this).data('remarksnumber');
  		$('#remarks_'+id).toggle();
  	});

  	$('.score').click(function(){
  		var id = $(this).data('scoreid');
  		$('#score_'+id).toggle();
  	});

  	$('.button_status').click(function(){
  		var id = $(this).data('id');
  		var answerStatus;
  		if($(this).data('button')=="1"){
  			$('#ass_stat_'+id).val("1");
  			$('.button_status_'+id).removeClass("btn-success");
  			$('.button_status_'+id).removeClass("btn-danger");
  			$(this).addClass('btn-success');

  			
  			answerStatus = true;
  		}else if($(this).data('button')=="0"){
			$('#ass_stat_'+id).val("0");
			$('.button_status_'+id).removeClass("btn-success");
  			$('.button_status_'+id).removeClass("btn-danger");
  			$(this).addClass('btn-danger');
  			answerStatus = false;
  		}
  		 
  		 
		 $('.remarks_').hide();
		 $('.score_').hide();
  		 $('#remarks_'+id).show();
  		 $('#score_'+id).show();

  		 var QuestionID = $(this).data('questionnumber');
  		
  		for( var x = 0 ; x < examinees_result.length ; x++ ){
  			if(examinees_result[x]['question_id']==QuestionID){
  				if( answerStatus ){
  					examinees_result[x]['answer_status'] = 1;
  				}else{
  					examinees_result[x]['answer_status'] = 0;
  				}
  			}
  		}

  		console.log(examinees_result);

  	});

  	$('#question_and_answer_submit').click(function(){

  		for( var x = 0 ; x < examinees_result.length ; x++ ){
  			examinees_result[x]['points'] = $('#score_'+x).val();
  			examinees_result[x]['remarks'] = $('#remarks_'+x).val();
  		}
  		console.log(examinees_result);
  		Submit_Selected_Examinees();
  	});
}

function GetExaminiesList(){
	$('#giveAssessmentButton').click(function(){
		$.ajax({
	        type: "POST",
	        url: "request_.php",
	        data: {
	              'request_code'  : 1103
	        },
	        cache: false,
	        success: function(result){
	          $('#examiniesList').html(result);
	        }
	      });
	});
}

function ViewStudentAssessmentInit(){
	$('.viewAssessment').click(function(){
		ViewStudentAssessment($(this).data('examineesid'),$(this).data('assessmentid'));
	});
}


var examinees_result = {};
function ViewStudentAssessment(examineesid,Assessment_id){
	console.log(examineesid+"->"+Assessment_id);
	$.ajax({
	        type: "POST",
	        url: "request_.php",
	        data: {
	              'request_code'  	: 4421,
	              'examineesid'  	: examineesid,
	              'Assessment_id'  	: Assessment_id
	        },
	        cache: false,
	        success: function(result){
	          var data = jQuery.parseJSON(result);
	          console.log(data['examinees_result']);
	          console.log(data['assessment']);
	          console.log(data['examinees']);
	          console.log(data['assessment_status']);
	          console.log(data['assessment_result_per_type']);
	          console.log(data['ExamineesAnswerDataSIZE']);
	          
	          // $('#question_and_answer_list').html(data['QuestionAndAnswer']);
	          $('#view_assessment_header').html(data['data_html']);

	          ScriptViewAssessment();
	          examinees_result = data['examinees_result'];
	          ShowHideAssessment();
	        }
	      });
}

function Submit_Selected_Examinees(){
	$('#question_and_answer_submit').html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>');
	$('#question_and_answer_list').hide();
	$('#loading').show();

	$.ajax({
	        type: "POST",
	        url: "request_.php",
	        data: {
	              'request_code'  	: 4422,
	              'examinees_result'  	: examinees_result
	        },
	        cache: false,
	        success: function(result){
	           if(result){
	           	 $('#question_and_answer_list').show();
				 $('#loading').hide();
	           }else{
	           	 $('#question_and_answer_list').show();
				 $('#loading').hide();
	           }
	           $('#question_and_answer_submit').html('Submit');
	        }
	      });
}