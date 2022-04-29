<meta charset="UTF-8">
<?
function chgw($dane){
    $dane = trim($dane);
    $dane = stripslashes($dane);
    $dane = htmlspecialchars($dane);
    return $dane;
}

$user_fullanme = $user_email = $user_password =  "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user_fullanme = chgw($_POST["name"]);
    $user_email = chgw($_POST["email"]);
    $user_password = chgw($_POST["password"]);

    // if(empty($_POST["imie"]))
    // {
    //     echo "Podaj imie".$_POST["name"];
    // }
    // else echo $imie."<br> Wybrałeś rodzinę systemów $comp";
}
/////
// $plik = fopen("DB.txt","a") or die("Nie mogę otworzyć pliku");
// $linijka = $user_fullanme."  ".$user_email.'  '.$user_password."\n";
// fwrite($plik, $linijka);
// fclose($plik);

// $plik = fopen("DB.txt",'r') or die("Nie mogę otworzyć pliku");
// while(!feof($plik)){
//     echo fgets($plik).'<br>';
// }
// fclose($plik);

////////////////////
$hostname = "mysql.agh.edu.pl";
$username = "piotr";
$password = "SRmSLTmUcujzV2o4";
$database = "piotr";

$conn =  mysqli_connect(
     $hostname,
     $username,
     $password,
     $database
);

if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
}

$user_fullanme = mysqli_real_escape_string($conn, $user_fullanme);
$user_email = mysqli_real_escape_string($conn, $user_email);
$user_password = mysqli_real_escape_string($conn, $user_password);

$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (user_fullanme, user_email, user_passwordhash)
        VALUES ('".$user_fullanme."', '".$user_email."', '".$user_password_hash."')";

$res = mysqli_query($conn, $sql);

if ($res )
 echo "Rejestracja przebiegła pomyślnie<br>";
 else
 echo "Błąd rejestracji<br>";

 var_dump($_POST)
// $sql = "SELECT `AVG`,`DEV`,`AVG+DEV` FROM `EDT`";

// $res = mysqli_query($conn, $sql);
// echo mysqli_fetch_assoc($res)["AVG"];
// echo ($res);
?>