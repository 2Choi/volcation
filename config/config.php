<?php
ob_start();
session_start();
//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','apmsetup');
define('DBNAME','mainboard');

try {
  $conn = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  //echo 'Connection failed: ' . $e->getMessage();
}

//load classes as needed
function __autoload($class) {

   $class = strtolower($class);

    //if call from within assets adjust the path
   $classpath = 'classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
    }

    //if call from within admin adjust the path
   $classpath = '../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
    }

    //if call from within admin adjust the path
   $classpath = '../../classes/class.'.$class . '.php';
   if ( file_exists($classpath)) {
      require_once $classpath;
    }

}

$user = new User($conn);
?>
