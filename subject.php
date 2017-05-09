<?php
include 'init_include.php';
?>

<?php HeaderSideMenu(); ?>

<?php
  $_result = 0;
  if(isset($_POST['add_subject'])){
    $_result = AddSubject(
          $_BackAddress,
          $_POST['code'],
          $_POST['name'],
          $_POST['schedule'],
          $_POST['description'],
          $_POST['_registration_code'],
          $_POST['status'],
          $_POST['max_student']
      );
  }
  

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
      <div class="span6">
      <?php
      if(isset($_POST['addstudenttosubject'])){
            $errorcount = 0;
                foreach ($_POST['subject_code'] as $subject) {
                  foreach ($_POST['student_name'] as $student) {
                    if($r=mysql_query("INSERT INTO  students (_student_id,_subject_id,_status,_date_registered)
                        values (
                        '$student',
                        '$subject',
                        '1',
                         NOW()
                    )",$con))
                    {
                        
                    }else{
                      $errorcount++;
                    }
                  }
                }
                if($errorcount<1){
                  echo NotificationBar('success','adding students to a subject has been successful');
                }
            }
      ?>
     <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add student to my course</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Course</label>
              <div class="controls">
                <select multiple name="subject_code[]">
                  <?php $result = GetSubjectList(); while($row=mysql_fetch_assoc($result)){ echo "<option value='".$row['_id']."''>".$row['_code']."</option>"; } ?>
                 </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Student</label>
              <div class="controls">
                <select multiple name="student_name[]">
                  <?php $result = GetStudentList(); while($row=mysql_fetch_assoc($result)){ echo "<option value='".$row['_account_id']."'>".$row['_fn']."</option>"; } ?>
                </select>
              </div>
            </div>
            
            <div class="form-actions">
              <input type="hidden" name="addstudenttosubject">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
      <?php
          if($_result == 200){
            echo NotificationBar("success","New subject has been added to your account");
          }else if($_result == 500){
            echo NotificationBar("error","Error Occur while adding subject, Please try again later");
          }


          ?>
        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add Course</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Course Code :</label>
              <div class="controls">
                <input type="text" class="span11" name="code" placeholder="Code" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Course Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" placeholder="Name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Schedule :</label>
              <div class="controls">
                <input type="text" class="span11" name="schedule" placeholder="Schedule" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Maximum Students :</label>
              <div class="controls">
                <input type="number" class="span11" name="max_student" placeholder="Maximum students" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Status :</label>
              <div class="controls">
                <select name="status" class="span11">
                <option value="1">Public</option>
                <option value="2">Private</option>
                <option value="3">Closed</option>
                <option value="4">Inactive</option>
                </select>
                <span class="help-block">Description field</span>
              </div> 
            </div>
            <div class="control-group">
              <label class="control-label">Description: </label>
              <div class="controls">
                <textarea class="span11" name="description" ></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Registration Code :</label>
              <div class="controls">
                <input type="text" class="span11" name="_registration_code" value="COURSE-<?php echo strtoupper(GenerateString(10)); ?>" placeholder="" readonly="readonly"/>
              </div>
            </div>
            <div class="form-actions">
              <input type="hidden" name="add_subject">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>

    </div>
    <div class="span6">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>My Course</h5>
          </div>
          <div class="widget-content">
          <div class="accordion" id="collapsible">
          <?php $result = GetSubjectList(); while($row=mysql_fetch_assoc($result)){

                if($row['_status'] == '1'){
                  $subject_status = '<span class="badge badge-success pull-right"> Public </span>';
                  $subject_status_ = '<span class="badge badge-success"> Public </span>';
                }else if($row['_status'] == '2'){
                  $subject_status = '<span class="badge badge-warning pull-right"> Private </span>';
                  $subject_status_ = '<span class="badge badge-warning"> Private </span>';
                }else if($row['_status'] == '3'){
                  $subject_status = '<span class="badge badge-important pull-right"> Closed </span>';
                  $subject_status_ = '<span class="badge badge-important"> Closed </span>';
                }else if($row['_status'] == '4'){
                  $subject_status = '<span class="badge badge-inverse pull-right"> Inactive </span>';
                  $subject_status_ = '<span class="badge badge-inverse"> Inactive </span>';
                }
                /*<strong></strong> <span class="label label-info"> <?php echo $row['_name']; ?> </span> <?php echo $subject_status; ?>*/
              
                ?>
                  
                    <div class="accordion-group widget-box">
                      <div class="accordion-heading">
                        <div class="widget-title "> <a data-parent="#collapse-group" href="#<?php echo $row['_id']; ?>" data-toggle="collapse"> <span class="icon"><i class="icon-book"></i></span>
                          <h5 class=""><?php echo $row['_code']; ?> ( <?php echo $row['_name']; ?> )</h5>
                        </a>
                          </div>
                      </div>
                      <div class="collapse accordion-body" id="<?php echo $row['_id']; ?>">
                        <div class="widget-content"> 
                            <p>
                              <a href="#myModal" data-toggle="modal" class="btn btn-mini btn-success selectSubject" data-subject="<?php echo $row['_id']; ?>">View list of Students</a>
                              <a data-toggle="collapse" href="#sub_<?php echo $row['_id']; ?>" class="btn btn-mini btn-mini">Modify</a>
                              <a class="btn btn-mini btn-danger">Remove</a>
                              <?php echo $subject_status; ?>

                              <div id="myModal" class="modal hide">
                                <div class="modal-header">
                                  <button data-dismiss="modal" class="close" type="button">×</button>
                                  <h5 class=""><?php echo $row['_code']; ?> ( <?php echo $row['_name']; ?> )</h5>
                                </div>
                                <div class="modal-body">
                                   <table class="table table-bordered" id="Table_Student_List_Subject" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th>Name</th>
                                              <th>Email</th>
                                              <th>Status</th>
                                              <th>View</th>
                                            </tr>
                                          </thead>
                                          <tbody id="StudentListSubject">
                                          </tbody>
                                        </table>

                                </div>
                              </div>

                            </p>
                            <div class="widget-box collapsible">
                                <div id="sub_<?php echo $row['_id']; ?>" class="collapse">
                                  <div class="widget-content"> 
                                              <form action="#" method="POST" class="form-horizontal">
                                                <div class="control-group">
                                                  <label class="control-label">Code :</label>
                                                  <div class="controls">
                                                    <input type="text" class="span11" name="code" placeholder="Code" maxlength="8" > value="<?php echo $row['_code']; ?>" />
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">Name :</label>
                                                  <div class="controls">
                                                    <input type="text" class="span11" name="name" placeholder="Name" value="<?php echo $row['_name']; ?>"/>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">Schedule :</label>
                                                  <div class="controls">
                                                    <input type="text" class="span11" name="schedule" placeholder="Schedule" value="<?php echo $row['_schedule']; ?>"/>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">Maximum Students :</label>
                                                  <div class="controls">
                                                    <input type="number" class="span11" name="max_student" placeholder="Maximum students" value="<?php echo $row['_max_student']; ?>"/>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">Status :</label>
                                                  <div class="controls">
                                                    <select name="status" class="span11" value="<?php echo $row['_status']; ?>">
                                                    <option value="1" <?php if($row['_status']=='1'){echo "selected";} ?> >Public</option>
                                                    <option value="2" <?php if($row['_status']=='2'){echo "selected";} ?> >Private</option>
                                                    <option value="3"<?php if($row['_status']=='3'){echo "selected";} ?>  >Closed</option>
                                                    <option value="4 <?php if($row['_status']=='4'){echo "selected";} ?> ">Inactive</option>
                                                    </select>
                                                    <span class="help-block">Description field</span>
                                                  </div> 
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">Description: </label>
                                                  <div class="controls">
                                                    <textarea class="span11" name="description" ><?php echo $row['_description']; ?></textarea>
                                                  </div>
                                                </div>
                                                <div class="control-group">
                                                  <label class="control-label">Registration Code :</label>
                                                  <div class="controls">
                                                    <input type="text" class="span11" name="_registration_code" value="<?php echo $row['_registration_code']; ?>" placeholder="" readonly="readonly"/>
                                                  </div>
                                                </div>
                                                <div class="form-actions">
                                                  <input type="hidden" name="modify_subject">
                                                  <button type="submit" class="btn btn-success">Save</button>
                                                  <a data-toggle="collapse" href="#sub_<?php echo $row['_id']; ?>" class="btn btn-danger">Cancel</a>
                                                </div>
                                              </form>
                                  </div>
                                </div>
                            </div>
                            <br />
                            <table class="table table-bordered table-invoice">
                              <tbody>
                                <tr>
                                </tr><tr>
                                  <td class="width30">Code:</td>
                                  <td class="width70"><strong><?php echo $row['_code']; ?></strong></td>
                                </tr>
                                <tr>
                                  <td>Name:</td>
                                  <td><strong><?php echo $row['_name']; ?></strong></td>
                                </tr>
                                <tr>
                                  <td>Schedule:</td>
                                  <td><strong><?php echo $row['_schedule']; ?></strong></td>
                                </tr>
                                <tr><td class="width30">Description:</td>
                                  <td class="width70">
                                    <?php echo $row['_description']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Registration Code:</td>
                                  <td><strong><?php echo $row['_registration_code']; ?></strong></td>
                                </tr>
                                <tr>
                                  <td>Student Number:</td>
                                  <td>
                                  <?php
                                  /* get percentage of student for this subject */
                                  $numberofstudent_active = 0;
                                  $numberofstudent_warning = 0;
                                  $numberofstudent_drop = 0;
                                  $totalofstudents = 0;
                                  $result_count = GetStudentCountInSubjectList($row['_id']); 
                                  /* Status Index */
                                    // 1 - active 
                                    // 2 - warning 
                                    // 3 - drop 

                                  while($row_student=mysql_fetch_assoc($result_count)){
                                    if($row_student['_status'] == 1){
                                      $numberofstudent_active++;
                                    }else if($row_student['_status'] == 2){
                                      $numberofstudent_warning++;
                                    }if($row_student['_status'] == 3){
                                      $numberofstudent_drop++;
                                    }
                                    $totalofstudents++;
                                  } 

                                  $getActiveStudent = ( $numberofstudent_active / $row['_max_student'] ) * 100;
                                  $getWarningStudent = ( $numberofstudent_warning / $row['_max_student'] ) * 100;
                                  $getDropStudent = ( $numberofstudent_drop / $row['_max_student'] ) * 100;

                                  ?>
                                  <div class="progress">
                                   <div class="bar bar-success tip-top" data-original-title="<?php echo Decimal($getActiveStudent)."% ( ".$numberofstudent_active." ) student's are active on this subject."; ?>" style="width: <?php echo $getActiveStudent; ?>%"></div>
                                   <div class="bar bar-warning tip-top" data-original-title="<?php echo Decimal($getWarningStudent)."% ( ".$numberofstudent_warning." ) student's have been given warnings for this subject."; ?>" style="width: <?php echo $getWarningStudent; ?>%;"></div>
                                   <div class="bar bar-danger tip-top" data-original-title="<?php echo Decimal($getDropStudent)."% ( ".$numberofstudent_drop." ) student's dropped this subject."; ?>" style="width: <?php echo $getDropStudent; ?>%;"></div>
                                  </div>
                                    <?php echo $totalofstudents; ?> student's registered to this subject
                                  </td>
                                </tr>
                                <tr>
                                  <td>Status:</td>
                                  <td>
                                    <?php echo $subject_status_; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Date:</td>
                                  <td><strong><?php echo date('l jS \of F Y h:i:s A',strtotime($row['_date_added'])); ?></strong></td>
                                </tr>
                                </tbody>
                              
                            </table>

                        </div>
                      </div>
                    </div>
                  
                  <!--  -->
                  <?php } ?>
                  </div>
          </div>
        </div>
         
      
        
      
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->
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

  $(document).ready(function(){
    $(".selectSubject").click(function(){
      var selectedsubject = $(this).data('subject');
      $.ajax({
        type: "POST",
        url: "request_.php",
        data: {
              'request_code'  : 1101,
              'subject'       :selectedsubject
        },
        cache: false,
        success: function(result){
          $('#StudentListSubject').html(result);
          $('#Table_Student_List_Subject').DataTable();
        }
      });
    });
    
  });

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
 

</script>
</body>
</html>
