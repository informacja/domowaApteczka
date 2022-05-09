<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="img/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <?php if(isset($_GET["wrongPassOrEmail"]))
                    echo "<p>Złe hasło</p>";
            ?>

                <form class="row g-3 needs-validation" novalidate action="rejestrator.php" method="POST">
                    <!-- First and LastName -->
                    <div class="form-outline mb-3">

                        <div class="form-outline">
                            <input type="text" id="validationN" class="form-control form-control-lg"
                                placeholder="Podaj Imie i Nazwisko" required name="name" />
                            <label for="validationN" class="form-label">Imie i Nazwisko</label>
                            <div class="invalid-feedback">Proszę podać Imię i Nazwisko</div>
                        </div>

                    </div><!-- Email input -->
                    <div class="form-outline mb-3">

                        <div class="form-outline">
                            <input type="email" id="validationEmail" class="form-control form-control-lg"
                                placeholder="Podaj poprawny adres email" required name="email" />
                            <label for="validationEmail" class="form-label">Adres email</label>
                            <div class="invalid-feedback">Proszę podać poprawny adres email.</div>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <div class="form-outline">
                            <input type="password" id="validationPassword" class="form-control form-control-lg"
                                placeholder="Podaj hasło" required name="pass"/>
                            <label class="form-label" for="validationPassword">Hasło</label>
                            <div class="valid-feedback">Już lepiej!</div>
                            <div class="invalid-feedback">Pole nie może być puste</div>
                        </div>
                    </div>

                    <!-- aidname -->
                    <div class="form-outline mb-3">

                        <div class="form-outline">
                            <input type="text" id="validationN" class="form-control form-control-lg"
                                placeholder="Wybierz swoją apteczkę" required name="aidkit"/>
                            <label for="validationN" class="form-label">Nazwa apteczki</label>
                            <div class="invalid-feedback">Pole nie może być puste</div>
                        </div>

                        <div class="text-center text-lg-start mt-1 pt-0">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Zapoznaj się <a href="https://docs.google.com/document/d/1rAy8rusIkLc7iSBahAGxg7J_alW-ie1zLIlhgA1CuhE/edit?usp=sharing"
                                    class="link-info">Dokumentacja</a></p>
                        </div>

                        <div class="col-12">
                            <div class="form-check mt-2 mb-3">
                                <input class="form-check-input " type="checkbox" value="" id="invalidCheck" required />
                                <label class="form-check-label" for="invalidCheck">Akceptuję postanowienia
                                    dokumentacyjne</label>
                                <div class="invalid-feedback">Musisz wyrazić zgodę.</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary btn-lg" type="submit">Zarejestruj </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php

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