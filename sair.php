<?php
    session_start();

    unset($_SESSION["id_usuario"]);
    unset($_SESSION["nome_usuario"]);
    unset($_SESSION["email_usuario"]);
    unset($_SESSION["cpf_usuario"]);
    unset($_SESSION["endereco_usuario"]);
    unset($_SESSION["senha_usuario"]);

    session_destroy();

    header("Location: index.php");

?>
