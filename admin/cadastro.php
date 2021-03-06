<?php
  include 'includes/verificalogin.php';
  if(verifica()){
    header('Location: index.php');
  };
  include 'includes/functions.php';
  novoUsuario();
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
      <form class="" action="cadastro.php" method="post">
        <h4>Faça seu cadastro</h4>
        <div class="input-field">
          <input id="login" type="text" class="validate" name="username" required placeholder="Usuário">
        </div>
        <div class="input-field">
          <input id="login" type="text" class="validate" name="email" required placeholder="E-mail">
        </div>
        <div class="input-field">
          <input id="login" type="password" class="validate" name="password" required placeholder="Senha">
        </div>
        <div class="input-field">
          <input id="login" type="password" class="validate" name="passwordconfirm" required placeholder="Repita a senha">
        </div>
        <div class="input-field">
          <input id="login" type="submit" class="btn btn-success" name="adicionar" value="Gravar">
        </div>
      </form>
      <div class="linkslogin">
        <a href="../index.php">Não quero mais, tchau!</a>
      </div>

    </div>
  </header>
</body>
</html>
