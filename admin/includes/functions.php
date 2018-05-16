<?php
  include 'db.php';

  //Inserir usuário
  function novoUsuario()
  {
    global $connection;

    if (isset($_POST['adicionar'])) {
      $ds_email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      if ($ds_email == "") {
        echo "Você não informou um e-mail";
      } else {
        $query = "INSERT INTO fun_usuario (nm_usuario, ds_senha, ds_email) VALUES ('$username', '$password', '$ds_email')";
        $resultado = mysqli_query($connection, $query);

        if (!$resultado) {
          die('Não deu certo');
        } else {
          session_start();
          $_SESSION['ds_email'] = $ds_email;
          $_SESSION['password'] = $password;
          $_SESSION['username'] = $username;

          header('Location: index.php');
        }

      }
    }
  }

  //Função atualiza cadastro
  function atualizaCadastro()
  {
    global $connection;
    if (isset($_POST['atualizar'])) {

      $ds_email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $session = $_SESSION['ds_email'];

      $query = "UPDATE funilator.fun_usuario SET ";

      if ($ds_email !== "") {
        $query .= "ds_email = '$ds_email',";
      }
      if ($username !== "") {
        $query .= "nm_usuario = '$username',";
      }
      if ($password !== "") {
        $query .= "ds_senha = '$password',";
      }

      $query = substr($query, 0, -1);

      $query .= " WHERE ds_email = $session;";

      $resultado = mysqli_query($connection, $query);

      if (!$resultado) {
        die('Não deu certo a atualização');
      } else {
        header('Location: ../admin/index.php');
        echo "Catergoria atualização com sucesso!";
      }

    } elseif (isset($_POST['cancelar'])) {
      header('Location: ../admin/index.php');
    }
  }

  function logar()
  {
    global $connection;
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

        // $_SESSION['id'] = $db_id;
        $_SESSION['ds_email'] = $db_email;
        $_SESSION['password'] = $db_password;
        $_SESSION['username'] = $db_user;

        header('Location: ../admin/index.php');

      } else {

        header('Location: ../acesso.php');

      }
    }
  }

// //Exibir calculos
// function mostraCalculos(){
//   global $connection;
//   $query = "SELECT * FROM fun_usuario";
//   $select_todas_categorias = mysqli_query($connection, $query);
//
//   while($row = mysqli_fetch_assoc($todos_calculos)){
//     $cat_nome = $row['cat_nome'];
//     $cat_id = $row['cat_id'];
//
//     echo "<tr>";
//     echo "<td> $cat_id </td>";
//     echo "<td> $cat_nome </td>";
//     echo "<td><a href='categorias.php?delete={$cat_id}'>Apagar</a></td>";
//     echo "<td><a href='categorias.php?edit={$cat_id}'>Editar</a></td>";
//     echo "</tr>";
//   }
// }

// //Apagar calculo
// function deletarCalculo(){
//   global $connection;
//   if (isset($_GET['delete'])) {
//     $deletar = $_GET['delete'];
//     $sql = "DELETE FROM categoria WHERE cat_id = $deletar";
//     $resultado = mysqli_query($connection, $sql);
//
//     if (!$resultado) {
//       die('Não deu certo a remoção');
//     } else {
//       echo "Catergoria removida com sucesso!";
//     }
//
//     header('Location: categorias.php');
//   }
// }

?>
