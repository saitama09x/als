$( window ).load(function() {

	$('.file').click(function(){
        SelectFileToPriview($(this));
    });

    GradeBookInit();
    GetStudentList();
    GetMessageList();

    $('.datepicker').datepicker();
});

function SelectFileToPriview(data_res){

    $('.noselected').hide();
    $('.preview_file').show();


    var img = ["JPG", "TIF", "GIF", "PNG", "JPEG", "BMP", "ICO", "TIFF", "GIF"];
    var video = ["avi", "mkv", "wmv", "mpeg", "mp4", "3gp"];

    $('#prev_file_name').text(data_res.data('_name'));
    $('#prev_file_date').text(data_res.data('_date_upload'));
    $('#prev_file_ext').text(data_res.data('_file_extension'));
    $('#prev_file_size').text(data_res.data('_file_size'));
    $('#material_id').val(data_res.data('_id'));
    $('#removeLearningMaterials').attr('href','request_.php?material_id='+data_res.data('_id')+'&request_code=5124');

    $('#input_file_name').val(data_res.data('_name'));
    $('#input_file_description').val(data_res.data('_description')+"");

    
    if(jQuery.inArray(data_res.data('_file_extension').toUpperCase(),img) !== -1){
        $('.file-thumb').html('<img src="Uploader/_extra/uploads/'+data_res.data('_file_url')+'/'+data_res.data('file')+'" alt="" >');
    }else if(jQuery.inArray(data_res.data('_file_extension'),video) !== -1){
        $('.file-thumb').html('<video width="420" height="340" controls><source src="Uploader/_extra/uploads/'+data_res.data('_file_url')+'/'+data_res.data('file')+'" type="video/'+data_res.data('_file_extension')+'">Your browser does not support the video tag.</video>');
            
    }else{
        $('.file-thumb').html('<img style="width: 20%;" src="img/icons/files/'+data_res.data('icons')+'" alt="" >');
        
    }

    $('#saveLearningMaterials').click(function(){
      $.ajax({
        type: "POST",
        url: "request_.php",
        data: {
              'request_code'  : 6331,
              'material_id'   : $('#material_id').val(),
              'name'          : $('#input_file_name').val(),
              'description'   : $('#input_file_description').val()
        },
        cache: false,
        success: function(result){
            console.log(result);
            location.reload();
        }
      });
    });
}

// ------GRADEBOOK SECTION -------------------------
function GradeBookInit(){

    $('#midtermEnable').change(function() {
        if($(this).is(":checked")) {
            $('#start_date_midterm').prop("disabled", false);
            $('#end_date_midterm_present').prop("disabled", false);
        }else{
             $('#start_date_midterm').prop("disabled", true);
            $('#end_date_midterm_present').prop("disabled", true);
            $('#end_date_midterm').prop("disabled", true);
        }
    });
    $('#finalEnable').change(function() {
        if($(this).is(":checked")) {
            $('#start_date_final').prop("disabled", false);
            $('#end_date_final_present').prop("disabled", false);
        }else{
             $('#start_date_final').prop("disabled", true);
            $('#end_date_final_present').prop("disabled", true);
            $('#end_date_final').prop("disabled", true);

        }
    });

    $('#end_date_prelim_present').change(function() {
        if($(this).is(":checked")) {
            $('#end_date_prelim').prop("disabled", true);
        }else{
             $('#end_date_prelim').prop("disabled", false);
        }
    });

    $('#end_date_midterm_present').change(function() {
        if($(this).is(":checked")) {
            $('#end_date_midterm').prop("disabled", true);
        }else{
             $('#end_date_midterm').prop("disabled", false);
        }
    });

    $('#end_date_final_present').change(function() {
        if($(this).is(":checked")) {
            $('#end_date_final').prop("disabled", true);
        }else{
             $('#end_date_final').prop("disabled", false);
        }
    });
    
    $('#CreateGradeBook').click(function(){
        GetCourseForGradebook();
    });
    $('#ShareLearningMaterials').click(function(){
        GetCourseForLearningMaterials();
    });
}
function GetCourseForGradebook(){

    $.ajax({
        type: "POST",
        url: "request_.php",
        data: {
              'request_code'  : 1513
        },
        cache: false,
        success: function(result){
            console.log(result);
          $('#examiniesList').html(result);
        }
      });
    
}

