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
                echo $_SESSION['id'];
                die('Não deu certo');
            } else {
                echo "Usuário adicionado com sucesso!";
            }
            header('Location: ../admin/acesso.php');
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
         die('Não deu certo a atulização');
     } else {
         header('Location: ../admin/index.php');
         echo "Catergoria atualização com sucesso!";
     }

   } elseif (isset($_POST['cancelar'])) {
        header('Location: ../admin/index.php');
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
