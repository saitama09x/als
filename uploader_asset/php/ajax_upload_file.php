<?php
    include('class.uploader.php');
   
    $user_accct = filter_var($_COOKIE['u_acc_auth'], FILTER_SANITIZE_STRING);
    $hash_time = md5(time());
    $userID = $user_accct ."-". $hash_time;
    $files['metas'][0]['name'] = $userID;
    $uploader = new Uploader();
    $data = $uploader->upload($_FILES['files'], array(
        'limit' => 100, //Maximum Limit of files. {null, Number}
        'maxSize' => 100, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => null, //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => 'uploads/', //Upload directory {String}
        'title' => array($files['metas'][0]['name']), //New file name {null, String, Array} *please read documentation in README.md
        'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
        'replace' => false, //Replace the file if it already exists  {Boolean}
        'perms' => null, //Uploaded file permisions {null, Number}
        'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
        'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
        'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
        'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
        'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
        'onRemove' => null //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
    ));

    if($data['isComplete']){
        $files = $data['data'];

        echo json_encode(array("fullname" => $files['metas'][0]['name'], 
            "stored" => $hash_time));
    }

    if($data['hasErrors']){
        $errors = $data['errors'];
        echo json_encode($errors);
    }

    exit;
?>
