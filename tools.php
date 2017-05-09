<?php

    $req_dump = print_r($_POST, TRUE);
    $fp = fopen('request.log', 'a');
    fwrite($fp, $req_dump);
    fclose($fp);


    
        echo mysql_errno($con) . ": " . mysql_error($con) . "\n";

        meta_id		meta_key	meta_value	meta_extra
			1		owner_id	123		null
			1		subject_id	37		1
			1		student_id	321		0012
			1		student_id	322		0023
			1		student_id	322		0023
		0012		value		25		1
		0023		value		23		1
		

_A = select * gradebookMeta where meta_key = 'subject_id' and meta_value= '37';

select * gradebookMeta where meta_id= _A.meta_id and meta_key = 'student_id'



	$req_dump = print_r($record, TRUE);
	file_put_contents('request.log', $req_dump);

?>