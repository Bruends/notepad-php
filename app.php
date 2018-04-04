<?php 

require 'vendor/autoload.php';

$session = new Controllers\Session(); 
if(!$session->checkLogin()){
  header('location: index.php');
}

$session->logout();