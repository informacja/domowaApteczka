<?php require('components/head.inc.php'); ?>witajwitaj

<?php
session_start();
echo '<meta charset="UTF-8">';
echo '<h2>Zapewne nie znaleziono pliku <i>config.php</i>, możesz go utworzyć kopiując  <i>config.template.php  </i>i wprowadzając poprawne dane.</h2>';

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

    require_once('config.php');
    
    $user_email = mysqli_real_escape_string($conn, $user_email);
    $user_password = mysqli_real_escape_string($conn, $user_password);
    
    $sql = "SELECT user_email, user_password_hash, apteczki_idapteczki, user_name, user_id FROM `users` WHERE user_email='$user_email'";
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
    $idApteczki = "";

    if( mysqli_num_rows($res) > 0 )
    {
        $record = mysqli_fetch_assoc($res);
        $correctEmail = $record["user_email"];
        $correctPassHash = $record["user_password_hash"];
        $idApteczki = $record["apteczki_idapteczki"];
        $name = $record["user_name"];
        $userId = $record["user_id"];
    }
// ---------------------------------------------

    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
 echo "$user_password_hash<br> $correctPassHash<br>";
 echo "$correctEmail <br>$user_email<br>";

    if(password_verify($user_password, $correctPassHash))
    {
        $sql = "SELECT apteczki_name FROM `apteczki` WHERE apteczki_id='$idApteczki'";
        $res = mysqli_query($conn, $sql);
        
        if ($res )
            echo "odebrano z bazy<br>";
        else die("Błąd1 <br>" . mysqli_error($conn));
    
        $nazwaApteczki = "";
        if( mysqli_num_rows($res) > 0 )
        {
            $record = mysqli_fetch_assoc($res);
            $nazwaApteczki = $record["apteczki_name"];
        }
        $_SESSION["zalogowany"] = 1;
        $_SESSION["apteczka"] = $nazwaApteczki;
        $_SESSION["apteczkiId"] = $idApteczki;
        $_SESSION["name"] = $name; 
        $_SESSION["userId"] = $userId;         

        echo "Logowanie udane";
        echo '<a href="protected.php"> protected </a>'; 
        redirect("index.php");
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