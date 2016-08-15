  <?php
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


      	?>
   <table class='table table-bordered'>
   	<thead>
   		<tr>
   		 <th>No</th>
          <th>name</th>
          <th>ic</th>
           <th>Register</th>
   		</tr>

   	</thead>

      	<?php
      $bil=1;
   	 foreach ($student as  $row) {

   	 $regtime=strtotime($row['regdate']);
   	 $datereg=date('d/m/Y',$regtime);
   	 $year=date('Y',$regtime);



//if( $year >= time()){

       
   	 	?>
            <tr>
            	<td><?= $bil ?></td>
            	<td><?php  echo strtoupper($row['name']); ?></td>
                <td><?php  echo $row['noic']; ?></td>
                 <td><?php  echo $datereg; ?></td>
            
            </tr>
   
   	 	
   	 	<?php

   	 	$bil++;
   	// }
   	 }

	    ?>
</table>