var CurrentQuestionNumber = 0;
var TotalQuestionNumber = 0;
var TotalTIME = 0;
var TIME = 0;

var CURRENTSTUDENTANSWER;
var STUDENTANSWER = [];

var ASSESSMENT_EXAMINEES;
var test= "GOOD";

var Interval = null;

$( window ).load(function() {


	Loadinginit();

	$('.action').click(function(){

		if($(this).data('act')==0){
			$('#introduction').hide();
			$('#Instruction').show();
		}else if($(this).data('act')==1){
			$('#Instruction').hide();
			
			GetData($(this).data('id'));
		}


	});

});

function LENGHT(data){
	var length= 0;
	for(var key in data) {
	    if(data.hasOwnProperty(key)){
	        length++;
	    }
	}
	return length;
}


function Loadinginit(){
			  TweenMax.set('svg', {
  visibility: 'visible'
})

var tl = new TimelineMax();
tl.staggerTo('#bubbleGroup circle', 3, {
  attr: {
    cy: 200
  },
  ease:Power2.easeIn,
  repeat: -1
}, 0.6)
}

function GetData(id){
		$('#loading').show();
		$.ajax({
	        type: "POST",
	        url: "request_.php",
	        data: {
	              'request_code'  : 7882,
	              'id'  : id
	        },
	        cache: false,
	        success: function(result){
	        	console.log(result);
	         	if(jQuery.parseJSON(result).assessment_status!=1){
	         		PrepareAssessment(result);
	         		$('#loading').hide();
	         	}else{
	         		document.location.href = 'subject.php';
	         	}
	         	
	        }
	      });
	
}


function PrepareAssessment(DATA){
	var dataJSON = jQuery.parseJSON(DATA);
	//Console.log(dataJSON.examinees);
	//Console.log(dataJSON.assessment);
	//Console.log(dataJSON.meta);
	//Console.log(dataJSON.examinees_current_metadata);
	//Console.log(dataJSON.datetime_left);
	//Console.log(dataJSON.datetime_start);
	//Console.log(dataJSON.datetime_end);

	var ExamineesValues = dataJSON.examinees;
	var ExamineesCurrentMeta = dataJSON.examinees_current_metadata;
	var AssessmentValues = dataJSON.assessment;
	var Questions = dataJSON.meta;
	TIME = dataJSON.datetime_left;
	TotalTIME = dataJSON.datetime_left;


	ASSESSMENT_EXAMINEES = ExamineesValues;

	// shuffle the question if the random number is tru
	if(AssessmentValues['_random_numbers']==1){
		var Questions = shuffle(dataJSON.meta);
	}
	
	Interval = setInterval(getTimeLeft, 1000);
	$('#Question').show();

	TotalQuestionNumber = LENGHT(Questions);

	var CurrentQuestion =  Questions[CurrentQuestionNumber];
	SetupQuestion(CurrentQuestion,ExamineesValues['_random_choices']);
	
	$('#next_question').click(function(){
		//Console.log(CURRENTSTUDENTANSWER);
			CURRENTSTUDENTANSWER ="";
			CurrentQuestionNumber++;
			

				console.log(CurrentQuestionNumber+"="+TotalQuestionNumber);
				if(CurrentQuestionNumber>=TotalQuestionNumber){
					AnswerComplete(STUDENTANSWER);
				}else{
					var CurrentQuestion =  Questions[CurrentQuestionNumber];
					if(CurrentQuestionNumber==(TotalQuestionNumber-1)){
						$(this).text("Finish");
						$('#next_question').click(function(){
							
						});
					}
					SetupQuestion(CurrentQuestion,ExamineesValues['_random_choices']);
				}

		});
	
}

