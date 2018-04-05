function getAllNotes(){
  $.ajax({
    url: "controllers/handleRequests.php",
    method: "GET",
    dataType: "json",     
  
  }).done(function(data) {
    console.log(data);
  });
}

function saveNote(text){
  $.ajax({
    url: "controllers/handleRequests.php",
    method: "POST",
    dataType: "json",     
    data: { text: text }
  
  }).done(function(data) {
    console.log(data);
  });
}

function updateNote(noteId, text){
  $.ajax({
    url: "controllers/handleRequests.php",
    method: "PUT",
    dataType: "json",    
    data: { note_id: noteId, text: text }

  }).done(function(data) {
    console.log(data);
  });
}

function deleteNote(noteId){
  $.ajax({
    url: "controllers/handleRequests.php?note_id="+noteId,
    method: "DELETE",
    dataType: "json", 

  }).done(function(data) {
    console.log(data);
  });  
}