
<div class="main-panel">		
			<div class="content">
			<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold"><?php echo $title; ?></h2>
					<h5 class="text-white op-7 mb-2">Router Board Name : <?= $identity; ?></h5>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner mt--5">
		<div class="row">
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-th-list"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">CPU Load</p>
									<h4 class="card-title" id="cpu"></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
			<a href="<?= base_url('pppoe/secret') ?>" style="text-decoration:none" >
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-info bubble-shadow-small">
									<i class="fas fa-home"></i>
								</div>
							</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
											<p class="card-category">Total PPPoE Secret</p>
											<h4 class="card-title"><?= $totalsecret ?></h4>
									</div>
								</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-3">
			<a href="<?= base_url('hotspot/active') ?>" style="text-decoration:none" >
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-success bubble-shadow-small">
									<i class="fas fa-users"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Hotspot Active</p>
									<h4 class="card-title"><?= $hotspotactive; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-secondary bubble-shadow-small">
									<i class="fas fa-clock"></i>

								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Uptime</p>
									<h4 class="card-title" id="uptime"></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-warning bubble-shadow-small">
									<i class="fas fa-info"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Info</p>
									<!-- <h4 class="card-title" id="cpu"></h4> -->
									<!-- <b> Board Name :</b>  -->
									<b> Model :</b> <?= $model ?> / (<?= $boardname ?>)<br>
									<b> OS :</b> <?= $version ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-danger bubble-shadow-small">
									<i class="fas fa-database"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Free Memory/Hdd</p>
									<h4 class="card-title"><?= formatBytes($freememory); ?>/<?= formatBytes($freehdd); ?></h4>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
			<a href="<?= base_url('pppoe/active') ?>" style="text-decoration:none" >
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-muted bubble-shadow-small">
									<i class="fas fa-user-alt"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">PPPoE Active</p>
									<h4 class="card-title"><?= $secretactive; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
			</div>
			<div class="col-sm-6 col-md-3">
			<a href="<?= base_url('hotspot/users') ?>" style="text-decoration:none" >
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-info bubble-shadow-small">
									<i class="fas fa-wifi"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Total User Hotspot</p>
									<h4 class="card-title"><?= $totalhotspot; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
			</div>
		</div>
		<div class="row">
			
			<div class="col-sm-12 col-md-8">
				<div class="card">
					<div class="card-header">
						<div class="card-head-row">
							<div class="card-title">List Traffic Naik</div>
						</div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<div id="load2"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-8 col-md-4">
				<div class="card card-stats">
					<div class="form-group">
						<label for="defaultSelect">Select Interface</label>
						<select class="form-control form-control" name="interface" id="interface">
							<!-- <option value="">Pilih Interface</option> -->
							<?php foreach ($interface as $data ) { ?>
								<option value="<?= $data['name'] ?>"><?= $data['name'] ?></option>
							<?php } ?>
						</select>
					</div>
						<div class="form-group" id="traffic"></div>
				</div>
			</div>
		</div>



	</div>
			</div>
			<!-- <footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
					</div>				
				</div>
			</footer> -->
		</div>


<script>
	setInterval('load();',1000);
	function load() {
		$('#load2').load('<?=base_url('report/load2') ?>')
	}

	setInterval('traffic();',1000);
	function traffic() {
	var interface = $('#interface').val() ;
	// console.log(interface);
		$('#traffic').load('<?=base_url('dashboard/traffic/') ?>' + interface);
	}

	setInterval('cpu();',1000);
	function cpu() {
		$('#cpu').load('<?=base_url('dashboard/cpu') ?>')
	}

	setInterval('uptime();',1000);
	function uptime() {
		$('#uptime').load('<?=base_url('dashboard/uptime') ?>')
	}
</script>
