<?php require 'template-parts/header.php'; ?>

<?php 
  // só permite acesso à essa página se logado
  if(!$session->checkLogin()){
    header('location: index.php');    
  }
?>

  <section>
    <form action="#">
      <textarea name="note" id="note" cols="30" rows="10"></textarea>
      <button>
        Salvar Nota
      </button>
      <button>
        cancelar
      </button>
    </form>
  </section>
  <section>
    
  </section>  

  <!-- Scripts -->
  <!-- jquery -->
  <script src="public/js/jquery.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <!-- custom scripts -->
  <script src="public/js/ajax.js"></script>
  <script src="public/js/main.js"></script>  

<?php require 'template-parts/footer.php'; ?>