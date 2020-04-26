<?php
    echo '
    <nav>
        <ul id="navUl">
            <li><a class="navLiA" href="index.php">Strona główna</a></li>
            <li><a class="navLiA" href="szukaj.php">Szukaj</a></li>
            <li><a id="iolog" class="navLiA" href="login.php"></a></li>
            <li><a id="iorej" class="navLiA" href="rejestracja.php">Rejestracja</a></li>';

    if(isset($_SESSION["czy"]))
    {
        echo '
            <li id="liLogin"><a class="navLiA" href="dodaj.php">Dodatki</a></li>';
    }
    echo '</ul>';

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
    echo '</nav>';
?>