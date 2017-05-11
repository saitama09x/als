<?php
include 'init_include.php';
?>


<?php HeaderSideMenu(); ?>

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

  <div class="container-fluid">

    <hr/>
    
            <div id="giveAssessment" class="modal-sm modal  hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3> Give Assessment</h3>
              </div>
              <div class="modal-body form-horizontal">
               <form action="request_.php" method="post">
                <div class="control-group">
                  <label class="control-label">Student / Course</label>
                  <div class="controls">
                    <select name="studentlist[]" id="examiniesList" multiple >
                    </select>
                  </div>
                </div>
               <div class="control-group">
              <label class="control-label"><b>Date and Time</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Date Start:</label>
              <div class="controls">
                <input type="text" name="date_start" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker">
                </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Time  Start:</label>
              <div class="controls">
                <input type="text" name="time_start" class="mask text timepicker">
                <span class="help-block blue">06:30 PM</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date End:</label>
              <div class="controls">
                <input type="text" name="date_end" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker">
                </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Time End:</label>
              <div class="controls">
                <input type="text" name="time_end" class="mask text timepicker">
                <span class="help-block blue">06:30 PM</span> </div>
            </div>
              </div>
              <div class="modal-footer">
                <input type="hidden" name="worksheetID" id="worksheetID">
                <input type="hidden" name="request_code" value="8452">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
              </form>
            </div>

    <div class="row-fluid">
      <div class="span4" >
        <div class="widget-box ">
          <div class="widget-title">
            <h5>Worksheet Group</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $GetWorkSheetGroupList = GetWorkSheetGroupList();
                  while ($value = mysql_fetch_assoc($GetWorkSheetGroupList)) {
                   echo '<tr class="gradeX">
                              <td><b>'.$value['_name'].'</b></td>
                              <td class="center" width="10%"><button data-id="'.$value['_id'].'" data-name="'.$value['_name'].'" class="btn btn-mini btn-success view_child"><i class="icon-chevron-right"></i></button></td>
                            </tr>';
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="span4" >
        <div class="widget-box">
          <div class="widget-title">
            <h5>Worksheet <b id="WorksheetSelected"></b></h5>
          </div>
          <div class="widget-content nopadding hide" id="worksheetsTableBody">
            <table class="table table-bordered" id="worksheetsTable">
              <thead>
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody id="worksheets">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="span4" >
        <div class="widget-box">
          <div class="widget-title">
            <h5>Access to this Worksheet <b ></b></h5>
          </div>
          <div class="widget-content hide" id="SheetSelectedBody">
            <a href="#giveAssessment" id="giveAssessmentButton" data-toggle="modal" class="btn btn-info pull-right"><i class="icon-plus"></i> Add Student</a>
            <br><br>
            <h4 id="SheetSelected">Header</h4>
            <p id="SheetDescriptionSelected">test</p>
            <table class="table table-bordered" id="StudentAccessedTable">
              <thead>
                <tr>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody id="StudentAccessed">
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->
<div id="dialog_wrapper">
<div id="dialog_pdf">
<iframe src="#" id="load_pdf" width="500" ></iframe>
</div>

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->

<script src="js/jquery.min.js"></script> 
<script src="js/jquery-ui.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script src="js/assessment.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 5;
}
$( window ).load(function() {
  $('.view_child').click(function(){
    GetSheetList($(this).data('id'));
    $('#WorksheetSelected').text("("+$(this).data('name')+")");

    $('#worksheetsTableBody').show();
  });
});
function GetSheetList(id){
  $.ajax({
          type: "POST",
          url: "request_.php",
          data: {
                'request_code'  : 5661,
                'id'  : id,
          },
          cache: false,
          success: function(result){
            $('#worksheets').html(result);
            $('#worksheetsTable').dataTable();
            GetSelectedSheet();

          }
  });
}

function GetSelectedSheet(){
  $('.selectedSheet').click(function(){
    $('#worksheetID').val($(this).data('id'));
    $('#SheetSelected').text($(this).data('name'));
    $('#SheetDescriptionSelected').text($(this).data('description'));
    $('#SheetSelectedBody').show();
    $.ajax({
          type: "POST",
          url: "request_.php",
          data: {
                'request_code'  : 6136,
                'id'  : $(this).data('id')
          },
          cache: false,
          success: function(result){
            $('#StudentAccessed').html(result);
            $('#StudentAccessedTable').dataTable();
          }
    });
  });
}

$( "#dialog_pdf" ).dialog({
  autoOpen: false,
  minHeight : $(document).height(),
  minWidth : $(document).width(),
  show: {
    effect: "blind",
    duration: 1000
  },
  hide: {
    effect: "explode",
    duration: 1000
  }
});

$("#StudentAccessedTable").on("click", ".studentsheet", function(){
    var id = $(this).data("id");
    $.ajax({
          type: "POST",
          url: "request_.php",
          data: {
                'request_code'  : 6137,
                'id'  : id
          },
          cache: false,
          success: function(result){
              $("#dialog_pdf").dialog( "open" );
              $("#load_pdf").attr("src", base_url + "/uploader_asset/php/uploads/" + result);
              $("#load_pdf").attr({"width" : $(document).width(), 
                "height" : $(document).height() })
          }
    });
});

</script>
</body>
</html>
