<?php 
namespace Models;
require __DIR__ . '/../../config.php';

use PDO;

class Connect 
{
  public static function connect(){
    $connect_str = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

    $pdo = new PDO($connect_str, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  }  
}