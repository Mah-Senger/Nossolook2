<?php
    session_start();
    
    unset($_SESSION["id_usuario"]);
    unset($_SESSION["nome_usuario"]);
    unset($_SESSION["email_usuario"]);
    unset($_SESSION["data_nasc_usuario"]);
    unset($_SESSION["sexo_usuario"]);
    unset($_SESSION["endereco_usuario_rua"]);
    unset($_SESSION["endereco_usuario_num"]);
    unset($_SESSION["endereco_usuario_cidade"]);
    unset($_SESSION["endereco_usuario_cep"]);   
    unset($_SESSION["senha_usuario"]);


    session_destroy();

    header("Location: index.php");

?>
