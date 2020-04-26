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
                    <ul id="meUL">
                        <li>
                            <a href="addEle.php">Dodaj post</a>
                        <li>
                    </ul>

                    <?php
                        if(isset($_SESSION["czy"]))
                        {
                    ?>

                            <script>

                                var amul = document.getElementById("meUL");
                                amul.style.visibility="visible";

                            </script>

                    <?php
                        };

                        if(!isset($_SESSION["czy"]))
                        {

                    ?>
                            <script>

                                var amul = document.getElementById("meUL");
                                amul.style.visibility="hidden";

                            </script>
                    <?php
                        };
                    ?>
                    
                    <?php

                        // łączymy się z bazą danych 'projji' i wypisujemy jej zawartość stosując przy tym stronicowanie po 5 rekordów z bazy na jedną stronę

                        $conn = mysqli_connect('localhost','root','') or die("Problem z połączeniem");
                        $conn->query("SET NAMES 'utf8'");
                        mysqli_select_db($conn,'projji') or die("Problem z bazą");

                        $maxNaStrone = 5;
                        $obecnaStr = 0;

                        if(isset($_GET['ile']))
                        {
                            $maxNaStrone = $_GET['ile'];
                        }

                        if(isset($_GET['offs']))
                        {
                            $obecnaStr = $maxNaStrone*$_GET['offs'];
                        }

                        $ileRekordow = mysqli_query($conn, 'SELECT count(*) FROM elektryczne');
                        $ilosc = mysqli_fetch_array($ileRekordow);
                        $strony = ceil($ilosc[0] / $maxNaStrone);
                        $limitowanie = mysqli_query($conn, "SELECT * FROM elektryczne ORDER BY Id LIMIT $maxNaStrone offset $obecnaStr") or die('Błąd');

                        while($wiersz = mysqli_fetch_array($limitowanie))
                        {
                            echo "
                                <div id='wierszPost'>
                                    <div id='wierszAutor'>
                                        <p>Autor:</p>
                                        $wiersz[1]
                                    </div>
                                    <div id='wierszTytul'>
                                        <p><a href='szczegoly.php?id=$wiersz[0]&autt=$wiersz[1]&titl=$wiersz[2]&baza=elektryczne'>$wiersz[2]</a></p>
                                    </div>
                                </div>
                                <br/>
                                <hr id='wierszPostHr'/>
                            ";
                        }

                        mysqli_close($conn);

                    ?>

                    <div id="strony">
                        
                        <?php

                            // kod do wyświetlania numerów stron

                            for($i = 0; $i < $strony; $i++)
                            {

                                if($i*$maxNaStrone == $obecnaStr)
                                {
                                    $i++;
                                    echo "<span> $i </span>";
                                    $i--;
                                }

                                else
                                {
                                    $j = $i+1;
                                    echo '<a href= "elektryczne.php?ile='.$maxNaStrone.'&amp;offs='.$i.'"> '.$j.' </a>';
                                }

                            }
                            
                        ?>

                    </div>

                </div>
            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>