<?php

    session_start();

    $sciezka = $_POST['src'];
    $opis = $_POST['koment'];
    $gdzie = $_POST['bazza'];
    
    $back = $_GET['id'];
    $kto = $_GET['autt'];
    $co = $_GET['titl'];
    $gdzie = $_GET['baza'];

    if($opis=="")
    {
        echo "Napisz coś przed dodaniem";
        header("Refresh:5; URL=szczegoly.php?id=$back&autt=$kto&titl=$co&baza=$gdzie");
    }

    else
    {
        $conn = mysqli_connect('localhost','root','') or die("Brak połączenia z localhost");
        $conn->query("SET NAMES 'utf8'");
        mysqli_select_db($conn,'projji') or die("Problem z bazą danych");

        mysqli_query($conn, "INSERT INTO komentarze (Sciezka, Opis) VALUES('$sciezka','$opis')");

        mysqli_close($conn);

        echo "Pomyślnie dodano";
        header("Refresh:5; URL=szczegoly.php?id=$back&autt=$kto&titl=$co&baza=$gdzie");
            
    }

?>