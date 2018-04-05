<?php 

namespace Controllers;

use Models\Note as NotesModel;
use Controllers\Session;

class Note
{
  public static function getAll(String $user_id){
    try{
      $notes = NotesModel::getAll($user_id);
      return json_encode( $notes );
    } catch(Exception $e) {
      $error_msg = array('error' => $e->getMessage());
      return json_encode( $error_msg );
    }
  }

  public static function save(String $text, String $user_id){
    try{
      if(NotesModel::save($text, $user_id)){
        return json_encode( array('ok' => true));
      }
      return json_encode(array( 'error' => 'erro ao adicionar nota' )); 
    } catch(Exception $e) {
      $error_msg = array( 'error' => $e->getMessage() );
      return json_encode( $error_msg );
    }
  }

  public static function update(String $text, String $note_id, String $user_id){
    try{
      if(NotesModel::update($text, $note_id, $user_id)){
        return json_encode( array('ok' => true));
      }
      return json_encode(array( 'error' => 'erro ao atualizar nota' ));
    } catch(Exception $e) {
      $error_msg = array( 'error' => $e->getMessage() );
      return json_encode( $error_msg );
    }
  }

  public static function delete(String $note_id, String $user_id){
    try{
      if(NotesModel::delete($note_id, $user_id)){
        return json_encode( array('ok' => true));
      }
      return json_encode(array( 'error' => 'erro ao deletar nota' ));
    } catch(Exception $e) {
      $error_msg = array( 'error' => $e->getMessage());
      return json_encode( $error_msg );
    }
  }  
}
