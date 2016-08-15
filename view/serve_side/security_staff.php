<?php
 require( '../../lib/config.php' );
  // require( '../../lib/library.php' );
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
if(!empty($_POST['range1'])){
    $test=$_POST['range1'];
}else{
    $test='';
}
 
 // echo "<pre>";
 // print_r($_POST);
 // echo "</pre>";
 // die();
// DB table to use
$table = 'security_company_staff';

$joinQuery = "FROM `{$table}` AS `c` LEFT JOIN `security_company_license` AS `cn` ON (`cn`.`id_security_company` = `c`.`id_security_company`)";

if($test){
   $extraCondition = "c.date_of_birth= '$test'"; 
}else{
    $extraCondition = '';
}

 //$extraCondition = '';
// Table's primary key
$primaryKey = 'id_security_company_staff';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case object
// parameter names
$columns = array(
    // array( 'db' => 'c.application_no', 'dt' => 'application_no' ),
    // array( 'db' => 'staff_no',  'dt' => 'staff_no' ),
    // array( 'db' => 'name',   'dt' => 'name' ),
    // array( 'db' => 'ic_number',     'dt' => 'ic_number' ),
    // array( 'db' => 'date_of_birth', 'dt' => 'date_of_birth' ),
    // array( 'db' => 'c.id_security_company', 'dt' => 'id_security_company' ),

    array( 'db' => '`c`.`application_no`', 'dt' => 0, 'field' => 'application_no' ),
     array( 'db' => '`c`.`staff_no`',  'dt' => 1, 'field' => 'staff_no' ),
     array( 'db' => '`c`.`name`',   'dt' => 2, 'field' => 'name' ),
     array( 'db' => '`c`.`ic_number`',     'dt' => 3, 'field' => 'ic_number'),
     array( 'db' => '`c`.`date_of_birth`',     'dt' => 4, 'field' => 'date_of_birth' ),
     array( 'db' => '`cn`.`company_name`',     'dt' => 5, 'field' => 'company_name' ),
    
/*    array(


        'db'        => 'id_security_company',
        'dt'        => 'id_security_company',
        'formatter' => function( $d, $row ) {


              $sql="SELECT company_name FROM security_company_license 
  WHERE id_security_company=$d"; 

               $datasql=getResultserveside($sql);

           return  $datasql['company_name'];

          //  return $d;

            //return date( 'jS M y', strtotime($d));

        })*/
    // ),
    // array(
    //     'db'        => 'salary',
    //     'dt'        => 'salary',
    //     'formatter' => function( $d, $row ) {
    //         return '$'.number_format($d);
    //     }
    // )
);
 
// SQL server connection information
$sql_details = array(
    'user' => DB_USERNAME,
    'pass' => DB_PASSWORD,
    'db'   => DB_NAME,
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( '../../lib/ssp.php' );
 
// echo json_encode(
//     SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
// );

echo json_encode(
       SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
     );