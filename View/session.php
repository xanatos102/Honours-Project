<?php

date_default_timezone_set("Europe/London");
if(session_status() == PHP_SESSION_NONE)
{
session_start();

$Month = 2592000 + time(); //this adds 30 days to the current time

setcookie('UserVisit',$Month);
}
else
{
  session_start();
}
?>
