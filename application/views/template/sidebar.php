<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item <?= $menu == 'Dashboard' ? 'active' : '' ?>">
							<a href="<?=base_url('dashboard') ?>">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item <?= $menu == 'Ethernet' ? 'active' : '' ?>">
							<a href="<?= base_url('ethernet/index')?>">
								<i class="fas fa-layer-group"></i>
								<p>Interface</p>
							</a>
						</li>
						<li class="nav-item <?= $menu == 'PPPoE' ? 'active' : '' ?>">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-rocket"></i>
								<p>PPPoE</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('pppoe/secret')?>">
											<span class="sub-item">PPPoE Secret</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('pppoe/active')?>">
											<span class="sub-item">PPPoE Active</span>
										</a>
									</li>
								</ul>
							</div>
							
						</li>
						<li class="nav-item <?= $menu == 'Hotspot' ? 'active' : '' ?>">
							<a data-toggle="collapse" href="#base1">
								<i class="fas fa-wifi"></i>
								<p>Hotspot</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base1">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('hotspot/users')?>">
											<span class="sub-item">Hotspot Users</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('hotspot/active')?>">
											<span class="sub-item">Hotspot Users Active</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?= $menu == 'Report' ? 'active' : '' ?>">
							<a data-toggle="collapse" href="#base3">
								<i class="fas fa-paste"></i>
								<p>Report</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base3">
								<ul class="nav nav-collapse">
									<li>
										<a href="<?= base_url('report/up')?>">
											<span class="sub-item">Report Traffic UP</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('report/search')?>">
											<span class="sub-item">Search Report</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item <?= $menu == 'User' ? 'active' : '' ?>">
							<a href="<?=base_url('user') ?>">
								<i class="fas fa-user-alt"></i>
								<p>User Mikrotik Active</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
