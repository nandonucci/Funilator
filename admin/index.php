<?php include 'includes/verificalogin.php'; ?>

<?php if (!isset($_SESSION['ds_email'])) {
  if ($_SESSION['ds_email'] != 'ds_email') {
    header('Location: acesso.php');
  }
}
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
        <a href="index.php"><img id="logo-funilator" class="img-responsive" src="../images/logo_funilator.png"
                                    alt="logo_funilator"></a>
      Olá, <?php echo $_SESSION['username'] ?>
      <br>
      <a href="update.php"><i class="fa fa-fw fa-power-off"></i>//Dados usuário</a>
      <a href="includes/logout.php">  <i class="fa fa-fw fa-power-off"></i>//Log Out</a>

      <!-- <form class="" action="includes/verificalogin.php" method="post">
        <div class="input-field">
          <input id="login" type="text" class="validate" name="username" required placeholder="E-mail">
        </div>
        <div class="input-field">
          <input id="login" type="password" class="validate" name="password" required placeholder="Senha">
        </div>
        <div class="input-field">
          <input id="login" type="submit" class="btn btn-success" name="login" value="Entrar">
        </div>
      </form> -->
      <div class="list">
        <ul>
          <li class="hvr-grow">
            <a href="">
              <div class="info-file">
                <span class="name-file">Calculo MKT 08</span>
              </div>
              <div class="settings-file">
                <span class="date-file">20/12/1997</span>
                <div class="box-settings star-file">
                  <button>curtir</button>
                  <span class="tooltip-settings">curtir</span>
                </div>
                <div class="edit-file box-settings">
                  <button>editar</button>
                  <span class="tooltip-settings">editar</span>
                </div>
                <div class="share-file box-settings">
                  <button>compartilhar</button>
                  <span class="tooltip-settings">compartilhar</span>
                </div>
                <div class="delete-file box-settings">
                  <button>exluir</button>
                  <span class="tooltip-settings">exluir</span>
                </div>
              </div>
            </a>
          </li>
          <li class="hvr-grow">
            <a href="">
              <div class="info-file">
                <span class="name-file">Calculo MKT 08</span>
              </div>
              <div class="settings-file">
                <span class="date-file">20/12/1997</span>
                <div class="box-settings star-file">
                  <button>curtir</button>
                  <span class="tooltip-settings">curtir</span>
                </div>
                <div class="edit-file box-settings">
                  <button>editar</button>
                  <span class="tooltip-settings">editar</span>
                </div>
                <div class="share-file box-settings">
                  <button>compartilhar</button>
                  <span class="tooltip-settings">compartilhar</span>
                </div>
                <div class="delete-file box-settings">
                  <button>exluir</button>
                  <span class="tooltip-settings">exluir</span>
                </div>
              </div>
            </a>
          </li>
          <li class="hvr-grow">
            <a href="">
              <div class="info-file">
                <span class="name-file">Calculo MKT 08</span>
              </div>
              <div class="settings-file">
                <span class="date-file">20/12/1997</span>
                <div class="box-settings star-file">
                  <button>curtir</button>
                  <span class="tooltip-settings">curtir</span>
                </div>
                <div class="edit-file box-settings">
                  <button>editar</button>
                  <span class="tooltip-settings">editar</span>
                </div>
                <div class="share-file box-settings">
                  <button>compartilhar</button>
                  <span class="tooltip-settings">compartilhar</span>
                </div>
                <div class="delete-file box-settings">
                  <button>exluir</button>
                  <span class="tooltip-settings">exluir</span>
                </div>
              </div>
            </a>
          </li>
          <li class="hvr-grow">
            <a href="">
              <div class="info-file">
                <span class="name-file">Calculo MKT 08</span>
              </div>
              <div class="settings-file">
                <span class="date-file">20/12/1997</span>
                <div class="box-settings star-file">
                  <button>curtir</button>
                  <span class="tooltip-settings">curtir</span>
                </div>
                <div class="edit-file box-settings">
                  <button>editar</button>
                  <span class="tooltip-settings">editar</span>
                </div>
                <div class="share-file box-settings">
                  <button>compartilhar</button>
                  <span class="tooltip-settings">compartilhar</span>
                </div>
                <div class="delete-file box-settings">
                  <button>exluir</button>
                  <span class="tooltip-settings">exluir</span>
                </div>
              </div>
            </a>
          </li>
          <li class="hvr-grow">
            <a href="">
              <div class="info-file">
                <span class="name-file">Calculo MKT 08</span>
              </div>
              <div class="settings-file">
                <span class="date-file">20/12/1997</span>
                <div class="box-settings star-file">
                  <button>curtir</button>
                  <span class="tooltip-settings">curtir</span>
                </div>
                <div class="edit-file box-settings">
                  <button>editar</button>
                  <span class="tooltip-settings">editar</span>
                </div>
                <div class="share-file box-settings">
                  <button>compartilhar</button>
                  <span class="tooltip-settings">compartilhar</span>
                </div>
                <div class="delete-file box-settings">
                  <button>exluir</button>
                  <span class="tooltip-settings">exluir</span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</body>
</html>
