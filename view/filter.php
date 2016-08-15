<?php
//$erroemail='';
if(isset($_POST['sendbtn'])){

	if(!empty($_POST['emailuser'])){
			$email=$_POST['emailuser'];
			$val=checkemail($email);

			if(!$val === false){
			 $erroemail= '<div class="alert alert-success" role="alert">email is valid</div>';

			}else{

				trigger_error("salah email");
			 
			 $erroemail='<div class="alert alert-danger" role="alert">email is not valid</div>';

			}

	}else{

	$erroemail='<div class="alert alert-danger" role="alert">email required</div>';


	}

    if(!empty($_POST['integer'])){
         $int=$_POST['integer'];
    	$intval=filter_var($int,FILTER_VALIDATE_INT);
        
         if(!$intval === false){
            echo 'integer valid';
         }else{
            trigger_error("salah no");
             echo 'integer no valid';
         }
    }else{

       echo 'empty';
    }


}
//echo $p;
?>


<form class="form-horizontal" method='post' action='index.php?v=filter'>
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailuser">email</label>  
  <div class="col-md-4">
  <input value="<?=empty($email)?'':$email?>" id="emailuser" name="emailuser" type="text" placeholder="email" class="form-control input-md" >
    <?= empty($erroemail)?'':$erroemail ?>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="web">web</label>  
  <div class="col-md-4">
  <input id="web" name="web" type="text" placeholder="url" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ip">ip</label>  
  <div class="col-md-4">
  <input id="ip" name="ip" type="text" placeholder="ip" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="integer">integer</label>  
  <div class="col-md-4">
  <input id="integer" name="integer" type="text" placeholder="integer" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="sendbtn"></label>
  <div class="col-md-4">
    <button type='submit' value='send' id="sendbtn" name="sendbtn" class="btn btn-primary">send</button>
  </div>
</div>

</fieldset>
</form>
