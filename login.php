<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
    <?php if(isset($_GET["wrongPassOrEmail"]))
                    echo "zle haslo";
    ?>
                <form class="row g-3 needs-validation" novalidate action="charon.php" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-3">

                        <div class="form-outline">
                            <input type="email" id="validationEmail" class="form-control form-control-lg"
                                placeholder="Wprowadź poprawny adres email" required />
                            <label for="validationEmail" class="form-label">Adres email</label>
                            <div class="invalid-feedback">Proszę podać poprawny adres email.</div>
                        </div>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <div class="form-outline">
                            <input type="password" id="validationPassword" class="form-control form-control-lg"
                                placeholder="Wprowadź hasło" required />
                            <label class="form-label" for="validationPassword">Hasło</label>
                            <div class="valid-feedback">Nieźle!</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label" for="form2Example3">
                                Pamiętaj mnie
                            </label>
                        </div>
                        <a href="#!" class="text-body">Zapomniałeś hasła?</a>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary btn-lg" type="submit">Zaloguj</button>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Nie masz konta? <a href="register.php"
                                class="link-danger">Zarejestruj się</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
session_start();
if(!isset($_SESSION["startLogin"]) || $_SESSION["startLogin"] != 1)
session_regenerate_id();
$_SESSION["startLogin"] = 1;
$_SESSION["komunikat"] = "U mnie działa";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tytuł strony</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>P1.php</h1>
    <p>
    <form action="charon.php" method="POST">
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