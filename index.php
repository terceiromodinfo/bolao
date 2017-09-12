<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            body{
                background:cornflowerblue ;
            }
        </style>

    </head>
    <?php
    session_start();
    print $_SESSION['login'].$_SESSION['senha'];
    if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
        ?>
        <?php
        include './homer.php';
        ?>
        <?php
    } else {
        header("location:login.php");
    }
    ?>

    <body>

    </body>
</html>

