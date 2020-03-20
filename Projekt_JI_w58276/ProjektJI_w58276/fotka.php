<?php

    $nazwa = $_FILES['photo']['name'];

    if($_FILES['photo']['size'] > 5242880 || $_FILES['photo']['type'] != 'image/jpeg' && $_FILES['photo']['type'] != 'image/png')
    {
        echo "Zbyt duży rozmiar (5 MB) lub niewłaściwy format (JPG / PNG)";
        header("Refresh:5; URL=galeria.php");
    }

    else if(file_exists("galeria/$nazwa"))
    {
        echo "Plik o takiej samej nazwie już istnieje";
        header("Refresh:5; URL=galeria.php");
    }

    else
    {
        $conn = mysqli_connect('localhost','root','') or die("Problem z połączeniem");
        $conn->query("SET NAMES 'utf8'");
        mysqli_select_db($conn,'projji') or die("Problem z bazą");

        move_uploaded_file($_FILES['photo']['tmp_name'], "galeria/$nazwa");

        mysqli_query($conn, "INSERT INTO foto (Nazwa) VALUES ('$nazwa')");

        mysqli_close($conn);

        echo "Dodano prawidłowo";
        header("Refresh:5; URL=galeria.php");
    }
    
?>