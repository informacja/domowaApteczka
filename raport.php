<?php require('components/head.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>

// view all the data
*raport.php*
Tabelki:
- utylizacji
- zakupionych
- zużytych

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


$sql_leki|_niewazne = "SELECT leki_specyfikacja_idleki, ilosc_kupiona, ilosc_pozostala, leki_w_apteczce.status, data_waznosci FROM `leki_w_apteczce` WHERE data_waznosci < 2025-05-01"; <!-- Powyzsze quwry trzeba zmienic!! -->

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
					<th scope="col">D</th>
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

	- zużytych
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