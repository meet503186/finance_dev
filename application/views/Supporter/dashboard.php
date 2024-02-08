





<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 p-r-0 title-margin-right">
					<div class="page-header">
						<div class="page-title">
							<h1>Hello, <span>Welcome Here</span></h1>
						</div>
					</div>
				</div>
				<!-- /# column -->
				<div class="col-lg-4 p-l-0 title-margin-left">
					<div class="page-header">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Dashboard</a></li>
								<li class="active">Home</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div id="main-content">
				<div class="row">
			
					<div class="col-lg-3">
						<div class="card p-0">
							<div class="stat-widget-three home-widget-three">
								<div class="stat-icon bg-facebook">
									<i class="ti-facebook"></i>
								</div>
								<div class="stat-content">
									<div class="stat-digit">8,268</div>
									<div class="stat-text">Likes</div>
								</div>
							</div>
						</div>
					
					</div>
					<div class="col-lg-3">
						
						<div class="card p-0">
							<div class="stat-widget-three home-widget-three">
								<div class="stat-icon bg-youtube">
									<i class="ti-youtube"></i>
								</div>
								<div class="stat-content">
									<div class="stat-digit">12,545</div>
									<div class="stat-text">Subscribes</div>
								</div>
							</div>
						</div>
					
					</div>
					<div class="col-lg-3">
						
						<div class="card p-0">
							<div class="stat-widget-three home-widget-three">
								<div class="stat-icon bg-twitter">
									<i class="ti-twitter"></i>
								</div>
								<div class="stat-content">
									<div class="stat-digit">7,982</div>
									<div class="stat-text">Tweets</div>
								</div>
							</div>
						</div>
					
					</div>
					<div class="col-lg-3">
						
						<div class="card p-0">
							<div class="stat-widget-three home-widget-three">
								<div class="stat-icon bg-danger">
									<i class="ti-linkedin"></i>
								</div>
								<div class="stat-content">
									<div class="stat-digit">9,658</div>
									<div class="stat-text">Followers</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					$dist=$this->commonmodel->getDistrictList();

					foreach ($dist as $rows) {
					?>
					<div class="col-lg-3">
						<div class="card">
							<div class="stat-widget-eight">
								<div class="stat-header">
									<div class="header-title pull-left"><?=$rows["districtName"] ?></div>
									<div class="card-option drop-menu pull-right">
										<i class="ti-more-alt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
										<ul class="card-option-dropdown dropdown-menu">
											<li><a href="#"><i class="ti-loop"></i> Update data</a></li>
											<li><a href="#"><i class="ti-menu-alt"></i> Detail log</a></li>
											<li><a href="#"><i class="ti-pulse"></i> Statistics</a></li>
											<li><a href="#"><i class="ti-power-off"></i> Clear ist</a></li>
										</ul>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="stat-content">
									<div class="pull-left">
										<i class="ti-arrow-up color-success"></i>
										<span class="stat-digit"> 14,2158.35</span>
									</div>
									<div class="pull-right">
										<span class="progress-stats">70%</span>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="progress">
									<div class="progress-bar progress-bar-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only">70% Complete</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
					?>


				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-12">
								<div class="card alert">
									<div class="card-body">
										<div class="ct-chart"></div>
									</div>
								</div>
							</div>
						
						</div>
					</div>
					<!-- /# column -->
					
				</div>
				
				<!-- /# row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="footer">
							<p>This dashboard was generated on <span id="date-time"></span>
								<a href="#" class="page-refresh">Refresh Dashboard</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

