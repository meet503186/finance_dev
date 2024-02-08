





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
				
				
				<h2 style="margin-left: 10px;"> <span>PO Status</span></h2>
				
					<?php
					$dist=$this->db->query("select count(poId) as poCount,poCurrentStatus from tb_paymentorder group by poCurrentStatus")->result_array();

					foreach ($dist as $rows) {
					?>
					<div class="col-lg-3">
						<div class="card">
							<div class="stat-widget-eight">
								<div class="stat-header">
									<div class="header-title pull-left"><?=$rows["poCurrentStatus"] ?></div>
									
								</div>
								<div class="clearfix"></div>
								<div class="stat-content">
									<div class="pull-left">
										
										<span class="stat-digit"> Total <?=$rows["poCount"] ?></span>
									</div>
									<div class="pull-right">
										<span class="progress-stats"></span>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="progress">
									<div class="progress-bar progress-bar-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
										<span class="sr-only"></span>
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
						<div class="card alert">
							<div class="card-body">
								<div class="ct-bar-chart"></div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-4">
						<div class="card alert">
							<div class="card-header">
								<h4 class="f-s-14">Todo</h4>
							</div>
							<div class="todo-list">
								<div class="tdl-holder">
									<div class="tdl-content">
										<ul>
											<li>
											<label>
											<input type="checkbox"><i></i><span>Post three to six times on Twitter.</span>
											<a href='#' class="ti-close"></a>
											</label>
											</li>
											<li>
											<label>
											<input type="checkbox" checked><i></i><span>Post one to two times on Facebook.</span>
											<a href='#' class="ti-close"></a>
											</label>
											</li>
											<li>
											<label>
											<input type="checkbox"><i></i><span>Post two to three times to Instagram and LinkedIn. </span>
											<a href='#' class="ti-close"></a>
											</label>
											</li>
											<li>
											<label>
											<input type="checkbox" checked><i></i><span>Follow back those who follow you</span>
											<a href='#' class="ti-close"></a>
											</label>
											</li>
											<li>
											<label>
											<input type="checkbox" checked><i></i><span>Connect with one new person</span>
											<a href='#' class="ti-close"></a>
											</label>
											</li>
										</ul>
									</div>
									<input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
								</div>
							</div>
						</div>
					</div>
					<!-- /# column -->
					<div class="col-lg-4">
						<div class="card alert">
							<div class="card-header">
								<h4 class="f-s-14">Timeline</h4>
							</div>
							<div class="card-body">
								<ul class="timeline">
									<li>
									<div class="timeline-badge primary"><i class="fa fa-smile-o"></i></div>
									<div class="timeline-panel">
									<div class="timeline-heading">
									<h5 class="timeline-title">Youtube, a video-sharing website, goes live.</h5>
									</div>
									<div class="timeline-body">
									<p>10 minutes ago</p>
									</div>
									</div>
									</li>
									<li>
									<div class="timeline-badge warning"><i class="fa fa-sun-o"></i></div>
									<div class="timeline-panel">
									<div class="timeline-heading">
									<h5 class="timeline-title">Mashable, a news website and blog, goes live.</h5>
									</div>
									<div class="timeline-body">
									<p>20 minutes ago</p>
									</div>
									</div>
									</li>
									<li>
									<div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i></div>
									<div class="timeline-panel">
									<div class="timeline-heading">
									<h5 class="timeline-title">Google acquires Youtube.</h5>
									</div>
									<div class="timeline-body">
									<p>30 minutes ago</p>
									</div>
									</div>
									</li>
									<li>
									<div class="timeline-badge success"><i class="fa fa-check-circle-o"></i></div>
									<div class="timeline-panel">
									<div class="timeline-heading">
									<h5 class="timeline-title">StumbleUpon is acquired by eBay. </h5>
									</div>
									<div class="timeline-body">
									<p>15 minutes ago</p>
									</div>
									</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- /# card -->
					</div>
					<div class="col-lg-4">
						<div class="card p-0">
							<div class="profile-widget-one">
								<div class="profile-one-user-photo">
									<div class="profile-one-bg">
										<img class="img-responsive" src="assets/images/profile-bg.jpg" alt="" />
										<div class="bg-overlay"></div>
									</div>
									<div class="user-photo"><img src="assets/images/user-female.png" alt="" /></div>
								</div>
								<div class="profile-one-user-content">
									<ul>
										<li>
										<div class="user-social">
										<h4>Tweets</h4>
										<div class="social-digit">15.5k</div>
										</div>
										</li>
										<li>
										<div class="user-earning">
										<h4>Followers</h4>
										<div class="social-digit">5412</div>
										</div>
										</li>
										<li>
										<div class="user-sold">
										<h4>Following</h4>
										<div class="social-digit">1234</div>
										</div>
										</li>
									</ul>
								</div>
								<div class="clearfix"></div>
								<div class="profile-one-user-button text-center">
									<button class="btn btn-primary btn-outline profile-btn-one">View Profile</button>
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
<script src="<?=base_url() ?>assets/js/lib/chartist/chartist.min.js"> </script>
<script src="<?=base_url() ?>assets/js/lib/chartist/chartist-init.js"> </script>
