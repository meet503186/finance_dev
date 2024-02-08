 <?php 
 $userdata=$this->commonmodel->getLoggedInUser();
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
								<li class="active">Student Details</li>
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
								<h4>Student Details</h4>
								
							</div>
							<div class="card-body">
								<div class="user-profile m-t-15">
									<div class="row">
										<div class="col-lg-4">
											<div class="user-photo m-b-30">
												
												<?php
												if (file_exists("uploadedFiles/profilePictures/".$this->session->userdata("uid").".jpg")) {
													?>
													<img class="img-responsive" src="<?=base_url()."/uploadedFiles/profilePictures/".$this->session->userdata("uid").".jpg?".$userdata["profilePicAt"] ; ?>" alt="" />
													<?php
												}
												else
												{
													?>
													<img class="img-responsive" src="<?=base_url()?>assets/images/user-profile.jpg" alt="" />
													<?php
												}
												?>
											</div>
											<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="showcropImage()">
												Change Profile Picture
											</button>
											
											<!-- sign -->
											
											
											<div class="user-photo m-b-30" style="margin-top: 20px;">

												<?php
												if (file_exists("uploadedFiles/sign/".$this->session->userdata("uid").".jpg")) {
											?>
											<img class="img-responsive" src="<?=base_url()."uploadedFiles/sign/".$this->session->userdata("uid").".jpg?".$userdata["profilePicAt"] ; ?>" alt="" />
												<?php
										} else {
											?>
												<img class="img-responsive" src="<?=base_url() ?>assets/images/sign.jpg" alt="" />
												<?php
										}
											?>
											</div>
											<form id="signform" enctype="multipart/form-data" method="post" action="<?=base_url() ?>Admin/UploadSign" >
												<input type="file" id="signfile" name="signfile" />
											</form>
											
										</div>
										<div class="col-lg-8">
											<div class="user-profile-name dib"><?=$userdata["name"] ?> Details</div>
											
											<div class="custom-tab user-profile-tab">
												<ul class="nav nav-tabs" role="tablist">
													<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About</a></li>
												</ul>
												<div class="tab-content">
													<div role="tabpanel" class="tab-pane active" id="1">
														<div class="contact-information">
															<div class="phone-content">
																<span class="contact-title">Name:</span>
																<span class="phone-number"><?=$userdata["name"] ?></span>
															</div>
															<div class="website-content">
																<span class="contact-title">Role:</span>
																<span class="contact-website"><?=$userdata["loginaccess"] ?></span>
															</div>
															
															<div class="gender-content">
																<span class="contact-title">Gender:</span>
																<span class="gender"><?=$userdata["gender"] ?></span>
															</div>
															
															<div class="birthday-content">
																<span class="contact-title">Account Created At:</span>
																<span class="birth-date"><?=$userdata["created_at"] ?> </span>
															</div>
															
															
															<div class="email-content">
																<span class="contact-title">Email:</span>
																<span class="contact-email"><?=$userdata["email"] ?></span>
															</div>
															<div class="email-content">
																<span class="contact-title">Mobile:</span>
																<span class="contact-email"><?=$userdata["contact1"] ?> </span>
															</div>
															
														</div>
													</div>
												</div>
											</div>
										</div>
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
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modal_ajax" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="panel panel-default">
					<div class="panel-heading">Upload Profile Picture</div>
					<div class="panel-body">

						<div class="row">
							<div class="col-md-4 text-center">
								<div id="upload-demo" style="width:350px"></div>
							</div>
							<div class="col-md-4" style="padding-top:30px;">
								<strong>Select Image:</strong>
								<br/>
								<input type="file" id="upload">
								<br/>
								<button class="btn btn-success upload-result">Upload Image</button>
							</div>
							<div class="col-md-4" style="">
								<div id="upload-demo-i" style="background:#e1e1e1;width:300px;height:300px;"></div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="closemodal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function showcropImage()
{
	jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
}
	$('#closemodal').click(function() {
		$('#modal_ajax').modal('hide');
		window.location.reload();
	});
	
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"> </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"> </script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<script type="text/javascript">
	$uploadCrop = $('#upload-demo').croppie({
		enableExif: true,
		viewport: {
			width: 300,
			height: 300,
			type: 'squre'
		},
		boundary: {
			width: 300,
			height: 300
		}
	});

	$('#upload').on('change', function () {
		var reader = new FileReader();
		reader.onload = function (e) {
			$uploadCrop.croppie('bind', {
				url: e.target.result
			}).then(function() {
				console.log('jQuery bind complete');
			});

		}
		reader.readAsDataURL(this.files[0]);
	});

	$('.upload-result').on('click', function (ev) {
		$uploadCrop.croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) {

			$.ajax({
				url: "<?=base_url()?>Admin/uploadProfilePic",
				type: "POST",
				data: {"image":resp},
				success: function (data) {
					html = '<img src="' + resp + '" />';
					$("#upload-demo-i").html(html);
				}
			});
		});
	});
	document.getElementById("signfile").onchange = function() {
		document.getElementById("signform").submit();
	};
</script>
