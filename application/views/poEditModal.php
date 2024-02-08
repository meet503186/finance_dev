<?php

$poData=$this->db->query("select * from tb_paymentorder left join department on poFirmId=departmentId where poId='".$param2."'")->result_array();



$poid=$param2;
foreach ($poData as $rowdata) {
?>

<div class="col-lg-12">
	<div class="card alert">
		<div class="card-header">
			<h4><?=$rowdata["poTitle"] ?></h4>
		</div>
		<div class="card-body">
			<div class="basic-elements">

				<div class="row">
					<div class="col-lg-10" >
						<?php

						$billdata=$this->db->query("select * from tb_bills left join tb_vendors on billVendorId=vendorId where billPoId='".$poid."'")->result_array();

						?>

						
						
						<table width="100%">
							<tr>
								<td width="30%">
								Unit Name :  <?=$rowdata["departmentName"] ?><br>
								Bank : <?=$rowdata["poBank"] ?><br>
								Balance : <?=$rowdata["poBalance"] ?>
								</td>
								
								<td width="30%">
								<!--
									<button onclick=showAjaxModal_textbox("<?=base_url() ?>Modal/popup/billAddView/<?=$poid ?>/addBillinPo");>Add New Bill</button><br><br>
									<button >Add Bill From List</button>
									-->
								</td>
							</tr>
						</table>
<br>
						<table class="table table-bordered" style="overflow: scroll;" >
							<thead >
								<tr>
									<th width="5%"  style="line-height: 15px;">Sr.</th>

									<th  style="line-height: 15px;">
										<?php
										if ($rowdata["poTitle"]=="P.O. For Cheque") {
											echo "Name at Cheque";
										}
										if ($rowdata["poTitle"]=="P.O. For Net Banking") {
											echo "Corporate<br>/Retail";
										}
										?>
									</th>
									<th  style="line-height: 15px;">Party Name</th>
									<th  style="line-height: 15px;">Account No./<br>IFSC Code/Bank</th>
									<th  style="line-height: 15px;">Amount</th>
									<th  style="line-height: 15px;">Purpose of payment</th>
									<th  style="line-height: 15px;">Referance</th>

									<th  style="line-height: 15px;">Remarks</th>
									<th  style="line-height: 15px;"></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sr=0;
								for ($i=0;$i<count($billdata);$i++) {
									$sr++;
								?>
								<tr id="row_<?=$billdata[$i]["billId"] ?>" >
									<td  style="line-height: 15px;"><?=$sr; ?></td>

									<td style="line-height: 15px;"><?=$billdata[$i]["billNameAt"]; ?></td>
									<td style="line-height: 15px;"><?=$billdata[$i]["vendorName"]; ?></td>
									<td style="line-height: 15px;"><?=$billdata[$i]["vendorAccountNo"]; ?><br/><?=$billdata[$i]["vendorIFSCCode"]; ?><?=$billdata[$i]["vendorBank"]; ?></td>
									<td style="line-height: 15px;"><?=$billdata[$i]["billPaidAmount"]; ?></td>
									<td style="line-height: 15px;"><?=$billdata[$i]["billPurpose"]; ?></td>
									<td style="line-height: 15px;"><?=$billdata[$i]["billReference"]; ?></td>

									<td style="line-height: 15px;"><?=$billdata[$i]["billRemarks"]; ?></td>
									<td>
										<?php
										if ($rowdata["poCurrentStatus"]==$this->session->userdata("role")) {
										?>
										<i class="ti-trash btn btn-danger  btn-flat " onclick="deletePop(<?=$billdata[$i]["billId"] ?>);" style="padding: 2px 5px;" ></i>
										<?php
									}
										?>

										<?php
										if (file_exists($billdata[$i]["billImageUrl"])) {
										?>
										<a onclick='showAjaxModal_textbox("<?=base_url(); ?>Modal/popup/fileViewModal/<?=$billdata[$i]["billId"] ?>")';>

											<i class="ti-eye btn-warning  btn-flat "  style="padding:5px 6px" ></i></a>
										<?php
									}
										?>

									</td>
								</tr>

								<?php
							}

								?>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>Total</td>
									<td></td>
									<td></td>
									<td ></td>
									<td></td>
									<td></td>

								</tr>
							</tbody>
						</table>


					</div>


				</div>
				<div class="row"  >

					<?php
					if ($rowdata["poCurrentStatus"]==$this->session->userdata("role")||($rowdata["poCurrentStatus"]=="payer"&&$this->session->userdata("role")=="approval1")) {
					?>


					<form action="<?=base_url() ?>" id="poForm" method="post" >

						<div class="col-lg-4" style="background: #f9f6ed;margin-top: 20px;margin-left: 6px;">
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
									<option value="accountant" <?php
									if ($rowdata["poCurrentStatus"]==1) {
										echo "selected";
									}
									?> >

										<?=$this->Common_model->getPOStatusTitle("accountant") ?>
									</option>
									<option value="approval1" <?php
									if ($rowdata["poCurrentStatus"]==3) {
										echo "selected";
									}
									?> ><?=$this->Common_model->getPOStatusTitle("approval1") ?></option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="approval1"&&$this->session->userdata("role")=="approval1") {
									?>
									<option value="accountant" <?php
									if ($rowdata["poCurrentStatus"]==1) {
										echo "selected";
									}
									?> >
									<?=$this->Common_model->getPOStatusTitle("accountant") ?>
										
									</option>
									<option value="approval2" <?php
									if ($rowdata["poCurrentStatus"]==3) {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("approval2") ?>
									</option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="approval2"&&$this->session->userdata("role")=="approval2") {
									?>
									<option value="approval1" <?php
									if ($rowdata["poCurrentStatus"]==2) {
										echo "selected";
									}
									?> ><?=$this->Common_model->getPOStatusTitle("approval1") ?></option>
									<option value="approval3" <?php
									if ($rowdata["poCurrentStatus"]==4) {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("approval3") ?>
									</option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="approval3"&&$this->session->userdata("role")=="approval3") {
									?>
									<option value="approval2" <?php
									if ($rowdata["poCurrentStatus"]=="approval2") {
										echo "selected";
									}
									?> >

										<?=$this->Common_model->getPOStatusTitle("approval2") ?>
									</option>
									<option value="payer" <?php
									if ($rowdata["poCurrentStatus"]=="payer") {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("payer") ?>


									</option>
									<?php
								}
								if ($rowdata["poCurrentStatus"]=="payer"&&$this->session->userdata("role")=="approval1") {
									?>
									<option value="approval3" <?php
									if ($rowdata["poCurrentStatus"]=="approval3") {
										echo "selected";
									}
									?> >
										<?=$this->Common_model->getPOStatusTitle("approval3") ?>


									</option>
									<option value="done" <?php
									if ($rowdata["poCurrentStatus"]=="done") {
										echo "selected";
									}
									?> >Done</option>
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
						</div>
					</form>
					<?php
				}
					?>

				</div>

				<div class="row">
					<div class="col-lg-10" style="margin-top: 40px;" >
						<span><h4>Remarks</h4></span>
						<table class="table table-bordered" style="width: 100%;background-color: #f3f3f3">
							<tr>
								<td>Given By</td>
								<td>Remarks</td>
								<td>Time</td>

							</tr>
							<?php
							$remark=$this->db->query("select * from tb_remarks left join users on remarksBy=id where remarksPOId='".$param2."' order by remarksId desc")->result_array();

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
<?php
}
?>

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
	function deletePop(billid)
	{
		swal({
			title: "Do you want to remove Bill from this PO?",
			text: "Enter Reason",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			confirmButtonText: "Delete",
			cancelButtonText: "Cancel",
			animation: "slide-from-top",
			inputPlaceholder: "Write reason here."
		},
		function(inputValue) {
			if (inputValue === false)
				return false;
			if (inputValue === "") {
				swal.showInputError("Write Reason");
				return false
			}

			deleteRow(billid,inputValue)
		});
	}

	function deleteRow(rowid, reason)
	{
		$.ajax({
			type:'post',
			url:'<?=base_url()?>admin/removeBillFromPo/',
			data:{billid:rowid,reason:reason,poid:'<?=$param2?>'},
			dataType: "JSON",
			beforeSend:function() {
				//	launchpreloader();
			},
			complete:function(resdata) {



			},
			success:function(resdata) {
				swal.close()
				if (resdata.success==0) {
					toastr.error(resdata.message,'Warning',{
						timeOut: 2000,
						"closeButton": true,
						"debug": false,
						"newestOnTop": true,
						"progressBar": true,
						"positionClass": "toast-top-right",
						"preventDuplicates": true,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "500",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut",
						"tapToDismiss": false

					})
				}
				if (resdata.success==1) {
					toastr.success("Bill removed successfully",'Success',{
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
					var row = document.getElementById("row_"+rowid);
					row.parentNode.removeChild(row);
				}
			}
		});
	}

</script>
