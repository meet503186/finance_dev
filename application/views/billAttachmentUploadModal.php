<div class="col-lg-12">
	<div class="card alert">
		<div class="card-header">
			<h4>Upload File</h4>
		</div>
		<div class="card-body">
			<div class="basic-elements">

				<div class="row">
					<div class="col-lg-9" >
						

						<form>
							<table>
								
								<tr>
									<th>Select File </th>
									<td><input id="billuploadfile" name="billuploadfile" type="file"  /></td>
								</tr>
								
							</table>
						</form>

					</div>
					
				</div>


			</div>
		</div>
	</div>
</div>

 <script type="text/javascript">
	 $("#billuploadfile").change(function() {
		 let formData = new FormData();
		 formData.append("file_upload", billuploadfile.files[0]);

		 $.ajax({
			 url: '<?=base_url()?>Admin/uploadBillAttachment/<?=$param2?>',
			 type: 'POST',
			 data: formData,
			 async: false,
			 cache: false,
			 contentType: false,
			 enctype: 'multipart/form-data',
			 processData: false,
			 success: function (response) {
				 $('#modal_ajax').modal('hide');
				
				 toastr.success("File uploaded successfully",'Success',{
					 timeOut: 1000,
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

				 });
				 
			 }
		 });
	 });

 </script>