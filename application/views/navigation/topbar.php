<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
			<div class="container-fluid">
			<div class="navbar-wrapper">
				<?php $site = $_SERVER['PATH_INFO'];
				if( $site == '/dashboard'){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>dashboard">Dashboard</a>
				<?php }elseif(strpos($site, 'borrowers/')) {?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>borrowers/create-borrowers">Manage Borrowers</a>
				<?php }elseif(strpos($site, 'borrowers/profile')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>borrowers/create-borrowers">Client Profile</a>
				<?php }elseif(strpos($site,'loan/')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>loan/create-loan">Manage Loan</a>
				<?php }elseif(strpos($site,'payments/')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>payments/loan_details">Manage Payments</a>
				<?php }elseif(strpos($site,'reports')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>reprots">Manage Reports</a>
				<?php }elseif(strpos($site,'staff')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>staff">Manage Staff</a>
				<?php }elseif(strpos($site,'my-profile')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>staff">My Profile</a>
				<?php }elseif(strpos($site, 'back-up')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>staff">Manage Files</a>
			<?php }elseif(strpos($site, 'promissory')){?>
				<a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>staff">Promissory Note</a>
				<?php }else{ ?>
				<a class="navbar-brand font-weight-bold" href="#"></a>
				<?php }?>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
				<span class="sr-only">Toggle navigation</span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
				<span class="navbar-toggler-icon icon-bar"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end">
				<ul class="navbar-nav">
				<?php if($this->session->userdata('usertype') == 'Guest') {?>
				<li class="nav-item">
					<a class="nav-link" href="#" rel="tooltip" title="Dashboard">
					<i class="material-icons">dashboard</i>
					<p class="d-lg-none d-md-block">
						Stats
					</p>
					</a>
				</li>
				<?php }else{?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url();?>dashboard" rel="tooltip" title="Dashboard">
					<i class="material-icons">dashboard</i>
					<p class="d-lg-none d-md-block">
						Stats
					</p>
					</a>
				</li>
				<?php } ?>
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="material-icons">person</i>
					<p class="d-lg-none d-md-block">
						Account
					</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
					<?php if($this->session->userdata('usertype') == 'Guest') {?>
						<a class="dropdown-item" href="#">Profile</a>
						<a class="dropdown-item" href="#">Change Password</a>
					<?php }else{ ?>
						<a class="dropdown-item" href="<?php echo base_url().'my-profile/'.$this->session->userdata('username');?>">Profile</a>
						<a class="dropdown-item" href="#change_pass" data-toggle="modal">Change Password</a>
					<?php } ?>
					<div class="dropdown-divider"></div>

					<a class="dropdown-item" href="<?php echo base_url();?>logout">Log out</a>
					</div>
				</li>
				</ul>
			</div>
			</div>

		</nav>
		<!-- End Navbar -->