function SetupQuestion(CurrentQuestion,_random_choices){

		$('#next_question').attr("disabled", "disabled");
		$('#CurrentQuestionShow').text("Question "+(CurrentQuestionNumber+1));

		var Questionbar = (100/TotalQuestionNumber) * (CurrentQuestionNumber + 1);
		$('#questionBar').css('width',Questionbar+"%");

		$('#NumberOfAnswered').text(CurrentQuestionNumber);
		$('#NumberOfQuestions').text(TotalQuestionNumber);


		if(CurrentQuestion['_type']=='m_c'){

			$('#questionHolder').text(CurrentQuestion['_question']);

			var choices = [
			'<tr><td><button class="btn choices_btn" data-id="'+1+'">#</button></td><td>'+CurrentQuestion['_choice_a']+'</td></tr>',
			'<tr><td><button class="btn choices_btn" data-id="'+2+'">#</button></td><td>'+CurrentQuestion['_choice_b']+'</td></tr>',
			'<tr><td><button class="btn choices_btn" data-id="'+3+'">#</button></td><td>'+CurrentQuestion['_choice_c']+'</td></tr>',
			'<tr><td><button class="btn choices_btn" data-id="'+4+'">#</button></td><td>'+CurrentQuestion['_choice_d']+'</td></tr>',
			];

			if(_random_choices==1){
				var OutChoices = shuffle(choices);
			}else{
				var OutChoices = choices;
			}

			var choices1 = OutChoices[0].replace('>#<', '>A<');
			var choices2 = OutChoices[1].replace('>#<', '>B<');
			var choices3 = OutChoices[2].replace('>#<', '>C<');
			var choices4 = OutChoices[3].replace('>#<', '>D<');

			$('#choicesHolder').html('<table class="table">'+choices1+choices2+choices3+choices4+'</table>');

			$('.choices_btn').click(function(){
				$('#next_question').removeAttr("disabled");
				CURRENTSTUDENTANSWER = $(this).data('id');

				var Answer = [];
				Answer['ID'] = CurrentQuestion['meta_id'];
				Answer['ANSWER'] = CURRENTSTUDENTANSWER;

				STUDENTANSWER[CurrentQuestionNumber] = Answer;
			});

		}else if(CurrentQuestion['_type']=='t_f'){

			$('#questionHolder').text(CurrentQuestion['_question']);

			$('#choicesHolder').html('<ul><li><button class="btn trueOrFalseBtn" data-id="TRUE">TRUE</button></li><li><button class="btn trueOrFalseBtn" data-id="FALSE">FALSE</button></li></ul>');
			
			$('.trueOrFalseBtn').click(function(){
				$('#next_question').removeAttr("disabled");
				CURRENTSTUDENTANSWER = $(this).data('id');

				var Answer = [];
				Answer['ID'] = CurrentQuestion['meta_id'];
				Answer['ANSWER'] = CURRENTSTUDENTANSWER;

				STUDENTANSWER[CurrentQuestionNumber] = Answer;
			});

		}else if(CurrentQuestion['_type']=='f_b'){

			$('#questionHolder').text(CurrentQuestion['_question'].replace('@BLANK', '____________'));

			$('#choicesHolder').html('<textarea class="textarea_editor span12" id="FB_INPUT" rows="6" placeholder="Enter your answer here ..."></textarea>');
			
			$('#next_question').removeAttr("disabled");

			$( "#FB_INPUT" ).keyup(function() {
			  CURRENTSTUDENTANSWER = $(this).val();

			  	var Answer = [];
				Answer['ID'] = CurrentQuestion['meta_id'];
				Answer['ANSWER'] = CURRENTSTUDENTANSWER;

				STUDENTANSWER[CurrentQuestionNumber] = Answer;
			 
			});
		}else if(CurrentQuestion['_type']=='essay'){

			$('#questionHolder').text(CurrentQuestion['_question']);

			$('#choicesHolder').html('<textarea class="textarea_editor span12" id="ESSAY_INPUT" rows="6" placeholder="Enter your answer here ..."></textarea>');

			$('#next_question').removeAttr("disabled");

			$( "#ESSAY_INPUT" ).keyup(function() {
			  CURRENTSTUDENTANSWER = $(this).val();
			 
			 var Answer = [];
				Answer['ID'] = CurrentQuestion['meta_id'];
				Answer['ANSWER'] = CURRENTSTUDENTANSWER;

				STUDENTANSWER[CurrentQuestionNumber] = Answer;
			});

		}else if(CurrentQuestion['_type']=='activity'){

			$('#questionHolder').text(CurrentQuestion['_question']);

			$('#choicesHolder').html('<ul><li><div class="control-group"><label class="control-label">File upload input</label><div class="controls"><input type="file" name="files[]" id="ACTIVITYSELECTFILE" multiple="multiple"></div></div></li></ul>');
			
			$('#next_question').removeAttr("disabled");

			
			FILERINIT(CurrentQuestion['meta_id']);
		
		}

}

