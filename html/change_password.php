<?php
session_start();
if ($_POST['old_password'] && $_POST['new_password1'] && $_POST['new_password2']) {
    $_SESSION['alert_pass'] = "warunek spełniony";
    header('location: main.php');
}
else {
    $_SESSION['alert_pass'] = "warunek nie spełniony";
    header('location: main.php');

}


require ('config/config.php');
?>