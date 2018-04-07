<?php require 'template-parts/header.php'; ?>

<?php 
  if(isset($_GET['logout'])){
    $session->logout();
  }

  // só permite acesso à essa página se logado
  if(!$session->checkLogin()){
    header('location: index.php');
  }
?>

  <a href="app.php?logout=true" class="logout-link">Logout</a>

  <!-- Form nova nota -->
  <section class="container py-5">
    <form action="#" id="add-form">
      <textarea class="form-control" name="text" id="add-text" cols="30" rows="4" required></textarea>
      <button class="d-block my-2 ml-auto btn btn-info">
        Salvar Nota
      </button>
    </form>
  
    <!-- notas -->
    <section id="notes-container" class="row justify-content-center text-center py-5">
      <!-- notas geradas por javascript -->
    </section>
  </section>

  <!-- alerta -->
  <div class="alert" id="alert" role="alert"></div>

  <!-- modais -->  
  <?php require 'template-parts/editmodal.php'; ?>
  <?php require 'template-parts/deletemodal.php'; ?>

<?php require 'template-parts/footer.php'; ?>