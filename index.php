<?php require_once 'template-parts/header.php'; ?>

<?php
  // tenta logar caso sejam passados os parametros por post 
  if(!empty($_POST["email"]) && !empty($_POST["pass"])){
    if (!$session->login($_POST["email"], $_POST["pass"])){
      $message = "Usuário ou senha incorretos";
    }
  }

  // redireciona caso já esteja logado
  if($session->checkLogin()){ 
    header('location: app.php');
  }
?>

  <section class="container py-5">
    <form class="col-sm-12 col-md-6 offset-md-3 p-5 bg-dark" action="#" method="post">
      <h2 class="text-white h1 text-center py-3">Login</h2>
      <!-- campo email -->
      <div class="form-group">
        <label for="email" class="text-white">Email</label>
        <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email">
      </div>
      <!-- campo senha -->
      <div class="form-group">
        <label for="pass" class="text-white">Senha</label>
        <input type="password" class="form-control" id="pass" name="pass">
      </div>

      <button class="col-3 offset-9 btn btn-lg btn-primary">Login</button>
    </form>
    <!-- messagem de erro  -->
    <?php if(!empty($message)): ?>
      <span><?php echo $message; ?></span>
    <?php endif; ?>
  </section>

<?php require_once 'template-parts/footer.php'; ?>
