
<div class="main-panel">		
			<div class="content">
			<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
					<h5 class="text-white op-7 mb-2">Total Secret PPPoE Active : <?= $totalsecretactive; ?></h5>
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
							<!-- Modal -->

							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Password</th>
											<th>Service</th>
											<th>Local-Address</th>
											<th>Remote-Address</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Caller Id</th>
											<th>Service</th>
											<th>Address</th>
											<th>Uptime</th>
										</tr>
									</tfoot>
									<tbody>
										<?php foreach ($active as $no => $data) { ?>
										<tr>
											<td><?= $no+1; ?></td>
											<td><?= $data['name']; ?></td>	
											<td><?= $data['caller-id']; ?></td>	
											<td><?= $data['service']; ?></td>	
											<td><?= $data['address']; ?></td>	
											<td><?= $data['uptime']; ?></td>
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


	<!-- <script>
		$(document).on('click', '#edit', function() {
			$('#id').val($(this).data('id'))
			$('#user').val($(this).data('name'))
			$('#password').val($(this).data('password'))
			$('#service').val($(this).data('service'))
			$('#profile').val($(this).data('profile'))
			$('#localaddress').val($(this).data('localaddress'))
			$('#remoteaddress').val($(this).data('remoteaddress'))
			$('#comment').val($(this).data('comment'))
		})
	</script> -->
