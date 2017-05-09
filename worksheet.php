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
       <div class="row-fluid">
      <div class="span6" >
      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Create Module</h5>
          </div>
          <div class="widget-content">
          <form action="request_.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Module Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="name" />
              </div>
            </div>
            <div class="form-actions">
              <input type="hidden" name="request_code" value="5235">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
          </div>
        </div>
        </div>
      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Add Sheets</h5>
          </div>
          <div class="widget-content">
          <form action="request_.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Sheets Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="name"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Description :</label>
              <div class="controls">
                <textarea class="span11" name="description" ></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Worksheet Group</label>
              <div class="controls">
                <select name="worksheetParent">
                <?php
                  $GetWorkSheetGroupList = GetWorkSheetGroupList();
                  while ($value = mysql_fetch_assoc($GetWorkSheetGroupList)) {
                   echo '<option value="'.$value['_id'].'">'.$value['_name'].'</option>';
                  }
                ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Student :</label>
              <div class="controls">
                <input type="file" name="files[]" multiple="multiple" class="span11 selectFiles" placeholder="First name" id="selectFiles" data-filetype="1" />
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Teacher :</label>
              <div class="controls">
                <input type="file" name="files[]" multiple="multiple" class="span11 selectFiles" placeholder="First name" id="selectFiles" data-filetype="2" />
              </div>
            </div>
            <div class="form-actions">
              <input type="hidden" name="filerID" id="filerID">
              <input type="hidden" name="request_code" value="5236">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
          </div>
        </div>
        </div>
      </div>
      <div class="span6" >
      <div class="row-fluid">
        <div class="widget-box">
          <div class="widget-title">
            <h5>Worksheets</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="" method="post" class="form-horizontal">
               
            
            <div class="form-actions">
               <select name="worksheetParentSelected" class="span8">
                <?php
                  $GetWorkSheetGroupList = GetWorkSheetGroupList();
                  while ($value = mysql_fetch_assoc($GetWorkSheetGroupList)) {
                   echo '<option value="'.$value['_id'].'">'.$value['_name'].'</option>';
                  }
                ?>
                </select>
                 <button type="submit" class="btn btn-success pull-right">View</button>
            </div>
          </form>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>School Year</th>
                  <th>ACtion</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $x= false;

                  if(isset($_POST['worksheetParentSelected'])){
                    $WorksheetList = GetSheetList($_POST['worksheetParentSelected']);
                    while ($value = mysql_fetch_assoc($WorksheetList)) {
                     echo '<tr class="gradeX">
                              <td><b>'.$value['_name'].'</b></td>
                              <td>'.$value['_description'].'</td>
                              <td class="center"><button class="btn btn-mini btn-danger viewAssessment">Remove</button></td>
                            </tr>';
                    $x = true;
                    }
                  }
                ?>
              </tbody>
            </table>
            <?php
            if(!$x){
                    echo '<div class="text-center"><h4>No Worksheet Selected</h4></div>';
                  }
            ?>
          </div>
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
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

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
   document.gomenu.selector.selectedIndex = 5;
}
$( window ).load(function() {
    var id = makeid();
    $('#filerID').val(id);
    FILERINIT(id);
});

function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 20; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
</script>
</body>
</html>
