<?php
include 'init_include.php';
?>


<?php HeaderSideMenu();
  
  $data = GetCourseCompleteInfo($_GET['id']);

?>

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
      <div class="row-fluid">
              <div class="span6">
                <table class="table no-border">
                  <tbody>
                    <tr>
                      <td>
                      <a href="#" class="btn btn-mini btn-danger pull-right"><i class="icon-remove-sign"></i> Drop this course</a>
                      <h4><?= $data['course']['_name']; ?></h4>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Course Code:</b> <span class="label"><?= $data['course']['_code']; ?></span></td>
                    </tr>
                    <tr>
                      <td><b>Course Description:</b> <?= $data['course']['_description']; ?></td>
                    </tr>
                   <!--  <tr>
                      <td><b>Status:</b> <?php 

                      // 1 - public 
                      // 2 - private
                      // 3 - closed 
                      // 4 - inactive
                      // 5 - removed 
                      if($data['course']['_status'] == '1'){
                        echo '<span class="badge badge-success"> Public </span>';
                      }else if($data['course']['_status'] == '2'){
                        echo '<span class="badge badge-warning"> Private </span>';
                      }else if($data['course']['_status'] == '3'){
                        echo '<span class="badge badge-important"> Closed </span>';
                      }else if($data['course']['_status'] == '4'){
                        echo '<span class="badge badge-inverse"> Inactive </span>';
                      }
                       ?></td>
                      
                     
                    </tr> -->
                  </tbody>
                </table>
              </div>
              <div class="span6">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                      <th colspan="2" class="width30 bg_lg text-center">Instructor Details</th>
                    </tr>
                    <tr>
                    <tr>
                      <td class="width30">Name:</td>
                      <td class="width70"><strong><?= $data['instructor']['_fn']." ".$data['instructor']['_sn']; ?></strong>
                          <a href="#" class="btn btn-mini btn-success pull-right"><i class="icon-comment"></i> Open Chat</a></td>
                    </tr>
                    <tr>
                      <td>Instructor ID:</td>
                      <td><strong><?= $data['instructor']['_personal_id']; ?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>Email Address:</td>
                      <td><strong><?= $data['instructor']['_email']; ?></strong>
                      <a href="#" class="btn btn-mini btn-success pull-right"><i class="icon-envelope-alt"></i> Send Email</a></td>
                    </tr>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th colspan="7" class="bg_ly"><h5>List of Assessments</h5></th>
                    </tr>
                    <tr>
                      <th class="head0 bg_low_ly">Assessment</th>
                      <th width="50%" class="head1 bg_low_ly">Message</th>
                      <th class="head2 right bg_low_ly">Duration</th>
                      <th class="head3 right bg_low_ly">Status</th>
                      <th class="head4 right bg_low_ly">Score</th>
                      <th class="head5 right bg_low_ly">Date</th>
                      <th class="head6 right bg_low_ly">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $AssessmentList = GetAssessmentListByStudent($_GET['id']);
                    if(sizeof($AssessmentList)==0){
                      echo '<tr>
                              <td colspan="7" class="text-center">No Assessment</td>
                            </tr>';
                      die();
                    }

                    foreach ($AssessmentList as $key => $value) {
                      echo '<tr>
                              <td><strong>'.$value['title'].'</strong></td>
                              <td>'.$value['desc'].'</td>
                              <td>'.$value['duration'].'</td>
                              <td>'.$value['status'].'</td>
                              <td>'.$value['score'].'</td>
                              <td>'.$value['date'].'</td>
                              <td>'.$value['button'].'</td>
                            </tr>';
                    }

                    ?>
                    
                    
                  </tbody>
                </table>
              </div>
              </div>
            <div class="row-fluid">
              <div class="span4">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th colspan="5"  class="bg_lg"><h5>Upcoming Schedule</h5></th>
                    </tr>
                    <tr class="bg_w">
                      <th class="head0 bg_low_lg">Type</th>
                      <th class="head1 bg_low_lg">Desc</th>
                      <th class="head0 bg_low_lg right">Date</th>
                    </tr>
                  </thead>
                  <tbody class="bg_w">
                  <?php

                  foreach (getUpComingSchedule($_GET['id']) as $key => $value) {
                    echo '<tr>
                            <td>'.$value['type'].'</td>
                            <td width="60%">'.$value['desc'].'</td>
                            <td class="right">'.$value['date'].'</td>
                          </tr>';
                  }

                  ?>
                    
                  </tbody>
                </table>
              </div>
              <div class="span4">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                     <tr>
                      <th colspan="5"  class="bg_lg"><h5>Announcement</h5></th>
                    </tr>
                    <tr>
                      <th class="bg_low_lg">Name</th>
                      <th class="bg_low_lg">Description</th>
                      <th class="bg_low_lg right">Date</th>
                    </tr>
                  </thead>
                  <tbody class="bg_w">
                  <?php $result = GetSubjectMaterialList($_GET['id']); 
                  while($row=mysql_fetch_assoc($result)){
                    // echo '<tr>
                    //         <td width="30%">'.$row['_name'].'</td>
                    //         <td>'.$row['_description'].'</td>
                    //         <td class="right"><button class="btn btn-mini btn-success">Download</button</td>
                    //       </tr>';
                  }
                  ?>
                    
                  </tbody>
                </table>
              </div>
              <div class="span4">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th colspan="5"  class="bg_lg"><h5>Learning Materials</h5></th>
                    </tr>
                    <tr>
                      <th class="bg_low_lg">File Name</th>
                      <th class="bg_low_lg">Description</th>
                      <th class="bg_low_lg right">Action</th>
                    </tr>
                  </thead>
                  <tbody class="bg_w">
                  <?php $result = GetSubjectMaterialList($_GET['id']); 
                  while($row=mysql_fetch_assoc($result)){
                    echo '<tr>
                            <td width="20%">'.$row['_name'].'</td>
                            <td>'.$row['_description'].'</td>
                            <td class="right"><button class="btn btn-mini btn-success">Download</button</td>
                          </tr>';
                  }
                  ?>
                  </tbody>
                </table>
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
