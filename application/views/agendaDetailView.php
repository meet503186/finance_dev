<?php
$data=$this->commonmodel->getAgendaDetail($agendacode);

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
								<li class="active">App-Profile</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div id="main-content">
				<?php
				if (count($data)>0) {
					$row=$data[0];
				?>
				<div class="row">

					<div class="col-lg-7">

						<div class="card alert">


							<div class="card-body">
								<div class="user-profile">
									<div class="row">
										<div class="col-lg-4">
											<div class="user-photo m-b-30">
												<img class="img-responsive" src="<?=base_url() ?>assets/images/user-profile.jpg" alt="" />
											</div>

										</div>
										<div class="col-lg-8">
											<div class="user-profile-name">Mr. Ajay</div>
											<div class="user-Location">
												<i class="ti-location-pin"></i> Dhaka, dewas</div>
											<div class="user-job-title">Product Designer</div>
											<div class="ratings">
												<h4>Ratings</h4>
												<div class="rating-star">
													<span>8.9</span>
													<i class="ti-star color-primary"></i>
													<i class="ti-star color-primary"></i>
													<i class="ti-star color-primary"></i>
													<i class="ti-star color-primary"></i>
													<i class="ti-star"></i>
												</div>
											</div>
											<div class="user-send-message">
											<?php 
											echo $this->commonmodel->getAgendaButton(["edit","delete"],$rowData->taskCode);
											?>
												</div>

										</div>
									</div>
									<div class="row">
										<div class="custom-tab user-profile-tab">
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">About Agenda</a></li>
											</ul>
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="1">

													<div class="contact-information">

														<div class="phone-content">
															<span class="contact-title">Agenda Status</span>
															<span class="badge badge-primary"><?=$this->commonmodel->getColoredStatus($row["taskStatus"]); ?></span>
														</div>
														<div class="address-content">
															<span class="contact-title">Created:</span>
															<span class="mail-address"><?=$row["taskCreatedDate"] ?></span>
														</div>
														<div class="address-content">
															<span class="contact-title">Agenda Title:</span>

														</div>
														<div class="address-content">

															<span class="mail-address"><?=$row["agendaTitle"] ?></span>
														</div>
														<div class="address-content">
															<span class="contact-title">Detail:</span>
														</div>
														<div class="address-content">

															<span class="mail-address"><?=$row["agendaDetail"] ?></span>
														</div>
														<div class="skype-content">
															<span class="contact-title">Department:</span>
															<span class="contact-skype"><?=$row["departmentName"] ?></span>
														</div>
													</div>
													<div class="basic-information">
														<h4>Dead Line</h4>
														<div class="birthday-content">
															<span class="contact-title">Start Date:</span>
															<span class="birth-date"><?=date(DATEFORMATE,strtotime($row["taskDate"])) ?></span>
														</div>
														<div class="gender-content">
															<span class="contact-title">End Date:</span>
															<span class="contact-title"><?=date(DATEFORMATE,strtotime($row["taskEndDate"])) ?></span> <span class=" badge badge-pill"  onclick="showDatesModal();">Change End Date</span>
														</div>
													</div>
												</div>
											</div>
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">Meeting Detail</a></li>
											</ul>
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="1">

													<div class="contact-information">


														<div class="address-content">
															<span class="contact-title">Date:</span>
															<span class="mail-address"><?=date(DATEFORMATE,strtotime($row["taskCreatedDate"])) ?></span>
														</div>
														<div class="email-content">
															<span class="contact-title">Meeting Name:</span>
															<span class="contact-title"><?=$row["meetingTitle"] ?></span>
														</div>
														<div class="email-content">
															<span class="contact-title">Meeting Detail:</span>
															<span class="contact-email"><?=$row["meetingDetail"] ?></span>
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
					<div class="col-lg-5">
						<div >
							<div class="col-lg-12">
								<div class="card alert">
									<div class="card-header">
										<h4>Attachments </h4>
										<form enctype="multipart/form-data" id="img_form" method="post">
											<input type="hidden" name="agendaid" value="<?=$row["taskId"] ?>"/>
											<input type="file" class="form-control" name="file_upload" id="file_upload"/>
											<div id="progress-div">
												<div id="progress-bar"></div></div>
										</form>
										<div class="card-header-right-icon">
											<ul>
												<li class="card-close" data-dismiss="alert"></li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th width="40%">Remarks</th>
														<th>By</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$remarksData=$this->db->query("select * from agendaattachment join users on attachementUserId=id where attachementAgendaId='".$row["taskId"]."' order by attachementId  DESC")->result_array();
													
					foreach ($remarksData as $remarks) {
					?>
													<tr>
														<td>
															<a href="<?=base_url() ?><?=$remarks["attachementUrl"] ?>" download="<?=$remarks["attachementName"] ?>" ><?=$remarks["attachementName"] ?></a></td>
														<td><span class="badge badge-primary"><?=$remarks["name"] ?></span></td>
														<td><?=$this->commonmodel->timeAgo($remarks["attachementCreatedAt"]) ?></td>

													</tr>
													<?php
				}

					?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-lg-5">
						<div >
							<div class="col-lg-12">
								<div class="card alert">
									<div class="card-header">
										<h4>Remarks </h4>
										<button type="button" onclick="showremarksModal();" class="badge badge-primary m-b-10 m-l-5">
											<i class="ti-plus"></i>Add New</button>
										<div class="card-header-right-icon">
											<ul>
												<li class="card-close" data-dismiss="alert"></li>
											</ul>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th width="60%">Remarks</th>
														<th>By</th>
														<th>Date</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$remarksData=$this->db->query("select * from agendaremarks join users on remarksUserId=id where remarksAgendaId='".$row["taskId"]."' order by remarksId  DESC")->result_array();
													foreach ($remarksData as $remarks) {
													?>
													<tr>
														<td><?=$remarks["remarksContent"] ?></td>
														<td><span class="badge badge-primary"><?=$remarks["name"] ?></span></td>
														<td><?=$this->commonmodel->timeAgo($remarks["remarksCreatedAt"]) ?></td>

													</tr>
													<?php
												}

													?>


												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						
						</div>

					</div>
					<!-- /# column -->
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div >
							
							<div class="col-lg-6">
								<div class="card alert">
									<div class="card-header">
										<h4>DeadLine Changes</h4>

									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th width="60%">Reason</th>
														<th>By</th>
														<th>Date</th>

													</tr>
												</thead>
												<tbody>
													<?php
					$his=$this->db->query("select * from agenda_deadline join users on deadLineUserId=id  where deadLineAgendaId='".$row["taskId"]."'  order by deadlineId  DESC")->result_array();

					foreach ($his as $rowhis) {
					?>
													<tr>
														<td><?=$rowhis["deadLineReason"] ?></td>
														<td><span class="badge badge-primary"><?=$rowhis["name"] ?></span></td>
														<td><?=$this->commonmodel->timeAgo($rowhis["deadLineCreatedAt"]) ?></td>

													</tr>
													<?php
				}

					?>


												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card alert">
									<div class="card-header">
										<h4>Agenda History </h4>

									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th width="60%">History</th>
														<th>By</th>
														<th>Date</th>

													</tr>
												</thead>
												<tbody>
													<?php
					$his=$this->db->query("select * from agendahistory join users on historyUserId=id  where historyAgendaId='".$row["taskId"]."'  order by aghistoryId  DESC limit 5")->result_array();

					foreach ($his as $rowhis) {
					?>
													<tr>
														<td><?=$rowhis["historyContent"] ?></td>
														<td><span class="badge badge-primary"><?=$rowhis["name"] ?></span></td>
														<td><?=$this->commonmodel->timeAgo($rowhis["historyCreatedAt"]) ?></td>

													</tr>
													<?php
				}

					?>


												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
				<?php
			} else {

			}
				?>

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
<!-- Modal -->
<div class="modal fade" id="modal_ajax" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 29%;">
		<div class="modal-content">
			<form id="remarksForm" method="post">

				<input type="hidden" id="agendaId" name="agendaId" value="<?php
				if (count($data)>0) {
					echo $data[0]["taskId"];
				}
				?>" />
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Remarks</h5>

				</div>
				<div class="modal-body">

					<textarea id="remakrs" name="remarks" class="form-control" rows="5" cols="100"></textarea>


				</div>
				<div class="modal-footer">
					<button type="button" id="closemodal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="saveRemarks"  class="btn btn-primary">Save Remarks</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="meetingDatemodal_ajax" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 29%;">
		<div class="modal-content">
			<form id="agendaDeadLineForm" method="post">

				<input type="hidden" id="agendaId" name="agendaId" value="<?php
				if (count($data)>0) {
					echo $data[0]["taskId"];
				}
				?>" />
				<div class="modal-header">

					<h5 class="modal-title" id="exampleModalLabel">Set DeadLine</h5>

				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Date</label>
						<input type="date" id="taskDate" name="taskDate" class="form-control" value="" data-format="DDMMYYYY" data-pattern="__/__/____">
					</div>
					<label>Write reason for change deadline</label>
					<textarea id="remakrs" name="remarks" class="form-control" rows="5" cols="100"></textarea>


				</div>
				<div class="modal-footer">
					<button type="button" id="closedeadlinemodal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="savedeadLineRemarks"  class="btn btn-primary">Save Remarks</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$( "#saveRemarks").click(function() {
			var a=$('#remarksForm').serialize();
			$.ajax({
				type:'post',
				url:'<?=base_url()?>admin/saveRemarks',
				data:a,
				dataType: "JSON",
				beforeSend:function() {
					//	launchpreloader();
				},
				complete:function(resdata) {
				},
				success:function(resdata) {

					if (resdata.success==1) {
						toastr.success("Remarks saved successfully",'Success',{
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
						setTimeout(redirect, 2000);
					}
				}
			});
		});
		$( "#savedeadLineRemarks").click(function() {
			var a=$('#agendaDeadLineForm').serialize();
			$.ajax({
				type:'post',
				url:'<?=base_url()?>admin/updateDeadLine/<?=$data[0]["taskId"] ?>',
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
						toastr.success("Remarks saved successfully",'Success',{
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
						setTimeout(redirect, 2000);
					}
				}
			});
		});
	});
	function redirect()
	{
		window.location.reload();
	}
