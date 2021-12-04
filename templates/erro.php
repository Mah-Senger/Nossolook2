<?php
    $titulo = "Erro";
    $css = "erro";
    require_once('templates/header.php');
    
    echo "<div id='div_erro'>";
    echo "<h2>$erro</h2>";
    echo "</div>";

    require_once('templates/footer.php');
?>