<?php

$userdata=$this->db->get_where("users",array("id"=>$userid))->result_array();

?>
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
								<li class="active">User-Profile</li>
							
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
							<div class="card-body">
								<div class="user-profile">
								<?php
								if(count($userdata)>0)
								{
									$user=$userdata[0];
									?>
									<div class="row">
										<div class="col-lg-4">
											<div class="user-photo m-b-30">

												<?php
												if (file_exists("uploadedFiles/profilePictures/".$userid.".jpg")) {
												?>
												<img class="img-responsive" src="<?=base_url()."/uploadedFiles/profilePictures/".$userid.".jpg?".$userdata["profilePicAt"] ; ?>" alt="" />
												<?php
											} else {
												?>
												<img class="img-responsive" src="<?=base_url() ?>assets/images/user-profile.jpg" alt="" />
												<?php
											}
												?>
											</div>
											
											
										</div>
										<div class="col-lg-8">
											<div class="user-profile-name"><?=$user["name"]?></div>
											
											<div class="user-job-title"><?=$user["loginaccess"] ?></div>
										
											<div class="user-send-message">
												<!--<button class="btn btn-primary btn-addon" type="button">
													<i class="ti-email"></i>Send Message</button>--></div>
											<div class="custom-tab user-profile-tab">
												<ul class="nav nav-tabs" role="tablist">
													<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>
												</ul>
												<div class="tab-content">
													<div role="tabpanel" class="tab-pane active" id="1">
														<div class="contact-information">
															<h4>Contact information</h4>
															
															<div class="phone-content">
																<span class="contact-title">Email:</span>
																<span class="phone-number"><?=$user["email"] ?></span>
															</div>
															<div class="phone-content">
																<span class="contact-title">Phone:</span>
																<span class="phone-number"><?=$user["contact1"] ?></span>
															</div>
															<div class="address-content">
																<span class="contact-title">User since:</span>
																<span class="mail-address"><?=$user["created_at"] ?></span>
															</div>
														
														</div>
														<div class="basic-information">
															<h4>Basic information</h4>
															
															<div class="gender-content">
																<span class="contact-title">Gender:</span>
																<span class="gender"><?=$user["gender"]?></span>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>	
									<?php
								}
								?>
								
								</div>
							</div>
						</div>
					</div>
					<!-- /# column -->
					<div class="col-lg-6">
						
						<div class="row">
							<div class="col-lg-12">
								<div class="card alert">
									<div class="card-header">
										<h4>Firm Access</h4>
										
									</div>
									<?php
									if(count($userdata)>0)
									{
										$user=$userdata[0];
										?>
										<div class="todo-list">
											<div class="tdl-holder">
												<div class="tdl-content">
													<ul>
													<?php
													$permission=$this->db->query("SELECT * FROM `department` left join tb_departmentaccess on accessDepartmentId=departmentId and accessUserId='".$user["id"]."'")->result_array();
													foreach($permission as $row)
													{
														?>
														<li><label><input type="checkbox" <?php
															if ($row["accessIsPermitted"]==1)
														{
															echo "checked";
														}
														?> onchange="updateaccess(<?=$row["departmentId"] ?>);" id="access_<?=$row["departmentId"] ?>" >
														<i></i><span><?=$row["departmentName"] ?></span>
														<a href="#" class="ti-close"></a></label></li>
														<?php
													}
													?>
													
														
													</ul>
												</div>
												
											</div>
										</div>
										<?php
									}
									?>
									
								</div>
								<!-- /# card -->
							</div>
						</div>
					</div>
					<!-- /# column -->
				</div>
				<!-- /# row -->
			
				<div class="row">
					<div class="col-lg-12">
						<div class="footer">
							<p>This dashboard was generated on <span id="date-time">Thu Nov 09 2023 11:09:12 GMT+0530 (India Standard Time)</span>
								<a href="#" class="page-refresh">Refresh Dashboard</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function updateaccess(id)
	{
		let a={userid:'<?=$userid?>',permissionId:id,permissionVal:document.getElementById('access_'+id).checked};
		
		$.ajax({
			type:'post',
			url:'<?=base_url()?>admin/updateUserPermission/',
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
					toastr.success("Permission updated successfully",'Success',{
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
</script>