</script>
<script type="text/javascript">
	function showremarksModal()
	{
		jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
	}
	$('#closemodal').click(function() {
		$('#meetingDatemodal_ajax').modal('hide');
		window.location.reload();
	});

</script>

<script type="text/javascript">
	function showDatesModal()
	{
		jQuery('#meetingDatemodal_ajax').modal('show', {backdrop: 'true'});
	}
	$('#closedeadlinemodal').click(function() {
		$('#modal_ajax').modal('hide');
		window.location.reload();
	});
</script>
<script>
	$(document).ready(function() {
		// File upload via Ajax
		$('input[type=file]').change(function(e) {
			e.preventDefault();
			$.ajax({
				xhr: function() {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt) {
						if (evt.lengthComputable) {
							var percentComplete = ((evt.loaded / evt.total) * 100);
							$(".progress-bar").width(percentComplete + '%');
							$(".progress-bar").html(percentComplete+'%');
						}
					}, false);
					return xhr;
				},
				type: 'POST',
				url: '<?=base_url()?>Admin/uploadAttachment',
				data:  new FormData($("#img_form")[0]),
				contentType: false,
				cache: false,
				processData:false,
				beforeSend: function() {
					$(".progress-bar").width('0%');
					$('#img_form').html('<img src="<?=base_url()?>assets/images/loading.gif"/>');
				},
				error:function() {
					$('#img_form').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
				},
				success: function(resp) {
					if (resp == 'ok') {
						$('#img_form')[0].reset();
						toastr.success("Remarks saved successfully",'Success',{
							timeOut: 2000,
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
						setTimeout(redirect, 2000);
					} else if (resp == 'err') {
						$('#img_form')[0].reset();
						toastr.error("File format not supported",'Warning',{
							timeOut: 2000,
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
						setTimeout(redirect, 2000);
					}
				}
			});
		});

		// File type validation
		$("#fileInput").change(function() {
			var allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
			var file = this.files[0];
			var fileType = file.type;
			if (!allowedTypes.includes(fileType)) {
				alert('Please select a valid file (PDF/DOC/DOCX/JPEG/JPG/PNG/GIF).');
				$("#fileInput").val('');
				return false;
			}
		});
	});
</script>