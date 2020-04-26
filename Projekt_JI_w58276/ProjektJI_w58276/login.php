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
                <form id="formRejestr" action="log.php" method="POST">
                    <h1>Zaloguj się</h1>
                    <label>Nick:</label>
                    <input type="text" name="nick" placeholder="Nick do logowania" class="inpRej"/>
                    <br/><br/>
                    <label>Hasło:</label>
                    <input type="password" name="password" placeholder="Hasło do konta" class="inpRej"/>
                    <br/><br/>
                    <input type="submit" value="Zaloguj" id="inpRejSub"/>
                </form>
            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>