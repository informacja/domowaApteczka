    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="img/logo.png" alt="" /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <?php session_start();
              if($_SESSION["zalogowany"] != 1) {
                            echo '<a href="register.php"><button  type="button" class="btn btn-outline-danger m-3 mb-0 mt-0">
                            Rejestracja
                          </button> </a>
                          <a href="login.php"><button  type="button" class="btn btn-outline-success ">
                            Logowanie
                          </button> </a>';
                        } else{ ?>
                       
            <li class="nav-item">
              <a class="nav-link"  href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Medykamenty</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.php">Raporty</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://docs.google.com/document/d/1rAy8rusIkLc7iSBahAGxg7J_alW-ie1zLIlhgA1CuhE/edit?usp=sharing">Dokumentacja</a>
            </li> 
            <li class="nav-item"> 
              <!-- <a class="nav-link" href="about.php" class="btn btn-outline-warning mb-3">Zaloguj</a> -->
              <a href="logoff.php"><button type="button" class="btn btn-outline-warning mh-3">
              Wyloguj
            </button></a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>