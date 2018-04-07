function createNotesCards(notesArray){  
  var notesCards = "";  
  notesArray.reverse();
  for(var i = 0; i < notesArray.length; i++){
    var id = notesArray[i].id;   
    var text = notesArray[i].text;   
    notesCards += '<div class="card col-md-3 my-1 mx-1">'
      + '<div class="card-body">'
      +  '<p class="lead card-text" id="note-' + id + '">'
      +     text
      +  '</p>'
      +  '<a href="#" class="card-link link-update" data-toggle="modal" data-target="#edit-modal" id="update-'+ id + '">'
      +     '<i class="text-info fa fa-pencil"></i>'
      +  '</a>'
      +  '<a href="#" class="card-link link-delete" data-toggle="modal" data-target="#delete-modal" id="delete-'+ id + '">'
      +     '<i class="text-info fa fa-trash"></i>'
      +  '</a>'
      + '</div>'
    +'</div>'
  }
  

  $('#notes-container').html(notesCards);  

  // registrando os listeners após a criação dos cards
  cardButtonslisteners();
}

function cardButtonslisteners(){
  // coloca os dados da nota no modal editar
  $('.link-update').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id').split('-').pop();
    var text = $('#note-'+id).text();
    $('#edit-id').val(id);
    $('#edit-text').val(text);
  });

  // coloca os dados da nota no modal apagar
  $('.link-delete').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id').split('-').pop();
    $('#delete-id').val(id);
  });
}

function showAlert(msg, type){
  var alert = $('#alert');
  alert.html(msg);
  alert.removeClass();
  alert.addClass(`alert alert-${type}`);
  alert.addClass('show');
  
  setTimeout(function() {
    alert.removeClass('show'); 
    alert.addClass('fade'); 
  }, 1500);
}