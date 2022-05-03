<?
function chgw($dane){
    $dane = trim($dane);
    $dane = stripslashes($dane);
    $dane = htmlspecialchars($dane);
    return $dane;
}

$imie = "";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $imie = chgw($_POST["imie"]);
    $nazwisko = chgw($_POST["nazwisko"]);
    $comp = chgw($_POST["comp"]);

    if(empty($_POST["imie"]))
    {
        echo "Podaj imie".$_POST["name"];
    }
    else echo $imie."<br> Wybrałeś rodzinę systemów $comp";
}

$plik = fopen("DB.txt","a") or die("Nie mogę otworzyć pliku");
$linijka = $imie."  ".$nazwisko.'  '.$comp."\n";
fwrite($plik,$linijka);
fclose($plik);
?>

<meta charset="UTF-8">
<form method="post" action=<? echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> >
    Imię: <input name="imie" type="text" >
    Nazwisko: <input type="text" name="nazwisko"> <br>
    <select id="comp" name="comp">
        <option value="Windows"> Windows </option>
        <option malue="Unix" <?php if (isset($comp) && $comp == "Unix") echo "selected"; ?> >Unix  </option>
    </select>
        <input type="submit" type="get">
</form>

<?php
$plik = fopen("DB.txt",'r') or die("Nie mogę otworzyć pliku");
while(!feof($plik)){
    echo fgets($plik).'<br>';
}
fclose($plik);

////////////////////
$hostname = "mysql.agh.edu.pl";
$username = "piotr";
$password = "pass";
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

$sql = "INSERT INTO PeleMele (imie, nazwisko, os)
        VALUES ('".$imie."', '".$nazwisko."', '".$comp."')";

$res = mysqli_query($conn, $sql);

if ($res )
 echo "dopisano";
 else
 echo "Błąd";
// $sql = "SELECT `AVG`,`DEV`,`AVG+DEV` FROM `EDT`";

// $res = mysqli_query($conn, $sql);
// echo mysqli_fetch_assoc($res)["AVG"];
// echo ($res);
?>