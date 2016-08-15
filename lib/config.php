<?php
session_start();
define('ENVIROMENT','development');

//database config
define('DB_SERVERNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'sukor');
define('DB_NAME', 'esims_amtis');

//access level
define('ACL_ADMIN', 1);
define('ACL_USER', 2);

require('error.php');
require('library.php');

$conn = connectionOOP();

//fdpo:
//fdp($conn);


?>