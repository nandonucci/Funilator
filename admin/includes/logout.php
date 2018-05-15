<?php include 'db.php'; ?>
<?php session_start(); ?>

<?php

    $_SESSION['ds_email'] = null;
    $_SESSION['password'] = null;

    header('Location: ../acesso.php');

?>
