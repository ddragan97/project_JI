<?php

    session_start();

    include_once("szablon.php");

    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $kto = $_SESSION['czy'];

    if($tytul=="" || $opis=="")
    {
        echo "Uzupełnij oba pola Tytuł i Opis";
        header("Refresh:3; URL=addMech.php");
    }

    else
    {
        $conn = mysqli_connect('localhost','root','') or die("Brak połączenia z localhost");
        $conn->query("SET NAMES 'utf8'");
        mysqli_select_db($conn,'projji') or die("Problem z bazą danych");

        mysqli_query($conn, "INSERT INTO mechaniczne (Autor, Tytul, Opis) VALUES('$kto','$tytul','$opis')");

        mysqli_close($conn);

        echo "Pomyślnie dodano";
        header("Refresh:3; URL=mechaniczne.php");
            
    }

    include_once("szablon2.php");

?>