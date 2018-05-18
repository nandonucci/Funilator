<?php
  include 'includes/verificalogin.php';
  if(!verifica()){
    header('Location: acesso.php');
  };
  include 'includes/functions.php';
  atualizaCadastro();
  deletarConta();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Responsive -->
  <title>Painel | Funilat0r</title>
  <link rel="icon" href="../images/fav-icon.png">
  <link href='https://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
  <link href="../stylesheets/animate.min.css" rel="stylesheet">
  <link href="../stylesheets/materialize.css" rel="stylesheet">
  <link href="../stylesheets/bootstrap.min.css" rel="stylesheet">
  <link href="css/stylepainel.css" rel="stylesheet">
</head>
<body onload="easterEgg('https://i.imgflip.com/27tjfs.jpg');">
  <header>
    <div class="container">
      <a href="../index.php"><img id="logo-funilator" class="img-responsive" src="../images/logo_funilator.png"
      alt="logo_funilator"></a>
      <form class="" action="update.php" method="post">
        <h4>Digite os dados que deseja alterar</h4>
        <div class="input-field">
          <input id="login" type="text" class="validate" name="username" placeholder="Usuário">
        </div>
        <div class="input-field">
          <input id="login" type="text" class="validate" name="email" placeholder="E-mail">
        </div>
        <div class="input-field">
          <input id="login" type="password" class="validate" name="password" placeholder="Senha">
        </div>
        <div class="input-field">
          <input id="login" type="password" class="validate" name="passwordconfirm" placeholder="Repita a senha">
        </div>
        <div class="input-field">
          <input id="login" type="submit" class="btn btn-success" name="atualizar" value="Atualizar">
        </div>
        <div class="input-field">
          <input id="login" type="submit" class="btn btn-warning" name="cancelar" value="Cancelar">
        </div>
        <div class="input-field">
          <input id="login" type="submit" class="btn btn-danger" name="deletar" value="Deletar Conta">
        </div>
        <br><br>
      </form>

    </div>
  </header>
</body>
</html>
