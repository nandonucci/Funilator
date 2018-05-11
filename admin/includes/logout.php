<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

    $_SESSION['username'] = null;
    $_SESSION['password'] = null;

    header('Location: ../acesso.php');

?>
