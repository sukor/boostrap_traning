<?php


if(isset($_POST['upload'])){
$target_dir='upload/';
// $newfile=time().$_FILES['uploadfile']['name'];
// $target_file=$target_dir.$newfile;
// $filetype=pathinfo($target_file,PATHINFO_EXTENSION);

$filetype=pathinfo($_FILES['uploadfile']['name'],PATHINFO_EXTENSION);
$newfile=$_POST['filename'].'.'.$filetype;
$target_file=$target_dir.$newfile;

$check=1;


		if($filetype != 'pdf' && $filetype != 'doc'){
			$errorup[]='format not valid';
         $check=0;
		}

		if($_FILES['uploadfile']['size'] > 1048570 ){
          $errorup[]='file to large';
         $check=0;
		}

    
    if($check==1){

       $sec= move_uploaded_file($_FILES['uploadfile']
        	['tmp_name'], $target_file);

           if($sec){
            echo 'upload';
           }else{
              echo 'not upload';
           }


    }else{
    	

    	foreach ($errorup as  $value) {
    		echo '<div class="alert alert-danger" role="alert">'
    		.$value.'</div>';
    	}


    }





}






?>