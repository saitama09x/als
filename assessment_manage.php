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
      
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Assessment</th>
                  <th>Date and Time Start</th>
                  <th>Date and Time End</th>
                  <th>Date Submitted</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $result = GetAssessmentList(); 
                  while($row=mysql_fetch_assoc($result)){ 
                    echo '<tr class="gradeX">
                            <td width="50%"><b>'.$row['_assessment_name'].'</b><br>'.$row['message'].'</b></td>
                            <td>'.date("F j, Y, g:i a",strtotime($row['_data_time_start'])).'</td>
                            <td>'.date("F j, Y, g:i a",strtotime($row['_data_time_end'])).'</td>
                            <td>'.date("F j, Y, g:i a",strtotime($row['date_registered'])).'</td>
                            <td class="center"><a class="btn btn-primary" href="assessment_manage_view.php?id='.$row['_id'].'">View</a></td>
                          </tr>'; 
                  } ?>
                
              </tbody>
            </table>
         
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
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>

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
