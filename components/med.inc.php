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
                var_dump($_POST);

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
                                  while( mysqli_num_rows($res) > 0 )  {
                                      $record = mysqli_fetch_assoc($res);
                                      $idLeku = $record["idleki"];
                                      $nazwaLeku = $record["nazwa"];
                                      echo "<option value='$idLeku'>$nazwaLeku</option>";
                                  }
                              }
                              else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));
?>         
                            </select>
                        </div>
                           <!-- <div class="form-outline form-white mb-4">
                               <input type="text" id="typeName" class="form-control form-control-lg" name="nazwaLeku" />
                               <label class="form-label" for="typeName">Nazwa leku</label>
                           </div> -->
                           <div class="form-outline form-white mb-4">
                               <input type="number" id="typeName" class="form-control form-control-lg" name="ilosc" required />
                               <label class="form-label" for="typeName">Ilość kupiona</label>
                           </div>
                           <div class="form-outline form-white mb-4">
                               <input type="date" id="typeName" class="form-control form-control-lg" name="data" required />
                               <label class="form-label" for="typeName">Data ważności</label>
                           </div>

                           <div class="form-outline form-white mb-4">
                               <input type="number" id="typePassword" class="form-control form-control-lg" name="status" required/>
                               <label class="form-label" for="typePassword">Status</label>
                           </div>
                           <!-- 
  <div class="form-check">
    <input
      class="form-check-input"
      type="checkbox"
      value=""
      id="flexCheckDefault"
    />
    <label class="form-check-label" for="flexCheckDefault">
      Remember me
    </label>
  </div> -->

                           <!-- _____________________________________  !!!!!!!!  -->
                           
                               <div class="text-center py-5">
                                   <button class="btn btn-light btn-lg btn-rounded px-5" type="submit">Dodaj</button>
                               </div>
                           
                           <!-- _____________________________________ !!!!!!!!!  -->

                       </form>
                   </div>
               </div>
               <?php
            } else if (isset($_GET["utilization"])) { ?>
               <section class="intro">
                   <div class="bg-image h-100"
                       style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/glassmorphism-article/img5.jpg');">
                       <div class="mask d-flex align-items-center h-100">
                           <div class="container">
                               <div class="row justify-content-center">
                                   <div class="col-12 col-md-10 col-lg-7 col-xl-6">
                                       <div class="card mask-custom">
                                           <div class="card-body p-5 text-white">

                                               <div class="my-4">

                                                   <h2 class="text-center mb-5">Register Form</h2>

                                                   <form>
                                                       <!-- 2 column grid layout with text inputs for the first and last names -->
                                                       <div class="row">
                                                           <div class="col-12 col-md-6 mb-4">
                                                               <div class="form-outline form-white">
                                                                   <input type="text" id="form3Example1"
                                                                       class="form-control form-control-lg" />
                                                                   <label class="form-label" for="form3Example1">First
                                                                       name</label>
                                                               </div>
                                                           </div>
                                                           <div class="col-12 col-md-6 mb-4">
                                                               <div class="form-outline form-white">
                                                                   <input type="text" id="form3Example2"
                                                                       class="form-control form-control-lg" />
                                                                   <label class="form-label" for="form3Example2">Last
                                                                       name</label>
                                                               </div>
                                                           </div>
                                                       </div>

                                                       <!-- Email input -->
                                                       <div class="form-outline form-white mb-4">
                                                           <input type="email" id="form3Example3"
                                                               class="form-control form-control-lg" />
                                                           <label class="form-label" for="form3Example3">Email
                                                               address</label>
                                                       </div>

                                                       <!-- Password input -->
                                                       <div class="form-outline form-white mb-4">
                                                           <input type="password" id="form3Example4"
                                                               class="form-control form-control-lg" />
                                                           <label class="form-label"
                                                               for="form3Example4">Password</label>
                                                       </div>

                                                       <!-- Checkbox -->
                                                       <div class="form-check d-flex justify-content-center mb-4">
                                                           <input class="form-check-input me-2" type="checkbox" value=""
                                                               id="form2Example3" checked />
                                                           <label class="form-check-label" for="form2Example3">
                                                               Subscribe to our newsletter
                                                           </label>
                                                       </div>

                                                       <!-- Submit button -->
                                                       <button type="submit" class="btn btn-light btn-block mb-4">Sign
                                                           up</button>

                                                       <!-- Register buttons -->
                                                       <div class="text-center">
                                                           <p>or sign up with:</p>
                                                           <button type="button"
                                                               class="btn btn-light btn-floating mx-1">
                                                               <i class="fab fa-facebook-f"></i>
                                                           </button>

                                                           <button type="button"
                                                               class="btn btn-light btn-floating mx-1">
                                                               <i class="fab fa-google"></i>
                                                           </button>

                                                           <button type="button"
                                                               class="btn btn-light btn-floating mx-1">
                                                               <i class="fab fa-twitter"></i>
                                                           </button>

                                                           <button type="button"
                                                               class="btn btn-light btn-floating mx-1">
                                                               <i class="fab fa-github"></i>
                                                           </button>
                                                       </div>
                                                   </form>

                                               </div>

                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </section>
               <?php
            } else if (isset($_GET["wydaj"])) { ?>
               <?php
            } else {
            ?>
               <div class="col-md-5">
                   <a href="med.php?add"> <button type="button" class="btn btn-outline-warning mb-3">
                           Dodaj lek
                       </button></a>

                   <h1>We code.</h1>

                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                       Delectus, tempore placeat corrupti enim, cumque ex? Mollitia nihil
                       sint cumque omnis iure nisi.
                   </p>
               </div>
               <div class="col-md-5"><img src="img/coding_.svg" alt="" /></div>
               <div class="col-md-5"><img src="img/marketing.svg" alt="" /></div>
               <div class="col-md-5">
                   <a href="med.php?utilization"><button type="button" class="btn btn-outline-success mb-3">
                           Utylizuj
                       </button></a>

                   <!-- _____________________________________  !!!!!!!!  -->
                   <button type="button" value="Utylizuj" class="btn btn-light btn-floating mx-1">
                       <i class="form-label"></i>
                   </button>
                   <!-- _____________________________________ !!!!!!!!!  -->

                   <h1>We promote.</h1>

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

                   <h1>We sell.</h1>

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