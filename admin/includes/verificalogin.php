<?php
  include 'db.php';
  session_start();

  function verifica()
  {
    global $connection;
    if(isset($_SESSION['ds_email'])){
      $session_username = $_SESSION['ds_email'];
      $session_password = $_SESSION['password'];

      $username = mysqli_real_escape_string($connection, $session_username);
      $password = mysqli_real_escape_string($connection, $session_password);

      $query = "SELECT * FROM fun_usuario WHERE ds_email = '$username'";
      $select_usuario = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_usuario)) {
        $db_id = $row['id'];
        $db_email = $row['ds_email'];
        $db_password = $row['ds_senha'];
        $db_user = $row['nm_usuario'];
      }

      if ($username !== $db_email && $password !== $db_password) {

        session_destroy();
        return false;

      } elseif ($username == $db_email && $password == $db_password) {

        return true;

      } else {

        session_destroy();
        return false;

      }

    } else {

      return false;

    }
  }
?>
