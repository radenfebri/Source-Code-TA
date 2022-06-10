
<div class="main-panel">		
			<div class="content">
			<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
					<h5 class="text-white op-7 mb-2">Total Hotspot Users Active <?= $hotspotactive ?></h5>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner mt--5">
	<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<!-- <h4 class="card-title">Add Row</h4> -->
								<!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
									<i class="fa fa-plus"></i>
									Users Active
								</button> -->
							</div>
						</div>
						<div class="card-body">
							<!-- Modal -->
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover" >
									<thead>
										<tr>
											<th>No</th>
											<th>User</th>
											<th>Server</th>
											<th>Login By</th>
											<th>Uptime</th>
											<th>Bytes In</th>
											<th>Bytes Out</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>User</th>
											<th>Server</th>
											<th>Login By</th>
											<th>Uptime</th>
											<th>Bytes In</th>
											<th>Bytes Out</th>
										</tr>
									</tfoot>
									<tbody>
									<?php foreach($hotspotactive as $no => $data) { ?>
										<tr>
											<?php $id = str_replace('*', '', $data['.id']) ?>
											<td><?= $no+1; ?></td>
											<td><?= $data['user']; ?></td>	
											<td><?= $data['server']; ?></td>
											<td><?= $data['login-by']; ?></td>
											<td><?= $data['uptime']; ?></td>
											<td><?= formatBytes($data['bytes-in'],); ?></td>
											<td><?= formatBytes($data['bytes-out'],); ?></td>
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

