<?php
require('lib/config.php');

session_destroy();

header('Location:login.php');


?>