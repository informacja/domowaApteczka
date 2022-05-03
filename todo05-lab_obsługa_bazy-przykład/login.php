<?php
session_start();
if(!isset($_SESSION["startLogin"]) || $_SESSION["startLogin"] != 1)
session_regenerate_id();
$_SESSION["startLogin"] = 1;
$_SESSION["komunikat"] = "U mnie działa";
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>

</body>
</html>

<!DOCTYPE html>
<html>

<head>
    <title>Tytuł strony</title>
    <meta charset="UTF-8">
    <link rel ="stylesheet" href="style.css">
</head> 

<body>


    <h1>P1.php</h1>
    <p>
        <form action="login.php" method="POST">
            Hasło<input required type="password" name="haslo"> <br>
            <input type="submit" value="!GET">
            <input type="reset" value="!DROP">
        </form>
    </p>    
            
    <pre>SESSION 
    <br> <a href="/~piotr/SIwM/Lab1.pdf">Lab 0</a> <br>
    <?PHP
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "sesion variable are set";
    var_dump($_SESSION);
    ?></pre>
</body>

</html>