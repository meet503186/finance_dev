 <script type="text/javascript">
	 function showAjaxModal(url1)
	 {
		 // SHOWING AJAX loading IMAGE
		 jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?=base_url()?>assets/images/loading.gif" /></div>');

		 // LOADING THE AJAX MODAL
		 jQuery('#modal_ajax').modal('show', {backdrop: 'true'});

		 // SHOW AJAX RESPONSE ON REQUEST SUCCESS
		 $.ajax({
			 url: url1,
			 success: function(response) {
				 jQuery('#modal_ajax .modal-body').html(response);
			 }
		 });
	 }
	 function showAjaxModal_textbox(url)
	 {
		 // SHOWING AJAX loading IMAGE
		 jQuery('#modal_ajax_textbox .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?=base_url()?>assets/images/loading.gif" /></div>');

		 // LOADING THE AJAX MODAL
		 jQuery('#modal_ajax_textbox').modal('show', {backdrop: 'true'});

		 // SHOW AJAX RESPONSE ON REQUEST SUCCESS
		 $.ajax({
			 url: url,
			 success: function(response) {
				 jQuery('#modal_ajax_textbox .modal-body').html(response);
			 }
		 });
	 }
 </script>

<!-- (Ajax Modal)-->
<div class="modal fade" id="modal_ajax" >
	<div class="modal-dialog" >
		<div class="modal-content" style="width:100%;overflow:auto; height: auto;">

<div class="modal-body" style="height: 80vh;overflow-y: auto;">



			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_ajax_textbox" >
	<div class="modal-dialog" align="center">
		<div class="modal-content" style="width:100%;overflow:auto; height: auto;" >



<div class="modal-body" style="height: 80vh;overflow-y: auto;">


			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>





<script type="text/javascript">
	function confirm_modal(delete_url)
	{
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
</script>

<!-- (Normal Modal)-->
<div class="modal fade" id="modal-4" style="overflow-y:auto;">
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:100px;">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
			</div>


			<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
				<a href="#" class="btn btn-danger" id="delete_link"><?php echo ('Delete'); ?></a>
				<button type="button" class="btn btn-info" data-dismiss="modal"><?php echo ('Cancel'); ?></button>
			</div>
		</div>
	</div>
</div>
