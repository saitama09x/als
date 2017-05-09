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
    <form action="request_.php" method="post" >
    <div class="row-fluid">
      <div class="span8">
       
        <input type="text"  name="assessment_name" class="span11 header_input" placeholder="Assessment Name" />
      </div>
      </div>
    <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> 
          <h5>Assessment Sheets</h5>
        </div>

        <div class="widget-content nopadding">
       
        <div class="choices_btn_list">
            <button type="button" class="btn btn-success add_assessment_type" data-type="mc"><i class="icon-plus"></i> Multiple Choice</button>
            <button type="button" class="btn btn-info add_assessment_type"  data-type="tf"><i class="icon-plus"></i> True or False</button>
            <button type="button" class="btn btn-warning add_assessment_type"  data-type="fb"><i class="icon-plus"></i> Fill in the blank</button>
            <button type="button" class="btn btn-danger add_assessment_type"  data-type="essay"><i class="icon-plus"></i> Essay</button>
            <button type="button" class="btn btn-inverse add_assessment_type"  data-type="activity"><i class="icon-plus"></i> Activity</button>
          </div>
          <!-- <input type="submit" value="Submit"> -->
          
        </div>
      </div>
      </div>
      <div class="span3 hide">
      <div class="widget-box">
        <div class="widget-title"> 
          <h5>Assessment Settings</h5>
        </div>
        <div class="widget-content nopadding form-horizontal">
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
                <input type="text" name="time_start" value="12:00 AM" class="span8 mask text timepicker">
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
                <input type="text" name="time_end"  value="12:00 AM" class="span8 mask text timepicker">
                <span class="help-block blue span8">06:30 PM</span> </div>
            </div>
            <div class="control-group">
              <label for="normal" class="control-label">Duration:</label>
              <div class="controls">
                <input type="text" name="duration"  value="12:00 AM" class="span8 mask text duration">
                <span class="help-block blue span8">02:30:00 - HH:MM:SS</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label"><b>Settings</b></label>
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
              <label class="control-label"><b>Rules</b></label>
            </div>
            <div class="control-group">
              <label class="control-label">Message</label>
              <div class="controls">
                <textarea class="span11"  name="message"></textarea>
              </div>
            </div>

        </div>
      </div>
      </div>
    </div>
     <div class="row-fluid">
        <div class="span12">
         <div class="widget-box">
            <div class="widget-content text-right">
              <input type="hidden" name="request_code" value="1102">
              <button type="submit" class="btn btn-success" ><i class="icon-save"></i> Save</button>
              <button type="button" class="btn btn-danger" ><i class="icon-remove"></i> Cancel</button>
              </form>
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

<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script src="js/assessment.js"></script> 
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
