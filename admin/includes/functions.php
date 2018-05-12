<?php
include 'db.php';

//Inserir categorias
function novoUsuario(){
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
        echo "Usuário adicionado com sucesso!";
      }
      header('Location: ../acesso.php');
    }
  }
}

// //Exibir calculos
// function mostraCalculos(){
//   global $connection;
//   $query = "SELECT * FROM categoria";
//   $select_todas_categorias = mysqli_query($connection, $query);
//
//   while($row = mysqli_fetch_assoc($select_todas_categorias)){
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
//
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

// //Função atualiza cadastro
// function atualizaCadastro(){
//   global $connection;
//   if (isset($_POST['atualizar'])) {
//     $atualizar = $_POST['cat_nome'];
//     $sql = "UPDATE categoria SET cat_nome = '$atualizar' WHERE cat_id = $cat_id ";
//     $resultado = mysqli_query($connection, $sql);
//
//     if (!$resultado) {
//       die('Não deu certo a atulização');
//     } else {
//       echo "Catergoria atualização com sucesso!";
//     }
//
//   }
// }
?>
