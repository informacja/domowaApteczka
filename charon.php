<?php
session_start();
echo '<meta charset="UTF-8">';
echo '<h1>P2.php</h1>';

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
// if($_SESSION["startLogin"]!=1) {
//     echo "Dostęp zabroniony";
// } else {
    $_SESSION["startLogin"] = -1;
    $correctPass = "a";

    if($_POST["haslo"]==$correctPass)
    {
        $_SESSION["zalogowany"] = 1;
        echo "Logowanie udane";
        echo '<a href="protected.php"> protected </a>'; 
        redirect("/");
    } else {
        $_SESSION["zalogowany"] = -1;
        echo "zle haslo";
        echo '<a href="logoff.php">mnie tu nie było</a>;';
        redirect("login.php?wrongPassOrEmail");
    }
// }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Tytuł strony</title>
    <meta charset="UTF-8">
    <link rel ="stylesheet" href="style.css">
</head>
<body>
<form action="protected.php" method="POST">
            Label:<input required type="password" name="haslo"> <br>
            <input type="submit" value="!GET">
            <input type="reset" value="!DROP">
        </form>
</body>

</html>