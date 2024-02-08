<?php
$poData=$this->db->query("select * from tb_bills  where billId='".$billId."'")->result_array();
$data=$poData[0];
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
								<li class="active">Edit Bill</li>
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
								<h4>Edit Bill</h4>
								<div class="card-header-right-icon">
									
								</div>
							</div>
							<div class="card-body">
								<div class="basic-elements">
									<form action="<?=base_url() ?>" id="vendorForm" method="post">
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Payment Order Method</label>
													<select name="title" id="title" class="form-control"  onchange="changetitle(this.value)" >
														<option></option>
														<option value="P.O. For Cheque"
														<?php 
														if ($data["billPaymentMethod"]=="P.O. For Cheque") {
															echo "selected";}
														?>
														>For Cheque</option>
														<option value="P.O. For Net Banking"
															<?php
															if ($data["billPaymentMethod"]=="P.O. For Net Banking") {
																echo "selected";}
															?>
														>For Net Banking</option>

													</select>
												</div>
												<?php
												if ($data["billNameAt"]!="Corporate"||$data["billNameAt"]!="Retail")
												{
													
												}
												?>
												<div class="form-group" id="nameoncheque" style='display: <?php
													if ($data["billPaymentMethod"]!="P.O. For Net Banking")
												{
												echo "none";
												}
												?>'>
													<label id="nameLabel">Name on Cheque</label>
													<input type="text" id="name" name="name" class="form-control" value="<?=$data["billNameAt"] ?>">
												</div>
												<div class="form-group" id="corporate" style='display: <?php
													if ($data["billPaymentMethod"]=="P.O. For Net Banking")
												{
												echo "none";
												}
												?>'>
													<label>Corporate/Retail</label>
													<select name="name2" id="name2" class="form-control" required="" onchange="changetitle(this.value)" >
														<option></option>
														<option value="Corporate" 
														<?php
														if ($data["billNameAt"]=="Corporate")
														{
															echo "selected";
														}
														 ?>
														>Corporate</option>
														<option value="Retail"
															<?php
															if ($data["billNameAt"]=="Retail") {
																echo "selected";
															}
															?>
														>Retail</option>

													</select>
												</div>

												<div class="form-group">
													<label>Select Vendor</label>
													<select name="vendorId" id="vendorId" class="form-control" required="" onchange="getbeneficiaryDetail(this.value)">
														
														<?php

														$vendors=$this->db->query("select * from tb_vendors order by vendorName ASC")->result_array();
														foreach ($vendors as $row) {
														?>
														<option  value="<?=$row["vendorId"] ?>"
														<?php
														if($data["billVendorId"]==$row["vendorId"])
														{
															echo "selected";
														}
														 ?>
														><?=$row["vendorName"] ?></option>
														<?php
													}
														?>



													</select>

												</div>
												<div id="beneficiarydetail">

												</div>
												<div class="form-group">
													<label>Account No.</label>
													<input type="hidden" id="accountNo" name="accountNo" class="form-control" value="<?=$data[""]?>" disabled="">
												</div>

												<div class="form-group">
													<label>IFSC Code</label>
													<input type="hidden" id="vendorIFSCCode" name="vendorIFSCCode" class="form-control" value="<?=$data[""] ?>" disabled="">
												</div>
												<div class="form-group">
													<label>Bank</label>
													<input type="hidden" id="vendorBank" name="vendorBank" class="form-control" value="<?=$data[""] ?>" disabled>
												</div>
												<div class="form-group" >
													<label id="nameLabel">Bill No.</label>
													<input type="text" id="billno" name="billno" class="form-control" value="<?=$data["billNo"] ?>">
												</div>
												<div class="form-group">
													<label>Select Bill</label>
													<select name="billtype" id="billtype" class="form-control" required="">
														<option value="GST"
															<?php
															if ($data["billType"]=="GST") {
																echo "selected";} ?>
														>GST</option>
														<option value="ASI"
															<?php
															if ($data["billType"]=="ASI") {
																echo "selected";} ?>
														>ASI</option>
														<option value="Electricity"
															<?php
															if ($data["billType"]=="Electricity") {
																echo "selected";} ?>
														>Electricity</option>
														<option value="IncomTax"
															<?php
															if ($data["billType"]=="IncomTax") {
																echo "selected";} ?>
														>IncomTax</option>
														<option value="Mobile"
															<?php
															if ($data["billType"]=="Mobile") {
																echo "selected";} ?>
														>Mobile</option>
														<option value="Landline"
															<?php
															if ($data["billType"]=="Landline") {
																echo "selected";} ?>
														>Landline</option>
														<option value="Other"
															<?php
															if ($data["billType"]=="Other") {
																echo "selected";} ?>
														>Other</option>
													</select>

												</div>
												<div class="form-group" >
													<label id="nameLabel">Bill Last Date</label>
													<input type="text"  id="lastdate" name="lastdate" class="form-control"  value="<?=date("d-m-Y",strtotime($data["billLastDate"])) ?>">
												</div>
												<div class="form-group">
													<label>Type Of Payment</label>
													<select name="typeofpayment" id="typeofpayment" class="form-control" required="">
														<option value="Total Payment" <?php
															if ($data["billPaymentType"]=="Total Payment")
															{
																echo "selected";
															}
															?>>Total Payment</option>
															<option value="Partial Payment" <?php
																if ($data["billPaymentType"]=="Partial Payment") {
																echo "selected";
															}
															?>>Partial Payment</option>
															<option value="Advance Payment" <?php
																if ($data["billPaymentType"]=="Advance Payment") {
																echo "selected";
															}
															?>>Advance Payment</option>
													</select>
												</div>

												<div class="form-group">
													<label>Bill Amount</label>
													<input type="hidden" id="amount" name="amount" class="form-control" value="<?=$data["billAmount"] ?>" >
												</div>
												<div class="form-group">
													<label>Amount to be Paid</label>
													<input type="number" id="paidAmount" name="paidAmount" class="form-control" value="<?=$data["billPaidAmount"] ?>" >
												</div>
												<div class="form-group">
													<label>Purpose Of Payment</label>
													<input type="text" id="purpose" name="purpose" class="form-control" value="<?=$data["billPurpose"] ?>">
												</div>

												<div class="form-group">
													<label>Reference</label>
													<input type="text" id="reference" name="reference" class="form-control" value="<?=$data["billReference"] ?>">
												</div>
												<div class="form-group">
													<label>Purchased By</label>
													<input type="text" id="purchase" name="purchase" class="form-control" value="<?=$data["billPurchaser"] ?>">
												</div>
												<div class="form-group">
													<label>Remarks</label>
													<input type="text" id="remarks" name="remarks" class="form-control" value="<?=$data["billRemarks"] ?>">
												</div>

											</div>

										</div>
										<input  id="saveVendor" type="submit" class="btn btn-dark" value="Update Bill"/>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$("#lastdate").datepicker({ dateFormat: 'dd-mm-yy' }).val();
		$( "#saveVendor" ).click(function() {


			$("form#vendorForm").validate({
				rules: {
					name: {
						required: true,
					},
					vendorAccountNo: {
						required: true,
					},

				},
				messages: {
					name: {
						required: "Vendor Name required",
					},
					vendorAccountNo: {
						required: "vendorAccountNo required",
					},

				},
				submitHandler: function(form) {
					var a=$('#vendorForm').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/updateBill/<?=$billId?>',
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
								toastr.success("Bill updated successfully",'Success',{
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
				}
			});


		});
	});
	function redirect()
	{
		window.location.href="<?=base_url()?>Admin/billView"
	}
	function load_block(stateid)
	{
		$.ajax(
		{
			url: '<?php echo base_url();?>admin/get_block_list/' + stateid ,
			success: function(response) {
				jQuery('#blockid').html(response);
			}
		});
	}
	function changetitle(title)
	{
		if (title=="P.O. For Cheque") {
			var nameoncheque = document.getElementById("nameoncheque");
			nameoncheque.style.display = "none";
			var corporate = document.getElementById("corporate");
			corporate.style.display = "block";

		}
		if (title=="P.O. For Net Banking") {

			var nameoncheque = document.getElementById("nameoncheque");
			nameoncheque.style.display = "block";
			var corporate = document.getElementById("corporate");
			corporate.style.display = "none";

		}
	}
	function getbeneficiaryDetail(id)
	{
		$.ajax(
		{
			url: '<?php echo base_url();?>admin/getbeneficiaryByid/' + id ,
			success: function(response) {
				jQuery('#beneficiarydetail').html(response);
			}
		});
	}
</script>
