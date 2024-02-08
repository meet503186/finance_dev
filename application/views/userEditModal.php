<?php

$data=$this->db->query("select * from users where id='".$param2."'")->result_array();

$userdata=$data[0];

?>
<div class="row">
	<div class="col-lg-6">
		<div class="card alert">
			<div class="card-header">
				<h4>User Form</h4>

			</div>
			<div class="card-body">
				<div class="basic-elements">
					<form action="#" id="userform" method="post">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Name</label>
									<input type="text" id="name" name="name" class="form-control" value="<?=$userdata["name"] ?>">
								</div>
								<div class="form-group">
									<label>Gender</label>
									<select name="gender" class="form-control" required="true">
										<option value="" >Select Gender</option>
										<option value="male" <?php
											if ($userdata["gender"]=="male") {
												echo "selected";}
										 ?> >Male</option>
										 <option value="female" <?php
										 if ($userdata["gender"]=="female") {
											 echo "selected";}
										 ?> >Female</option>
									</select>
								</div>
								<div class="form-group">
									<label>Email</label>
									<input id="email" value="<?=$userdata["email"] ?>" class="form-control" type="" placeholder="Email" name="email">
								</div>
								

								<div class="form-group">
									<label>Access Level</label>
									<select name="loginaccess" class="form-control">

										<?php
										$accounttype=$this->db->query("select * from tb_roles")->result_array();;
										foreach ($accounttype as  $rols) {
										?>
										<option  value="<?=$rols["roleKey"]; ?>" <?php 
											if ($userdata["loginaccess"]==$rols["roleKey"]) {
												echo "selected";}
										?> ><?=$rols["roleTitle"] ?></option>
										<?php
									}
										?>

									</select>
								</div>
								<div class="form-group">
									<label>Department</label>
									<select name="department" class="form-control">
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
									<input type="text" id="contact1" name="contact1" class="form-control" value="<?=$userdata["contact1"] ?>">
								</div>
								<div class="form-group">
									<label>Is Active</label>
									<select name="isactive" class="form-control" required="true">
										
										<option value="1" <?php
											if ($userdata["isActive"]=="1") {
									echo "selected";}
								?> >Yes</option>
										<option value="0" <?php
										if ($userdata["isActive"]=="0") {
									echo "selected";}
								?> >No</option>
									</select>
								</div>
							</div>
							
							<div class="col-lg-6">
								


							</div>
						</div>
						<input  id="saveuser" type="button" class="btn btn-dark" value="Update User"/>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		$( "#saveuser" ).click(function() {
			var a=$('#userform').serialize();
			$.ajax({
				type:'post',
				url:'<?=base_url()?>admin/updateUser/<?=$param2?>',
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
						toastr.success("user updated successfully",'Success',{
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
						setTimeout(redirect, 500);
					}
				}
			});
		});
	});
	function redirect()
	{
		window.location.href="<?=base_url()?>Admin/userlist"
	}
</script>
