<?php

session_start();

unset($_SESSION["usuario_admin"]);
unset($_SESSION["senha_admin"]);

header("Location: index.html");

?>