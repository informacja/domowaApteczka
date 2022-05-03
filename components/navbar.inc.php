   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
       <div class="container-fluid">
           <!-- Navbar brand -->
           <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" /></a>
           <!-- <div> -->
           <?php session_start(); 
            function zalogowany()
            {
                if( !isset($_SESSION["zalogowany"]) ) 
                { 
                    if ( $_SESSION["zalogowany"] != 1 )
                    {
                        return false;
                    }
                    return true;
                }
                else return true;
            }
            $nazwaApteczki = $_SESSION["apteczka"];
            if (zalogowany())
                echo "<a class='nav-link text-body' 
                href='#'> $nazwaApteczki
                </a>"; 
           ?>
            <i class="fa-solid fa-up-right-from-square"></i>
            <a class="nav-link" target="_blank"
                href="https://docs.google.com/document/d/1rAy8rusIkLc7iSBahAGxg7J_alW-ie1zLIlhgA1CuhE/edit?usp=sharing">
                Dokumentacja</a>
          <!-- </div>       -->

           <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
               aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
               <i class="fas fa-bars"></i>
           </button>
           <div class="collapse navbar-collapse justify-content-end" id="navbarExample01">
               <ul class="navbar-nav">
                   <?php 
                   //
                if( !isset($_SESSION["zalogowany"]) || $_SESSION["zalogowany"] != 1) 
                {                
                            echo '<a href="register.php"><button  type="button" class="btn btn-outline-danger m-3 mb-0 mt-1">
                            Rejestracja
                          </button> </a>
                          <a href="login.php"><button  type="button" class="btn btn-outline-success m-3 mb-0 mt-1">
                            Logowanie
                          </button> </a>';
                } else { ?>

                   <!-- <li class="nav-item">
                       <a class="nav-link" href="index.php">Home</a>
                   </li> -->
                   <li class="nav-item">
                       <a class="nav-link" href="services.php">Medykamenty</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="gallery.php">Raporty</a>
                   </li>

                   <li class="nav-item">
                       <!-- <a class="nav-link" href="about.php" class="btn btn-outline-warning mb-3">Zaloguj</a> -->
                       <a href="logoff.php"><button type="button" class="btn btn-outline-warning m-3 mb-0 mt-1">
                               Wyloguj
                           </button></a>
                   </li>
                   <?php } ?>
               </ul>
           </div>
       </div>
   </nav>