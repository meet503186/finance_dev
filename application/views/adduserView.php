

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
								<li class="active">User Form</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div id="main-content">
				
			
				<div class="row">
					<div class="col-lg-6">
						<div class="card alert">
							<div class="card-header">
								<h4>User Form</h4>
								
							</div>
							<div class="card-body">
								<div class="basic-elements">
									<form action="<?=base_url()?>" id="userform" method="post">
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Central Store (only for accountant)</label>
													<select name="centralStoreAccount" class="form-control">

																<option value="0">No</option>
																<option value="1">Yes</option>

													</select>
												</div>
												<div class="form-group">
													<label>Name</label>
													<input type="text" id="name" name="name" class="form-control" value="" required="true">
												</div>
												<div class="form-group">
													<label>Gender</label>
													<select name="gender" class="form-control" required="true">
														<option ></option>
														<option value="male">Male</option>
														<option value="female">Female</option>
													</select>
												</div>
												<div class="form-group">
													<label>Email</label>
													<input id="email" class="form-control" type="" placeholder="Email" name="email" required="true">
												</div>
												<div class="form-group">
													<label>Password</label>
													<input class="form-control" type="password" value="" name="password" required="true">
												</div>
											
											
												<div class="form-group">
													<label>Access Level</label>
													<select name="loginaccess" class="form-control" required="true">
													 	
													 	<?php 
													 	
													 	
														 $accounttype=$this->commonmodel->getAccountType();
														 foreach ($accounttype as  $accRows)
														 {
														 	?>
															 <option  value="<?=$accRows["roleKey"] ?>" ><?=$accRows["roleTitle"] ?></option>
														 	<?php
														 }
													 	?>
													 													
													</select>
												</div>
												<div class="form-group">
													<label>Department</label>
													<select name="department" class="form-control" required="true">
														<?php

												$department=$this->db->query("select * from department ")->result_array();
												foreach ($department as $row) {
												?>
														<option value="<?=$row["departmentId"] ?>"><?=$row["departmentName"] ?></option>
														<?php
											   }
												?>

													</select>
												</div>
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" id="contact1" name="contact1" class="form-control" value="">
												</div>
											</div>
											
										</div>
										<input  id="saveuser" type="submit" class="btn btn-dark" value="Save User"/>
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
			
			$("form#userform").validate({
				rules: {
					name: {
						required: true,
					},
					gender: {
						required: true,
					},
					email: {
						required: true,
					},
					password: {
						required: true,
					},
					contact1: {
						required: true,
					},

				},
				messages: {
					name: {
						required: "Name required",
					},
					gender: {
						required: "gender required",
					},
					email:{
					required: "email required",
					},
					password:{
						required: "password required",
					},
					contact1:{
						required: "mobile required",
					},

					

				},
				submitHandler: function(form) {
					var a=$('#userform').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/saveUser',
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
								toastr.success("user saved successfully",'Success',{
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

								});
								setTimeout(redirect, 2000);
							}
						}
					});
				}
			});
			
			
			
			
			
			
		});
	});
	function redirect()
	{
		window.location.href="<?=base_url()?>Admin/userlist"
	}
</script>
