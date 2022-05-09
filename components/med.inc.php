   <section class="services gradient">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 220">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"
        ></path>
      </svg>
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <?php 
          
            if(zalogowany())
            {
              if(isset($_GET["add"]))
              { ?>
               
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
              <?php
              }
              else if(isset($_GET["utilization"]))
              {
                echo"sdfsf";
              }else{      
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
          <a href="med.php?utilization"><button type="button " class="btn btn-outline-success mb-3" > 
              Utylizuj
            </button></a>

            <h1>We promote.</h1>

            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Delectus, tempore placeat corrupti enim, cumque ex? Mollitia nihil
              sint cumque omnis iure nisi.
            </p>
          </div>
          <!-- <div class="col-md-5">
            <button type="button" class="btn btn-outline-light mb-3">
              Selling
            </button>

            <h1>We sell.</h1>

            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Delectus, tempore placeat corrupti enim, cumque ex? Mollitia nihil
              sint cumque omnis iure nisi.
            </p>
          </div> -->
          <!-- <div class="col-md-5"><img src="img/revenue_.svg" alt="" /></div> -->
          <?php  } }?>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 210">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,96L34.3,106.7C68.6,117,137,139,206,122.7C274.3,107,343,53,411,53.3C480,53,549,107,617,117.3C685.7,128,754,96,823,96C891.4,96,960,128,1029,154.7C1097.1,181,1166,203,1234,202.7C1302.9,203,1371,181,1406,170.7L1440,160L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"
        ></path>
      </svg>
    </section>