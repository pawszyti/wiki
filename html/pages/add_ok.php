<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy - CSSA</title>

    <link href="../css/style.css" rel="stylesheet">
    <?php
    include ('../config/config.php');

    $add_title=$_POST['add_title'];
    $add_category=$_POST['add_cetegory'];
    $add_contents=$_POST['add_contents'];

    ?>


</head>
<body>



<div class="menu_first">
    <div class="menu_second">

        <div class="menu_third">
            <img src="../img/home.png"  width="25px" height="25px">
            Home

        </div>


        <div class="menu_third">
            <img src="../img/plus.png"  width="25px" height="25px">
            Dodaj

        </div>

        <div class="menu_third">
            <img src="../img/minus.png" width="25px" height="25px">
            Usuń

        </div>

        <div class="menu_third">
            <img src="../img/info.png"  width="25px" height="25px">
            Sortuj

        </div>

        <div class="menu_fourth">

            <img src="../img/stop.png"  width="25px" height="25px">Wyloguj


        </div>

        <div class="menu_five">

            <span style="font-weight: bold; font-size: 14px">  Zalogowany: Paweł Szymczyk </span>

        </div>

    </div>
</div>




<div class="page">
    <header>
        Baza Wiedzy CSSA
    </header>


    <?php

    if (!$add_title || !$add_contents)
    {
        echo "Nie podano wszystkich danych";
        exit;
    }
    ?>

        </div>







    </div>
    </div>

    <!--</div>-->

</body>
</html>
