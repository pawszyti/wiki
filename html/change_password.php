<?php
session_start();
if ($_POST['old_password'] && $_POST['new_password1'] && $_POST['new_password2'])
//czy pola nie są puste
    {
    require('config/config.php');
    $old_password = sha1($_POST['old_password']);
    $new_password1 = $_POST['new_password1'];
    $new_password2 = $_POST['new_password2'];
    $old_password = htmlentities($old_password, ENT_QUOTES, "UTF-8");
    $new_password1 = htmlentities($new_password1, ENT_QUOTES, "UTF-8");
    $new_password2 = htmlentities($new_password2, ENT_QUOTES, "UTF-8");
    $username = $_SESSION['username'];
    //dodawanie encji do zmiennych



    if ($result = $db->query(sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",
        mysqli_real_escape_string($db,$username),
        mysqli_real_escape_string($db,$old_password))))
    //czy zapytanie poprawie zostało wykonane *
    {
        $quantity = $result->num_rows;
            if($quantity>0)
            {
                $_SESSION['alert_pass'] = "Hasło zostało zmienione";
                header('location: main.php');



            }
            else
            {
                $_SESSION['alert_pass'] = "Podałeś błędne obecne hasło";
                header('location: main.php');
            }



    }
    else
    {
        $_SESSION['alert_pass'] = "SQL Error";
        header('location: main.php');
    }
}
else
{
   $_SESSION['alert_pass'] = "Pola nie mogą być puste";
   header('location: main.php');

}
?>