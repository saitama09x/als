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
    <div class="span6">
      <div class="widget-box ">
        <div class="widget-title">
          <h5>Join Course</h5>
        </div>
        <div class="widget-content nopadding">
          <?php
          if(isset($_POST['joincourse'])){
            echo JoinCourse($_POST);
          }
          ?>        
          <form action="#" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Couse Name: </label>
              <div class="controls">
                <select  class="span8" name="course">
                  <?php $result = GetSubjectList(); while($row=mysql_fetch_assoc($result)){ echo "<option value='".$row['_id']."''>".$row['_code']."</option>"; } ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Registration Code :</label>
              <div class="controls">
                <input type="text" class="span5" name="code" placeholder="Ex. COURSE-4OKNEQ3IPO" />
              </div>
            </div>
            <div class="form-actions">
              <input type="hidden" name="joincourse">
              <button type="submit" class="btn btn-success pull-right">Join</button>
            </div>
          </form>
        </div>
      </div>
      </div>
      <div class="span6">
      <table class="table data-table" id="Table_Student_List_Subject" cellspacing="0" width="100%">
          <thead>
             <tr>
              <th class="text-left">Course Code</th>
              <th class="text-left">Course Name</th>
              <th class="text-left">Status</th>
              <th class="text-left">Date Joined</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php

            $CourseList = GetJoinedSubjectList();

            foreach ($CourseList as $key => $value) {
              echo '<tr class="gradeX">
                      <td>'.$value['course_code'].'</td>
                      <td>'.$value['course_name'].'</td>
                      <td>'.$value['_status'].'</td>
                      <td>'.$value['_date_registered'].'</td>
                      <td class="center"><a href="course.php?id='.$value['_subject_id'].'" class="btn btn-mini btn-success">View</a></td>
                    </tr>';
            }
          ?>
          </tbody>
          <tfoot>
             <tr>
              <th class="text-left">Course Code</th>
              <th class="text-left">Course Name</th>
              <th class="text-left">Status</th>
              <th class="text-left">Date Joined</th>
              <th>Action</th>
            </tr>
          </tfoot>
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

<?php Footer(); ?>

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
