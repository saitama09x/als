// Global Initialize here

var MAXNUMBEROFACTIVITY = 50;
var MAXNUMBEROFACTIVITYARRAY = [];
var MAXNUMBEROFSTUDENT = 0;
var SelectedActivity = null;
var SelectCourse = null;
var sheetID = 'gradebook';
var RecordData = {};
var ByAverage = false;
//--------END--------

$(document).ready(function () {


   for(var x=2;x<=MAXNUMBEROFACTIVITY;x++){
   	MAXNUMBEROFACTIVITYARRAY[x-2] = x;
   }

	$('#subjectSelected').click(function(){
		SelectCourse = $("#couseSelected").val();
		SelectedActivity = $("#activitySelected").val();
		GradeBookInitialize();
	});

	$('#byAverage').toggle(function() {   
	  ByAverage = true;
	  SelectCourse = $("#couseSelected").val();
	  SelectedActivity = $("#activitySelected").val();
	  GradeBookInitialize();
	},
	function() {
	  ByAverage = false;
	  SelectCourse = $("#couseSelected").val();
	  SelectedActivity = $("#activitySelected").val();
		GradeBookInitialize();
	});
});

function GradeBookInitialize(){
	if(SelectedActivity==1){
    		$('#gradebook').ip_Grid({ rows: 1001,  cols: 60 });
    		GetQuizzes();
    	}else if(SelectedActivity==2){
    		$('#gradebook').ip_Grid({ rows: 1001,  cols: 60 });
    		GetLaboratory();		 
    	}else if(SelectedActivity==3){
    		$('#gradebook').ip_Grid({ rows: 1001,  cols: 60 });
    		GetAssessment();	 
    	}else if(SelectedActivity==4){
    		$('#gradebook').ip_Grid({ rows: 1001,  cols: 60 });
    		GetExam();
    	}

    	GetSelectedCourse(SelectCourse,SelectedActivity);

    	// $('#gradebook').on('ip_RowSelector', function (event, args) {
    	// 	console.log(event);
    	// 	console.log(args);
    	// })
}


