<?php
require 'init.php';

//inicia sessão
$session = new Controllers\Session();

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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <section>
    <form action="#" method="post">
      <input type="email" name="email" required>
      <input type="password" name="pass" required>
      <button>Login</button>
    </form>
    <!-- messagem de erro  -->
    <?php if(!empty($message)): ?>
      <span><?php echo $message; ?></span>
    <?php endif; ?>
  </section>
</body>
</html>
