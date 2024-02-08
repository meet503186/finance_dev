 <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
	<div class="nano">
		<div class="nano-content">
			<ul>

				<li class="label">Main</li>
				<li class="<?php
				if ($page=="home") {
					echo "active";} ?>">
				<a href="<?=base_url() ?>Admin"><i class="ti-home"></i> Home </a>
				</li>
				<?php
				if ($this->session->userdata("role")=="superadmin"||$this->session->userdata("role")=="Admin") {
				?>
				<li class="<?php
					if ($page=="department"&&$this->session->userdata("role")=="superadmin"||$this->session->userdata("role")=="Admin") {
					echo "active";} ?>">
				<a href="<?=base_url() ?>Admin/department">
				<i class="ti-user"></i> Department </a></li>
				<?php
			}

			if ($this->session->userdata("role")=="accountant") {
				?>
				<li class="<?php
					if ($page=="beneficiaryView") {
					echo "active";} ?>">
				<a href="<?=base_url() ?>Admin/beneficiaryView">
					<i class="ti-user"></i> Beneficiary </a></li>
				<?php
			}
			if ($this->session->userdata("role")=="accountant") {
				?>
				<li class="<?php
				if ($page=="billsView") {
					echo "active";} ?>">
				<a href="<?=base_url() ?>Admin/billView">
				<i class="ti-user"></i> Bill </a></li>
				<?php
			}
				?>


				

				<li class="<?php
					if ($page=="poListView") {
					echo "active";} ?>">
				<a href="<?=base_url() ?>Admin/poListView">
				<i class="ti-user"></i> PO In Progress</a></li>

				<?php
				if ($this->session->userdata("role")=="superadmin"||$this->session->userdata("role")=="Admin") {
				?>
				<li class="<?php
				if ($page=="userlist") {
					echo "active";} ?>"><a href="<?=base_url() ?>Admin/userlist"><i class="ti-user"></i> User </a></li>
				<?php
			    }
				?>

			</ul>
		</div>
	</div>
</div>