   <section class="services gradient">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
           <path fill="#fff" fill-opacity="1"
               d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
           </path>
       </svg>
       <div class="container">
           <div class="row align-items-center justify-content-center">
<?php
 
          if (zalogowany()) {
            if(isset($_POST)) // add lek
            {
              if(isset($_GET) && isset($_GET["addLek"])) // add lek
              {                
                $idLeku = $_POST["idLeku"];
                $nazwaLeku = $_POST["nazwaLeku"];
                $ilosc = $_POST["ilosc"];
                $data = $_POST["data"];
                $cena = $_POST["cena"];
                $idApteczki = $_SESSION["apteczkiId"];
                if( isempty($nazwaLeku) )
                {

                }else {
                    // select id specyfiku po nazwie
                }

                $sql = "INSERT INTO `leki_w_apteczce` (`idleki_w_apteczce`, `apteczki_idapteczki`, `leki_specyfikacja_idleki`, `ilosc_kupiona`, `ilosc_pozostala`, `data_waznosci`, `cena`, `status`)
                VALUES (NULL, '$idApteczki', '$idLeku', '$ilosc', '$ilosc', '$data', '$cena', '1')";
               
                $res = mysqli_query($conn, $sql);

                if ($res )
                echo "<h2>Dopisano lek</h2>";
                else
                echo "Błąd dodawania leku";
              }
              if(isset($_GET) && isset($_GET["addSpecyfik"])) // add 
              {
                $nazwa = $_POST["nazwa"];
                $substancjaCzynna = $_POST["substancjaCzynna"];
                $ean = $_POST["ean"];
                $opZb = $_POST["opZb"];

                $sql = "INSERT INTO `leki_specyfikacja` (`idleki`, `nazwa`, `subst_czynna`, `ean`, `op_zb`)
                 VALUES (NULL, '$nazwa', '$substancjaCzynna', '$ean', '$opZb')";

                $res = mysqli_query($conn, $sql);

                if ($res )
                echo "<h2>Dopisano specyfik $nazwa</h2>";
                else
                echo "Błąd apteczki";
              }
            }

            if (isset($_GET["addSpec"])) { ?>

              <div class="card-body p-5 text-white">
              <div class="my-md-5">
                  <div class="text-center pt-1">
                      <h1 class="fw-bold my-5 text-uppercase">Dodaj specyfik</h1>

                  </div>                
                  <form method="POST" action="med.php?addSpecyfik">
                      <!-- <div class="form-outline form-white mb-4">
                          <input type="text" id="typeName" class="form-control form-control-lg" name="nazwaLeku" />
                          <label class="form-label" for="typeName">Nazwa leku</label>
                      </div> -->
                      <div class="form-outline form-white mb-4">
                          <input type="text" id="typeName" class="form-control form-control-lg" name="nazwa" required />
                          <label class="form-label" for="typeName">Nazwa specyfiku</label>
                      </div>
                      <div class="form-outline form-white mb-4">
                          <input type="text" id="typeName" class="form-control form-control-lg" name="substancjaCzynna" required />
                          <label class="form-label" for="typeName">Substancja czynna</label>
                      </div>

                      <div class="form-outline form-white mb-4">
                          <input type="text" id="typePassword" class="form-control form-control-lg" name="ean" required/>
                          <label class="form-label" for="typePassword">EAN</label>
                      </div>
                      <div class="form-outline form-white mb-4">
                          <input type="text" id="typePassword" class="form-control form-control-lg" name="opZb" required/>
                          <label class="form-label" for="typePassword">Opakowanie zbiorcze</label>
                      </div>
                          <div class="text-center py-5">
                              <button class="btn btn-light btn-lg btn-rounded px-5" type="submit">Dodaj</button>
                          </div>
                    </form>
              </div>
          </div>
<?php
            }
            else if (isset($_GET["add"])) { 
?>
               <div class="card-body p-5 text-white">
                   <div class="my-md-5">
                       <div class="text-center pt-1">
                           <!-- <i class="fas fa-user-astronaut fa-3x"></i> -->
                           <h1 class="fw-bold my-5 text-uppercase">Dodaj lek</h1>

                       </div>
                       <div class="select-custom-content">
                              <a href="med.php?addSpec"><button class="btn-save btn btn-primary btn-sm">Dodaj nowy specyfik</button></a>
                            </div>
                       <form method="POST" action="med.php?addLek">
                         <div style="display:inline-block;">
                          <select class="select my-3 py-2" name="idLeku">
<?php
                              // require_once("conifg.php");
                              $sql = "SELECT * FROM `leki_specyfikacja`";
                              $res = mysqli_query($conn, $sql);
                              
                              if ($res )  {                              
                                  if( mysqli_num_rows($res) > 0 )  {
                                    while($record = mysqli_fetch_assoc($res)){
                                      $idLeku = $record["idleki"];
                                      $nazwaLeku = $record["nazwa"];
                                      echo "<option value='$idLeku'>$nazwaLeku</option>";
                                    }
                                  } else echo "Brak wierszy";
                              }
                              else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));
