<?php require('components/head.inc.php'); ?>
<?php require('components/functions.inc.php'); ?>

<?php
function chgw($dane){
    $dane = trim($dane);
    $dane = stripslashes($dane);
    $dane = htmlspecialchars($dane);
    return $dane;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = chgw($_POST["name"]);
    $email = chgw($_POST["email"]);
    $haslo = chgw($_POST["pass"]);
    $apteczka = chgw($_POST["aidkit"]);

    // if(empty($_POST["imie"]))
    // {
    //     echo "Podaj imie".$_POST["name"];
    // }
    // else echo $imie."<br> Wybrałeś rodzinę systemów $comp";


// if ! empyt/
require('config.php');

$conn =  mysqli_connect(
  $hostname,
  $username,
  $password,
  $database
);
 echo "works";
if (!$conn) {
 die("Connection failed:".mysqli_connect_error());
}

$sql = "INSERT INTO apteczki (apteczki_name)
     VALUES ('".$apteczka."')";

$res = mysqli_query($conn, $sql);

if ($res )
echo "dopisano apteczke";
else
echo "Błąd apteczki";

$sql = "INSERT INTO users (user_name, user_email, user_status, user_rights, apteczki_idapteczki)
     VALUES ('".$name."', '".$email."', '-1', '-1', '1')";

$res = mysqli_query($conn, $sql);

if ($res )
echo "dopisano usera";
else
echo "Błąd";


session_start();
if(!isset($_SESSION["startLogin"]) || $_SESSION["startLogin"] != 1)
session_regenerate_id();
$_SESSION["startLogin"] = 1;
$_SESSION["komunikat"] = "U mnie działa";
}
?>

<?php include('components/navbar.inc.php'); ?>


<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="img/draw2.webp" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <?php if(isset($_GET["wrongPassOrEmail"]))
                    echo "zle haslo";
            ?>
                <h1>Witaj w systemie</h1>
            </div>
        </div>
    </div>
</section>



<?php require('components/footer.inc.php'); ?>
<style>
.divider:after,
.divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
}

.h-custom {
    height: calc(100% - 73px);
}

@media (max-width: 450px) {
    .h-custom {
        height: 100%;
    }
}
</style>




<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>