<?php
session_start();
echo '<meta charset="UTF-8">';
session_regenerate_id();
$_SESSION = array();
$_SESSION["sessionLogin"]=1; 
?>
<h1>P4.php</h1>
<h2> Wylogowanie udane</h2> <br>
<a href="./login.php"> wracamy do początku</a>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>

</body>
</html>
