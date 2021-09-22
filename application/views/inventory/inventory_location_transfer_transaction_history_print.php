<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		table th{
			font-weight: bold;
			text-decoration: underline;
		}
	</style>
</head>
<body>

<br/><br/>
<label><b>PandaBooks</b></label><br/>
<!-- <label>1196 Batangas Street, San Isidro, Makati City, Philippines</label><br/>
<label>63.2.8894474 to 76</label><br/> -->

<br/><br/><br/>

<label><b>ILT No: </b><?= $transfer_entries[0]['iltno']; ?></label><br/>
<label><b>Date: </b><?= $transfer_entries[0]['trandate']; ?></label><br/>
<label><b>From Location: </b><?= $transfer_entries[0]['locfrom']; ?></label><br/>
<label><b>To Location: </b><?= $transfer_entries[0]['locto']; ?></label><br/>

<br/>
<br/>

<table>
	<thead>
		<tr>
			<th>QTY</th>
			<th>Unit</th>
			<th>Description</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($transfer_entries as  $value) {
			?>
				<tr>
					<td><?= number_format($value['tranqty'],2); ?></td>
					<td><?= $value['description'] ?></td>
					<td><?= $value['itemname'] ?></td>
				</tr>
			<?php

			}
		?>
	</tbody>
</table>

<br/>
<br/>
<br/>

<p>
	<?= $value['notes']; ?>
</p>

</body>
</html>