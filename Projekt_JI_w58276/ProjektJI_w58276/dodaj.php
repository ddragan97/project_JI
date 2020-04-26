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
                require_once("menu.php");
            ?>
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
            <?php
                include_once("footer.php");
            ?>
        </div>
    </body>
</html>