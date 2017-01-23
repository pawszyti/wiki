<?php
session_start();
if (isset($_SESSION['online']) && $_SESSION['online'] == sha1(lock) && isset($_COOKIE['status']))
{
    header('location: main.php');
    exit();
}
require_once ('config/config.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Paweł Szymczyk" />
    <title>Baza Wiedzy</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-3.1.1.js"></script>
</head>
<body>
<div class="container">

    <div class="row login">
        <div class="col-lg-4 col-md-4 col-sm-6 colcol-lg-offset-4 col-md-offset-4 col-sm-offset-3">

                <h1><span class="text-center"> <?php echo $line_logo['text_setting']; ?> </h1></span>
            <div class="alert alert-warning">Wymagane jest zalogowanie</div>

            <form action="login.php" method="post">
                    <div class="form-group">
                        Login: <input type="text" name="username" class="form-control" placeholder="Login">
                    </div>
                    <div class="form-group">
                    Hasło: <input type="password" name="password" class="form-control" placeholder="Hasło">
                    </div>
                <button type="submit" class="btn btn-primary">Zaloguj</button>
            </div>
            </form>


        </div>
    <br />

<?php
if(isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
    echo "<br />" . $error;
}
$db->close();
?>
</div> <!-- /container -->
</body>
</html>


