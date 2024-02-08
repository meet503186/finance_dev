<?php
$ismodal="";
if ($param3=="addBillinPo")
{
	$ismodal="yes";
}
?>

<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<?php
			if ($param3!="addBillinPo") {
			?>
			
			<?php
		}
			?>
		<?php
		if ($param3!="addBillinPo")
		{
			?>
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
								<li class="active">Add Bill</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<?php
		}
		?>
			
			<!-- /# row -->
			<div id="main-content">


				<div class="row">
					<div class="col-lg-8">
						<div class="card alert">
							<div class="card-header">
								<?php
								if ($param3=="addBillinPo") 
								{
									echo "<h4>Create New Bill In PO No.".$param2."</h4>";
								
							    }
							    else
							    {
									echo"<h4>Create Bill</h4>";
							    }
								?>
								
								
							</div>
							<div class="card-body">
								<div class="basic-elements">
									<?php
									if ($param3!="addBillinPo") {
										?>
										<button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5 " onclick='showAjaxModal("<?=base_url(); ?>Modal/popup/beneficiaryAddModal")'>

<a href="#" class="text-light">
												<i class="ti-plus"></i>New beneficiary
											</a>
										</button>		
										<?php
									}
									?>
								
									<form action="<?=base_url() ?>" id="vendorForm" method="post">
										<div class="row">
											<div class="col-lg-8">
												<div class="form-group">
													<label>Payment Order Method</label>
													<select name="title" id="title" class="form-control"  onchange="changetitle(this.value)" >
														<option></option>
														<option value="P.O. For Cheque">For Cheque</option>
														<option value="P.O. For Net Banking">For Net Banking</option>

													</select>
												</div>
												<div class="form-group" id="nameoncheque" style="display: none">
													<label id="nameLabel">Name on Cheque</label>
													<input type="text" id="name" name="name" class="form-control" value="">
												</div>
												<div class="form-group" id="corporate" style="display: none">
													<label>Corporate/Retail</label>
													<select name="name2" id="name2" class="form-control" required="" onchange="changetitle(this.value)" >
														<option></option>
														<option value="Corporate">Corporate</option>
														<option value="Retail">Retail</option>

													</select>
												</div>
											
												<div class="form-group">
													<label>Select Beneficiary</label>
													<select name="vendorId" id="vendorId" class="form-control" required="" filter="true" onchange="getbeneficiaryDetail(this.value)">
														<option></option>
														<?php

														$vendors=$this->db->query("select * from tb_vendors  where vendorDepartmentId='".$this->session->userdata('department')."' order by vendorName ASC")->result_array();
														foreach ($vendors as $row) {
														?>
														<option value="<?=$row["vendorId"] ?>"><?=$row["vendorName"] ?></option>
														<?php
													}
														?>



													</select>
													<div id="beneficiarydetail">
														
													</div>
												</div>

												<div class="form-group">
													
													<input type="hidden" id="accountNo" name="accountNo" class="form-control" value="" disabled="">
												</div>
												
												<div class="form-group">
												
													<input type="hidden" id="vendorIFSCCode" name="vendorIFSCCode" class="form-control" value="" disabled="">
												</div>
												<div class="form-group">
													
													<input type="hidden" id="vendorBank" name="vendorBank" class="form-control" value="" disabled>
												</div>
												<div class="form-group" >
													<label id="nameLabel">Bill No.</label>
													<input type="text" id="billno" name="billno" class="form-control" value="">
												</div>	
												<div class="form-group">
													<label>Select Bill</label>
													<select name="billtype" id="billtype" class="form-control" required="">
														<option value="GST">GST</option>
														<option value="ASI">ASI</option>
														<option value="Electricity">Electricity</option>
														<option value="IncomTax">IncomTax</option>
														<option value="Mobile">Mobile</option>
														<option value="Landline">Landline</option>
														<option value="Other">Other</option>
													</select>

												</div>
												<div class="form-group" >
													<label id="nameLabel">Bill Last Date</label>
													<input type="text"  id="lastdate" name="lastdate" class="form-control"  value="">
												</div>
												<div class="form-group">
													<label>Type Of Payment</label>
													<select name="typeofpayment" id="typeofpayment" class="form-control" required="">
														<option value="Full Payment">Full Payment</option>
														<option value="Partial Payment">Partial Payment</option>
														<option value="Advance Payment">Advance Payment</option>
													</select>
													
												</div>
												
												<div class="form-group">
													
													<input type="hidden" id="amount" name="amount" class="form-control" value="" disabled=""  >
												</div>
												<div class="form-group">
													<label>Amount to be Paid</label>
													<input type="number" id="paidAmount" name="paidAmount" class="form-control" value="" >
												</div>
												<div class="form-group">
													<label>Purpose Of Payment</label>
													<input type="text" id="purpose" name="purpose" class="form-control" value="">
												</div>

												<div class="form-group">
													<label>Reference</label>
													<input type="text" id="reference" name="reference" class="form-control" value="">
												</div>
												<div class="form-group">
													<label>Purchased By</label>
													<input type="text" id="purchase" name="purchase" class="form-control" value="">
												</div>

												<div class="form-group">
													<label>Remarks</label>
													<input type="text" id="remarks" name="remarks" class="form-control" value="">
												</div>

											</div>

										</div>
										<input  id="saveVendor" type="submit" class="btn btn-dark" value="Save Bill"/>
									</form>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- /# row -->

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
					title: {
						required: true,
					},
					vendorId: {
						required: true,
					},
					billno: {
						required: true,
					},
					paidAmount: {
						required: true,
					},

				},
				messages: {
					title: {
						required: "Payment Order Method is required",
					},
					vendorId: {
						required: "Beneficiary is required",
					},
					billno: {
						required: "Bill no. is required",
					},
					paidAmount: {
						required: "Payment amount is required",
					},

				},
				submitHandler: function(form) {
					var a=$('#vendorForm').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/saveBill',
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
								toastr.success("Bill saved successfully",'Success',{
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
								setTimeout(redirect, 1000);
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
		if (title=="P.O. For Cheque")
		{
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
