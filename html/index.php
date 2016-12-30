<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy - CSSA</title>

    <link href="css/style.css" rel="stylesheet">
    <?php
    include ('config/config.php');
    ?>


</head>
<body>



<div class="menu_first">
    <div class="menu_second">



        <div class="menu_third">
            <img src="img/plus.png"  width="25px" height="25px">
            Dodaj

        </div>

        <div class="menu_third">
            <img src="img/minus.png" width="25px" height="25px">
            Usuń

        </div>

        <div class="menu_third">
            <img src="img/info.png"  width="25px" height="25px">
            Sortuj

        </div>

        <div class="menu_fourth">

            <img src="img/stop.png"  width="25px" height="25px">Wyloguj


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

    <div class="page_slave">


        <div class="search">
            <span style="font-size: 20px">Wyszukaj:</span><br /><br />
            Tytuł: <input type="text" name="title" size="20px">
            W treści: <input type="text" name="contents" size="20px">
            Dodał: <select name="user">
                <option value="0">--</option>
                <option value="1">Paweł Szymczyk</option>
                <option value="2">Kamil Szpond</option>
                <option value="3">Mateusz Pianka</option>
                <option value="4">Piotr Jakacki</option>
            </select>
            Kategoria: <select name="category">
                <option value="0">--</option>
                <option value="1">CRM</option>
                <option value="2">Internet</option>
                <option value="3">Komputer</option>
                <option value="4">Inne</option>

            </select>
        </div>



        <?php

        $zapytanie = "SELECT * FROM list"; //zapytanie SQL pod zmienną zapytanie
        $wynik = $db->query($zapytanie); //pobiera dane $db (bazy danych) i wykonuje zapytanie
        $ile = $wynik->num_rows; // liczy ile baza zwróciła wyników


        for ($i=0; $i<$ile; $i++){ //pętla for od 0 do liczby wyników
            $wiersz = $wynik->fetch_assoc(); //wpisanie wyniku do tablicy assocjacyjnej

            echo "
            <div class=\"inbox\">
            <span class=\"title\">".$wiersz['title']."</span><br /><hr>
            <span style=\"text-align: left\">".$wiersz['contents']."<br /> 
            Kto dodał: to dodał: Paweł Szymczyk <br />
            Kategoria: CRM </span>
            </div>";
        }





        $wynik->free(); //zwalnienie zmiennej $wynik
        $db->close(); //zamykanie połączenia z bazą danych

        ?>



        <br />
        <div class="number">  Strona: 1 >>
        </div>
    </div>

    <!--</div>-->

</body>
</html>
