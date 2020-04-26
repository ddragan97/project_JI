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
            ?>
            <nav>
                <ul id="navUl">
                    <li><a class="navLiA" href="index.php">Strona główna</a></li>
                    <li><a class="navLiA" href="szukaj.php">Szukaj</a></li>
                    <li><a id="iolog" class="navLiA" href="login.php"></a></li>
                    <li><a id="iorej" class="navLiA" href="rejestracja.php">Rejestracja</a></li>
                    <?php
                        if(isset($_SESSION["czy"]))
                        {
                            echo '
                            <li id="liLogin"><a class="navLiA" href="dodaj.php">Dodatki</a></li>
                            ';
                        }
                    ?>
                </ul>
                
                <?php
                    if(isset($_SESSION["czy"]))
                        {
                ?>

                            <script>

                                var logIO = document.getElementById("iolog");
                                logIO.text="Wyloguj";
                                logIO.href="wyloguj.php";
                                logIO.style.backgroundColor="#333366";

                                var rejIO = document.getElementById("iorej");
                                rejIO.style.visibility="hidden";

                            </script>

                <?php
                        };

                        if(!isset($_SESSION["czy"]))
                        {

                ?>
                            <script>

                                var logIO = document.getElementById("iolog");
                                logIO.text="Zaloguj";
                                logIO.href="login.php";
                                logIO.style.backgroundColor="#424242";

                                var rejIO = document.getElementById("iorej");
                                rejIO.style.visibility="visible";

                            </script>
                <?php
                        };
                ?>

            </nav>
            <main>
                <div id="mainPosts">
                    <ul id="meUL">
                        <li>
                            <a href="addMech.php">Dodaj post</a>
                        <li>
                    </ul>

                    <?php
                        if(isset($_SESSION["czy"]))
                        {
                    ?>

                            <script>
                                // jeśli użytkownik jest zalogowany to ma możliwość dodania postu - wyświetla się przycisk

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

                        $ileRekordow = mysqli_query($conn, 'SELECT count(*) FROM mechaniczne');
                        $ilosc = mysqli_fetch_array($ileRekordow);
                        $strony = ceil($ilosc[0] / $maxNaStrone);
                        $limitowanie = mysqli_query($conn, "SELECT * FROM mechaniczne ORDER BY Id LIMIT $maxNaStrone offset $obecnaStr") or die('Błąd');

                        while($wiersz = mysqli_fetch_array($limitowanie))
                        {
                            $i=1;
                            $_SESSION['wpis'] = $wiersz[2];
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
                            $i++;
                        }

                        mysqli_close($conn);

                    ?>

                    <div id="strony">
                        
                        <?php

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
                                    echo '<a href= "mechaniczne.php?ile='.$maxNaStrone.'&amp;offs='.$i.'"> '.$j.' </a>';
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