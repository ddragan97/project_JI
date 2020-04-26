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
                <section class="mainSection">
                    
                            <h3>Informacje ogólne</h3>

                            <div class="infoFoto">
                                <img src="amg.png"/>
                            </div>
                            <div class="infoOpis">
                                <a href="oamg.php">Poznaj AMG</a>
                                <p>Informacje na temat AMG od Mercedesa.</p>
                            </div>
                            <hr/>
                            <div class="infoFoto">
                                <img src="silnik.png"/>
                            </div>
                            <div class="infoOpis">
                                <a href="popsilniki.php">Popularne silniki</a>
                                <p>Informacje na temat najpopularniejszych motorów występujących w autach marki Mercedes.</p>
                            </div>
                            <hr/>
                            <div class="infoFoto">
                                <img src="historia.png"/>
                            </div>
                            <div class="infoOpis">
                                <a href="hismarki.php">Historia marki</a>
                                <p>Odkryj kiedy i w jakich okolicznościach powstała jedna z najbardziej ekskluzywnych marek świata.</p>
                            </div>
                </section>
                <hr/><hr/><hr/>
                <section class="mainSection">
                    
                        <h3>Mercedes CLA</h3>

                        <div class="infoFoto">
                            <img src="klucz.webp"/>
                        </div>
                        <div class="infoOpis">
                            <a href="mechaniczne.php">Usterki mechanicze</a>
                            <p>Problemy mechaniczne z Twoim Mercedesem? Dobrze trafiłeś!</p>
                        </div>
                        <hr/>
                        <div class="infoFoto">
                            <img src="elektryka.png"/>
                        </div>
                        <div class="infoOpis">
                            <a href="elektryczne.php">Problemy elektryczne</a>
                            <p>Elektryka w Mercedesie zawodzi? Zaglądnij i zobacz co zrobić.</p>
                        </div>
                        <hr/>
                        <div class="infoFoto">
                            <img src="galeria.png"/>
                        </div>
                        <div class="infoOpis">
                            <a href="galeria.php">Galeria</a>
                            <p>Zdjęcia aut naszych gości.</p>
                        </div>
                    
                </section>
            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>