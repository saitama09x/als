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
      <div class="span8">
       
      <div id="LearningMaterials" class="modal-sm modal  hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3> Create Grade Book</h3>
              </div>
              <div class="modal-body form-horizontal">
                <div class="control-group">
                  <p>
                    <select class="span6" name="ShareLearningMaterialsList[]" id="ShareLearningMaterialsList" placeholder="Add Student or Subject" multiple>
                    </select> &nbsp;
                    <input type="hidden" name="material_id" id="material_id">
                    <input type="hidden" name="request_code" value="5122">
                    <button type="submit" class="btn btn-success" id="submitShareLearningMaterials">Save</button>
                    </p>
                </div>
                <hr>
                <table class="table table-bordered" id="learningMaterialsTable">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>Date Authorized</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="learningMaterialsList">
              </tbody>
            </table>
              </div>
            </div>
      <div class="widget-box">
          <div class="widget-title">
            <h5>Learning Materials</h5>
          </div>
          <div class="widget-content">
              
                <?php $result = GetLearningMaterialsList(); 


                  $filesSet = array();
                  while($row=mysql_fetch_assoc($result)){ 

                      $FileIcon = "";
                      $fileExtension = scandir('img/icons/files');
                      foreach ( $fileExtension as $val ) {
                        $extensionIcon = explode('.', $val);
                        if($extensionIcon[0]==strtolower($row['_file_extension'])){
                          $FileIcon = $val;
                        }
                      }

                      if($FileIcon==''){
                        $FileIcon = 'file.png';
                      }

                      $year = date('Y',strtotime($row['_date_upload']));
                      $month = date('F',strtotime($row['_date_upload']));
                      $_files = array();
                      if(array_key_exists($year, $filesSet)){
                        if(array_key_exists($month, $filesSet[$year])){
                           
                          $file_meta = array();
                          $file_meta['_id'] = $row['_id'];
                          $file_meta['_account_id'] = $row['_account_id'];
                          $file_meta['_name'] = $row['_name'];
                          $file_meta['_description'] = $row['_description'];
                          $file_meta['_file_name'] = $row['_file_name'];
                          $file_meta['_file_size'] = $row['_file_size'];
                          $file_meta['_file_extension'] = $row['_file_extension'];
                          $file_meta['_file_url'] = $row['_file_url'];
                          $file_meta['_date_upload'] = $row['_date_upload'];
                          $file_meta['icon'] = $FileIcon;

                          $filesSet[$year][$month][sizeof($filesSet[$year][$month])] =$file_meta;
                        }else{
                          
                          $file_meta = array();
                          $file_meta['_id'] = $row['_id'];
                          $file_meta['_account_id'] = $row['_account_id'];
                          $file_meta['_name'] = $row['_name'];
                          $file_meta['_description'] = $row['_description'];
                          $file_meta['_file_name'] = $row['_file_name'];
                          $file_meta['_file_size'] = $row['_file_size'];
                          $file_meta['_file_extension'] = $row['_file_extension'];
                          $file_meta['_file_url'] = $row['_file_url'];
                          $file_meta['_date_upload'] = $row['_date_upload'];
                          $file_meta['icon'] = $FileIcon;

                          $filesSet[$year][$month][0] = $file_meta;
                        }
                      }else{
                         
                          $file_meta = array();
                          $file_meta['_id'] = $row['_id'];
                          $file_meta['_account_id'] = $row['_account_id'];
                          $file_meta['_name'] = $row['_name'];
                          $file_meta['_description'] = $row['_description'];
                          $file_meta['_file_name'] = $row['_file_name'];
                          $file_meta['_file_size'] = $row['_file_size'];
                          $file_meta['_file_extension'] = $row['_file_extension'];
                          $file_meta['_file_url'] = $row['_file_url'];
                          $file_meta['_date_upload'] = $row['_date_upload'];
                          $file_meta['icon'] = $FileIcon;

                         $filesSet[$year][$month][0] = $file_meta;
                      }

                      

                      // echo sizeof($filesSet[$year][$month]);

                      // echo '';

                      
                  } 
                  // echo '<pre>';
                  // print_r($filesSet);
                  // echo '</pre>';

                  foreach ($filesSet as $key => $value) {
                    
                    echo '<div class="year-label">
                            <h2>'.$key.'</h2>
                          </div>';

                    foreach ($value as $key => $value_month) {
                      echo '<div class="month-label">
                              <h4>- '.$key.' -</h4>
                              <hr width="20%">
                            </div>';

                      echo '<div class="fileList">';
                      foreach ($value_month as $key => $value_file) {
                         echo '
                                <div class="file"
                                data-icons="'.$value_file['icon'].'" 
                                data-_id="'.$value_file['_id'].'" 
                                data-file="'.$value_file['_file_name'].'" 
                                data-_name="'.$value_file['_name'].'" 
                                data-_description="'.$value_file['_description'].'" 
                                data-_file_size="'.formatSizeUnits($value_file['_file_size']).'" 
                                data-_file_extension="'.$value_file['_file_extension'].'" 
                                data-_file_url="'.$value_file['_file_url'].'" 
                                data-_date_upload="'.date("F j, Y, g:i a",strtotime($value_file['_date_upload'])).'" 
                                >
                                  <img src="img/icons/files/'.$value_file['icon'].'" alt="" >
                                  <label>'.$key[0].ttruncat($value_file['_name'],10).'</label>
                                </div>
                              ';
                      }
                      echo '</div>';
                    }
                  }

                  ?>
             <!--  <div class="fileList">
                <div class="file">
                  <img src="img/icons/files/jpg.png" alt="" >
                  <label>test</label>
                </div>
              </div> -->

              
              
          </div>
        </div>
        </div>
        <div class="span4">
          <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>File-info</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="text-center padding noselected ">
            <h3>No Selected File</h3>
          </div>
          <div class="preview_file hide">
            <div class="preview_section">
              <div class="file-thumb">
                
              </div>
              <div class="file-info">
                <table class="table" border="0">
                <tr>
                  <td width="20%">File Name:</td>
                  <td width="30%"><b id="prev_file_name"></b></td>
                  <td width="20%">Date Uploaded:</td>
                  <td width="30%"><b id="prev_file_date"></b></td>
                </tr>
                <tr>
                  <td width="20%">Extension:</td>
                  <td width="30%"><b id="prev_file_ext"></b></td>
                  <td width="20%">Size:</td>
                  <td width="30%"><b id="prev_file_size"></b></td>
                </tr>
              </table>
              </div>
              
            </div>
            <div class="form-horizontal">
              <div class="control-group">
                <label class="control-label">Name:</label>
                <div class="controls">
                  <input type="text" id="input_file_name" class="span11" />
              </div>
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea class="span11" id="input_file_description"></textarea>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-info">Download</button>
                <a href="#" id="removeLearningMaterials" class="btn btn-danger">Remove</a>
                <button class="btn btn-success" id="saveLearningMaterials">Save</button>
                <a href="#LearningMaterials" id="ShareLearningMaterials" data-toggle="modal" class="btn btn-info pull-right">Share</a>
              </div>
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
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/custom.js"></script> 

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
