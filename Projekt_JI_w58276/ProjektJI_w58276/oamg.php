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
                    <h1>Historia AMG</h1>
                    <p>Mercedes-AMG, oficjalnie Mercedes-AMG GmbH – firma od 2005 roku należąca w całości do grupy Daimler AG, zajmująca się produkcją samochodów sportowych. Siedziba mieści się w Affalterbach, niedaleko Stuttgartu w Niemczech. Roczna sprzedaż (2015) wynosi 70 000 pojazdów. Firma powstała w 1967 roku. AMG to skrót od „Aufrecht Melcher Großaspach” – dwa pierwsze człony to nazwiska założycieli, a ostatni to miejsce pierwszej siedziby firmy, miasto w okolicach Stuttgartu. Przez długi czas swej działalności firma AMG przerabiała niektóre modele Mercedes-Benz głównie na potrzeby sportu, a później sporadycznie na specjalne zamówienia szczególnie wymagających klientów. Stała współpraca z Mercedes-Benz rozpoczęła się pod koniec lat 80., początkowo od dostarczania elementów stylizacyjnych. W połowie lat 90. zaczęły się pojawiać gruntownie zmodyfikowane modele samochodów Mercedes-Benz, które otrzymywały nowe oznaczenie. Po ujednoliceniu nazewnictwa modeli Mercedes-Benz, przyjęło się, że modele zmodyfikowane przez AMG otrzymują 2-cyfrowe, zamiast 3-cyfrowego, oznaczenie wersji silnikowej oraz dodatkowo skrót AMG – np.: SL 55 AMG albo C 30 AMG. Aktualnie, prawie wszystkie modele samochodów osobowych Mercedes-Benz mają co najmniej jedną seryjną wersję AMG. Wyjątki to klasy B (W246), GLK (X204), V (W447) oraz model Citan.</p>
                    <img id="oamgFoto" src="oamgFoto.jpg"/>
                </article>
            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>