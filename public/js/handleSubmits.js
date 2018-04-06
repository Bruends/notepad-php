function handleSaveSubmit(){
  $('#add-form').submit(function(e){
    e.preventDefault();
    var text = $('#add-text').val(); 
    saveNote(text, handleResponse);
    $('#add-text').val('');
  });
}

function handleResponse(data, successMsg){  
  if(data.error){
    showAlert(data.error, 'error');
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