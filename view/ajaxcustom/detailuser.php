<?php
require('../../lib/config.php');

$userid=$_POST['id'];

$sql="SELECT * FROM user WHERE u_id=$userid";
$user=getResult($sql);




?>

        
   
           <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user[0]['u_username']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="assets/img/photo.png?sz=100" class="img-circle"> </div>
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $user[0]['u_name']; ?></td>
                      </tr>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $user[0]['u_username']; ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>01/24/1988</td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td>Male</td>
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
                  
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                       
                    </div>
       
   