function GetQuizzes(){
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 250 })
	$('#gradebook').ip_MergeRange({ range:[
		{ startRow:0, startCol:0, endRow:0, endCol:1 },
		{ startRow:1, startCol:0, endRow:1, endCol:1 },
		{ startRow:2, startCol:0, endRow:2, endCol:1 },
		{ startRow:3, startCol:0, endRow:3, endCol:1 }
		] });
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 50 })
	$('#gradebook').ip_ResizeColumn({ columns: [1], size: 250 })
	

	$('#gradebook').ip_FormatCell({ style:'text-align:left;',range:[{ startRow:0, startCol:1, endRow:1000, endCol:1 }] });
	

	
	$('#gradebook').ip_MergeRange({ range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#56b74b;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'color:#ffffff;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"CLASS STANDING", range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });


	$('#gradebook').ip_MergeRange({ range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"QUIZZES", range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	
	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'text' } ,range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_ResizeColumn({ columns: MAXNUMBEROFACTIVITYARRAY, size: 40 })
	for(var x = 0; x< MAXNUMBEROFACTIVITY-1; x++){
		$('#gradebook').ip_CellInput({ value:"Q"+(x+1), row:2,col:(2+x) });
	}
}

function GetLaboratory(){
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 250 })
	$('#gradebook').ip_MergeRange({ range:[
		{ startRow:0, startCol:0, endRow:0, endCol:1 },
		{ startRow:1, startCol:0, endRow:1, endCol:1 },
		{ startRow:2, startCol:0, endRow:2, endCol:1 },
		{ startRow:3, startCol:0, endRow:3, endCol:1 }
		] });
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 50 })
	$('#gradebook').ip_ResizeColumn({ columns: [1], size: 250 })
	

	$('#gradebook').ip_FormatCell({ style:'text-align:left;',range:[{ startRow:0, startCol:1, endRow:1000, endCol:1 }] });
	

	
	$('#gradebook').ip_MergeRange({ range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#56b74b;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'color:#ffffff;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"CLASS STANDING", range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });

	$('#gradebook').ip_MergeRange({ range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"LABORATORY ACTIVITIES", range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	
	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'text' } ,range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_ResizeColumn({ columns: MAXNUMBEROFACTIVITYARRAY, size: 40 })
	for(var x = 0; x< MAXNUMBEROFACTIVITY-1; x++){
		$('#gradebook').ip_CellInput({ value:"L"+(x+1), row:2,col:(2+x) });
	}
}
function GetAssessment(){
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 250 })
	$('#gradebook').ip_MergeRange({ range:[
		{ startRow:0, startCol:0, endRow:0, endCol:1 },
		{ startRow:1, startCol:0, endRow:1, endCol:1 },
		{ startRow:2, startCol:0, endRow:2, endCol:1 },
		{ startRow:3, startCol:0, endRow:3, endCol:1 }
		] });
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 50 })
	$('#gradebook').ip_ResizeColumn({ columns: [1], size: 250 })
	

	$('#gradebook').ip_FormatCell({ style:'text-align:left;',range:[{ startRow:0, startCol:1, endRow:1000, endCol:1 }] });
	

	
	$('#gradebook').ip_MergeRange({ range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#56b74b;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'color:#ffffff;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"CLASS STANDING", range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });

	$('#gradebook').ip_MergeRange({ range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"ASSESSMENT", range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });

	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'text' } ,range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_ResizeColumn({ columns: MAXNUMBEROFACTIVITYARRAY, size: 40 })
	for(var x = 0; x< MAXNUMBEROFACTIVITY-1; x++){
		$('#gradebook').ip_CellInput({ value:"A"+(x+1), row:2,col:(2+x) });
	}
}
function GetExam(){
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 250 })
	$('#gradebook').ip_MergeRange({ range:[
		{ startRow:0, startCol:0, endRow:0, endCol:1 },
		{ startRow:1, startCol:0, endRow:1, endCol:1 },
		{ startRow:2, startCol:0, endRow:2, endCol:1 },
		{ startRow:3, startCol:0, endRow:3, endCol:1 }
		] });
	$('#gradebook').ip_ResizeColumn({ columns: [0], size: 50 })
	$('#gradebook').ip_ResizeColumn({ columns: [1], size: 250 })
	

	$('#gradebook').ip_FormatCell({ style:'text-align:left;',range:[{ startRow:0, startCol:1, endRow:1000, endCol:1 }] });
	

	
	$('#gradebook').ip_MergeRange({ range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#56b74b;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'color:#ffffff;',range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"CLASS STANDING", range:[{ startRow:0, startCol:2, endRow:0, endCol:MAXNUMBEROFACTIVITY }] });

	$('#gradebook').ip_MergeRange({ range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] })
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_CellInput({ value:"EXAMINATION", range:[{ startRow:1, startCol:2, endRow:1, endCol:MAXNUMBEROFACTIVITY }] });
	
	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'text' } ,range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ style:'background-color:#add6b2;',range:[{ startRow:2, startCol:2, endRow:2, endCol:MAXNUMBEROFACTIVITY }] });
	
	$('#gradebook').ip_ResizeColumn({ columns: MAXNUMBEROFACTIVITYARRAY, size: 40 })



	for(var x = 0; x< MAXNUMBEROFACTIVITY-1; x++){
		$('#gradebook').ip_CellInput({ value:"E"+(x+1), row:2,col:(2+x) });
	}
}




function GetSelectedCourse(gradebook,SelectedActivity){
	
		$.ajax({
	        type: "POST",
	        url: "request_.php",
	        data: {
	              'request_code'  		: 5512,
	              'gradebook'  			: gradebook,
	              'SelectedActivity'	: SelectedActivity
	        },
	        cache: false,
	        success: function(result){
	        	 var data = jQuery.parseJSON(result);
	        	 GradebookOnProcess(data);
	         	
	        }
	      });
}

