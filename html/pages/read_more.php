<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy - CSSA</title>

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/read_more.css" rel="stylesheet">


    <?php
    include ('../config/config.php');

    $add_title=$_POST['add_title'];
    //$add_category=$_POST['add_cetegory'];
    $add_category=1;

    $add_contents=$_POST['add_contents'];
    $date = date("Y-m-d");

    $ID_user = 1;
    $wiki =1;
    ?>


</head>
<body>



<div class="menu_first">
    <div class="menu_second">

        <button class="menu_third" onclick="window.location.href='/../index.php'">
            <img src="../img/home.png"  width="17px" height="17px">
            Home

        </button>


        <button class="menu_third">
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

        <button class="menu_fourth">


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


<div class="menu_first_more">
    <div class="menu_second">
<div class="menu_center">


        <button class="menu_third_more">
            <img src="../img/minus.png" width="17px" height="17px">
            Usuń

        </button>

        <button class="menu_third_more">
            <img src="../img/info.png"  width="17px" height="17px">
            Edytuj

        </button>


</div>
    </div>
</div>

<div class="page">
    <header>
        Baza Wiedzy CSSA
    </header>

    <div class="page_slave_more">


    <?php

    $query = "SELECT * FROM list WHERE ID_wiki LIKE 2"; //zapytanie SQL pod zmienną zapytanie
    $result = $db->query($query); //pobiera dane $db (bazy danych) i wykonuje zapytanie
    $rows = $result->num_rows; // liczy ile baza zwróciła wyników


    for ($i=0; $i<$rows; $i++){ //pętla for od 0 do liczby wyników
        $line = $result->fetch_assoc(); //wpisanie wyniku do tablicy assocjacyjnej

        echo "
            <div class=\"inbox_more\">
            <span class=\"title\">".$line['title']."</span><br /><hr>
            <span style=\"text-align: left\">".$line['contents']."<br /> 
            Kto dodał: Paweł Szymczyk <br />
            Kategoria: CRM </span>
            </div>";
    }





    $result->free(); //zwalnienie zmiennej $wynik
    $db->close(); //zamykanie połączenia z bazą danych

    ?>
</form>
        </div>







    </div>
    </div>

    <!--</div>-->

</body>
</html>
