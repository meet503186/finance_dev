<?php
$agendata=$this->db->get_where("tasks",array("taskCode"=>$agendaid))->result_array();

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
								<li class="active">Add Agenda Task</li>
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
					if(count($agendata)>0)
					{
						$agendaRow=$agendata[0];
						?>
						<div class="col-lg-12">
							<div class="card alert">
								<div class="card-header">
									<h4>Add Agenda Task</h4>
									<div class="card-header-right-icon">
										<ul>
											<li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
											<li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="basic-elements">
										<form  id="userform" method="post">
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<label>Meeting</label>
														<select name="meeting" class="form-control">
															
															<?php

						$department=$this->commonmodel->getMeetingList();
						foreach ($department as $row) {
						?>
															<option  value="<?=$row["meetingId"] ?>" <?php
																if ($agendaRow["taskMeetingId"]==$row["meetingId"]) {
																	echo "selected";}
															 ?>  ><?=$row["meetingCode"] ?>&nbsp;<?=$row["meetingTitle"] ?></option>
															<?php
					}
						?>



														</select>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input type="date" id="taskDate" name="taskDate" class="form-control" value="" data-format="DDMMYYYY" data-pattern="__/__/____">
													</div>
													<div class="form-group">
														<label>Meeting Title</label>
														<input id="meetingTitle" class="form-control" type="" placeholder="title" name="meetingTitle">
													</div>
													<div class="form-group">
														<label>Agenda Title</label>
														<input id="agendaTitle" class="form-control" type="" placeholder="title" name="agendaTitle">
													</div>
													<div class="form-group">
														<label>Agenda Detail ( 500 chars)</label>
														<input class="form-control" type="text" id="agendaDetail" value="" name="agendaDetail">
													</div>

													<div class="form-group">
														<label>Department</label>
														<select name="department" id="department" class="form-control">
															<?php

						$department=$this->db->query("select * from department where departmentId<>1")->result_array();
						foreach ($department as $row) {
						?>
															<option value="<?=$row["departmentId"] ?>"><?=$row["departmentName"] ?></option>
															<?php
					}
						?>



														</select>
													</div>



												</div>

											</div>
											<input  id="saveuser" class="btn-dark" type="submit" value="Save Agenda"/>
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
		$( "#saveuser" ).click(function() {


			$("form#userform").validate({
				rules: {
					meeting: {
						required: true,
					},
					taskDate: {
						required: true,
					},
					agendaTitle: {
						required: true,
					},
					agendaDetail: {
						required: true,
					},
					department: {
						required: true,
					},
				},
				messages: {
					meeting: {
						required: "Select meeting",
					},
					taskDate: {
						required: "Agenda Date required",
					},
					agendaTitle: {
						required: "Agenda title required",
					},
					agendaDetail: {
						required: "Agenda Detail title required",
					},
					department: {
						required: "Select Department",
					},

				},
				submitHandler: function(form) {
					var a=$('#userform').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/saveAgenda',
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
								toastr.success("task saved successfully",'Success',{
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
				}
			});





		});
	});
	function redirect()
	{
		window.location.href="<?=base_url() ?>Admin/agendaTask";
	}
</script>