function GetCourseForLearningMaterials(){

    $.ajax({
        type: "POST",
        url: "request_.php",
        data: {
              'request_code'  : 1592,
              'material_id'   : $('#material_id').val()
        },
        cache: false,
        success: function(result){
            console.log(result);
          $('#ShareLearningMaterialsList').html(result);
          GetLearningMaterialsAccess();
          $('#submitShareLearningMaterials').click(function(){

            $.ajax({
              type: "POST",
              url: "request_.php",
              data: {
                    'request_code'  : 5122,
                    'material_id'  : $('#material_id').val(),
                    'ShareLearningMaterialsList'  : $('#ShareLearningMaterialsList').val(),
              },
              cache: false,
              success: function(result){
                  GetCourseForLearningMaterials();
                  $("#ShareLearningMaterialsList").select2("val", "");
              }
            });

          });

        }
      });
    
}

function GetLearningMaterialsAccess(){
  $.ajax({
        type: "POST",
        url: "request_.php",
        data: {
              'request_code'  : 5632,
              'material_id'   : $('#material_id').val()
        },
        cache: false,
        success: function(result){
            console.log(result);
          $('#learningMaterialsList').html(result);
          $('#learningMaterialsTable').dataTable();
        }
      });
}


function GetStudentList(){
    
        $.ajax({
            type: "POST",
            url: "request_.php",
            data: {
                  'request_code'  : 5123
            },
            cache: false,
            success: function(result){
              $('#studentList').html(result);
               console.log(result);
            }
          });
   
        $('#compose_send').click(function(){
            $.ajax({
                type: "POST",
                url: "request_.php",
                data: {
                      'request_code'    : 1512,
                      'recipient'       : $('#studentList').val(),
                      'subject'         : $('#email_subject').val(),
                      'message'         : $('#compose_message').val(),
                      'type'            : $('#message_type').val()
                },
                cache: false,
                success: function(result){
                  console.log(result);
                  $('#studentList').select2().val(null).trigger("change");
                  $('#email_subject').val('');
                  $('#compose_message').data("wysihtml5").editor.clear();
                  GetMessageList();
                }
              });

            
        });

}

function ReverseMessagingListing(){
    var list = $('#MessageList_Container');
    var listItems = list.children('li');
    list.append(listItems.get().reverse());
}
function GetMessageList(){
    
        $.ajax({
            type: "POST",
            url: "request_.php",
            data: {
                  'request_code'  : 2152,
                  'search'        : ''
            },
            cache: false,
            success: function(result){
            $('#MessageList_Container').html(result);
            ReverseMessagingListing();
            ReadMessage();
            }
          });

        $( "#SearchMessage" ).keypress(function() {
            $.ajax({
                type: "POST",
                url: "request_.php",
                data: {
                      'request_code'  : 2152,
                      'search'        : $(this).val()
                },
                cache: false,
                success: function(result){
                $('#MessageList_Container').html(result);
                    ReverseMessagingListing();
                   ReadMessage();

                }
              });
        });

        
        $('#compose_new_message').click(function(){
            $('.message_compose').show();
            $('.message_read').hide();

        });


  
}

function ReadMessage(){

        $('.message_holder').click(function(){

            $(this).removeClass('unread');
            $('.message_compose').hide();
            $('.message_read').show();

            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: "request_.php",
                data: {
                      'request_code'    : 1623,
                      'id'              : id
                },
                cache: false,
                success: function(result){
                $('#FullMessageContainer').html(result);
                ReplyMessage(id);
                }
              });
        });
}

function ReplyMessage(id){
    $('#SendReply').click(function(){
             $.ajax({
                type: "POST",
                url: "request_.php",
                data: {
                      'request_code'    : 6324,
                      'reply_id'        : $(this).data('id'),
                      'reply_content'   : $('#reply_message').val()
                },
                cache: false,
                success: function(result){
                  $.ajax({
                    type: "POST",
                    url: "request_.php",
                    data: {
                          'request_code'    : 1623,
                          'id'              : id
                    },
                    cache: false,
                    success: function(result){
                    $('#FullMessageContainer').html(result);
                    ReplyMessage(id);
                    }
                  });
                }
              });
    });
}