function getAllNotes(success){
  $.ajax({
    url: "controllers/handleRequests.php",
    method: "GET",
    dataType: "json",  
    success: function(data) {
      success(data);
    },
    fail: function(){
      showAlert('erro ao carregar notas', 'error');
    }
  });
}

function saveNote(text, success){
  $.ajax({
    url: "controllers/handleRequests.php",
    method: "POST",
    dataType: "json",
    data: { text: text },
    success: function(data) {
      success(data, 'salvo com sucesso');
    },
    fail: function(){
      showAlert('erro ao salvar nota', 'error');
    }
  });
}

function updateNote(noteId, text, success){
  $.ajax({
    url: "controllers/handleRequests.php",
    method: "PUT",
    dataType: "json",    
    data: { note_id: noteId, text: text }

  })
  .success(function(data) {
    success(data, 'atualizado com sucesso!');
  })
  .fail(function(){
    showAlert('erro ao atualizar nota', 'error');
  });
}

function deleteNote(noteId, success){
  $.ajax({
    url: "controllers/handleRequests.php?note_id="+noteId,
    method: "DELETE",
    dataType: "json",
  })
  .success(function(data) {
    success(data, 'deletado com sucesso!');
  })
  .fail(function(){
    showAlert('erro ao deletar nota', 'error');
  }); 
}