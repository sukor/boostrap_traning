<div class="container">
  <div class="row">
    
        
        <div class="col-md-12">
        <h4>Manage Users</h4>
        <div class="table-responsive">
             
              <a href="index.php?v=add_user" 
              class="btn btn-primary pull-right">
              Add User</a>

  
<table id="mytable" class="table table-bordred table-striped">
   
   <thead>
   
   <th><input type="checkbox" id="checkall" /></th>
   <th>Username</th>
    <th>Name</th>
     <th>Mykad</th>
     <th>Reg.Date</th>
     <th>Level</th>
      <th>Action</th>
      
       <th>Delete</th>
   </thead>
    <tbody>
      <?php 
        $sql = "SELECT u_id, u_username, u_name,
        u_mykad, u_reg_date, u_level FROM user";
        $aUsers = getResult($sql);

        //fdp($aUsers);

        if(!empty($aUsers)){
          if(count($aUsers) > 0){
            foreach($aUsers as $i => $ru){
              $regDate = date("d-m-Y", 
                strtotime($ru['u_reg_date']));

              switch($ru['u_level']){
                case 1:
                  $level = 'Admin';
                break;
                case 2:
                  $level = 'User';
                break;
              }
      ?>
      <tr>
      <td><input type="checkbox" class="checkthis" /></td>
      <td><?=$ru['u_username']?></td>
      <td><?=$ru['u_name']?></td>
      <td><?=$ru['u_mykad']?></td>
      <td><?=$regDate?></td>
      <td><?=$level?></td>
      <td>
        <div class="btn-group" role="group" aria-label="...">
  <button  data-id='<?=$ru['u_id'] ?>' type="button" class="btn btn-default btn-info detailbtn"><span class='glyphicon glyphicon-search'></span></button>
  <button  data-id='<?=$ru['u_id'] ?>' type="button" class="btn btn-default editbtn"><span class='glyphicon glyphicon-edit'></span></button>
  <button type="button" class="btn btn-default">Right</button>
        </div>
    </td>
      <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
      </tr>
      <?php 
          }//tutup for each $aUsers
        }//tutup if count $aUsers
      }//tutup if check empty $aUsers 
     ?>
    </tbody>      
</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>
                
            </div>
            
        </div>
  </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>



    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

<!-- Modal -->
<div class="modal fade" id="myview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">USER DETAIL</h4>
      </div>
      <div id='userdetails' class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">USER edit</h4>
      </div>
      <div id='edituser' class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default closeedit" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default saveditbtn" >save</button>
      
      </div>
    </div>
  </div>
</div>



    <script>
      $(document).ready(function(){
      $("#mytable #checkall").click(function () {
              if ($("#mytable #checkall").is(':checked')) {
                  $("#mytable input[type=checkbox]").each(function () {
                      $(this).prop("checked", true);
                  });

              } else {
                  $("#mytable input[type=checkbox]").each(function () {
                      $(this).prop("checked", false);
                  });
              }
          });
          
          $("[data-toggle=tooltip]").tooltip();
           

           //userr view
           $('.detailbtn').on('click',function(){

           $('#myview').modal('show');

           var iduser= $(this).attr('data-id');

          // alert(iduser);

           $.ajax({
             url:'view/ajaxcustom/detailuser.php',
             data:{id:iduser},
             type:'POST',
             dataType:'html',
             success:function(result){
              $('#userdetails').html(result);

             }
           });

           });
          // end userr view

          //userr view
           $('.editbtn').on('click',function(){

           $('#myedit').modal({
   //keyboard: false,
   // show: true,
     backdrop: 'static',

        });

           var iduser= $(this).attr('data-id');

           alert(iduser);

           $.ajax({
             url:'view/ajaxcustom/edituser.php',
             data:{id:iduser},
             type:'POST',
             dataType:'html',
             success:function(result){
              $('#edituser').html(result);

             }
           });

             
              $('.saveditbtn').on('click',function(){ 
            var test=  $("#edituserform").serialize();

            
           $.ajax({
             url:'view/ajaxcustom/edituser.php',
             data:test,
             type:'POST',
             dataType:'html',
             success:function(result){
              $('#edituser').html(result);

             }
           });


 $('.closeedit').on('click',function(){

  window.location.href='index.php?v=user';
 });
    



              });


           });
          // end userr view





      });
    </script>