<?php

namespace Models;
use Models\Connect;
use PDO;

class User extends Connect
{
  public static function authenticate(String $email, String $pass){
    try {      
      // conecta
      $pdo = parent::connect();
      $sql = 'SELECT id, email, password 
              FROM users 
              WHERE email = :email AND password = :password'; 
      
      $hash_password = hash("md5", $pass);

      // prepara e executa a query
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':email' => $email,
        ':password' => $hash_password, 
      ));

      $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $pdo = null;
      return $res;
    } catch(PDOException $e) {
      throw $e;
    }
  }

  public static function register(String $email, String $pass){
    try{
      $pdo = parent::connect();

      $sql = 'INSERT INTO users 
      VALUES (default, :email, :password)';
        
      $hash_password = hash("md5", $pass); 

      // prepara e executa a query
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':email' => $email,
        ':password' => $hash_password, 
      ));

      $pdo = null;
      return true;
    } catch(PDOException $e) {
      throw $e;
    }
  }  
}