<?php

require '../init.php';

use Controllers\Note as NoteController;
$session = new Controllers\Session();

//caso não esteja logado, ignora as requests
if(!$session->checkLogin()){
  json_encode( array('error' => 'usuário não está logado') );
  exit();
}

// pega usuário da sessão
$user_id = $session->getUserId();

//processa as requests feitas por ajax
if (isset($_SERVER['REQUEST_METHOD'])){
  switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
      echo NoteController::getAll($user_id);
    break;

    case 'POST':
      if(isset($_POST["text"])){
        echo NoteController::save($_POST["text"], $user_id);
      } else {
        echo handleError('insira o texto da nota');
      }
    break;

    case 'PUT':
      // Criando variavel $_PUT com os parametros do body da request
      parse_str(file_get_contents('php://input'), $_PUT); 
      if(isset($_PUT["text"]) && isset($_PUT["note_id"])){
        echo NoteController::update($_PUT["text"], $_PUT["note_id"], $user_id);
      } else {
        echo handleError('erro ao atualizar nota');
      } 
    break;

    case 'DELETE':
      // pegando parametros da url
      $url = $_SERVER['REQUEST_URI'];
      $params = [];
      $parts = parse_url($url);
      parse_str($parts['query'], $params);
      
      if(isset($params["note_id"])) {
        echo NoteController::delete($params["note_id"], $user_id);
      } else {
        echo handleError('id não encontrado');
      }
    break;

    default:
      echo handleError('método não suportado');
  }
}

function handleError($msg){
  return json_encode( array('error' => $msg ));
}