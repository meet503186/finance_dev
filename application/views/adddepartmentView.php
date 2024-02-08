 <div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 p-r-0 title-margin-right">
					<div class="page-header">
						<div class="page-title">
							<h1>Dashboard</h1>
						</div>
					</div>
				</div>
				<!-- /# column -->
				<div class="col-lg-4 p-l-0 title-margin-left">
					<div class="page-header">
						<div class="page-title">
							<ol class="breadcrumb text-right">
								<li><a href="#">Dashboard</a></li>
								<li class="active">Form-Basic</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div id="main-content">


				<div class="row">
					<div class="col-lg-12">
						<div class="card alert">
							<div class="card-header">
								<h4>Add Department</h4>
								<div class="card-header-right-icon">
									<ul>
										<li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
										<li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="basic-elements">
									<form action="<?=base_url() ?>" id="departmentform" method="post">
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Name</label>
													<input type="text" id="departmentName" name="departmentName" class="form-control" value="">
												</div>
											

											</div>
										
										</div>
										<input  id="saveuser" type="submit" value="Save Department"/>
									</form>
								</div>
							</div>
						</div>
					</div>

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
<script type="text/javascript">
	$(document).ready(function () {
		$( "#saveuser" ).click(function() {
			var a=$('#departmentform').serialize();
			$.ajax({
				type:'post',
				url:'<?=base_url()?>admin/saveDepartment',
				data:a,
				dataType: "JSON",
				beforeSend:function() {
					//	launchpreloader();
				},
				complete:function(resdata) {



				},
				success:function(resdata) {
					if (resdata.success==0) {
						toastr.error(resdata.message,'Warning',{
							timeOut: 5000,
							"closeButton": true,
							"debug": false,
							"newestOnTop": true,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"preventDuplicates": true,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut",
							"tapToDismiss": false

						})
					}
					if (resdata.success==1) {
						toastr.success("Department saved successfully",'Success',{
							timeOut: 5000,
							"closeButton": true,
							"debug": false,
							"newestOnTop": true,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"preventDuplicates": true,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut",
							"tapToDismiss": false

						})
					}
				}
			});
		});
	});
</script>
