<?php

if(ENVIROMENT){

	switch (ENVIROMENT) {
		case 'development':
			error_reporting(E_ALL);
			
			break;
		case 'production':
			error_reporting(0);
			//set_error_handler("customError");
			break;
		
		default:
			exit('environment not set');
	}


}


function customError($err,$errstr){

	 echo '<div  class="alert alert-info"
	  role="alert">'.$errstr.'</div>';


}



?>