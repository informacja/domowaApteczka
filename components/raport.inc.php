    <section class="gallery">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 160">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L120,128C240,128,480,128,720,122.7C960,117,1200,107,1320,101.3L1440,96L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"
        ></path>
      </svg>
      <div class="container">
        <div class="row">
          <div class="col-md-10">
          <H1>Raporty leków</h1>
	<a href='raport.php?utylizacja'><button type='button' class='btn btn-outline-secondary btn-lg m-3 ml-5'>
    	Utylizacji
    </button></a>
	<a href='raport.php?zakupionych'><button type='button' class='btn btn-outline-secondary btn-lg m-3'>
    	Zakupionych
    </button></a>
	<a href='raport.php?zużytych'><button type='button' class='btn btn-outline-secondary btn-lg m-3'>
    	Zużytych
    </button></a>
<H1>Logi</h1>
	<a href='raport.php?logInput'><button type='button' class='btn btn-outline-info btn-lg m-3 ml-5'>
    	Wprowadzenia
    </button></a>
	<a href='raport.php?logUtil'><button type='button' class='btn btn-outline-info btn-lg m-3'>
    	Utylizacji
    </button></a>           
          </div>
        </div>
 <?php if(isset($_GET)){ ?>


<?php
require_once("config.php");
}  if (isset($_GET["utylizacja"])) { 
?>
<table class="table table-hover ">
<thead>
  <tr>
      <th scope="col">L.p.</th>
      <th scope="col">Nazwa leku</th>
      <th scope="col">Data ważności</th>
      <th scope="col">Ilość zakupiona</th>
      <th scope="col">Zutylizowana ilość</th>
  </tr>
</thead>
<tbody>
<?php

$idApteczki = $_SESSION["apteczkiId"];

$sql = "SELECT * FROM `leki_w_apteczce` JOIN leki_specyfikacja WHERE 
leki_w_apteczce.leki_specyfikacja_idleki = leki_specyfikacja.idleki 
-- && leki_w_apteczce.apteczki_idapteczki = $idApteczki
-- && leki_w_apteczce.data_waznosci > CURRENT_DATE
&& leki_w_apteczce.status = 0
&& leki_w_apteczce.ilosc_pozostala > 0
";

$res = mysqli_query($conn, $sql);

if ($res )  {                              
if( mysqli_num_rows($res) > 0 )  {
$counter= 0;
while($record = mysqli_fetch_assoc($res)){
// var_dump($record);
echo "<br>";
$counter++;
$idleki_w_apteczce = $record["idleki_w_apteczce"];
$nazwa = $record["nazwa"];
$data_waznosci = $record["data_waznosci"];
$ilosc_kupiona = $record["ilosc_kupiona"];
$ilosc_pozostala = $record["ilosc_pozostala"];
echo "<tr>
<th scope='row'>$counter</th>
<td>$nazwa</td>
<td>$data_waznosci</td>
<td>$ilosc_kupiona</td>
<td>$ilosc_pozostala</td>

</tr>";

}
} else echo "Brak wierszy";
}
else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));
}

if (isset($_GET["zakupionych"])) { 
  ?>
  <table class="table table-hover ">
<thead>
    <tr>
        <th scope="col">L.p.</th>
        <th scope="col">Nazwa leku</th>
        <th scope="col">Data ważności</th>
        <th scope="col">Ilość zakupiona</th>
        <!-- <th scope="col">Zutylizowana ilość</th> -->
    </tr>
</thead>
<tbody>
  <?php

$idApteczki = $_SESSION["apteczkiId"];

$sql = "SELECT * FROM `leki_w_apteczce` JOIN leki_specyfikacja WHERE 
leki_w_apteczce.leki_specyfikacja_idleki = leki_specyfikacja.idleki 
-- && leki_w_apteczce.apteczki_idapteczki = $idApteczki
-- && leki_w_apteczce.data_waznosci > CURRENT_DATE
&& leki_w_apteczce.status > 0
&& leki_w_apteczce.ilosc_pozostala >= 0
";

$res = mysqli_query($conn, $sql);

if ($res )  {                              
if( mysqli_num_rows($res) > 0 )  {
 $counter= 0;
while($record = mysqli_fetch_assoc($res)){
 // var_dump($record);
 echo "<br>";
 $counter++;
 $idleki_w_apteczce = $record["idleki_w_apteczce"];
 $nazwa = $record["nazwa"];
 $data_waznosci = $record["data_waznosci"];
 $ilosc_kupiona = $record["ilosc_kupiona"];
 $ilosc_pozostala = $record["ilosc_pozostala"];
 echo "<tr>
 <th scope='row'>$counter</th>
 <td>$nazwa</td>
 <td>$data_waznosci</td>
 <td>$ilosc_kupiona</td>
 

</tr>";

}
} else echo "Brak wierszy";
}
else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));
}
if (isset($_GET["zużytych"])) { 
      ?>
      <table class="table table-hover ">
    <thead>
        <tr>
            <th scope="col">L.p.</th>
            <th scope="col">Nazwa leku</th>
            <th scope="col">Data ważności</th>
            <th scope="col">Ilość zakupiona</th>
            <!-- <th scope="col">Zutylizowana ilość</th> -->
        </tr>
    </thead>
    <tbody>
      <?php

   $idApteczki = $_SESSION["apteczkiId"];

$sql = "SELECT * FROM `leki_w_apteczce` JOIN leki_specyfikacja WHERE 
leki_w_apteczce.leki_specyfikacja_idleki = leki_specyfikacja.idleki 
-- && leki_w_apteczce.apteczki_idapteczki = $idApteczki
-- && leki_w_apteczce.data_waznosci > CURRENT_DATE
-- && leki_w_apteczce.status > 0
&& leki_w_apteczce.ilosc_pozostala = 0
";

$res = mysqli_query($conn, $sql);

if ($res )  {                              
 if( mysqli_num_rows($res) > 0 )  {
     $counter= 0;
   while($record = mysqli_fetch_assoc($res)){
     // var_dump($record);
     echo "<br>";
     $counter++;
     $idleki_w_apteczce = $record["idleki_w_apteczce"];
     $nazwa = $record["nazwa"];
     $data_waznosci = $record["data_waznosci"];
     $ilosc_kupiona = $record["ilosc_kupiona"];
     $ilosc_pozostala = $record["ilosc_pozostala"];
     echo "<tr>
     <th scope='row'>$counter</th>
     <td>$nazwa</td>
     <td>$data_waznosci</td>
     <td>$ilosc_kupiona</td>
     
 
   </tr>";

   }
 } else echo "Brak wierszy";
}
else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));
}?>

</tbody>
</table>


        <div class="row my-3 g-3">

        </div>
        <div class="row mt-5 justify-content-end">
          <div class="col-md-2">
          
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#fff"
          fill-opacity="1"
          d="M0,128L120,128C240,128,480,128,720,122.7C960,117,1200,107,1320,101.3L1440,96L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"
        ></path>
      </svg>
    </section>