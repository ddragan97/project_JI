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
                <form id="formRejestr" action="addM.php" method="POST">
                    <h1>Dodaj post w dziale mechaniki CLA</h1>
                    <label>Tytuł: </label>
                    <input type="text" name="tytul" placeholder="Tytuł tematu" id="inpME" class="inpRej"/>
                    <br/><br/>
                    <label id="MElabel">Opis: </label>
                    <textarea name="opis" id="opisME_id" placeholder="Opis problemu"></textarea>
                    <br/><br/>
                    <input type="submit" value="Wyślij" id="inpMESub"/>
                </form>
            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>