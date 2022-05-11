    <header class="page-header gradient">
      <div class="container pt-3">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-5">
            <?php

            if (zalogowany()) {
              $name = $_SESSION["name"];
              $apteczkiName = $_SESSION["apteczka"];

              echo "
              <h2>Witaj $name, Twoja apteczka to $apteczkiName</h2>
  
              <p>
                Możesz dodać medykamenty, sprawdzić ich ceny i daty ważności. Wygeneruj raport, by sprawdzić integralność bazy i ruchy magazynowe.
              </p> <a href='raport.php'<button type='button' class='btn btn-outline-success btn-lg my-3'>
              Raporty
            </button></a>";
            require_once("config.php");

            $idApteczki = $_SESSION["apteczkiId"];
            $sql = "SELECT count(*) FROM `leki_w_apteczce` WHERE leki_w_apteczce.data_waznosci < CURRENT_DATE 
            -- leki_w_apteczce.leki_specyfikacja_idleki = leki_specyfikacja.idleki 
            && leki_w_apteczce.apteczki_idapteczki = $idApteczki
             && leki_w_apteczce.status > 0
            && leki_w_apteczce.data_waznosci <= CURRENT_DATE
             && leki_w_apteczce.ilosc_pozostala > 0";
 
                    $res = mysqli_query($conn, $sql);
                    
                    if ($res )  {                              
                        if( mysqli_num_rows($res) > 0 )  {
                          while($record = mysqli_fetch_assoc($res)){
                            $count = $record["count(*)"];
                            // $nazwaLeku = $record["nazwa"];
                            echo "<h4>Liczba przeterminowanych leków to $count, przejdź do zarządzania medykamentami.</h4>";
                          }
                        } else echo "Brak przeterminowanych leków";
                    } else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));

              echo "
            <a href='med.php'><button type='button' class='btn btn-outline-warning btn-lg my-3'>
              Medykamenty
            </button></a>";
                    // cena roczna 



            } else {
              echo "
            <h2>Witaj na stronie domowejApteczki</h2>

            <p>
            Domowa Apteczka. System, który umożliwi Ci zarządzanie domowymi farmaceutykami szybko i skutecznie.
            </p>";
            }
            ?>

           
          </div>
          <div class="col-md-5">
            <img src="img/email_campaign_monochromatic.svg" alt="Header image" />
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 250">
        <path fill="#fff" fill-opacity="1" d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,112C672,139,768,181,864,181.3C960,181,1056,139,1152,122.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </header>