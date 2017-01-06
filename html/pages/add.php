<?php
session_start();
if (isset($_SESSION['online']) && $_SESSION['online'] == "e117797422d35ce52f036963c7e9603e9955b5c7" && isset($_COOKIE['status'])) {
setcookie("status",'online', time()+900);
include ('../config/config.php');
$add_title=$_POST['add_title'];
$add_category=1;
$add_contents=$_POST['add_contents'];
$date = date("Y-m-d");
$ID_user = 1;
$wiki =1;
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy - CSSA</title>

    <link href="../css/style.css" rel="stylesheet">



</head>
<body>



<div class="menu_first">
    <div class="menu_second">

        <button class="menu_third" onclick="window.location.href='/../main.php'">
            <img src="../img/home.png"  width="17px" height="17px">
            Home

        </button>


        <button class="active">
            <img src="../img/plus.png"  width="17px" height="17px">
            Dodaj

        </button>

        <button class="menu_third">
            <img src="../img/minus.png" width="17px" height="17px">
            Usuń

        </button>

        <button class="menu_third">
            <img src="../img/info.png"  width="17px" height="17px">
            Sortuj

        </button>

        <button class="menu_fourth" onclick="window.location.href='../logout.php'">


            <img src="../img/stop.png"  width="17px" height="17px">Wyloguj


        </button>

        <button class="menu_fourth">

            <img src="../img/pass.png"  width="17px" height="17px">Zmień hasło


        </button>

        <div class="menu_five">

            <span style="font-weight: bold; font-size: 14px">  Zalogowany: Paweł Szymczyk </span>

        </div>

    </div>
</div>




<div class="page">
    <header>
        Baza Wiedzy CSSA
    </header>

    <div class="page_slave">

        <div class="add">
<form action="add.php" method="post">
        Tytuł: <input type="text " name="add_title" size="60px"style="margin-top: 30px" maxlength="50"><br />
        Kategoria: <select name="add_category">
            <option value="0">--</option>
            <option value="1">CRM</option>
            <option value="2">Komputer</option></select><br />
        <textarea name="add_contents" class="add_contents" maxlength="800"></textarea>
<br /><input type="submit" name="add" value="Dodaj">
    <?php

   if (!$add_title || !$add_contents)
    {
        exit;
    }


    $query = "INSERT INTO `list` (`ID_wiki`, `title`, `contents`, `ID_user`, `category_ID`, `add_date`) VALUES (NULL, '$add_title', '$add_contents' , '$ID_user', '$add_category', '$date')";
//Dodawanie ticketa do bazdy danych (tabela: list)

    $result = $db->query($query);

    if ($result) {
        echo "<br /> Zapisano do bazy";
    }
        else{
        echo "<br /> Błąd, zapisywanie nie powiodło sie";
        }

        $result->free();
        $db->close();

    ?>
</form>
        </div>







    </div>
    </div>

<?php
}
else
{
    header('location: ../logout.php');
    exit();
}
?>
</body>
</html>
