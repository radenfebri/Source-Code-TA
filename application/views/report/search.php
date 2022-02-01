<?php
	include "conn.php";
?>
<div class="main-panel">		
			<div class="content">
			<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold"><?php echo $title; ?></h2>
					<h5 class="text-white op-7 mb-2">Total Secret PPPoE </h5>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner mt--5">
	<div class="col-md-12">
					<div class="card">
						<div class="card-body">
						<center>
							<div>
								<table>
									<tr>
										<form method="POST">
											<td><b>Dari tanggal</b></td>
											<td><input type="date" name="dari_tgl" value="{{ old('dari_tgl') }}" required="required"></td>

											<td><b>Sampai tanggal</b></td>
											<td><input type="date" name="sampai_tgl" value="{{ old('sampai_tgl') }}" required="required"></td>
											<td><input type="submit" class="btn btn-primary btn-rounded" name="filter" value="Search"></td>
										</form>
									</tr>
								</table> 
							</div>
						</center>
						<center>
						<?php
							if (isset($_POST['filter'])) {
								$dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
								$sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
								echo " <b>Dari Tanggal :</b> " .date("d F Y", strtotime($dari_tgl)). 
								" <b>Sampai Tanggal :</b> " .date("d F Y", strtotime($sampai_tgl)) ;
							}
							?>
						</center>

							<div class="table-responsive">
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
									<?php 

										if (isset($_POST['filter'])) {
											$dari_tgl = mysqli_real_escape_string($conn, $_POST['dari_tgl']);
											$sampai_tgl = mysqli_real_escape_string($conn, $_POST['sampai_tgl']);
											$ambildata = mysqli_query($conn, "SELECT * FROM  data WHERE time BETWEEN '$dari_tgl' AND '$sampai_tgl' ");
										}else{
											$ambildata = mysqli_query($conn, "SELECT * FROM  data ");
										}

									foreach ($ambildata as $no => $row) { ?>
										<tr>
											<td><?= $no+1; ?></td>
											<td><?= $row['text']; ?></td>
											<td><?php echo date("d F Y, h:i A", strtotime($row['time'])); ?></td>	
											<td><?= $row['id']; ?></td>
										</tr>
										
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
