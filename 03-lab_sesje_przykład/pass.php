<?php
session_start();
echo '<meta charset="UTF-8">';
echo '<h1>P2.php</h1>';

if($_SESSION["startLogin"]!=1) {
    echo "Dostęp zabroniony";
} else {
    $_SESSION["startLogin"] = -1;
    $correctPass = "a";

    if($_POST["haslo"]==$correctPass)
    {
        $_SESSION["zalogowany"] = 1;
        echo "Logowanie udane";
        echo '<a href="protected.php"> protected </a>';    
    } else {
        $_SESSION["zalogowany"] = -1;
        echo "zle haslo";
        echo '<a href="logoff.php">mnie tu nie było</a>;';
    }
}
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