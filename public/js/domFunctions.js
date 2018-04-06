function createNotesCards(notesArray){  
  var notesCards = "";  
  console.log(notesArray.length);
  for(var i = 0; i < notesArray.length; i++){      
    notesCards += '<div class="card col-md-3 my-1 mx-1 col-sm-10">'
      + '<div class="card-body">'
      +  '<p class="card-text">'
      +     notesArray[i].text
      +  '</p>'
      +  '<a href="#" class="card-link">'
      +     '<i class="fa fa-pencil"></i>'
      +  '</a>'
      +  '<a href="#" class="card-link">'
      +     '<i class="fa fa-trash"></i>'
      +  '</a>'
      + '</div>'
    +'</div>'
  }

  $('#notes-container').html(notesCards);  
}

function showAlert(msg, type){
  var alert = $('#alert');
  alert.html(msg);
  alert.addClass(`alert-${type}`);
  alert.addClass('show');
  
  setTimeout(function() {
    alert.removeClass('show'); 
    alert.addClass('fade'); 
  }, 1000);
}