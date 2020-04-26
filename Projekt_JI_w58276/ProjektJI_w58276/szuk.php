<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Forum Mercedes</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='styles.css'>
        <link rel="shortcut icon" href="favicon.png"/>
    </head>
    <body>
        <div id="frame">
            <?php
                require_once("header.php");
                require_once("menu.php");
            ?>
            <main>
                <div id="mainPosts">
                    <?php

                        $fraza = $_POST['fraza'];

                        if($fraza == "")
                        {
                            echo "Nic nie wpisano";
                            header("Refresh:5; URL=szukaj.php");
                        }

                        else
                        {

                            $conn = mysqli_connect('localhost','root','') or die("Problem z połączeniem");
                            $conn->query("SET NAMES 'utf8'");
                            mysqli_select_db($conn,'projji') or die("Problem z bazą");


                            $szukane1 = mysqli_query($conn, "SELECT * FROM mechaniczne WHERE Tytul LIKE '%$fraza%' OR Opis LIKE '%$fraza%'") or die('Błąd');

                            $szukane2 = mysqli_query($conn, "SELECT * FROM elektryczne WHERE Tytul LIKE '%$fraza%' OR Opis LIKE '%$fraza%'") or die('Błąd');

                            while($wiersz = mysqli_fetch_array($szukane1))
                            {
                                echo "
                                    <div id='wierszPost'>
                                        <div id='wierszAutor'>
                                            <p>Autor:</p>
                                            $wiersz[1]
                                        </div>
                                        <div id='wierszTytul'>
                                            <p><a href='szczegoly.php?id=$wiersz[0]&autt=$wiersz[1]&titl=$wiersz[2]&baza=mechaniczne'>$wiersz[2]</a></p>
                                        </div>
                                    </div>
                                    <br/>
                                    <hr id='wierszPostHr'/>
                                ";
                            }

                            while($wiersz2 = mysqli_fetch_array($szukane2))
                                {
                                    echo "
                                        <div id='wierszPost'>
                                            <div id='wierszAutor'>
                                                <p>Autor:</p>
                                                $wiersz2[1]
                                            </div>
                                            <div id='wierszTytul'>
                                                <p><a href='szczegoly.php?id=$wiersz2[0]&autt=$wiersz2[1]&titl=$wiersz2[2]&baza=elektryczne'>$wiersz2[2]</a></p>
                                            </div>
                                        </div>
                                        <br/>
                                        <hr id='wierszPostHr'/>
                                    ";
                                }

                            mysqli_close($conn);

                        }

                    ?>
                </div>
            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>