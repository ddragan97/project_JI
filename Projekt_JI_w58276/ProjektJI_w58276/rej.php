<?php

    if(!isset($_POST['warunki']))
    {
        echo "Prosimy o zaakceptowanie warunków regulaminu.";
        header("Refresh:5; URL=rejestracja.php");
    }

    else
    {
        $login = $_POST['nick'];
        $pass = $_POST['password'];

        if($login=="" || $pass=="")
        {
            echo "Uzupełnij oba pola Nick i Hasło";
            header("Refresh:5; URL=rejestracja.php");
        }

        else
        {
            $conn = mysqli_connect('localhost','root','') or die("Brak połączenia z localhost");
            mysqli_select_db($conn,'projji') or die("Problem z bazą danych");

            $ile = mysqli_query($conn, "SELECT count($login) FROM users");

            if($ile > 0)
            {
                echo "Taki Nick już istnieje, wybierz inny";
                header("Refresh:5; URL=rejestracja.php");
            }
            else

            {
                $pass_hashed = password_hash($pass,PASSWORD_DEFAULT);
                mysqli_query($conn, "INSERT INTO users (nick,pass) VALUES ('$login','$pass_hashed')");

                mysqli_close($conn);

                echo "Pomyślnie zarejestrowano. Teraz możesz się zalogować";
                header("Refresh:5; URL=login.php");
            }
        }
    }

?>