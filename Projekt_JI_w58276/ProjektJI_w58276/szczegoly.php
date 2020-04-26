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
                <article>
                    
                    <?php

                        $conn = mysqli_connect('localhost','root','') or die("Problem z połączeniem");
                        $conn->query("SET NAMES 'utf8'");
                        mysqli_select_db($conn,'projji') or die("Problem z bazą");

                        $ktory = $_GET['id'];
                        $kto = $_GET['autt'];
                        $co = $_GET['titl'];
                        $gdzie = $_GET['baza'];

                        $limitowanie = mysqli_query($conn, "SELECT * FROM $gdzie WHERE Id LIKE '$ktory' AND Autor LIKE '$kto' AND Tytul LIKE '$co'") or die('Błąd');

                        while($wiersz = mysqli_fetch_array($limitowanie))
                        {
                            
                            echo "
                                <div id='wierszPost'>
                                    <div id='wierszAutorS'>
                                        <p>Autor:</p>
                                        $wiersz[1]
                                    </div>
                                    <div id='wierszTytulS'>
                                        <p>$wiersz[2]</p>
                                    </div>
                                    <div id='wierszOpisS'>
                                        <p>$wiersz[3]</p>
                                    </div>
                                </div>
                                <br/>
                                <hr id='wierszPostHr'/>
                                
                            ";
                            
                        }

                        $sciezka = $ktory.$gdzie;

                        $komentarze = mysqli_query($conn, "SELECT * FROM komentarze WHERE Sciezka LIKE '$sciezka'");

                        while($wiersz2 = mysqli_fetch_array($komentarze))
                        {
                            
                            echo "
                                <div id='wierszPost'>
                                    <div id='wierszOpisS2'>
                                        <p>$wiersz2[2]</p>
                                    </div>
                                </div>
                                <br/>
                                
                            ";
                            
                        }

                        mysqli_close($conn);

                    ?>

                </article>

                <hr id='wierszPostHr'/>
                <hr id='wierszPostHr'/>

                <form id="formRejestr" action="addCom.php?id=<?php echo $ktory?>&autt=<?php echo $kto?>&titl=<?php echo $co?>&baza=<?php echo $gdzie?>" method="POST">
                    <h1>Dodaj komentarz</h1>
                    <input type="hidden" name="src" value="<?php echo $sciezka ?>"/>
                    <input type="hidden" name="bazza" value="<?php echo $gdzie ?>"/>
                    <textarea name="koment" id="opisKom" placeholder="Wpisz swój komentarz i zatwierdź go przyciskiem"></textarea>
                    <br/><br/>
                    <input type="submit" value="Dodaj" id="inpMESub"/>
                </form>

            </main>
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>