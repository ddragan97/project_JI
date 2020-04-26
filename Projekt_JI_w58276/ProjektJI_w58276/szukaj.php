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
                <form id="formRejestr" action="szuk.php" method="POST">
                    <h1>Wyszukiwarka</h1>
                    <label>Znajdź fraze: </label>
                    <input type="text" name="fraza" placeholder="Szukaj ..." class="inpRej" id="szukajSz"/>
                    <br/><br/>
                    <input type="submit" value="Szukaj" id="inpRejSub"/>
                </form>
            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>