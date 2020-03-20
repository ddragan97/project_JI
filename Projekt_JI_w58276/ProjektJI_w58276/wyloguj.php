<?php
    session_start();
    session_unset();
    session_destroy();
    echo "Wylogowano pomyślnie";
    header("Refresh:5; URL=index.php");
?>