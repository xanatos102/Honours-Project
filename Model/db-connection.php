<?php
/*
    Description: Connection to AWS database server
    Author: Aaron Hay
 */

// Attempt to connect to database
try{
  // Database credentials
  // $host ='pi-db-instance.c2gqropbdvc4.us-east-1.rds.amazonaws.com';
  // $un = 'aaron';
  // $pw = '1Giga0mega1';
  // $dbname = 'pi_quiz_db';

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
    PDO::ATTR_EMULATE_PREPARES => false
  );

  $pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=UTF8",
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
  );

  // Assign credentials to PDO variable
  // $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=UTF8",$un,$pw);
  // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
// If unsuccessful kill the connection
catch (PDOException $ex){
  echo 'PDO Exception: ' .$ex->getMessage();
  die();
}
