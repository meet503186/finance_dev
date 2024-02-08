
<?php 

$meetdata=$this->db->get_where("meeting",array("meetingId"=>$meetingid))->result_array();


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
								<li class="active">Create Meeting</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div id="main-content">

				<div class="row">
				<?php
				if (count($meetdata)>0)
				{
					$row=$meetdata[0];
				?>
				<div class="col-lg-6">
					<div class="card alert">
						<div class="card-header">
							<h4>Edit Meeting Form</h4>
							<div class="card-header-right-icon">
								<ul>
									<li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
									<li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="card-body">
							<div class="basic-elements">
								<form action="<?=base_url() ?>" id="meetingForm" method="post">
									<input type="hidden" name="meetid" id="meetid" value="<?=$row["meetingId"] ?>"/>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label>Meeting Title</label>
												<input type="text" id="title" name="title" class="form-control" value="<?=$row["meetingTitle"] ?>">
											</div>
											<div class="form-group">
												<label>Description</label>
												<input id="description"  class="form-control" type="text" placeholder="Description" name="description" value="<?=$row["meetingDetail"] ?>">
											</div>
											<div class="form-group">
												<label>Meeting Date</label>
												<input type="date" id="meetingDate" name="meetingDate" class="form-control" data-format="DDMMYYYY" data-pattern="__/__/____" value="<?=$row["meetingDate"] ?>">
											</div>
											<div class="form-group">
												<select class="form-control" name="meetstatus">
													<option value="opened">Opened</option>
													<option value="closed">Closed</option>
												</select>
											</div>
											


										</div>

									</div>
									<input  id="saveMeeting" type="submit" class="btn-dark" value="Update Meeting"/>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php
				}
				   
				?>
					

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
		$( "#saveMeeting" ).click(function() {


			$("form#meetingForm").validate({
				rules: {
					title: {
						required: true,
					},
					description: {
						required: true,
					},
					meetingDate: {
						required: true,
					},
				},
				messages: {
					title: {
						required: "Meeting title required",
					},
					description: {
						required: "Meeting description required",
					},
					meetingDate: {
						required: "Meeting Date required",
					},
				},
				submitHandler: function(form) {
					var a=$('#meetingForm').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/updateMeeting',
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
								toastr.success("meeting saved successfully",'Success',{
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
		window.location.href="<?=base_url()?>Admin/meetingListView"
	}
</script>
