PPNS : <input type="text">
POLSUS : <input type="text">
Pengawas Perikanan : <input type="text">
<table border="1">
<tr>
	<th rowspan="2">Sarana</th>
	<th rowspan="2">Prasarana</th>
	<th colspan="3">SDM</th>
</tr>
<tr>
	<th>PPNS</th>
	<th>POLSUS</th>
	<th>Pengawas Perikanan</th>
</tr>
<tr>
<td>4</td>
<td>5</td>
	<?php

	$a = explode('|', "10|20|30");
	foreach ($a as $key => $value) {
	?>
	<td><?php echo $value ?></td>
	<?php
	}

	?>
</tr>
</table>