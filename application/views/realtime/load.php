<table id="add-row" class="display table table-striped table-hover" >
	<thead>
		<tr>
			<th>No</th>
			<th>Message</th>
			<th>Date & Time</th>
			<th>Data Ke</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Message</th>
			<th>Date & Time</th>
			<th>Data Ke</th>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ($data as $no => $row) { ?>
			<tr>
				<td><?= $no+1; ?></td>
				<td><?= $row['text']; ?></td>
				<td><?php echo date("d F Y, h:i A", strtotime($row['time'])); ?></td>	
				<td><?= $row['id']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
