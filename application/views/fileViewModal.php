<?php
$billAmt=$this->db->get_where("tb_bills",array("billId"=>$param2))->result_array();
$bill=$billAmt[0];
$party=$this->Common_model->getPartyDetail($bill["billVendorId"]);
$po=$this->db->get_where("tb_paymentorder",array("poId"=>$bill["billPoId"]))->result_array();
$podetail=$po[0];
?>
<div class="row">
	<div class="col-lg-4">
		<div class="card alert">
			<div class="card-header">
				<h4>Bill Detail</h4>

			</div>
			<div class="card-body">
				<div class="basic-elements">
				
						<div class="row">
							<div class="col-lg-12">
							<table class="table">
								<tr>
									<td>Bill No. </td>
									<td><?=$bill["billNo"]; ?></td>
								</tr>
								<tr>
									<td>Bill  </td>
									<td><?=$bill["billType"]; ?></td>
								</tr>
								<tr>
									<td>Bill Last Date </td>
									<td><?=$bill["billLastDate"]; ?></td>
								</tr>
								<tr>
									<td>Title </td>
									<td><?=$bill["billNameAt"]; ?></td>
								</tr>
								<tr>
									<td>Bill Amount </td>
									<td><?=$this->Common_model->IndianPaymentFormat($bill["billPaidAmount"]); ?></td>
								</tr>
								<tr>
									<td>Party Name </td>
									<td><?=$party["vendorName"]; ?></td>
								</tr><tr>
									<td>Account Number</td>
									<td><?=$party["vendorAccountNo"]; ?></td>
								</tr><tr>
									<td>IFSC Code</td>
									<td><?=$party["vendorIFSCCode"]; ?></td>
								</tr><tr>
									<td>Branch</td>
									<td><?=$party["vendorAddress"]; ?></td>
								</tr><tr>
									<td>Purpose</td>
									<td><?=$bill["billPurpose"]; ?></td>
								</tr><tr>
									<td>Referance</td>
									<td><?=$bill["billReference"]; ?></td>
								</tr><tr>
									<td>Purchased By</td>
									<td><?=$bill["billPurchaser"]; ?></td>
								</tr>
								
								<tr>
									<td>Bill created</td>
									<td><?=date(CUSTOME_DATETIME,strtotime($bill["billCreatedAt"])) ?></td>
								</tr>
								<tr>
									<td>Remarks</td>
									<td><?=$bill["billRemarks"]; ?></td>
									
								</tr>
							</table>
								
							</div>

							<div class="col-lg-6">



							</div>
						</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-7">
	<span>
		<?php
		if ($podetail["poCurrentStatus"]==$this->session->userdata("role")&&$podetail["poCurrentStatus"]!="done"&&$param3=="") {
		?>
		
		<button type="button" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5" onclick='deletePop(<?=$param2 ?>)'>
			<i class="ti-trash"></i>Delete Bill</button>

		<?php
	}
		?>
	</span>
		<span>
			<button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5" onclick="printDivArea('div_print_attachment_<?=$printcountr ?>');">
				<i class="ti-printer"></i>Print Attachment</button>
		</span>
		<div id="div_print_attachment_<?=$printcountr ?>">
			<?php
		$filedata=$this->db->query("select * from tb_bills where billId='".$param2."'")->result_array();

		$file_name = $filedata[0]["billImageUrl"] ;
		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
		if (file_exists($file_name)) {
			if ($extension=="jpg"||$extension=="jpeg"||$extension=="png") {
		?>
		<img src="<?=base_url().$filedata[0]["billImageUrl"] ; ?>" style="width: 100%"  />
		<?php
	} else {
		?>
		<embed src="<?=base_url().$filedata[0]["billImageUrl"] ; ?>#toolbar=0" width="100%" height="100%" />
		<?php
	}
		}    
		

		?>
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
					window.location.reload();
					//var row = document.getElementById("row_"+rowid);
					//row.parentNode.removeChild(row);
				}
			}
		});
	}
</script>


