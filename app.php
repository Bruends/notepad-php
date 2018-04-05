<?php 

require 'init.php';

$session = new Controllers\Session(); 
// só permite acesso à essa página se logado
if(!$session->checkLogin()){
  header('location: index.php');
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
    <?php  ?>
  </section>

  <script src="public/js/jquery.min.js"></script>
  <script src="public/js/get.js"></script>
</body>
</html>