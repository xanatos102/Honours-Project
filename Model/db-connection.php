<?php
/*
    Description: Connection to AWS database server
    Author: Aaron Hay
*/

// Attempt to connect to database
try{

  //MySQL user account
  define('MYSQL_USER', 'sql1800855');

  //MySQL password
  define('MYSQL_PASSWORD', 'HvCu8ESybxDx');

  //MySQL host server
  define('MYSQL_HOST', 'lochnagar.abertay.ac.uk');

  //Database name
  define('MYSQL_DATABASE', 'sql1800855');

  /*
  * PDO options / configuration details.
  * Set error mode to "Exceptions".
  * Turn off emulated prepared statements.
  */
  $pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    // PDO::ATTR_EMULATE_PREPARES => false
  );

  // Assign variables to new PDO object
  $pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=UTF8",
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
  );

}
// If unsuccessful kill the connection
catch (PDOException $ex){
  echo 'PDO Exception: ' .$ex->getMessage();
  die();
}
