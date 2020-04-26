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
                <article>
                    <h1>Popularne silniki</h1>
                    <p>Silniki stosowane w 2007/2008 roku:

                        <ul>
                            <li>
                                Oznaczenie 65 AMG (M275 AMG) – poj. 5980 cm³, V12 – 36V, moc. 612 KM przy 4800 obr./min. – max moment obrotowy 1000 Nm w przedziale 2000 – 4000 obr./min. (ograniczony elektronicznie). Wyposażony w dwie turbosprężarki. Dostępny w klasach – S, CL, SL
                            </li>
                            <li>
                                Oznaczenie 63 AMG* (M157) – poj. 6208 cm³, V8 – 32V, moc. 525 KM przy 6800 obr./min. – max moment obrotowy 600 Nm przy 6800 obr./min. Dostępny w klasach – C, E , S, SL, CL, CLK, CLS, ML, G

                            </li>
                            <li>
                                Oznaczenie 55 AMG (M113 E55 ML) – poj. 5439 cm³, V8 – 32V, moc. 500 KM przy 6100 obr./min. – max moment obrotowy 700 Nm w przedziale 2750 – 4000 obr./min. Wyposażony w kompresor / dostępny w klasie – G

                            </li>
                            <li>
                                Oznaczenie 55 AMG (M113 E55) – poj. 5439 cm³, V8 – 36V, moc 360 KM przy 6100 obr./min. – max moment obrotowy 510 Nm w przedziale 2750 – 4000 obr./min. Dostępny w klasie – SLK

                            </li>
                            <br/>
                            <hr/>
                            <br/>
                            * Maksymalna moc silnika (M157) oznaczonego 63 AMG różni się w zależności od klasy w której jest zamontowany, dla C osiąga moc – 457 KM, natomiast dla S, SL, CL – 525 KM, dla modelu SLS moc silnika osiąga – 571 KM.
                        </ul>
                    </p>
                </article>
            </main>
            <footer>
                <p>Designed by DD</p>
                <hr>
                <p>@Projekt WSIiZ</p>
            </footer>
        </div>
    </body>
</html>