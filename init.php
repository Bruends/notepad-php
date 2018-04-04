<?php 

// autoload do composer
require 'vendor/autoload.php';

$dev = true;

if($dev) {
  // habilitando erros em modo de desenvolvimento
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}
