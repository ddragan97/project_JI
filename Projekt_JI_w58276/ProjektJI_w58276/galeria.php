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
        <script type="text/javascript" src="lightbox.js"></script>        
    </head>
    <body>
        <div id="frame">
            <header>
                <img id="headerImg" src="headerIco.png"/>
                <img id="headerTxt" src="text.png"/>
            </header>
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

                <div id="divGallery">
                    <span>Dodaj zdjęcie ---></span><img id="addGallery" src="add.webp"/>
                </div>

                <div id="formGallery">
                </div>

                <script>
                    var plus = document.getElementById("addGallery");

                    var divG = document.getElementById('formGallery')

                    var formm = document.createElement('Form');
                    var labell = document.createElement('Label');
                    var inputt = document.createElement('Input');
                    var inputt2 = document.createElement('Input');
                    var br = document.createElement('br');

                    formm.action = "fotka.php";
                    formm.method = "POST";
                    formm.enctype = "multipart/form-data";

                    labell.textContent = "Dodaj zdjęcie do galerii";

                    inputt.setAttribute("type","file");
                    inputt.name = "photo";

                    inputt2.setAttribute("type","submit");
                    inputt2.setAttribute("value","Dodaj");

                    formm.style.border="solid red 1px";
                    formm.style.width="30%";
                    formm.style.marginLeft="auto";
                    formm.style.marginRight="auto";
                    formm.style.marginTop="15px";
                    labell.style.display="block";
                    labell.style.fontWeight="bold";
                    inputt2.style.color="black";
                    inputt2.style.fontSize="10pt";
                    inputt2.style.fontWeight="bold";
                    inputt2.style.borderRadius="5px";

                    var pokaz = function(e) {
                        divG.appendChild(formm);
                        formm.appendChild(labell);
                        formm.appendChild(br);
                        formm.appendChild(inputt);
                        formm.appendChild(br);
                        formm.appendChild(inputt2);
                    };
                    plus.addEventListener('click', pokaz);

                </script>

                <h1>Galeria</h1>

                <div id="showGallery">

                    <?php

                        $conn = mysqli_connect('localhost','root','') or die("Problem z połączeniem");
                        $conn->query("SET NAMES 'utf8'");
                        mysqli_select_db($conn,'projji') or die("Problem z bazą");

                        $nazwy = mysqli_query($conn, "SELECT Nazwa FROM foto");

                        while($nazwa = mysqli_fetch_array($nazwy))
                        {
                            echo "
                                <a rel='lightbox' href='galeria/$nazwa[0]'>
                                    <img class='photo' height='200' width='200' src='galeria/$nazwa[0]'/>
                                </a>
                            ";
                        }

                        mysqli_close($conn);

                    ?>

                </div>

            </main>
            <footer>
                <p>Designed by DD</p>
                <hr>
                <p>@Projekt WSIiZ</p>
            </footer>
        </div>
    </body>
</html>