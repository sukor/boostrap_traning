<?php
  //fdp($_POST);

  if(isset($_POST['btnSave'])){
    $sql = "INSERT INTO user 
    (u_username, u_password, u_name, u_mykad, u_reg_date, u_level)
    VALUES (?, PASSWORD(?), ?, ?, ?, ?)";

    $aUser = array("username" => $_POST['username'],
                  "password" => $_POST['password'],
                  "name" => $_POST['name'],
                  "mykad" => $_POST['mykad'],
                  "reg_date" => date("Y-m-d"),
                  "level" => $_POST['level']);

    $result = setUser($sql, $aUser);

    if($result > 0){
      setMessage("Successfully register new user");
    }else{
      setMessage("registration failed!", "danger");
    }
  }
?>
<form method="post" action="index.php?v=user" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>New User</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name:</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Mohd Farhan" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mykad">Mykad :</label>  
  <div class="col-md-4">
  <input id="mykad" name="mykad" type="text" placeholder="911111111111" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="level">Level :</label>
  <div class="col-md-4">
    <select id="level" name="level" class="form-control">
      <option value="1">Admin</option>
      <option value="2">User</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username :</label>  
  <div class="col-md-4">
  <input id="username" name="username" type="text" placeholder="admin" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSave"></label>
  <div class="col-md-8">
    <button type="submit" id="btnSave" name="btnSave" class="btn btn-success">Save</button>
    <button type="reset" id="btnCancel" name="btnCancel" class="btn btn-danger">Cancel</button>
  </div>
</div>

</fieldset>
</form>
