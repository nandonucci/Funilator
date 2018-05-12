<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
  $username = $_POST['email'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM fun_usuario WHERE  ds_email = '$username'";
  $select_usuario = mysqli_query($connection, $query);


  while ($row = mysqli_fetch_assoc($select_usuario)) {
    $db_id = $row['id'];
    $db_email = $row['ds_email'];
    $db_password = $row['ds_senha'];
    $db_user = $row['nm_usuario'];
  }

  echo $username . "=" . $db_email . "?<br>";

echo $password . "=" . $db_password . "?";
  if ($username !== $db_email && $password !== $db_password) {

    header('Location: ../acesso.php');

  } elseif ($username == $db_email && $password == $db_password) {

    $_SESSION['ds_email'] = $db_email;
    $_SESSION['password'] = $db_password;
    $_SESSION['username'] = $db_user;

    header('Location: ../index.php');

  } else {

    header('Location: ../acesso.php');

  }
}

?>
