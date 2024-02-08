<div class="header">
	<div class="pull-left">
		<div class="logo">
			<a href="index.html"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Webstrot Admin</span></a></div>
		<div class="hamburger sidebar-toggle">
			<span class="line"></span>
			<span class="line"></span>
			<span class="line"></span>
		</div>
	</div>
	<div class="pull-right p-r-15">
		<ul>
			<li class="header-icon dib">
			<select class="form-control" name="changeDepartment" style="padding: 5px;line-height: 5px;height: 30px;" >

			<?php

			$permission=$this->db->query("SELECT * FROM `department` left join tb_departmentaccess on accessDepartmentId=departmentId where accessUserId='".$this->session->userdata("uid")."' and accessIsPermitted=1")->result_array();
			foreach ($permission as $perrows) {


			?>
			<option value="<?=$perrows["departmentId"] ?>" <?php
			if ($perrows["departmentId"]==$this->session->userdata("department")) {
				echo "selected";
			}
			?>  ><?=$perrows["departmentName"] ?></option>
			<?php
		}
			?>
			</select>
			</li>
			<li class="header-icon dib"><i class="ti-bell"></i>
			<div class="drop-down">
			<div class="dropdown-content-heading">
			<span class="text-left">Recent Notifications</span>
			</div>
			<div class="dropdown-content-body">
			<ul><!--
			<li>
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">5 members joined today </div>
			</div>
			</a>
			</li>
			<li>
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">likes a photo of you</div>
			</div>
			</a>
			</li>
			<li>
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
			</div>
			</a>
			</li>
			<li>
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
			</div>
			</a>
			</li>
			<li class="text-center">
			<a href="#" class="more-link">See All</a>
			</li>-->
			</ul>
			</div>
			</div>
			</li>
			<li class="header-icon dib"><i class="ti-email"></i>
			<div class="drop-down">
			<div class="dropdown-content-heading">
			<span class="text-left">2 New Messages</span>
			<a href="email.html"><i class="ti-pencil-alt pull-right"></i></a>
			</div>
			<div class="dropdown-content-body">
			<ul><!--
			<li class="notification-unread">
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/1.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
			</div>
			</a>
			</li>
			<li class="notification-unread">
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
			</div>
			</a>
			</li>
			<li>
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/3.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
			</div>
			</a>
			</li>
			<li>
			<a href="#">
			<img class="pull-left m-r-10 avatar-img" src="assets/images/avatar/2.jpg" alt="" />
			<div class="notification-content">
			<small class="notification-timestamp pull-right">02:34 PM</small>
			<div class="notification-heading">Mr.  Ajay</div>
			<div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
			</div>
			</a>
			</li>
			<li class="text-center">
			<a href="#" class="more-link">See All</a>
			</li>
			-->
			</ul>
			</div>
			</div>
			</li>
			<li class="header-icon dib">
			<?php
			if (file_exists("uploadedFiles/profilePictures/".$this->session->userdata("uid").".jpg")) {
				$userdata=$this->commonmodel->getLoggedInUser();
			?>
			<img class="avatar-img" src="<?=base_url()."uploadedFiles/profilePictures/".$this->session->userdata("uid").".jpg?".$userdata["profilePicAt"] ; ?>" alt="" />
			<?php
		} else {
			?>

			<img class="avatar-img" src="<?=base_url() ?>assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar">
			<?php
		}
			?>

			<?=
			$this->session->userdata("name")
			?>,
			<?=
			$this->session->userdata("role")
			?>
			<i class="ti-angle-down f-s-10"></i></span>
			<div class="drop-down dropdown-profile">

			<div class="dropdown-content-body">
			<ul>
			<li><a href="<?=base_url() ?>Admin/profileView"><i class="ti-user"></i> <span>Profile</span></a></li>
			<li><a onclick=showAjaxModal("<?=base_url('Modal/popup/myPasswordModal/') ?>");>
			<i class="ti-lock"></i><span>Change Password</span></a></li>
			<li><a href="<?=base_url() ?>Admin/logout"><i class="ti-power-off"></i> <span>Logout</span></a></li>
			</ul>
			</div>
			</div>
			</li>
		</ul>
	</div>
</div>