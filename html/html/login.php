<?php
session_start();
if ($_POST['username']=="" || $_POST['password']=="")
//sprawdza czy pole login lub hasło jest puste
{
    header('location: index.php');
    $_SESSION['error'] = '<div class="alert alert-danger">Pola nie mogą być puste</div>';
    exit();
}
require_once ('config/config.php');
$username = $_POST['username'];
$password = sha1($_POST['password']);
$username = htmlentities($username, ENT_QUOTES, "UTF-8");//dodawanie encji
$password = htmlentities($password, ENT_QUOTES, "UTF-8");//dodawanie encji


if ($result = $db->query(sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",
// jesli zapytanie sie wykona to if bedzie spełniony, jesli nie wykona przyjmie false
    mysqli_real_escape_string($db,$username),
    mysqli_real_escape_string($db,$password))))
{
    $quantity = $result->num_rows;
        if($quantity>0)
        {
            $row =$result->fetch_assoc();
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['surname'] = $row['surname'];
            $_SESSION['online'] = sha1(lock); //zmienna sesyjna sprawdzana status zalogowania, zakodowana sha1
            $_SESSION['ID_user'] = $row['ID_user'];
            setcookie("status",'online', time()+900); //stozenie cookie wazne 15 minut
            header('location: main.php');
        }
        else
        {
            $_SESSION['error'] = '<div class="alert alert-danger">Niepoprawne dane logowania</div>';
            header('location: index.php');
        }
}
$db->close();
?>