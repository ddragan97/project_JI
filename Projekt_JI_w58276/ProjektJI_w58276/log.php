<?php

    $login = $_POST['nick'];
    $pass = $_POST['password'];

    if($login=="" || $pass=="" || !isset($login) || !isset($pass))
    {
        echo "Uzupełnij oba pola Nick i Hasło";
        header("Refresh:5; URL=login.php");
    }

    else
    {
        $conn = mysqli_connect('localhost','root','') or die("Brak połączenia z localhost");
        mysqli_select_db($conn,'projji') or die("Problem z bazą danych");

        $hashed_pass = mysqli_query($conn, "SELECT pass FROM users WHERE nick='$login'");

        while($col = $hashed_pass->fetch_assoc())
        {
            
            if(password_verify($pass, $col['pass']))
            {
                session_start();
                $_SESSION['czy'] = $login;
                echo "Witaj $login";
                header("Refresh:5; URL=index.php");
            }

            else
            {
                echo "Błędny login lub hasło";
                header("Refresh:5; URL=login.php");
            }

        }

        mysqli_close($conn);
    }

?>