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
function chgw($dane){
    $dane = trim($dane);
    $dane = stripslashes($dane);
    $dane = htmlspecialchars($dane);
    return $dane;
}
    $user_email = chgw($_POST["email"]);
    $user_password = chgw($_POST["haslo"]);

    require('config.php');

    $conn =  mysqli_connect(
      $hostname,
      $username,
      $password,
      $database
    );
    if (!$conn) {
     die("Connection failed:".mysqli_connect_error());
    }
    $user_email = mysqli_real_escape_string($conn, $user_email);
    $user_password = mysqli_real_escape_string($conn, $user_password);
    
    $sql = "SELECT user_email, user_password_hash FROM `users` WHERE user_email='$user_email'";
    // $sql = "INSERT INTO `leki_wydane_wprowadzone` ( `leki_w_apteczce_idleki_w_apteczce`, `users_idusers`) VALUES ( '1', '1')";
    // INSERT INTO `leki_w_apteczce` (`idleki_w_apteczce`, `apteczki_idapteczki`, `leki_specyfikacja_idleki`, `ilosc_kupiona`, `ilosc_pozostala`, `data_waznosci`, `status`) VALUES ('1', '1', '1', '1', '1', '2022-05-03', '1');
    $res = mysqli_query($conn, $sql);
    
    echo "<h1>Uwaga</h1>";
    if ($res )
    echo "odebrano z bazy<br>";
    else
    die("Błąd <br>" . mysqli_error($conn));
     
    $_SESSION["startLogin"] = -1;
    $correctEmail = "";
    $correctPassHash = "";

    if( mysqli_num_rows($res) > 0 )
    {
        $record = mysqli_fetch_assoc($res);
        $correctEmail = $record["user_email"];
        $correctPassHash = $record["user_password_hash"];
    }
// ---------------------------------------------

    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
 echo "$user_password_hash<br> $correctPassHash<br>";
 echo "$correctEmail <br>$user_email<br>";

    if(password_verify($user_password, $correctPassHash))
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