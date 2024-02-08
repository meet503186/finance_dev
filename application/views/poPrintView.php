<?php
$podata=$this->db->query("select * from tb_paymentorder left join department on poFirmId=departmentId where poId='".$poid."'")->result_array();
$billdata=$this->db->query("select * from tb_bills left join tb_vendors on billVendorId=vendorId where billPoId='".$poid."'")->result_array();
$rowdata=$podata[0];
$param2=$poid;
?>

<div class="content-wrap" >
	<div class="main">
		<div class="container-fluid" >
			<div class="row">
				<div class="col-lg-8 p-r-0 title-margin-right">
					<div class="page-header">

					</div>
				</div>
				<!-- /# column -->
				<div class="col-lg-4 p-l-0 title-margin-left">
					<div class="page-header">
						<div class="page-title">
							<ol class="breadcrumb text-right">

							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<?php
			$printcountr=1;

			while (count($billdata)>0) {

			?>
			<div id="main-content" >
				<div id="div_print_area_<?=$printcountr ?>">

					<div class="row">
						<div class="col-lg-12">
							<div class="card alert">
								<div class="card-header text-center">
									<h4 style="font-size: 20px;"><?=$podata[0]["poTitle"] ?></h4>
								</div>
								Unit Name :  <?=$podata[0]["departmentName"] ?>
								<div class="card-body">
									<table style="width: 100%" class="table table-bordered">
										<tr>
											<td style="line-height: 10px;" width="12%" >P.O. Date :</td>
											<td style="line-height: 15px;" width="12%" ><?=date(DATEFORMATE,strtotime($podata[0]["poDate"])) ?></td>
											<td  style="line-height: 10px;" width="12%" >P.O. No.</td>
											<td  style="line-height: 10px;" width="12%" ><?=$podata[0]["poId"] ?></td>
											<td  style="line-height: 10px;" width="12%" >Bank</td>
											<td style="line-height: 10px;"  width="12%" ><?=$podata[0]["poBank"] ?></td>
											<td  style="line-height: 10px;" width="12%" >Balance</td>
											<td  style="line-height: 10px;" width="12%" ><?=$podata[0]["poBank"] ?></td>
										</tr>
									</table>
									<table class="table table-bordered" style="width: 100%">
										<thead >
											<tr>
												<th width="5%"  style="line-height: 13px;font-size: 11px;">Sr.</th>
												<th  style="line-height: 13px;font-size: 11px;">
													<?php
													if ($podata[0]["poTitle"]=="P.O. For Cheque") {
														echo "Name at Cheque";
													}
													if ($podata[0]["poTitle"]=="P.O. For Net Banking") {
														echo "Corporate<br>/Retail";
													}
													?>
												</th>
												<th  style="line-height: 13px;font-size: 11px;">Party Name</th>
												<th  style="line-height: 13px;font-size: 11px;">Account No./<br>IFSC Code/Bank</th>
												<th  style="line-height: 13px;font-size: 11px;">Amount</th>
												<th  style="line-height: 13px;font-size: 11px;">Purpose of payment</th>
												<th  style="line-height: 13px;font-size: 11px;">Referance</th>
												<th  style="line-height: 13px;font-size: 11px;"><?php
												if ($podata[0]["poTitle"]=="P.O. For Cheque") {
													echo "Cheque No.";
												}
												if ($podata[0]["poTitle"]=="P.O. For Net Banking") {
													echo "Paid on";
												}
												?></th>
												<th  style="line-height: 13px;font-size: 11px;">Remarks</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$sr=0;
											$amount=0;
											for ($i=0;$i<10;$i++) {
												$sr++;
												$amount+=$billdata[0]["billPaidAmount"];
											?>
											<tr>
												<td  style="line-height: 13px;"><?=$sr; ?></td>
												<td style="line-height: 13px;"><?=$billdata[0]["billNameAt"]; ?></td>
												<td style="line-height: 13px;">
													<a href="javascript:;" onclick='showAjaxModal_textbox("<?=base_url(); ?>Modal/popup/fileViewModal/<?=$billdata[0]["billId"] ?>")';>

<?=$billdata[0]["vendorName"]; ?></a></td>
												<td style="line-height: 15px;"><?=$billdata[0]["vendorAccountNo"]; ?><br/><?=$billdata[$i]["vendorIFSCCode"]; ?><?=$billdata[$i]["vendorBank"]; ?></td>
												<td style="line-height: 13px;">
													<a href="javascript:;" onclick='showAjaxModal_textbox("<?=base_url(); ?>Modal/popup/fileViewModal/<?=$billdata[0]["billId"] ?>")';>

														<?=$this->Common_model->IndianPaymentFormat($billdata[0]["billPaidAmount"]); ?></a>
												</td>
												<td style="line-height: 13px;"><?=$billdata[0]["billPurpose"]; ?></td>
												<td style="line-height: 13px;"><?=$billdata[0]["billReference"]; ?></td>
												<td style="line-height: 13px;"><?=$billdata[0]["billCheque"]; ?></td>
												<td style="line-height: 13px;"><?=$billdata[0]["billRemarks"]; ?></td>
											</tr>
											<?php
											array_shift($billdata);
										}

											?>
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td><?=$this->Common_model->IndianPaymentFormat($amount) ?></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</tbody>
									</table>
									<table class="table table-borderless" style="border: 0px;">
										<tr>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Prepared by<br/></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOSign($poid,"accountant") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Approval 1<br/></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOSign($poid,"approval1") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Approval 2<br/></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOSign($poid,"approval2") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Final Approval<br/></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOSign($poid,"approval3") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Paid by<br/></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOSign($poid,"payer") ?></td>

										</tr>
										<tr>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Date/Time</td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOpassTime($poid,"accountant") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Date/Time</td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOpassTime($poid,"approval1") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Date/Time</td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOpassTime($poid,"approval2") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Date/Time</td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOpassTime($poid,"approval3") ?></td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;">Date/Time</td>
											<td style="border: 0px;line-height: 13px;font-size: 11px;"><?=$this->commonmodel->getPOpassTime($poid,"payer") ?></td>

										</tr>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
				<div>
					<button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" onclick="printDivArea('div_print_area_<?=$printcountr ?>');">
						<i class="ti-printer"></i>Print</button>
				</div>
				<!-- /# row -->




			</div>

			<?php
			$printcountr ++;

		}

			?>
			<div class="row">
				<div class="col-lg-4 p-r-0 ">
					<div class="page-header">

						<?php
						if ($rowdata["poCurrentStatus"]==$this->session->userdata("role")||($rowdata["poCurrentStatus"]=="payer"&&$this->session->userdata("role")=="approval1")) {
						?>

						<form action="<?=base_url() ?>" id="poForm" method="post" class="form-group" >


							<div class="form-group">

								<label>Send To</label>

								<select name="status" id="status" class="form-control" required="" >
									<?php
									if ($rowdata["poCurrentStatus"]=="accountant"&&$this->session->userdata("role")=="accountant") {
										$check=$this->db->query("select * from users where id='".$this->session->userdata("uid")."'")->result_array();
										if ($check[0]["isCentralStore"]=="1") {
									?>
									<option value="centralStore" <?php
									if ($rowdata["poCurrentStatus"]=="centralStore") {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("centralStore") ?>
									</option>
									<?php
								} else {
									?>
									<option value="approval1" <?php
									if ($rowdata["poCurrentStatus"]=="approval1") {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("approval1") ?>
									</option>
									<?php
								}

							}
							if ($rowdata["poCurrentStatus"]=="centralStore"&&$this->session->userdata("role")=="centralStore") {
									?>
									
									<option value="approval1" <?php
									if ($rowdata["poCurrentStatus"]==3) {
										echo "selected";
									}
									?> ><?=$this->Common_model->getPOStatusTitle("approval1") ?></option>
									<option value="accountant" <?php
									if ($rowdata["poCurrentStatus"]==1) {
										echo "selected";
									}
									?> >

										<?=$this->Common_model->getPOStatusTitle("accountant") ?>
									</option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="approval1"&&$this->session->userdata("role")=="approval1") {
									?>
									
									<option value="approval2" <?php
									if ($rowdata["poCurrentStatus"]==3) {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("approval2") ?>
									</option>
									<option value="accountant" <?php
									if ($rowdata["poCurrentStatus"]==1) {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("accountant") ?>

									</option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="approval2"&&$this->session->userdata("role")=="approval2") {
									?>
									
									<option value="approval3" <?php
									if ($rowdata["poCurrentStatus"]==4) {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("approval3") ?>
									</option>
									<option value="approval1" <?php
									if ($rowdata["poCurrentStatus"]==2) {
										echo "selected";
									}
									?> ><?=$this->Common_model->getPOStatusTitle("approval1") ?></option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="approval3"&&$this->session->userdata("role")=="approval3") {
									?>
									
									<option value="payer" <?php
									if ($rowdata["poCurrentStatus"]=="payer") {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("payer") ?>

									</option>
									<option value="approval2" <?php
									if ($rowdata["poCurrentStatus"]=="approval2") {
										echo "selected";
									}
									?> >

										<?=$this->Common_model->getPOStatusTitle("approval2") ?>
									</option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="payer"&&$this->session->userdata("role")=="approval1") {
									?>
									
									<option value="done" <?php
									if ($rowdata["poCurrentStatus"]=="done") {
										echo "selected";
									}
									?> >Done</option>
									<option value="approval3" <?php
									if ($rowdata["poCurrentStatus"]=="approval3") {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("approval3") ?>


									</option>
									<?php
								}
									?>


								</select>
							</div>
							<div class="form-group" >
								<label>Remarks</label>
								<input type="text" id="remarks" name="remarks" value="" class="form-control"  /> </div>
							<div class="form-group">
								<input  id="updatePO" type="submit"  class="btn btn-dark form-control" value="Update PO"/>
							</div>

						</form>
						<?php
					}
						?>
					</div>
				</div>
				<div class="col-lg-8 p-r-0 ">
					<div class="page-header">

						<span><h4>Remarks</h4></span>
						<table class="table table-bordered" id="table1" >
							<tr>
								<td>Given By</td>
								<td>Remarks</td>
								<td>Time</td>

							</tr>
							<?php
							$remark=$this->db->query("select * from tb_remarks left join users on remarksBy=id where remarksPOId='".$poid."' order by remarksId desc")->result_array();

							foreach ($remark as $remRow) {
							?>
							<tr>
								<td><?=$remRow["name"] ?></td>
								<td><?=$remRow["remarksContent"] ?></td>
								<td><?=date(CUSTOME_DATETIME,strtotime($remRow["remarksCreatedAt"])) ?></td>

							</tr>
							<?php
						}
							?>

						</table>

					</div>
				</div>

			</div>

		</div>
	</div>

</div>

<script >
	function printDivArea(printId)
	{
		var divToPrint = document.getElementById(printId);
		var divToPrintHTML = '<link href="<?=base_url()?>assets/css/lib/bootstrap.min.css" rel="stylesheet">'+'<style type="text/css" media="print">@page { size: landscape;}</style>'+divToPrint.outerHTML;


		newWin = window.open();
		newWin.document.write(divToPrintHTML);

		newWin.print();
		newWin.close();
	}
</script>
<script type="text/javascript">
	$(document).ready(function () {
		$( "#updatePO" ).click(function() {


			$("form#poForm").validate({
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
						required: "vendor AccountNo required",
					},

				},
				submitHandler: function(form) {
					var a=$('#poForm').serialize();
					$.ajax({
						type:'post',
						url:'<?=base_url()?>admin/updatePO/<?=$param2?>',
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
								toastr.success("PO saved successfully",'Success',{
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
		window.location.href="<?=base_url()?>Admin/poListView"
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
</script>
<script>
	function updateaccess(id)
	{
		let a={billid:id,billvalue:document.getElementById('access_'+id).checked};

		$.ajax({
			type:'post',
			url:'<?=base_url()?>admin/billPaymentIsDone/',
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
					//	setTimeout(redirect, 2000);
				}
			}
		});
	}
	
	input.addEventListener('keydown', function(event) {
		const key = event.key; // const {key} = event; ES6+
		if (key === "Backspace" ) {
			window.history.back();
			return;
		}
	});
</script>
