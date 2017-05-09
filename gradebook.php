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
    <div class="row-fluid">
    <p>
      <a href="#createGradebook" id="CreateGradeBook" data-toggle="modal" class="btn btn-info pull-right"><i class="icon-plus"></i> Create Grade Book</a>
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
               </form>
              </div>
            </div>
    </p>
    </div>
    <div class="row-fluid">
      <div class="span6" id="assessment_taker_list">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Grade Book</h5>
          </div>
          <div class="widget-content nopadding">

            <table id="student_list" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>School Year</th>
                  <th>ACtion</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $GradeBookList = GetGradeBookList();
                  while ($value = mysql_fetch_assoc($GradeBookList)) {
                   echo '<tr class="gradeX">
                            <td><b>'.$value['_code'].'</b> - '.$value['_name'].'</td>
                            <td class="center"><b>'.$value['school_year'].'</b></td>
                            <td class="center"><button class="btn viewAssessment">View Gradebook</button></td>
                          </tr>';
                  }
                ?>
              </tbody>
            </table>
        
          </div>
        </div>
      </div>

      <div class="span6" id="assessment_selected_details">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Selected Grade Book</h5>
          </div>
          <div class="widget-content" id="view_assessment_header">
          <div class="text-center"><h4>No Grade Book Selected</h4></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->

<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
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
<script src="js/custom.js"></script> 
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
<script type="text/javascript">

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
