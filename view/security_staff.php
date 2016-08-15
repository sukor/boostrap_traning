
<script type="text/javascript">
$(document).ready(function() {
/*    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "view/serve_side/security_staff.php",
            "type": "POST"

        },
       
    } );
*/


	$('#example').dataTable( {
		"bProcessing": true,
		"bServerSide": true,
		 "ajax": {
            "url": "view/serve_side/security_staff.php",
            "type": "POST"

        },
		
	} );

       $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).data('column') );
    } );


           $('.serchselect').on( 'change', function () {

        filterColumn( $(this).data('column') );
    } );


     $('#min, #max').keyup( function() {
        table.draw();
    } );       

} );


function filterColumn ( i ) {
    $('#example').DataTable().column( i ).search(
        $('#col'+i+'_filter').val()
      
    ).draw();
}


/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
    
        var age = parseFloat( data[0] ) || 0; // use data for the age column
 sessionStorage.setItem("ayam","ayam");

        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);

</script>


<table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Minimum age:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum age:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>


<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nama</label>  
  <div class="col-md-4">

  <input  data-column="2" name="textinput" type="text" id="col2_filter" placeholder="placeholder" class="form-control input-md column_filter">

  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Nama Syarikat</label>
  <div class="col-md-4">
    <select data-column="5" id="col5_filter" name="selectbasic" class="form-control column_filter serchselect">
    	 <option value="">Sila Pilih</option>
      <?php

        foreach (getCompany_name() as $row) {
        ?>
            <option value="<?=$row['company_name']?>"><?=$row['company_name']?></option>
        <?php	
        }


      ?>



    </select>
  </div>
</div>

</fieldset>
</form>


<table id="example" class="table" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>application_no</th>
                <th>staff_no</th>
                <th>name</th>
                <th>ic_number</th>
                 <th>date_of_birth</th>
                 <th>company_name</th>
                
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                 <th>Offices</th>
                 <th>Officess</th>
               
            </tr>
        </tfoot>
    </table>