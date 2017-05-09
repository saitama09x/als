<?php

include 'db_init.php';
    
    if(isset($_POST['IDNumber'])){

        $GeneratedID = GenerateString(25);
        if($r=mysql_query("INSERT INTO  accounts (_account_id,_personal_id,_email,_password,_fn,_sn,_mn,_account_access,_account_date_registered)
            values (
            '$GeneratedID',
            '$_POST[IDNumber]',
            '$_POST[email]',
            'md5($_POST[password])',
            '$_POST[fn]',
            '$_POST[sn]',
            '$_POST[mn]',
            '1',
            NOW()
        )",$con))
        {
            SetCookies($GeneratedID); 
            header("location:account.php");
        }
    }
    
function GenerateString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function SetCookies($value){
        setcookie("u_acc_auth", $value, time()+3600); 
    }
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" method="POST" class="form-vertical" action="">
				 <div class="control-group normal_text"> <h3>Alternative Learning System</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-envelope"> </i></span><input name="email" type="email" placeholder="Email Address" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-lock"></i></span><input type="password" placeholder="Retype Password" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-credit-card"></i></span><input name="IDNumber" type="text" placeholder="ID Number" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input name="fn" type="text" placeholder="First Name" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input name="mn" type="text" placeholder="Middle Name" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input name="sn" type="text" placeholder="Surname" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Login</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Sign up"/></span>
                </div>
            </form>
           
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>

