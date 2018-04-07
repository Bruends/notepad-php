<?php require_once 'template-parts/header.php'; ?>

<?php
  // registra
  $register_fail = false;
  if(!empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["confirm_pass"])){
    if($_POST["pass"] == $_POST["confirm_pass"]){
      try {
        if (!$session->register($_POST["email"], $_POST["pass"])){
          $message = "erro ao cadastrar";
          $register_fail = true;
        }
      } catch (PDOException $e){
        if($e->getCode() == 23000){
          $message = "email já cadastrado";
        } else {
          $message = "Erro ao cadastrar";
        }
      }
    } else {
      $message = "Senhas não Batem";
      $register_fail = true;
    }
  }

  // caso o registro seja bem sucedido
  // tenta logar caso sejam passados os parametros por post 
  if(!empty($_POST["email"]) && !empty($_POST["pass"]) && !$register_fail){
    $session->login($_POST["email"], $_POST["pass"]);
  }

  // redireciona caso já esteja logado
  if($session->checkLogin()){ 
    header('location: app.php');
  }
?>

  <section class="container py-5">
    <form class="col-sm-12 col-md-6 offset-md-3 p-5 bg-primary" action="#" method="post">
      <h2 class="text-white h1 text-center py-3">cadastre-se</h2>
      <!-- campo email -->
      <div class="form-group">
        <label for="email" class="text-white">Email</label>
        <input type="email" class="form-control" id="email" placeholder="exemplo@email.com" name="email" required>
      </div>
      <!-- campo senha -->
      <div class="form-group">
        <label for="pass" class="text-white">Senha</label>
        <input type="password" class="form-control" id="pass" name="pass" required>
      </div>
      <!-- campo confirmar senha -->
      <div class="form-group">
        <label for="confirm_pass" class="text-white">Confirme a senha</label>
        <input type="password" class="form-control" id="pass" name="confirm_pass" required>
      </div>

      <!-- messagem de erro  -->
      <?php if(!empty($message)): ?>
        <span class="text-center d-block alert alert-danger w-100"><?php echo $message; ?></span>
      <?php endif; ?>

      <div class="row justify-content-between">
        <a href="index.php" class="d-block col text-white">Login</a>
        <button class="btn btn-lg btn-info">Registrar</button>
      </div>
    </form>
    
  </section>

<?php require_once 'template-parts/footer.php'; ?>
