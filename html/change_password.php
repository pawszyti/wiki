<?php
session_start();
if ($_POST['old_password'] && $_POST['new_password1'] && $_POST['new_password2'])
//czy pola nie są puste
{
    if ($_POST['new_password1'] == $_POST['new_password2'])
    //czy hasła nowe się zgadzają
    {

        require('config/config.php');
        $old_password = sha1($_POST['old_password']);
        $new_password1 = sha1($_POST['new_password1']);
        $new_password2 = sha1($_POST['new_password2']);
        $username = $_SESSION['username'];

        if ($result = $db->query(sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",
            mysqli_real_escape_string($db, $username),
            mysqli_real_escape_string($db, $old_password))))
            //czy zapytanie SELECT poprawie zostało wykonane *
        {
            $quantity = $result->num_rows;
            if ($quantity > 0)
            //czy zwrócono chodź jeden wynik
            {
                $query_update = "UPDATE users SET password='$new_password1' WHERE username='$username'";
                if ($result = $db->query($query_update))
                //zmiana hasła
                {
                    $_SESSION['alert_pass'] = "Hasło zostało zmienione";
                    header('location: main.php');
                }
                else
                {
                    $_SESSION['alert_pass'] = "SQL Error (UPDATE)";
                    header('location: main.php');
                }
            }
            else
            {
                $_SESSION['alert_pass'] = "Błąd: Podałeś błędne obecne hasło";
                header('location: main.php');
                exit();
            }
        }
        else
        {
            $_SESSION['alert_pass'] = "SQL Error (SELECT)";
            header('location: main.php');
            exit();
        }
        $db = close();
    }
    else
    {
        $_SESSION['alert_pass'] = "Błąd: Nowe hasła się różnią";
        header('location: main.php');
        exit();
    }
}
else
{
   $_SESSION['alert_pass'] = "Błąd: Pola nie mogą być puste";
   header('location: main.php');

}
?>