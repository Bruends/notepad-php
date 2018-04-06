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

  <section>
    <form action="#" method="post">
      <input type="email" name="email" required>
      <input type="password" name="pass" required>
      <button class="btn btn-sm btn-primary">Login</button>
    </form>
    <!-- messagem de erro  -->
    <?php if(!empty($message)): ?>
      <span><?php echo $message; ?></span>
    <?php endif; ?>
  </section>

<?php require_once 'template-parts/footer.php'; ?>
