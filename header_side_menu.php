<?php

   include 'init_account.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Accounts</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />

<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<link rel="stylesheet" href="css/custom.css" />
<link rel="stylesheet" href="css/LoadingCss.css" />
 <link href="css/ip.grid.css" rel="stylesheet" />

 <link href="uploader_asset/css/jquery.filer.css" rel="stylesheet">
  <link href="uploader_asset/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet">
</head>
<body  id="<?php echo GetCurrentPageName();?>">

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <?php echo $account_info->_fn; ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="account.php"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li> <a href="subject.php"><i class="icon icon-book"></i> <span>Course</span></a> </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-calendar"></i> <span>Account Module</span></a>
      <ul>
        <li><a href="conversation.php">Message</a></li>
        <li><a href="news.php">Post</a></li>
        <li><a href="events.php">Celendar</a></li>
      </ul>
    </li>
    <li class="submenu open"> <a href="#"><i class="icon icon-folder-open"></i> <span>Grade Book</span></a>
      <ul>
        <li class="hide"><a href="gradebook.php">Create Grade Book</a></li>
        <li><a href="student_record.php">Student Records</a></li>
        
      </ul>
    </li>
    <li class="submenu open"> <a href="subject.php"><i class="icon icon-star"></i> <span>Assessments</span></a> 
      <ul>
        <li><a href="create_assessment.php">Create</a></li>
        <li><a href="assessment_manage.php">Manage</a></li>
      </ul>
    </li>
    <li class="submenu open"> <a href="subject.php"><i class="icon icon-star"></i> <span>Worksheets</span></a> 
      <ul>
        <li><a href="worksheet.php">Create</a></li>
        <li><a href="worksheet_manage.php">Manage</a></li>
      </ul>
    </li>
    <li class="submenu open"> <a href="subject.php"><i class="icon icon-cloud"></i> <span>Learning Materials</span></a> 
      <ul>
        <li><a href="upload.php">Add materials</a></li>
        <li><a href="learningmaterials.php">Manage Materials</a></li>
      </ul>
    </li>
  </ul>
</div>
<!--sidebar-menu-->