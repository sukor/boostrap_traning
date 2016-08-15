<?php

// echo readfile('upload/webdictionary.txt');

$file='upload/webdictionary.txt';

$files=fopen($file, 'r')or die("Unable to open file!");


while(!feof($files)){

echo fgetc($files);
echo '<br>';

}

fclose($files);

  $student=array(

      	array('name'=>'ali bin abu',
      		   'noic'=>'8910201019',
      		    'regdate'=>'2012-12-1'),
      	array('name'=>'samad bin abu',
      		   'noic'=>'8810201018',
      		   'regdate'=>'2014-12-1'),
      	array('name'=>'Dollah bin ali',
      		   'noic'=>'8810201018',
      		    'regdate'=>'2014-12-1'),
      	array('name'=>'ku ahmad bin abu',
      		   'noic'=>'8810201018',
      		    'regdate'=>'2015-12-1'),


      	);




$file='upload/test.txt';

$myfile=fopen($file,'a') or die('file tiada');

foreach ($student as $row) {
	fwrite($myfile,"'".$row['noic']."', \n");
}


fclose($myfile);



?>