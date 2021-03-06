<?php
  include 'db.php';

  // Função de cadastro de usuário
  function novoUsuario()
  {
    global $connection;

    if (isset($_POST['adicionar'])) {
      $ds_email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $passwordconfirm = $_POST['passwordconfirm'];

      if ($ds_email == "") {
        echo "Você não informou um e-mail";
      } else {
        $user = mysqli_real_escape_string($connection, $ds_email);

        $query = "SELECT * FROM fun_usuario WHERE ds_email = '$user'";
        $select_usuario = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_usuario)) {
          $db_email = $row['ds_email'];
        }
        if (isset($db_email) && $ds_email == $db_email) {
          echo "<script>alert('Email já está cadastrado!'); window.location.href='acesso.php';</script>";
        } else {
          if($password == $passwordconfirm){
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
          }else {
            echo "<script>alert('Senhas não conferem!');</script>";
          }
        }
      }
    }
  }

  // Função de login do usuário
  function logar()
  {
    global $connection;
    if (isset($_POST['login'])) {
      $username = $_POST['email'];
      $password = $_POST['password'];

      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);

      $query = "SELECT * FROM fun_usuario WHERE ds_email = '$username'";
      $select_usuario = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($select_usuario)) {
        $db_id = $row['id'];
        $db_email = $row['ds_email'];
        $db_password = $row['ds_senha'];
        $db_user = $row['nm_usuario'];
      }

      if ($username !== $db_email && $password !== $db_password) {

        header('Location: acesso.php');

      } elseif ($username == $db_email && $password == $db_password) {

        $_SESSION['ds_email'] = $db_email;
        $_SESSION['password'] = $db_password;
        $_SESSION['username'] = $db_user;

        header('Location: index.php');

      } else {

        header('Location: acesso.php');

      }

    }
  }

  //Função de atualizar cadastro
  function atualizaCadastro()
  {
    global $connection;
    if (isset($_POST['atualizar'])) {

      $ds_email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];

      $session = $_SESSION['ds_email'];

      if($ds_email !== "" || $username !== "" || $password !== ""){

        $query = "UPDATE fun_usuario SET ";
        $erro = false;

        if ($ds_email !== "") {
          $validacao = "SELECT * FROM fun_usuario WHERE ds_email = '$ds_email'";
          $resultado = mysqli_query($connection, $validacao);

          while ($row = mysqli_fetch_assoc($resultado)) {
            $db_email = $row['ds_email'];
          }

          if ($ds_email !== $db_email) {
            $query .= "ds_email = '$ds_email'";
            $_SESSION['ds_email'] = $ds_email;

            if($username !== "" || $password !== ""){
              $query .= ", ";
            }
          } else {
            $erro = true;
            echo "<script>alert('Email já existe!');</script>";
          }
        }

        if ($username !== "") {
          $validacao = "SELECT * FROM fun_usuario WHERE nm_usuario = '$username'";
          $resultado = mysqli_query($connection, $validacao);

          while ($row = mysqli_fetch_assoc($resultado)) {
            $db_usuario = $row['nm_usuario'];
          }

          if ($username !== $db_usuario) {
            $query .= "nm_usuario = '$username'";
            $_SESSION['username'] = $username;

            if($password !== ""){
              $query .= ", ";
            }
          } else {
            $erro = true;
            echo "<script>alert('Usuário já existe!');</script>";
          }

        }
        if ($password !== "") {
          if($password == $_POST['passwordconfirm']){
            $query .= "ds_senha = '$password'";
            $_SESSION['password'] = $password;
          } else {
            $erro = true;
            echo "<script>alert('Senhas não conferem!');</script>";
          }
        }

        if(!$erro){

          $query .= " WHERE ds_email = '$session';";

          $resultado = mysqli_query($connection, $query);

          if (!$resultado) {
            die('Não deu certo a atualização');
          } else {
            header('Location: index.php');
          }

        }
      } else {
        echo "Os campos estão vazios!";
      }

    } elseif (isset($_POST['cancelar'])) {
      header('Location: index.php');
    }
  }

  //Função de deletar conta
  function deletarConta()
  {
    global $connection;
    if (isset($_POST['deletar'])) {
      $ds_email = $_SESSION['ds_email'];

      $query = "SELECT * FROM fun_usuario WHERE  ds_email = '$ds_email'";
      $resultado = mysqli_query($connection, $query);

      if(mysqli_num_rows($resultado) > 0){
        $query = "DELETE FROM fun_usuario WHERE ds_email = '$ds_email'";
        $resultado = mysqli_query($connection, $query);

        if(!$resultado){
          die("Não deletou!");
        }
        session_destroy();
        header('Location: ../admin/acesso.php');
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
