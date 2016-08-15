<?php
require('../../lib/config.php');

$userid=$_POST['id'];



if(isset($_POST['saveuser']) && !empty($_POST['saveuser'] )){

print_r($_POST);
$mykad=$_POST['u_mykad'];

$sql2="UPDATE user SET u_mykad = $mykad WHERE u_id=$userid";
getResult($sql2);

}



$sql="SELECT * FROM user WHERE u_id=$userid";
$user=getResult($sql);
$level=getLeveluser();

// print_r($level);

?>

        
   
           <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user[0]['u_username']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="assets/img/photo.png?sz=100" class="img-circle"> </div>
               
                <div class=" col-md-9 col-lg-9 "> 
                  <form id='edituserform'>
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><input  name='u_name' class="form-control input-md" type="text" value="<?php echo $user[0]['u_name']; ?>"></td>
                      </tr>
                      <tr>
                        <td>Username:</td>
                        <td><input  name='u_username' class="form-control input-md" type="text" value="<?php echo $user[0]['u_username']; ?>"></td>
                      </tr>
                      <tr>
                        <td>Mykad</td>
                        <td><input  name='u_mykad' class="form-control input-md" type="text" value="<?php echo $user[0]['u_mykad']; ?>"></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Role</td>
                        <td> 
                        	<select id="level" name="level" class="form-control">
                        		<?php

                        		foreach ($level as $rl) {
                        			?>
                          <option 
                          <?php echo $user[0]['u_level']
                          ==$rl['adm_id']?'selected':"";?>
                           value="<?= $rl['adm_id']?>">
                           <?= $rl['level_name']?></option>
                        		<?php	
                        		}
                        		?>
     						
      						 
    					</select>

							</td>
                      </tr>
                        <tr>
                        <td>Home Address</td>
                        <td>Metro Manila,Philippines</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                      </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  <input name='id' type='hidden' value="<?= $user[0]['u_id'] ?>" >
                  <input name='saveuser' type='hidden' value="1" >
                  
                  </form>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                       
                    </div>
       
   
