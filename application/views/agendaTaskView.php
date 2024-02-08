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
								<li class="active">Table-Data</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>
			<!-- /# row -->
			<div id="main-content">
				<div class="row">
					<div class="col-lg-12">
						<div class="card alert">
							<?php
							if ($this->session->userdata("role")!="Department") {
							?>
							<li class="<?php
							if ($page!="department") {
								echo "active";} ?>">
								<a href="<?=base_url() ?>Admin/addAgendaView">
									<button type="button" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">
										<i class="ti-plus"></i>Add Meeting Agenda</button>
								</a>
							<?php
						}
							?>
							
							<div class="card-header">
								<h4>Meeting Task</h4>
								<div class="card-header-right-icon">
									<ul>
										<li class="card-close" data-dismiss="alert"><i class="ti-close"></i></li>
										<li class="doc-link"><a href="#"><i class="ti-link"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="bootstrap-data-table-panel">
								<div class="table-responsive">
									<table id="dataTable_gs" width="100%" class="table table-striped table-lightfont dataTable1">
										<thead>
											<tr>
												<th>S.No.</th>
												

												<th>Date</th>
												<th>Title</th>
												<th>Agenda</th>
												<th>Created by</th>
												<th>Department</th>
												<th>Meeting</th>
												<th>Status</th>
												<th>Action</th></tr></thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /# card -->
					</div>
					<!-- /# column -->
				</div>
				<!-- /# row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="footer">
							<p>This dashboard was generated on <span id="date-time"></span>
								<a href="#" class="page-refresh">Refresh Dashboard</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#dataTable_gs').DataTable({
			'processing': true,
			'serverSide': true,
			"bDestroy": true,
			'serverMethod': 'post',
			'ajax': {
				'url':'<?=base_url()?>admin/getAgendaTaskList'
			},
			"columnDefs": [
				{
					"targets": [0], //first column / numbering column
					"orderable": false, //set not orderable
				},
				{
					"targets": [1],
					"render": function (data, type, full, meta) {
						if (full[1] != '') {
							return data;
						} else if (full[1] == '') {
							return 'No Data';
						}
					}
				},


			],
			dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			buttons: [

			]
		});
	});

	function exportdata()
	{
		$.ajax(
		{
			url: '<?php echo base_url();?>index.php?admin/getexportlist/' ,
			success: function(response) {



			}
		});
	}
</script>