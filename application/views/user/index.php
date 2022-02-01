
<div class="main-panel">		
	<div class="content">
		<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold"><?= $title; ?></h2>
					<h5 class="text-white op-7 mb-2">Total user Mirktoik Active : <?= $totaluseractive ?></h5>
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
						<div class="table-responsive">
							<!-- Content -->
								<div id="useractive"></div>
							<!-- Content -->
						</div>
					</div>
			</div>
			</div>
			</div>
		</div>
	</div>
</div>



<script>
	setInterval('useractive();',1000);
	function useractive() {
		$('#useractive').load('<?=base_url('user/useractive') ?>')
	}
</script>
