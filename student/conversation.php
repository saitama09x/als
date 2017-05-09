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
       <div class="message_container">
          <div class="span4 messageList">
            <div class="messageBanner">
              <div class="row-fluid">
              <div class="span10"><h6>Messages</h6></div>
              <div class="span2"><button class="btn btn-primary" id="compose_new_message"><i class="icon-comment"></i></button></div>
              </div>
              <div class="row-fluid">
              <input type="text" id="SearchMessage" class="span12" placeholder="Search">
              </div>
            </div>
            <ul class="recent-posts" id="MessageList_Container">
            

            </ul>
          </div>
          <div class="span8">
            <div class="message_read hide">
              <div class="message full" id="FullMessageContainer"> 
             

              </div>
            </div>
            <div class="message_compose form-horizontal">
              
                <div class="control-group">
                  <div class="controls">
                    <select class="span12" id="studentList"  placeholder="Recipient" multiple >
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  
                  <div class="controls">
                    <input type="text" class="span12" id="email_subject" placeholder="Subject" />
                  </div>
                </div>
                <div class="control-group">
                 
                  <div class="controls">
                    <textarea class="textarea_editor span12" id="compose_message" rows="17" placeholder="Enter text ..."></textarea>
                    <p class="margin">
                    <input type="hidden" id="message_type" name="message_type" value="0">
                    <button class="btn btn-primary" id="compose_send">Send</button>
                    <button class="btn">Attach Files</button>
                    </p>
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

<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/bootstrap-colorpicker.js"></script> 
<script src="../js/bootstrap-datepicker.js"></script> 
<script src="../js/jquery.toggle.buttons.js"></script> 
<script src="../js/masked.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.form_common.js"></script> 
<script src="../js/wysihtml5-0.3.0.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/bootstrap-wysihtml5.js"></script> 
<script src="../js/custom.js"></script> 

<script>
  // $('.textarea_editor').wysihtml5();
  $('#compose_message').wysihtml5();
</script>

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
