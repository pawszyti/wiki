<?php
session_start();

if ((!isset($_POST['username'])) || (!isset($_POST['password'])))
{
    header('location: index.php');
    exit();
}

include('config/config.php');
$username = $_POST['username'];
$password = $_POST['password'];
$username = htmlentities($username, ENT_QUOTES, "UTF-8");
$password = htmlentities($password, ENT_QUOTES, "UTF-8");


if ($result = $db->query(sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",
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
            header ('location: main.php');
        }
        else
        {
            $_SESSION['error'] = '<span style="color:red">Niepoprawne dane logowania</span>';
            header('location: index.php');

        }
}
?>