<?php 

function connectionOOP(){
	$conn = new mysqli(DB_SERVERNAME,
	 DB_USERNAME, DB_PASSWORD, DB_NAME);

	if($conn->connect_error){
		die("Connection failed :".
			$conn->connect_error);
	}

	//echo "connection successfully";
	return $conn;
}

function connectionPDO(){
	try{
		$conn = new PDO("mysql:host=".DB_SERVERNAME.
			";dbname=".DB_NAME,
			DB_USERNAME, DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE,
		 PDO::ERRMODE_EXCEPTION);

		return $conn;
	}catch(PDOException $e){
		echo $e->getMessage();
	}
}

function islogin(){

	if(isset($_SESSION['login_status']) 
		&& $_SESSION['login_status']==1 ){

      return true;
	}else{
      
      return false;

	}


}


  function checkasses(){

    if($_SESSION['login_status']!=1)

      header('Location:login.php');

		}


	function welcome(){


		$waktu= date('H');
		//$waktu = 12;

		if($waktu < 12){

         $wel= 'selamat pagi';

		}elseif( $waktu <= 12){

            $wel= 'selamat T/Hari';
		}elseif($waktu <= 18){
             $wel= 'selamat Petang';
		}else{

			 $wel= 'selamat malam';
		}


		return $wel .' '.$_SESSION['name'].
		' '.date('d-m-Y');

	}


function checkemail($email){
	$emailsanti=filter_var($email,FILTER_SANITIZE_EMAIL);
    $val=filter_var($emailsanti,FILTER_VALIDATE_EMAIL);

   return  $val;
}

//function for debug purpose
function fdp($str){
	echo "<pre>";
	print_r($str);
	echo "</pre>";
}

function setUser($sql , $data){
	$conn = connectionOOP();

	if($stmt = $conn->prepare($sql)){

	}else{
		die($conn->error);
	}

	$stmt->bind_param('ssssss', $username, $password,
		$name, $mykad, $reg_date, $level);

	//extract array to variable
	extract($data);

	if($result = $stmt->execute()){}else{
		die($conn->error);
	}

	return $result;
}

function doLogin($username, $password){
	$conn = connectionOOP();

	$sql = "SELECT u_id, u_name, u_username, u_level
	FROM user WHERE u_username=? 
	AND u_password=PASSWORD(?)";

	if(!($stmt = $conn->prepare($sql)))
	{
		die($conn->error);
	}

	$stmt->bind_param('ss', $username, $password);

	if(!($result = $stmt->execute())){
		die($conn->error);
	}

	$aResult = array("status"=>0,
	 "data" => array());

	$stmt->store_result();

	$countLogin = $stmt->num_rows;

	if($countLogin > 0){
		$stmt->bind_result($u_id, $u_name,
		 $u_username, $u_level);
		
		$stmt->fetch();

		$aResult["data"] = array("u_id" => $u_id,
			"u_name" => $u_name,
			 "u_username" => $u_username,
			 "u_level" => $u_level);

		$aResult["status"] = $countLogin;
	}

	return $aResult;


}

function getResult($sql){
	$conn = connectionOOP();

	$result = $conn->query($sql);
	$aResult = array();

	if($result){
		if($result->num_rows > 0){
			while($rs=$result->fetch_assoc()){
				$aResult[] = $rs;
			}

			return $aResult;
		}
	}else{
		setMessage("DB Error:".$conn->error,"danger");
	}
}

function setMessage($str, $type = "success"){
	echo '<div class="alert alert-'.$type.'"
	 role="alert">'.$str.'</div>';
}


function getLeveluser($str=1){

  $sql="SELECT * FROM adm_level 
  WHERE adm_status=$str";
  $level=getResult($sql);

  return  $level;
	
}
		

function getCompany_name(){

  $sql="SELECT id_security_company,company_name FROM security_company_license order by company_name";
  $compy=getResult($sql);

  return  $compy;
	
}




?>