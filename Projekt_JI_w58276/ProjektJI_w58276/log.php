<?php

    include_once("szablon.php");

    $login = $_POST['nick'];
    $pass = $_POST['password'];

    if($login=="" || $pass=="" || !isset($login) || !isset($pass))
    {
        echo "Uzupełnij oba pola Nick i Hasło";
        header("Refresh:3; URL=login.php");
    }

    else
    {
        $conn = mysqli_connect('localhost','root','') or die("Brak połączenia z localhost");
        mysqli_select_db($conn,'projji') or die("Problem z bazą danych");

        $hashed_pass = mysqli_query($conn, "SELECT pass FROM users WHERE nick='$login'");

        while($col = $hashed_pass->fetch_assoc())
        {
            // password_verify() funkcja sprawdzająca poprawność wpisanego hasła z kluczem znajdującym się w bazie
            // jeśli wszystki się zgadza to zostaje utworzona zmienna sesyjna 'czy', której wartość to nazwa użytkownika - login
            if(password_verify($pass, $col['pass']))
            {
                session_start();
                $_SESSION['czy'] = $login;
                echo "Witaj $login";
                header("Refresh:3; URL=index.php");
            }

            else
            {
                echo "Błędny login lub hasło";
                header("Refresh:3; URL=login.php");
            }

        }

        mysqli_close($conn);
    }

    include_once("szablon2.php");

?>