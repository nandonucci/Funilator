<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM funilator WHERE nm_usuario = '$username'";
  $select_usuario = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_usuario)) {
    $db_id = $row['id'];
    $db_user = $row['ds_email'];
    $db_password = $row['ds_senha'];
  }

  if ($username !== $db_user && $password !== $db_password) {

    header('Location: ../acesso.php');

  } elseif ($username == $db_user && $password == $db_password) {

    $_SESSION['username'] = $db_user;
    $_SESSION['password'] = $db_password;

    header('Location: ../index.php');

  } else {

    header('Location: ../acesso.php');

  }
}

?>
