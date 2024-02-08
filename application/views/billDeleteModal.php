<div class="row">
	<div class="col-lg-6">
		<div class="card alert">
			<div class="card-header">
				<h4>Reason For Delete Bill</h4>	
			</div>
			<div class="card-body">
				<div class="basic-elements">
					<form action="<?=base_url() ?>" id="billDeleteForm" method="post">
						<div class="row">
							<div class="col-lg-6">

								

								<div class="form-group">
									<label>Reason</label>
									<select name="reason" id="reason" class="form-control" required="">
									
										<option value="Duplicate" >Duplicate</option>
										<option value="Already Paid" >Already Paid</option>
									</select>

								</div>
					

								<div class="form-group">
									<label>Remarks</label>
									<input type="text" id="remarks" name="remarks" class="form-control" value="<?=$data["billRemarks"] ?>">
								</div>
						<input  id="deletebill" type="submit" class="btn btn-dark" value="Delete Bill"/>
							</div>

						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

 <script type="text/javascript">
	 $(document).ready(function () {
		 $( "#deletebill" ).click(function() {


			 $("form#billDeleteForm").validate({
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
					 var a=$('#billDeleteForm').serialize();
					 $.ajax({
						 type:'post',
						 url:'<?=base_url()?>admin/deleteBill/<?=$param2?>',
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
								 toastr.success("Bill deleted successfully",'Success',{
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
		 window.location.reload();
	 }
	 
 </script>
