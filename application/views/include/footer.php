<div id="search">
	<button type="button" class="close">×</button>
	<form>
		<input type="search" value="" placeholder="type keyword(s) here" />
		<button type="submit" class="btn btn-primary">Search</button>
	</form>
</div>


<?php include("modal.php"); ?>

<!-- jquery vendor -->
<script src="<?=base_url()?>assets/js/lib/jquery.nanoscroller.min.js"> </script>
<!-- nano scroller -->
<script src="<?=base_url()?>assets/js/lib/menubar/sidebar.js"> </script>
<script src="<?=base_url()?>assets/js/lib/preloader/pace.min.js"> </script>
<!-- sidebar -->
<script src="<?=base_url()?>assets/js/lib/bootstrap.min.js"> </script>
<!-- bootstrap -->

<script src="<?=base_url()?>assets/js/lib/circle-progress/circle-progress.min.js"> </script>
<script src="<?=base_url()?>assets/js/lib/circle-progress/circle-progress-init.js"> </script>

<script src="<?=base_url()?>assets/js/lib/sparklinechart/jquery.sparkline.min.js"> </script>
<script src="<?=base_url()?>assets/js/lib/sparklinechart/sparkline.init.js"> </script>
<script src="<?=base_url()?>assets/js/lib/owl-carousel/owl.carousel.min.js"> </script>
<script src="<?=base_url()?>assets/js/lib/owl-carousel/owl.carousel-init.js"> </script>
<script src="<?=base_url()?>assets/js/scripts.js"> </script>

<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/b-2.4.1/r-2.5.0/datatables.min.js"> </script>
<script src="<?=base_url() ?>assets/js/lib/toastr/toastr.min.js"> </script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"> </script>
 <script src="<?=base_url() ?>assets/js/lib/sweetalert/sweetalert.min.js"> </script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"> </script>
<!-- scripit init-->

<?php
if ($this->session->flashdata('flash_message') != "") { ?>



<script type="text/javascript">

	toastr.success('<?php echo $this->session->flashdata("flash_message");?>');

</script>



<?php } ?>



<?php
if ($this->session->flashdata('error_message') != "") { ?>



<script type="text/javascript">

	toastr.error('<?php echo $this->session->flashdata("error_message");?>');

</script>



<?php } ?>
<script>
	$('select[name="changeDepartment"]').on('change', function() {
		var departmentID = $(this).val();
		$.ajax({
		type: "POST",
		url: "<?=base_url()?>Admin/changeDepartment",
		data: {department : departmentID },
		success: function (data) {
			location.reload();
		}
		});
		});
		</script>
</body>

</html>