<?php
session_start();
if($_SESSION["zalogowany"] != 1) {
    echo "dostęp zabroniony";
} else{
echo "zawartosc chroniona";
echo var_dump($_POST);
} 
?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>

<p style="color:red"> Dzień dobry!</p>
<a href="login.php"> Początek </a>
<a href="logoff.php"> Mnie tu nie było </a>
    
</body>
</html>
