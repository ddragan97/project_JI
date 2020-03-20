<?php

    session_start();

    // pozyskane wartości z metody POST z formularza oraz wartość zmiennej sesyjnej 'czy'

    $tytul = $_POST['tytul'];
    $opis = $_POST['opis'];
    $kto = $_SESSION['czy'];

    if($tytul=="" || $opis=="")
    {
        echo "Uzupełnij oba pola Tytuł i Opis";
        header("Refresh:5; URL=addEle.php");
    }

    else
    {
        $conn = mysqli_connect('localhost','root','') or die("Brak połączenia z localhost");
        $conn->query("SET NAMES 'utf8'");
        mysqli_select_db($conn,'projji') or die("Problem z bazą danych");

        mysqli_query($conn, "INSERT INTO elektryczne (Autor, Tytul, Opis) VALUES('$kto','$tytul','$opis')");

        mysqli_close($conn);

        echo "Pomyślnie dodano";
        header("Refresh:5; URL=elektryczne.php");
            
    }

?>