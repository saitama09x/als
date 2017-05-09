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
    <div class="row-fluid" id="AssessmentPanel">
      <div class="span8">
      <div class="main-box" id="introduction">
        <div class="box-title text-center">
          <h3>Welcome to Assessment</h3>
          <h5>Please the guidelines and rules of this assessments</h5>
        </div>
        <div class="box-body">
        <div class="guidelines">
          <table class="table">
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Turn off your cellphone.</td>
          </tr>
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Vehicula rutrum metus vestibulum, fusce excepturi inventore porta.</td>
          </tr>
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Natus, soluta dolorem, massa eum?</td>
          </tr>
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Magnam aute dolorum vehicula aliquid ea vitae beatae asperiores nullam. Aute, in, pellentesque, justo molestias vel.</td>
          </tr>
          </table>
        </div>
        <div class="box-footer text-right">
          <button class="btn btn-info btn-large action" data-act="0" >Proceed</button>
        </div>
        </div>
      </div>
      <div class="main-box hide" id="Instruction">
        <div class="box-title text-center">
          <h3>These are the assessment instructions</h3>
          <h5>Please the guidelines and rules of this assessments</h5>
        </div>
        <div class="box-body">
        <div class="guidelines">
          <table class="table">
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Turn off your cellphone.</td>
          </tr>
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Vehicula rutrum metus vestibulum, fusce excepturi inventore porta.</td>
          </tr>
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Natus, soluta dolorem, massa eum?</td>
          </tr>
          <tr>
            <td><i class="icon icon-check"></i></td>
            <td class="text-left">Magnam aute dolorum vehicula aliquid ea vitae beatae asperiores nullam. Aute, in, pellentesque, justo molestias vel.</td>
          </tr>
          </table>
        </div>
        <div class="box-footer text-right">
          <button class="btn btn-info btn-large action" data-act="1" data-id="<?=$_GET['id']?>">Start Assessment</button>
        </div>
        </div>
      </div>
      <div class="main-box hide" id="loading">
          <?=Loading(); ?>
      </div>
      <div class="main-box hide" id="Question">
        <div class="box-title text-center">
          <h3 id="CurrentQuestionShow">Question 1</h3>
        </div>
        <div class="box-body">
        <div class="question">
          <div class="question-holder" id="questionHolder">
          </div>
          <div class="choices" id="choicesHolder">
            
          </div>
          
        </div>
        <div class="box-footer text-right">
          <button class="btn btn-info btn-large" id="next_question">Next Question</button>
        </div>
        </div>
      </div>
      </div> 
      <div class="span4">
        <div class="side-box">
          <div class="box_time">
            <h5 id="date_time_show">Time will display at the start of the assessment</h5>
            <div class="progress progress-striped progress-danger active">
             <div class="bar" style="width: 0%;" id="timerBar"></div>
            </div>
          </div>
          <div class="side-box-meta">
         
            <h5>Status:</h5>
            <ul class="site-stats">
                <li class="btn-inverse"><strong id="NumberOfAnswered">0</strong> <small>Total Answered</small></li>
                <li class="btn-inverse"><strong id="NumberOfQuestions">0</strong> <small>Total Questions</small></li>
              </ul>
            <div class="progress progress-striped active">
             <div class="bar" style="width: 0%;" id="questionBar"></div>
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

<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.interface.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 
<script src="../js/wysihtml5-0.3.0.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/bootstrap-wysihtml5.js"></script> 
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
<script src="../js/student_assessment.js"></script> 

 <script src="uploader_asset/js/jquery.filer.min.js" type="text/javascript"></script>
  <script src="uploader_asset/js/custom.js" type="text/javascript"></script>
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
<script>
  // $('.textarea_editor').wysihtml5();


</script>
</body>
</html>
