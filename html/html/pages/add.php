<?php
session_start();
if (isset($_SESSION['online']) && $_SESSION['online'] == sha1(lock) && isset($_COOKIE['status'])) {
setcookie("status",'online', time()+900);
require_once ('../config/config.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy - CSSA</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/change_password.css" rel="stylesheet">
    <script src="../js/script.js"></script>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <script src="../js/bootstrap.js"></script>
    <script src="../js/npm.js"></script>
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap-confirmation.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <nav class="navbar navbar-default btn-variants navbar-fixed" role="navigation">
            <a class=" navbar-brand hidden-xs col-lg-2 col-sm-2 text-center" href="#"><span class="user"> - Zalogowany -<br /><?php echo $_SESSION['name']." ". $_SESSION['surname'];?> </span></a> <! -- 2 -->
            <div class="navbar-header col-lg-5 col-lg-offset-0 col-xs-12 col-sm-5 col-sm-offset-1"> <! -- 4 / off 0 -->
                <a class=" navi btn btn-primary navbar-btn col-lg-3 col-xs-5 btn-lg " role="button"><h5>Home</h5></a>
                <a class=" navi btn btn-success navbar-btn  col-lg-2 col-xs-5 btn-lg" href="pages/add.php" role="button"><h5>Dodaj</h5></a>
                <a class=" navi btn btn-danger navbar-btn col-lg-2 col-xs-5 btn-lg" href="#" role="button"><h5>Usuń</h5></a>
                <a class=" navi btn btn-warning navbar-btn col-lg-2 col-xs-5 btn-lg" href="#" role="button"><h5>Sortuj</h5></a>
            </div>

            <div class="navbar-header col-lg-3 col-lg-offset-2 col-xs-12 col-sm-4"> <! -- 2 / off 3 -->
                <a class=" navi btn btn-default navbar-btn btn-sm col-lg-5 col-xs-5 " href="#" role="button" onclick="show()"><span class="change_pass_button"> Zmień hasło</span></a>
                <a class=" btn btn-default navbar-btn btn-sm col-lg-5 col-xs-5" href="logout.php" role="button">Wyloguj</a>
            </div>

        </nav>


<form action="add_ok.php" method="post">


            <!-- <button class="menu_third_more" type="submit">
                <img src="../img/ok.png" width="17px" height="17px">
                Dodaj
            </button></a>-->




    <header>
        <?php echo $line_logo['text_setting']; ?>
    </header>
    <div class="row col-lg-8 col-lg-offset-2">
        <div class="panel panel-default" >
            <div class="panel-heading" style="padding-bottom: 20px;padding-top: 20px"><input type="text " name="add_title" maxlength="50" class="form-control" placeholder="Wprowadź tytuł wpisu">


            </div>

            <div class="panel-body">
                <textarea name="add_contents" class="form-control" maxlength="2000"  style="padding-bottom: 300px" placeholder="Wprowadz wpis"></textarea>
            </div>
            <div class="panel-footer">
                <?php
                //tworzenie pola select
                $query_select = "SELECT * FROM categories"; //pobieranie kategori z bazy
                $result_select = $db->query($query_select);
                $rows_select = $result_select->num_rows;
                echo "Kategoria: <select name=\"add_category\">       
            <option value=\"0\">--</option>";
                for ($i = 0; $i < $rows_select; $i++) // pętla która na podstawie ilości wyników z bazy, przechodzi tyle razy by zapełnić <option>
                {
                    $line_select = $result_select->fetch_assoc();
                    echo "
        <option value=\"".$line_select['category_ID']."\">".$line_select['categories_name']."</option>   
        ";
                }
                echo "</select>";
                ?>
        </div>
    </div>






<br />

</form>
        </div>
    </div>
</div><!--Conteiner-->

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