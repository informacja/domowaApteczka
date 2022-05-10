<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>
<?php include('components/companies.inc.php'); ?> 
<?php

require_once("config.php");
            $sql = "SELECT * FROM `leki_w_apteczce` WHERE leki_w_apteczce.data_waznosci < CURRENT_DATE";
                    $res = mysqli_query($conn, $sql);
                    
                    if ($res )  {                              
                        if( mysqli_num_rows($res) > 0 )  {
                          while($record = mysqli_fetch_assoc($res)){
                            $count = $record["count(*)"];
                            // $nazwaLeku = $record["nazwa"];
							var_dump($record);
                            echo "<br>";//<h4>Są $count leki przeterminowane, przejdź do meykamentów.</h4>";
                          }
                        } else echo "Brak przeterminowanych leków";
                    } else die("Błąd pobierania listy specyfików <br>" . mysqli_error($conn));

            
echo  "view all the data
*raport.php*
Tabelki:
- utylizacji
- zakupionych
- zużytych
LOG";
?>

$sql_leki = "SELECT leki_specyfikacja_idleki, ilosc_kupiona, ilosc_pozostala, leki_w_apteczce.status FROM `leki_w_apteczce`";

$sql_apteczki = "SELECT apteczki_name FROM apteczki";

Przychodów i rozchodów

- zakupionych
<div class="pt-5">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Lp</th>
				<th scope="col">Apteczki</th>
				<th scope="col">Id leków</th>
				<th scope="col">Ilość kupiona</th>
				<th scope="col">Ilość pozostała</th>
				<th scope="col">Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row">1</th>
				<td>Mark</td>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
				<td>@mdo</td>
			</tr>
		</tbody>
	</table>
</div>


$sql_leki_niewazne = "SELECT leki_specyfikacja_idleki, ilosc_kupiona, ilosc_pozostala, leki_w_apteczce.status, data_waznosci FROM `leki_w_apteczce` WHERE data_waznosci < 2025-05-11"; <!-- Powyzsze quwry trzeba zmienic!! -->

	- utylizacji - data ważności
	<div class="pt-5">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Lp</th>
					<th scope="col">Apteczki</th>
					<th scope="col">Id lekarstw</th>
					<th scope="col">Ilość kupiona</th>
					<th scope="col">Ilość pozostała</th>
					<th scope="col">Data ważności</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>@mdo</td>
				</tr>
			</tbody>
		</table>
	</div>

	-zuzytych

	$sql_leki_zuzyte = "SELECT leki_specyfikacja_idleki, ilosc_kupiona, ilosc_pozostala, leki_w_apteczce.status FROM `leki_w_apteczce` WHERE ilosc_pozostala = 0"

	<div class="pt-5">
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Lp</th>
					<th scope="col">Apteczki</th>
					<th scope="col">Id lekarstw</th>
					<th scope="col">Ilość kupiona</th>
					<th scope="col">Ilość pozostała</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
					<td>@mdo</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php require('components/footer.inc.php'); ?>