?>         
                            </select>
                            <div class="form-outline form-white mb-4">
                               <input type="text" id="typeName" class="form-control form-control-lg" name="nazwaLeku" />
                               <label class="form-label" for="typeName">lub Nazwa leku</label>
                           </div>
                        </div>
                    
                           <div class="form-outline form-white mb-4">
                               <input type="number" id="typeName" class="form-control form-control-lg" name="ilosc" required />
                               <label class="form-label" for="typeName">Ilość kupiona</label>
                           </div>
                           <div class="form-outline form-white mb-4">
                               <input type="date" id="typeName" class="form-control form-control-lg" name="data" required />
                               <label class="form-label" for="typeName">Data ważności</label>
                           </div>

                           <div class="form-outline form-white mb-4">
                               <input type="number" id="typePassword" class="form-control form-control-lg" name="cena" required/>
                               <label class="form-label" for="typePassword">Cena</label>
                           </div>
                           <!-- _____________________________________  !!!!!!!!  -->
                           
                               <div class="text-center py-5">
                                   <button class="btn btn-light btn-lg btn-rounded px-5" type="submit">Dodaj</button>
                               </div>
                           
                           <!-- _____________________________________ !!!!!!!!!  -->

                       </form>
                   </div>
               </div>
               <?php
            } else if (isset($_GET["utilization"])) { 
                          $idApteczki = $_SESSION["apteczkiId"];

?>
<table class="table table-hover"></table>
<?php
              $sql = "SELECT * FROM `leki_w_apteczce` JOIN leki_specyfikacja WHERE leki_w_apteczce.leki_specyfikacja_idleki = leki_specyfikacja.idleki && leki_w_apteczce.apteczki_idapteczki = $idApteczki";

              $res = mysqli_query($conn, $sql);

              if ($res )  {                              
                if( mysqli_num_rows($res) > 0 )  {
                  while($record = mysqli_fetch_assoc($res)){
                    var_dump($record);

                    // array(12) { ["idleki_w_apteczce"]=> string(1) "2"
                    //    ["apteczki_idapteczki"]=> string(1) "2"
                    //     ["leki_specyfikacja_idleki"]=> string(1) "1" 
                    //     ["ilosc_kupiona"]=> string(1) "1" 
                    //     ["ilosc_pozostala"]=> string(1) "1" 
                    //     ["data_waznosci"]=> string(10) "2022-05-03" 
                    //     ["status"]=> string(1) "0" 
                    //     ["idleki"]=> string(1) "1" 
                    //     ["nazwa"]=> string(9) "Espumisan" 
                    //     ["subst_czynna"]=> string(9) "simetikon" 
                    //     ["ean"]=> string(13) "5909990168712" 
                    //     ["op_zb"]=> string(3) "tak" } 
                    // $idLeku = $record["idleki"];
                    // $nazwaLeku = $record["nazwa"];
                    // echo "<option value='$idLeku'>$nazwaLeku</option>";
                  }
                } else echo "Brak wierszy";
              }
              else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));?>
              ?> 
               <?php
            } else if (isset($_GET["wydaj"])) { 
              $idApteczki = $_SESSION["apteczkiId"];

              $sql = "SELECT * FROM `leki_w_apteczce` WHERE apteczki_idapteczki = $idApteczki";

              $res = mysqli_query($conn, $sql);
              
              if ($res )  {                              
                if( mysqli_num_rows($res) > 0 )  {
                  while($record = mysqli_fetch_assoc($res)){
                    var_dump($record);
                    // $idLeku = $record["idleki"];
                    // $nazwaLeku = $record["nazwa"];
                    // echo "<option value='$idLeku'>$nazwaLeku</option>";
                  }
                } else echo "Brak wierszy";
            }
            else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));?>

<!-- array(7) { ["idleki_w_apteczce"]=> string(1) "2" ["apteczki_idapteczki"]=> string(1) "2" [
  "leki_specyfikacja_idleki"]=> string(1) "1" ["ilosc_kupiona"]=> string(1) "1" ["ilosc_pozostala"]=> string(1) "1"
   ["data_waznosci"]=> string(10) "2022-05-03" ["status"]=> string(1) "0" } -->


               <?php
            } else {
            ?>
               <div class="col-md-5">
                   <a href="med.php?add"> <button type="button" class="btn btn-outline-warning mb-3">
                           Dodaj lek
                       </button></a>

                   <h1>Uzupełniaj</h1>

                   <p>
                       Utrzymuj porządek w swoich domowych zbiorach leczniczych. Dodawaj swoje leki zaraz po ich zakupie.
                   </p>
               </div>
               <div class="col-md-5"><img src="img/coding_.svg" alt="" /></div>
               <div class="col-md-5"><img src="img/marketing.svg" alt="" /></div>
               <div class="col-md-5">
                   <a href="med.php?utilization"><button type="button" class="btn btn-outline-success mb-3">
                           Utylizuj
                       </button></a>

                   <!-- _____________________________________  !!!!!!!!  -->
                   <!-- <button type="button" value="Utylizuj" class="btn btn-light btn-floating mx-1">
                       <i class="form-label"></i>
                   </button> -->
                   <!-- _____________________________________ !!!!!!!!!  -->

                   <h1>Zarządzaj</h1>

                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                       Delectus, tempore placeat corrupti enim, cumque ex? Mollitia nihil
                       sint cumque omnis iure nisi.
                   </p>
               </div>
               <div class="col-md-5">
                   <a href="med.php?wydaj"><button type="button" class="btn btn-outline-light mb-3">
                           Wydaj
                       </button></a>

                   <h1>Używaj</h1>

                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                       Delectus, tempore placeat corrupti enim, cumque ex? Mollitia nihil
                       sint cumque omnis iure nisi.
                   </p>
               </div>
               <div class="col-md-5"><img src="img/revenue_.svg" alt="" /></div>
               <?php  }
          } ?>
           </div>
       </div>
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 210">
           <path fill="#fff" fill-opacity="1"
               d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
           </path>
       </svg>
   </section>