<?php

    include_once("szablon.php");

    // po kliknięciu wyloguj sesja jest niszczona
    session_start();
    session_unset();
    session_destroy();
    echo "Wylogowano pomyślnie";
    header("Refresh:3; URL=index.php");

    include_once("szablon2.php");

?>