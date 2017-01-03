<?php
session_start();
require_once ('config/config.php');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy - CSSA</title>

    <link href="css/style.css" rel="stylesheet">


</head>
<body>





<div class="page">
<header>
    Baza Wiedzy CSSA
</header>

<div class="login">
    <span style="font-size: 25px"> Panel logowania </span><br />    <br />
<form action="login.php" method="post">
    Login: <input type="text" name="username" size="20px">
    <br />    <br />
    Hasło: <input type="password" name="password" size="20px">
    <br />    <br />
    <input type="submit" name="login" value="Zaloguj">
</form>




    <?php
    if(isset($_SESSION['error'])) {
        echo "<br />" . $_SESSION['error'];
    }

    ?>

</div>



<br />



</div>


</body>
</html>


