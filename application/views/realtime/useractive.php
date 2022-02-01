<table id="add-row" class="display table table-striped table-hover" >
	<thead>
		<tr>
			<th>No</th>
			<th>Date & Time</th>
			<th>Name</th>
			<th>Address</th>
			<th>Login Via</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<th>No</th>
			<th>Date & Time</th>
			<th>Name</th>
			<th>Address</th>
			<th>Login Via</th>
		</tr>
	</tfoot>
	<tbody>
		<?php foreach ($useractive as $no => $row) { ?>
			<tr>
				<td><?= $no+1; ?></td>
				<!-- <td><?php echo date("d F Y, h:i A", strtotime($row['when'])); ?></td>	 -->
				<td><?= $row['when']; ?></td>
				<td><?= $row['name']; ?></td>
				<td><?= $row['address']; ?></td>
				<td><?= $row['via']; ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