function GradebookOnProcess(data){
	// var value_qq = data['gradebook']['_code'];

	 // $('#gradebook').ip_FormatCell({ dataType: { dataType: 'number',title: 'International' } , row:0,col:0, style:'text-align:left;' });
	// $('#gradebook').ip_CellInput({ value:value_qq, row:0,col:0 });
	

	RecordData['students']	=	data['students'];
	RecordData['gradebook'] =	data['gradebook'];
	RecordData['Meta_ID'] =	data['Meta_ID'];
	RecordData['Scores'] =	data['score'];
	RecordData['columnHeader'] =	data['columnHeader'];
	RecordData['value']= null;
	console.log(RecordData);

	
	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'text' } ,range:[{ startRow:0, startCol:0, endRow:0, endCol:1 }], style:'text-align:left;font-weight: bold;' });
	$('#gradebook').ip_CellInput({ valueRAW:data['gradebook']['_code'], range:[{ startRow:0, startCol:0, endRow:0, endCol:1 }]});

	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'text' } ,range:[{ startRow:1, startCol:0, endRow:1, endCol:1 }], style:'text-align:left;font-weight: bold;' });
	$('#gradebook').ip_CellInput({ valueRAW:data['gradebook']['_name'], range:[{ startRow:1, startCol:0, endRow:1, endCol:1 }]});

	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'text' } ,range:[{ startRow:2, startCol:0, endRow:2, endCol:1 }], style:'text-align:left;font-weight: bold;' });
	$('#gradebook').ip_CellInput({ valueRAW:data['gradebook']['school_year'], range:[{ startRow:2, startCol:0, endRow:2, endCol:1 }]});


	var StartRow = 4;
	var endRow = 4;
	MAXNUMBEROFSTUDENT = data['students'].length;
	$('#gradebook').ip_FormatCell({ style:'pointer-events:none; background-color:#eaeaea;cursor: not-allowed',range:[{ startRow:4, startCol:2, endRow:(data['students'].length+3), endCol:MAXNUMBEROFACTIVITY }] });
	// Plot students Names
	for(var x = 0; x<data['students'].length; x++){

		var student = data['students'][x];
		var StudentName = student['name'];
		$('#gradebook').ip_CellInput({ value:(x+1), row:(StartRow+x),col:0 });
		$('#gradebook').ip_CellInput({ value:StudentName, row:(StartRow+x),col:1 });
		endRow+=x;
	}

	if(data['columnHeader'] != null){
		// Plot Column Header
		for(var x = 0; x<data['columnHeader'].length; x++){
			var columnValue = data['columnHeader'][x]['meta_value'];
			$('#gradebook').ip_CellInput({ value:columnValue, row:3,col:2+x});

			$('#gradebook').ip_FormatCell({ style:'pointer-events:auto;background-color:#ffffff;cursor: auto',range:[{ startRow:4, startCol:2+x, endRow:MAXNUMBEROFSTUDENT+3, endCol:2+x }] });
		}
	}
	
	if(data['score'] != null){
		//Plot Students Scores
		for(var x = 0; x < data['score'].length; x++){
			var columnValue = data['score'][x];
			for(var y = 0; y < columnValue.length;y++){
				if(ByAverage){
					var average = ((columnValue[y] / data['columnHeader'][y]['meta_value']) * 100).toFixed(2);
					$('#gradebook').ip_CellInput({ value:average, row:4+x,col:2+y});
				}else{
					$('#gradebook').ip_CellInput({ value:columnValue[y], row:4+x,col:2+y});
				}
				
			}
			
		}
	}
	

	
	$('#gradebook').ip_FrozenRowsCols({ cols: 2 });
	$('#gradebook').ip_FrozenRowsCols({ rows: 4 });

	// Set the datatype of the field to numbers
	
	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'number' } ,range:[{ startRow:4, startCol:2, endRow:MAXNUMBEROFSTUDENT+3, endCol:MAXNUMBEROFACTIVITY }] });
	$('#gradebook').ip_FormatCell({ dataType: { dataType: 'number' } ,range:[{ startRow:3, startCol:2, endRow:3, endCol:MAXNUMBEROFACTIVITY }] });
	
	ValidateSelectedColumn();
}
function GetCellValue_args(_args){
	var val = {};
	var inputs = _args['options']['SetCellValue']['Inputs'];
	val['value'] = inputs['valueRAW'];
	val['col'] = inputs['col'];
	val['row'] = inputs['row'];
	val['range'] = inputs['range'];

	return val;
}

