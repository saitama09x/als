<!doctype html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Serialization to JSON</title>
</head>
<script src="codebase/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="codebase/dhtmlxscheduler_flat.css" type="text/css"  title="no title"
        charset="utf-8">
  <script src="codebase/ext/dhtmlxscheduler_editors.js" type="text/javascript" charset="utf-8"></script>
  <script src="codebase/ext/dhtmlxscheduler_minical.js" type="text/javascript" charset="utf-8"></script>
 <script src="codebase/ext/dhtmlxscheduler_serialize.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css" >
  html, body{
    margin:0px;
    padding:0px;
    height:100%;
    overflow:hidden;
  } 
  .dhx_cal_navline input{
    width:80px;
    position:absolute;
    top:1px;
    font-family:Tahoma;
    font-weight:8pt;
  }
  .save_btn{
    background-color: #5780AD;
    border: none;
    color: #FFF;
    font-family: "Segoe UI",Arial;
    font-weight: lighter;
    text-decoration: none;
    font-size: 20px;
    padding: 4px 25px;
    float: right;
  }
  .autocomplete-group {
    background: #fff;
    padding: 5px;
    font-weight: bold;
    color: #505050;
    font-family: "Segoe UI",Arial;
}
.autocomplete-suggestion {
    background: #fff;
    padding: 0px 0px 5px 18px;
    color: #2d2d2d;
    font-family: "Segoe UI",Arial;
}
.autocomplete-suggestion.autocomplete-selected {
    background: #FE7510;
    color: #FFFFFF;
    font-family: "Segoe UI",Arial;
}
</style>


<script type="text/javascript" charset="utf-8">

  
  function init() {
     
      scheduler.config.multi_day = true;
  
    
      scheduler.locale.labels.section_text = 'Text';

      scheduler.config.lightbox.sections = [
        
        { name: "Title/Name of event", height: 50, map_to: "text", type: "textarea", focus: true },
        { name: "Description", height: 50, map_to: "details", type: "textarea", focus: false },
        { name: "time", height: 72, type: "calendar_time", map_to: "auto" },
        { name: "Course/Student", height: 30, map_to: "courseOrStudent", type: "textarea", focus: false }
        
      ];


     scheduler.attachEvent("onLightbox", function(id){
        var event = scheduler.getEvent(id);
          test_call();
      });

     scheduler.attachEvent("onEventChanged", function(id,ev){
        var form = document.forms[0];
        form.action = "_calendar_saver.php?action=save";
        form.elements.data.value = scheduler.toJSON();
        form.submit();
    });

    scheduler.attachEvent("onEventSave",function(id,ev,is_new){
        if (!ev.text) {
            alert("Text must not be empty");
            return false;
        }else{
          var form = document.forms[0];
          form.action = "_calendar_saver.php?action=save";
          form.elements.data.value = scheduler.toJSON();
          form.submit();
        }
        return true;
    })

      scheduler.config.full_day = true;

      scheduler.config.xml_date = "%Y-%m-%d %H:%i";
          scheduler.init('scheduler_here',new Date(),"month");

    scheduler.load("_calendar_saver.php?action=data","json");


  }
  
  function show() {
    alert(scheduler.toJSON());
  }
  function save() {c
    var form = document.forms[0];
    form.action = "_calendar_saver.php?action=save";
    form.elements.data.value = scheduler.toJSON();
    form.submit();

  }
  function download() {
    var form = document.forms[0];
    form.action = "./data/json_download.php";
    form.elements.data.value = scheduler.toJSON();
    form.submit();
  }

  function test_call() {

    $.ajax({
        type: "POST",
        url: "request_.php",
        data: {
              'request_code'  : 5151
        },
        cache: false,
        success: function(result){
            console.log(result);

            var data = jQuery.parseJSON(result);

            var Subject = $.map(jQuery.parseJSON(result).subject, function (team) { return { value: team, data: { category: 'Subject List' }}; });
            var Student = $.map(jQuery.parseJSON(result).student, function (team) { return { value: team, data: { category: 'Student List' }}; });

            var Data_ = Subject.concat(Student);

            $('.dhx_cal_ltext textarea').last().devbridgeAutocomplete({
                lookup: Data_,
                minChars: 1,
                onSelect: function (suggestion) {
                    $('#selection').html('You selected: ' + suggestion.value + ', ' + suggestion.data.category);
                },
                showNoSuggestionNotice: true,
                // noSuggestionNotice: "No Select",
                groupBy: 'category',
                onSearchComplete: function (query, suggestions) {
                    if(!suggestions.length){
                          $(this).val("");
                    }
                }
            });
    
        }
      });
    
}
</script>

<body onload="init();">
  <div style='height:20px; padding:5px 10px;'>
  

   <!--  <input type="button" name="download" value="Download" onclick="download()" style="right:500px;" />
    <input type="button" name="show" value="Show" onclick="show()" style="right:400px;" /> -->
    <!-- <input type="button" name="save" value="Save" class="save_btn" onclick="save()" style="right:300px;" /> -->
  </div>
  <form action="./php/json_writer.php" method="post" target="hidden_frame" accept-charset="utf-8">
    <input type="hidden" name="data" value="" id="data">
  </form>
  <iframe src='about:blank' frameborder="0" style="width:0px; height:0px;" id="hidden_frame" name="hidden_frame"></iframe>
  <div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
    <div class="dhx_cal_navline">
      <div class="dhx_cal_prev_button">&nbsp;</div>
      <div class="dhx_cal_next_button">&nbsp;</div>
      <div class="dhx_cal_today_button"></div>
      <div class="dhx_cal_date"></div>
      <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
      <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
      <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
    </div>
    <div class="dhx_cal_header">
    </div>
    <div class="dhx_cal_data">
    </div>    
  </div>

   <script type="text/javascript" src="js/autocomplete/scripts/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/autocomplete/scripts/jquery.mockjax.js"></script>
    <script type="text/javascript" src="js/autocomplete/src/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="js/autocomplete/scripts/countries.js"></script>
    <script type="text/javascript" src="js/autocomplete/scripts/demo.js"></script>
</body>
