<?php

namespace Models;

use Models\Connect;
use PDO;

class Note extends Connect
{
  public static function getAll(String $user_id){
    try{
      $pdo = parent::connect();

      $sql = 'SELECT id, text, user_id 
              FROM notes; 
              WHERE user_id = :user_id';
        
      // prepara e executa a query
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(       
        ':user_id' => $user_id, 
      ));

      $pdo = null;
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
      throw $e;
    }
  }

  public static function save(String $text, String $user_id){
    try{
      $pdo = parent::connect();

      $sql = 'INSERT INTO notes
              VALUES (default, :text, :user_id)';
        
      // prepara e executa a query
      $stmt = $pdo->prepare($sql);
      $res = $stmt->execute(array(
        ':text' => $text,
        ':user_id' => $user_id, 
      ));

      $pdo = null;
      
      if($stmt->rowCount() > 0){
        return true;
      } else {
        return false;
      }

    } catch(PDOException $e) {
      throw $e;
    }
  }

  public static function update(String $text, String $note_id, String $user_id){
    try{
      $pdo = parent::connect();

      $sql = 'UPDATE notes
              SET text = :text 
              WHERE id = :note_id
              AND user_id = :user_id';
        
      // prepara e executa a query
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':text' => $text,
        ':note_id' => $note_id,
        ':user_id' => $user_id, 
      ));

      $pdo = null;

      if($stmt->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    } catch(PDOException $e) {
      throw $e;
    }
  }

  public static function delete(String $note_id, String $user_id){
    try{
      $pdo = parent::connect();

      $sql = 'DELETE FROM notes 
              WHERE id = :note_id
              AND user_id = :user_id';
        
      // prepara e executa a query
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
        ':note_id' => $note_id,
        ':user_id' => $user_id, 
      ));
      
      $pdo = null;

      if($stmt->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    } catch(PDOException $e) {
      throw $e;
    }
  }
}