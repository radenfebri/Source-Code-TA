
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
											<th>Comment</th>
											<th style="width: 10%">Action</th>
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
											<th>Comment</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
									<?php foreach($hotspotactive as $no => $data) { ?>
										<tr>
											<?php $id = str_replace('*', '', $data['.id']) ?>
											<td><?= $no+1; ?></td>
											<td><?= $data['name']; ?></td>	
											<td><?= $data['server']; ?></td>
											<td><?= $data['login-by']; ?></td>
											<td><?= $data['uptime']; ?></td>
											<td><?= formatBytes($data['bytes-in'],); ?></td>
											<td><?= formatBytes($data['bytes-out'],); ?></td>
											<td><?= $data['comment']; ?></td>
											<td>
												<div class="form-button-action">
													<button type="button" data-toggle="tooltip"
													 class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
														<i class="fa fa-edit"></i>
													</button>
													<a href="<?=base_url('hotspot/delUser/'. $id) ?>" type="button" data-toggle="tooltip"
													 class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Apakah anda yakin menghapus user <?= $data['name'];?> ?')">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</td>
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

