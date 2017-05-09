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
      <a class="btn" target="_blank" href="view_assessment_paper.php?id=<?php echo $_GET['id'];?>">Print Assessment</a>
      <button class="btn">Modify</button>
      <button class="btn">Remove</button>

      <a href="#giveAssessment" id="giveAssessmentButton" data-toggle="modal" class="btn btn-info pull-right"><i class="icon-plus"></i> Give Assessment</a>
      <div id="giveAssessment" class="modal-sm modal  hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3> Give Assessment</h3>
              </div>
              <div class="modal-body form-horizontal">
                <form action="request_.php" method="post">
                <div class="control-group">
                  <label class="control-label"><b>Examinee</b></label>
                </div>
                <div class="control-group">
                  <label class="control-label">Student / Course</label>
                  <div class="controls">
                    <select name="examinieslist[]" id="examiniesList" multiple >
                    </select>
                  </div>
                </div>
            <div class="control-group">
              <label class="control-label"><b>Date and Time</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Date Start:</label>
              <div class="controls">
                <input type="text" name="date_start" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker span11">
                </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Time  Start:</label>
              <div class="controls">
                <input type="text" name="time_start" class="span8 mask text timepicker">
                <span class="help-block blue span8">06:30 PM</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date End:</label>
              <div class="controls">
                <input type="text" name="date_end" data-date="<?php echo date('Y-m-d');?>" data-date-format="yyyy-mm-dd" value="<?php echo date('Y-m-d');?>" class="datepicker span11">
                </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Time End:</label>
              <div class="controls">
                <input type="text" name="time_end" class="span8 mask text timepicker">
                <span class="help-block blue span8">06:30 PM</span> </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Duration:</label>
              <div class="controls">
                <input type="text" name="duration" class="span8 mask text duration">
                <span class="help-block blue span8">02:30:00 - HH:MM:SS</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label"><b>Criteria</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Random Numbers :</label>
              <div class="controls">
                <input type="checkbox" name="random_numbers" class="span11" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Random Choices :</label>
              <div class="controls">
                <input type="checkbox"  name="random_choices" class="span11" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label"><b>Instructions</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Message</label>
              <div class="controls">
                <textarea class="span11"  name="message"></textarea>
              </div>
            </div>
               
              </div>
              <div class="modal-footer">
              <input type="hidden" name="assessment_id" value="<?php echo $_GET['id'];?>">
              <input type="hidden" name="request_code" value="1104">
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
            <h5>Assessment Examinees</h5>
          </div>
          <div class="widget-content nopadding">

            <table id="student_list" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $examineesList = getExamineesByAssessment($_GET['id']);
                  foreach ($examineesList as $value) {
                   echo '<tr class="gradeX">
                            <td><b>'.$value['name'].'</b></td>
                            <td>'.$value['subject'].'</td>
                            <td>'.$value['status'].'</td>
                            <td>'.date("F j, Y, g:i a",strtotime($value['date'])).'</td>
                            <td class="center"><button class="btn viewAssessment" data-examineesid="'.$value['assessmentExamineeID'].'" data-assessmentid="'.$_GET['id'].'">View Assessment</button></td>
                          </tr>';
                  }
                ?>
              </tbody>
            </table>
        
          </div>
        </div>
      </div>
      <div class="span6" id="assessment_selected_details">
      <div class="hide" id="loading">
                                  <?=LOADING(); ?>
                              </div>
        <div class="widget-box">
          <div class="widget-title">
          <span class="icon" id="resizeWidht" title="Full Width"> <i class="icon-chevron-left"></i> </span>
            <h5>Student</h5>
          </div>
          <div class="widget-content" id="view_assessment_header">
          <div class="text-center"><h4>No Examinees Selected</h4></div>
          </div>
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

<!-- <script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script> -->

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
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