function GetCellValue(row,col){
	return ip_CellData(sheetID,row,col)['value'];
}

function ChangeBackgroundCell(type,row,col){
	if(type=="error"){
		$('#gradebook').ip_FormatCell({ style:'background-color:#fda1a1',row:row,col:col});
	}else if(type=="warning"){
		$('#gradebook').ip_FormatCell({ style:'background-color:#fdf9a1',row:row,col:col});
	}else if(type=="ok"){
		$('#gradebook').ip_FormatCell({ style:'background-color:#ffffff',row:row,col:col});
	}
}

function ValidateSelectedColumn(){
	$('#gradebook').on('ip_CellInput', function (event, args) {
		var cell = GetCellValue_args(args);
		// console.log(cell);
		if(cell['row']==3 && cell['col']>1){
			// Header Total Score
			if(GetCellValue(3,cell['col'])==""){
				// $('#gradebook').ip_FormatCell({ style:'background-color:#fffff;cursor: auto',range:[{ startRow:4, startCol:cell['col'], endRow:MAXNUMBEROFSTUDENT+3, endCol:cell['col'] }] });
				
				$valueValidation = false;
				for(var x = 0; x < MAXNUMBEROFSTUDENT;x++){
					if(GetCellValue(x+4,cell['col']) !=null){
						$valueValidation = true;
					}
				}

				if($valueValidation){
					ChangeBackgroundCell('error',3,cell['col']);
				}else{
					ChangeBackgroundCell('ok',3,cell['col']);
				}


			}else{
				$('#gradebook').ip_CellInput({ valueRAW:'0', range:[{ startRow:4, startCol:cell['col'], endRow:MAXNUMBEROFSTUDENT+3, endCol:cell['col'] }] })
				$('#gradebook').ip_FormatCell({ style:'pointer-events:auto;background-color:#ffffff;cursor: auto',range:[{ startRow:4, startCol:cell['col'], endRow:MAXNUMBEROFSTUDENT+3, endCol:cell['col'] }] });
				ChangeBackgroundCell('ok',3,cell['col']);
				
			}
			
		}
		if(cell['row']>3 && cell['col']>1){
			// Value
			if(GetCellValue(3,cell['col'])!=null){
				
				if(GetCellValue(3,cell['col']) < GetCellValue(cell['row'],cell['col'])){
					// Score is Higher that total score
					
					$('#gradebook').ip_CellInput({ valueRAW:'0', row: cell['row'],col:cell['col']})
				}
			}else{
				// $('#gradebook').ip_CellInput({ valueRAW:'0', row: cell['row'],col:cell['col']});
				$('#gradebook').ip_CellInput({ valueRAW:'0', range:[{ startRow:4, startCol:cell['col'], endRow:MAXNUMBEROFSTUDENT+3, endCol:cell['col'] }] })
			}
		}

		GetValue();
	})	
}

function GetValue(){

	// Get Header Values if not null
	var values = {};
	var index = 0;
	for(var x =0; x < MAXNUMBEROFACTIVITY; x++){
		if(GetCellValue(3,x+2)!=null){
			

			var score = {};
			for(var y = 0;y<MAXNUMBEROFSTUDENT;y++){
				score[y] = GetCellValue(y+4,x+2);
			}
			values[index]={'ID':index+1,'total':GetCellValue(3,x+2),'scores': score};
			index++;
		}
	}
	RecordData['value']=values;
	console.log(RecordData);
	SubmitNewRecord(RecordData);
}

function SubmitNewRecord(record){

	$.ajax({
	        type: "POST",
	        url: "request_.php",
	        data: {
	              'request_code'  		: 5698,
	              'record'  			: record
	        },
	        cache: false,
	        success: function(result){
	         	console.log(result);
	        }
	      });
}