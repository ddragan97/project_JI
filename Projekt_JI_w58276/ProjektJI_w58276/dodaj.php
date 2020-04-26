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
        <script>

            // kasuj czyści zawartość pola przy kliknięciu na to pole

            let kasuj = function(elem)
            {
                elem.value = "";
            }

            // oblicz liczy kwote ubezpieczenia w zależności od danych wpisanych do formularza i przy pomocy DOM zmienia zawartość znacznika span
                
            var oblicz = function()
                {
                    let ubez;

                    var wart = document.querySelector('#wartU').value;
                    var rok = document.querySelector('#rokU').value;
                    var abs = document.querySelector('#absU').checked;
                    var esp = document.querySelector('#espU').checked;
                    var wiek = document.querySelector('#wiekU').value;
                    var km = document.querySelector('#kmU').value;
                    var span = document.getElementById('ubp_span');

                    var rk = new Date();
                    var rAktualny = rk.getFullYear();

                    if(wart=="" || rok=="" || wiek=="" || km=="" || rok > rAktualny || wart<0)
                    {
                        alert("Wprowadź prawidłowe dane!");
                    }

                    else
                    {
                        ubez = wart/100+200;

                        if(rAktualny - rok>10)
                            ubez*=1.2;

                        if(!abs)
                            ubez*=1.2;

                        if(!esp)
                            ubez*=1.2;

                        if(wiek<25)
                            ubez*=1.2;
                        
                        if(km>25000)
                            ubez*=1.1;

                        ubez = Math.round(ubez);

                        span.innerHTML = ubez;
                    }
                };

        </script>
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
            <main id="mainDodatki">
                <h1>Oblicz ubezpieczenie swojego auta:</h1>
                <label>Średnia ilość km w trasie na rok: </label><input type="text" id="kmU" onclick="kasuj(this)" placeholder="Kilometry"/><br>

                <label>Rok produkcji: </label><input type="text" id="rokU" onclick="kasuj(this)" placeholder="Rok"/><br>

                <label>Wartość auta: </label><input type="text" id="wartU" onclick="kasuj(this)" placeholder="Wartość w zł"/><br>

                <label>Twój wiek: </label><input type="text" id="wiekU" onclick="kasuj(this)" placeholder="Wiek"/><br>

                <label>Auto posiada: </label><br>
                <label>ABS: </label><input type="checkbox" id="absU"/><br>
                <label>ESP: </label><input type="checkbox" id="espU"/><br><br>

                <input type="button" id="sub_ubp" onclick="oblicz()" value="Oblicz"/>

                <h2>Cena rocznego ubezpieczenia to: <span id="ubp_span"></span> zł</h2>

                <hr/>
                <hr/>
            </main>
            <footer>
                <p>Designed by DD</p>
                <hr>
                <p>@Projekt WSIiZ</p>
            </footer>
        </div>
    </body>
</html>