<?php
include 'init_include.php';
?>


<?php HeaderSideMenu(); ?>


<!--main-container-part-->
<div id="content" class="SpreadSheets">
<!--breadcrumbs-->

  <div id="content-header">
   <div class="sheet-header">

        <div class="row-fluid">
        <div id="createGradebook" class="modal-sm modal  hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3> Create Grade Book</h3>
              </div>
              <div class="modal-body form-horizontal">
                <form action="request_.php" method="post">
                <div class="control-group">
                  <label class="control-label"><b>Course</b></label>
                </div>
                <div class="control-group">
                  <label class="control-label">Course</label>
                  <div class="controls">
                    <select name="courselist[]" id="examiniesList" multiple >
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">School Year</label>
                  <div class="controls">
                    <input type="text" class="span11" name="schoolyear">
                  </div>
                </div>
            <div class="control-group">
              <label class="control-label"><b>Prelim Period</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Start Date:</label>
              <div class="controls">
                <input type="text" name="Prelim_start_date" data-date="<?php echo date("Y-m-d");?>" data-date-format="yyyy-mm-dd" value="<?php echo date("Y-m-d");?>" class="datepicker span11">
                </div>
            </div>
            <div class="control-group">
            <label class="control-label">End Date :</label>
              <div class="controls">
                <input type="checkbox" name="Prelim_start_date_checkbox" id="end_date_prelim_present" class="span11" checked /> Present
              </div>
              <div class="controls">
                <input type="text" name="Prelim_end_date" id="end_date_prelim" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker span11 " disabled>
                </div>
            </div>


            <div class="control-group inline-group">
              <input type="checkbox" name="Midterm_enable" class="span11" id="midtermEnable"  /> <label class="control-label"><b>Midterm Period</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Start Date:</label>
              <div class="controls">
                <input type="text" name="Midterm_start_date" id="start_date_midterm" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker span11" disabled>
                </div>
            </div>
            <div class="control-group">
            <label class="control-label">End Date :</label>
              <div class="controls">
                <input type="checkbox" name="Midterm_end_date_checkbox" id="end_date_midterm_present"  class="span11" checked disabled/> Present
              </div>
              <div class="controls">
                <input type="text" name="Midterm_end_date" id="end_date_midterm" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker span11" disabled>
                </div>
            </div>


            <div class="control-group inline-group">
              <input type="checkbox" name="Final_enable" class="span11"  id="finalEnable"/> <label class="control-label"><b>Final Period</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Start Date:</label>
              <div class="controls">
                <input type="text" name="Final_start_date"  id="start_date_final" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker span11" disabled>
                </div>
            </div>
            <div class="control-group">
            <label class="control-label">End Date :</label>
              <div class="controls">
                <input type="checkbox" name="Final_end_date_box" id="end_date_final_present" class="span11" checked disabled/> Present
              </div>
              <div class="controls">
                <input type="text" name="Final_end_date_" id="end_date_final" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker span11" disabled>
                </div>
            </div>

              </div>
              <div class="modal-footer">
              <input type="hidden" name="request_code" value="1141">
              <a data-dismiss="modal" class="btn btn-inverse" href="#">Cancel</a> 
              <button type="submit" class="btn btn-success">Save</button>
               
              </div>
            </div>
      </form>
          <div class="span12">

          
            <div class="controls span6">
                <select id="couseSelected" class="span4" data-style="btn-primary">
                <?php
                  $GradeBookList = GetGradeBookList();
                  while ($value = mysql_fetch_assoc($GradeBookList)) {
                  echo '<option value="'.$value['gradebook_id'].'"><b>'.$value['_code'].'</b> - '.$value['_name'].'</option>';
                  }
                ?>
                </select>
                <select id="activitySelected" class="span4" data-style="btn-primary">
                  <option value="1">Quizzes</option>
                  <option value="2">Laboratory</option>
                  <option value="3">Assessment</option>
                  <option value="4">Exam</option>
                </select>
                <button type="submit" id="subjectSelected" class="btn span2">Select</button>
                <button type="submit" id="byAverage" class="btn span2">By Average</button>
            </div>
            <div class="controls span6 text-right">
                <button type="submit" class="btn btn-inverse">Prelim</button>
                <button type="submit" class="btn">Midterm</button>
                <button type="submit" class="btn">Final</button>
                <button type="submit" class="btn">Rating</button>
                <a href="#createGradebook" id="CreateGradeBook" data-toggle="modal" class="btn btn-info pull-right"><i class="icon-plus"></i> Create Grade Book</a>
            </div>
          </div>
        </div>
        
      </div>
  </div>
<!--End-breadcrumbs-->

  <div class="container-fluid no-padding">
    
      
    
    <div class="row-fluid no-margin">
      <div class="gridContainer">
        <div id="gradebook"></div>
    </div>
    </div>
  </div>
</div>

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script src="js/bootstrap-colorpicker.js"></script> 




<script src="js/custom.js"></script> 
<script src="js/ipgrid/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/ipgrid/ip.grid.js"></script>
<script src="js/gradebook.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>





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
   document.gomenu.selector.selectedIndex = 2;
}
 
</script>
</body>
</html>
