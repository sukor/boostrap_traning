<?php
require('lib/config.php');

checkasses();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">

    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
       <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php?v=home">Home</a></li>
            <li><a href="index.php?v=security_staff">security_staff</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="index.php?v=readfile">File</a></li>
             <li><a href="index.php?v=uploadfile">Uploadfile</a></li>
             <li><a href="index.php?v=filter">Filter</a></li>
            <?php
               $status=islogin();
                if($status){
            ?>
              <li><a href="logout.php">logout</a></li>
           
            <?php
              }
            ?>
          </ul>
          <p class="navbar-text navbar-right">
           <?php echo welcome(); ?></p>
          

        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">


       <?php

   

       if(isset($_GET['v'])){

       $page='view/'.$_GET['v'].'.php';


	        if(file_exists($page)){

	          include($page);

	        }else{

	        	echo "<div class='alert alert-danger'>
	        	file not found</div>";
	        }


       }else{

       	 include('view/home.php');

       }




       



       ?> 




      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   
  </body>
</html>
