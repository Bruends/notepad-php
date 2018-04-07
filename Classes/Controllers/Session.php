<?php 
namespace Controllers;

use Models\User as UserModel;

class Session
{
  public function __construct(){
    session_start();
  }

  public function login(String $email, String $pass){
    $res = UserModel::authenticate($email, $pass);
    if(count($res) > 0){
      $_SESSION["user_id"] = $res[0]["id"];
      return true;
    }
    return false;
  }

  public function register(String $email, String $pass){
    $res = UserModel::register($email, $pass);
    if(count($res) > 0){
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