function shuffle(array) {
  var currentIndex = array.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  while (0 !== currentIndex) {

    // Pick a remaining element...
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element.
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

function getTimeLeft(){
	 TIME--;
	 if(TIME<=0){
	 	AnswerComplete(STUDENTANSWER);
	 }
	$('#date_time_show').html("TIME REMAINING: <h3  class='bg_lg timerunner'>"+sformat(TIME)+"</h3>");
	// var timeleftbar = 100 - ((100 / TIME));
	var timeleftbar =  (TIME / TotalTIME) * 100;

	//Console.log(timeleftbar);
	$('#timerBar').css('width',timeleftbar+"%");
}

function TimetoUnix(input){
	input = input.split(" - ").map(function (date){
	    return Date.parse(date+"-0500")/1000;
	}).join(" - ");
	return input;
}

function sformat(s) {
      var fm = [
            Math.floor(s / 60 / 60 / 24), // DAYS
            Math.floor(s / 60 / 60) % 24, // HOURS
            Math.floor(s / 60) % 60, // MINUTES
            s % 60 // SECONDS
      ];
      return $.map(fm, function(v, i) { return ((v < 10) ? '0' : '') + v; }).join(':');
}

function AnswerComplete(Answer){
	console.log(Answer);
	console.log(Answer.length);

	var _data = {};

	for(var x = 0; x<Answer.length;x++){
		var answerMeta = [];
		if(Array.isArray(Answer[x]['ANSWER'])){
			answerMeta = Answer[x]['ANSWER'];
		}else{
			answerMeta = Answer[x]['ANSWER'];
		}
		console.log(answerMeta);

		var dataMeta = {};
		 	dataMeta['answer'] = answerMeta;
		 	dataMeta['id'] = Answer[x]['ID'];
		console.log(dataMeta);


		_data[x] = dataMeta;
		// console.log(x);



	}
	console.log(_data);

	var SendData = {};
	SendData['request_code'] = 7883;
	SendData['answer'] = JSON.stringify(_data);
	SendData['ASSESSMENT_EXAMINEES'] = JSON.stringify(ASSESSMENT_EXAMINEES);

	$.ajax({
	        type: "POST",
	        url: "request_.php",
	        data: SendData,
	        cache: false,
	        success: function(result){
	         	console.log(result);
	         	clearInterval(Interval);
	         	var dataJSON = jQuery.parseJSON(result);
	         	$('#AssessmentPanel').html('<div class="main-box" id="AssessmentResult"> <div class="box-title text-center"> <h3>Assessment Result</h3> </div> <div class="box-body"> <div class="AssessmentResult_inner"> <table class="table "> <tr> <td class="text-left">Assessment Name</td> <th class="text-left">'+dataJSON['assessment_name']+'</td> </tr> <tr> <td class="text-left">Duration</td> <th class="text-left">'+dataJSON['assessment_duration']+'</td> </tr> <tr> <td class="text-left"></td> <td class="text-left"></td> </tr> <tr> <td class="text-left">Start Date Time</td> <th class="text-left">'+dataJSON['examinees_start_datetime']+'</td> </tr> <tr> <td class="text-left">End Date Time</td> <th class="text-left">'+dataJSON['examinees_end_datetime']+'</td> </tr> <tr> <td class="text-left">Total Spent Time</td> <th class="text-left">'+dataJSON['examinees_spent']+'</td> </tr> </table> <table class="table "> <tr> <th class="text-left bg_ly">Type of Assessment</td> <th class="text-center bg_ly">Total Answered</td> <th class="text-center bg_ly">Total Score</td> <th class="text-center bg_ly">Total Question</td> </tr> <tr> <td class="text-left">Multiple Choice</td> <td class="text-center">'+dataJSON['COUNT_m_c']+'</td> <td class="text-center">'+dataJSON['m_c']+'</td> <td class="text-center">'+dataJSON['TOTAL_COUNT_m_c']+'</td> </tr> <tr> <td class="text-left">True or False</td> <td class="text-center">'+dataJSON['COUNT_t_f']+'</td> <td class="text-center">'+dataJSON['t_f']+'</td> <td class="text-center">'+dataJSON['TOTAL_COUNT_t_f']+'</td> </tr> <tr> <td class="text-left">Fill in the blank</td> <td class="text-center">'+dataJSON['COUNT_f_b']+'</td> <td class="text-center bg_lo">Uncheck</td> <td class="text-center">'+dataJSON['TOTAL_COUNT_f_b']+'</td> </tr> <tr> <td class="text-left">Essay</td> <td class="text-center">'+dataJSON['COUNT_essay']+'</td> <td class="text-center bg_lo">Uncheck</td> <td class="text-center">'+dataJSON['TOTAL_COUNT_essay']+'</td> </tr> <tr> <td class="text-left">Activity</td> <td class="text-center">'+dataJSON['COUNT_activity']+'</td> <td class="text-center bg_lo">Uncheck</td> <td class="text-center">'+dataJSON['TOTAL_COUNT_activity']+'</td> </tr> <tr> <th class="text-left bg_low_lg"><b>Total:</b></td> <th class="text-center bg_low_lg">'+(dataJSON['COUNT_m_c'] + dataJSON['COUNT_t_f'] + dataJSON['COUNT_f_b'] + dataJSON['COUNT_essay'] + dataJSON['COUNT_activity'])+'</td> <th class="text-center bg_low_lg">'+(dataJSON['m_c']+dataJSON['t_f'])+'</td> <th class="text-center bg_low_lg">'+(dataJSON['TOTAL_COUNT_m_c'] + dataJSON['TOTAL_COUNT_t_f'] + dataJSON['TOTAL_COUNT_f_b'] + dataJSON['TOTAL_COUNT_essay'] + dataJSON['TOTAL_COUNT_activity'])+'</td> </tr> </table> </div> </div> </div>');
	        }
	      });



}