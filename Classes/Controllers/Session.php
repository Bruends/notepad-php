<?php 
namespace Controllers;

use Models\User as UserModel;

class Session
{
  public function __construct(){
    session_start();
  }

  public function login(String $email, String $pass){
    $user = UserModel::authenticate($email, $pass);
    if(count($user) > 0){
      $_SESSION["user_id"] = $user[0]["id"];
      return true;
    }
    return false;
  }

  public function checkLogin(){
    return isset($_SESSION["user_id"]);    
  }

  public function logout(){
    session_destroy();
    unset($_SESSION["user_id"]);
  }

  public function getUserId(){
    return $_SESSION["user_id"];
  }
}