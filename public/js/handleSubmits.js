function handleSaveSubmit(){
  $('#add-form').submit(function(e){
    e.preventDefault();
    var text = $('#add-text').val(); 
    saveNote(text, handleResponse);
    $('#add-text').val('');
  });
}

function handleUpdateSubmit(){
  $('#edit-form').submit(function(e){
    e.preventDefault();
    var id = $('#edit-id').val(); 
    var text = $('#edit-text').val(); 
    updateNote(id, text, handleResponse);
    $('#edit-text').val('');
    $('#edit-modal').modal('toggle');
  });
}

function handleDeleteSubmit(){
  $('#delete-form').submit(function(e){
    e.preventDefault();
    var id = $('#delete-id').val();
    deleteNote(id, handleResponse);
    $('#delete-modal').modal('toggle');
  });
}

function handleResponse(data, successMsg){  
  if(data.error){
    showAlert(data.error, 'danger');
    return;
  }
  showAlert(successMsg, 'success');
  loadNotes();
}

function loadNotes(){
  getAllNotes(function(data){ 
    createNotesCards(data) 
  });
}