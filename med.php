<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>
<?php include('components/companies.inc.php'); ?>
add

<?php

require_once('config.php');  

echo "dodaj
utylizu";
// $user_email = mysqli_real_escape_string($conn, $user_email);
// $user_password = mysqli_real_escape_string($conn, $user_password);

$sql_leki = "SELECT leki_specyfikacja_idleki, ilosc_kupiona, ilosc_pozostala, leki_w_apteczce.status FROM `leki_w_apteczce`";

$sql_apteczki = "SELECT apteczki_name FROM apteczki";
// $sql = "SELECT apteczki_name FROM `apteczki` WHERE apteczki_id='1'";
      
$res = mysqli_query($conn, $sql_leki);
// var_dump($conn);
// mysqli_close($conn) ;

if ($res)
    echo "odebrano z bazy<br>";
else
    die("Błąd4 <br>" . mysqli_error($conn));

if (mysqli_num_rows($res) > 0) {
    while ($record = mysqli_fetch_assoc($res)) {
        var_dump($record);
    }
}

?>


<!-- INSERT INTO `leki_w_apteczce` (`idleki_w_apteczce`, `apteczki_idapteczki`, `leki_specyfikacja_idleki`, `ilosc_kupiona`, `ilosc_pozostala`, `data_waznosci`, `status`) VALUES ('4', '1', '1', '7', '2', '2022-05-31', '1'); -->

<!-- <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table> -->

<?php include('components/med.inc.php'); ?>
<?php require('components/footer.inc.php'); ?>