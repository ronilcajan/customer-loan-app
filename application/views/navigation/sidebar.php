<div class="sidebar" data-color="purple" data-background-color="white" >
		<!--
			Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

			Tip 2: you can also add an image using data-image tag
		-->
	<div class="logo m-1 form-group">
		
		<a href="#" class="simple-text logo-normal font-weight-bold"><img src="<?php echo base_url();?>/assets/images/rfsc.png" height="50" width="50"> RFS Corporation</a>
	</div>
	<?php $site = $_SERVER['PATH_INFO'];?>
	<div class="sidebar-wrapper">
		<ul class="nav">

		<?php if($this->session->userdata('usertype') == 'Guest') {?>
			<?php 
			$site1 = 'borrowers/client-profile';
			if(strpos($site, 'borrowers/') || strpos($site, $site1) || $site == 'guest'){?>

				<li class="nav-item active">

			<?php }else{?>
				<li class="nav-item">
			<?php }?>
				<a class="nav-link" href="<?php echo base_url();?>borrowers/create-borrowers">
				<i class="material-icons">group</i>
				<p>Borrowers</p>
				</a>
			</li>
			
			<?php if(strpos($site,'loan/')){?>
				<li class="nav-item active">
			<?php }else{ ?>
				<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>loan/create-loan">
				<i class="material-icons">monetization_on</i>
				<p>Loan</p>
				</a>
				</li>
		
		<?php }elseif($this->session->userdata('usertype') == 'Manager') { ?>
			
			<?php if($site == '/dashboard' || $site == '/manager'){?>

			<li class="nav-item active  ">

			<?php }else{ ?>

			<li class="nav-item">

			<?php }?>

				<a class="nav-link" href="<?php echo base_url();?>dashboard">
				<i class="material-icons">dashboard</i>
				<p>Dashboard</p>
				</a>
			</li>

			<?php if(strpos($site,'loan/') || strpos($site,'promissory')){?>
				<li class="nav-item active">
			<?php }else{ ?>
				<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>loan/create-loan">
				<i class="material-icons">monetization_on</i>
				<p>Loan</p>
				</a>
			</li>

			<?php if(strpos($site,'payments/')){?>
				<li class="nav-item active">
			<?php }else{ ?>
				<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>payments/loan-details">
				<i class="material-icons">payment</i>
				<p>Payments</p>
				</a>
			</li>
    		<?php if(strpos($site, 'reports')){?>
			<li class="nav-item active">
			<?php }else{ ?>
			<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>reports">
				<i class="material-icons">insert_chart</i>
				<p>Reports</p>
				</a>
			</li>
			<?php if(strpos($site, 'staff')){?>
			<li class="nav-item active">
			<?php }else{ ?>
			<li class="nav-item ">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>staff">
				<i class="material-icons">person</i>
				<p>Staffs</p>
				</a>
			</li>

		<?php }elseif($this->session->userdata('usertype') == 'Cashier') { ?>
			
			<?php if($site == '/dashboard' || $site == '/cashier'){?>

			<li class="nav-item active  ">

			<?php }else{ ?>

			<li class="nav-item">

			<?php }?>

				<a class="nav-link" href="<?php echo base_url();?>dashboard">
				<i class="material-icons">dashboard</i>
				<p>Dashboard</p>
				</a>
			</li>

			<?php $site1 = 'borrowers/client-profile';
			if(strpos($site, 'borrowers/') || strpos($site, $site1)){?>

				<li class="nav-item active">

			<?php }else{?>
				<li class="nav-item">
			<?php }?>
				<a class="nav-link" href="<?php echo base_url();?>borrowers/create-borrowers">
				<i class="material-icons">group</i>
				<p>Borrowers</p>
				</a>
			</li>

			<?php if(strpos($site,'loan/') || strpos($site,'promissory')){?>
				<li class="nav-item active">
			<?php }else{ ?>
				<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>loan/create-loan">
				<i class="material-icons">monetization_on</i>
				<p>Loan</p>
				</a>
			</li>

			<?php if(strpos($site,'payments/')){?>
				<li class="nav-item active">
			<?php }else{ ?>
				<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>payments/loan-details">
				<i class="material-icons">payment</i>
				<p>Payments</p>
				</a>
			</li>
		
		<?php }else{ ?>

			<?php if($site == '/dashboard'){?>

			<li class="nav-item active  ">

			<?php }else{ ?>

			<li class="nav-item">

			<?php }?>

				<a class="nav-link" href="<?php echo base_url();?>dashboard">
				<i class="material-icons">dashboard</i>
				<p>Dashboard</p>
				</a>
			</li>

			<?php $site1 = 'borrowers/client-profile';
			if(strpos($site, 'borrowers/') || strpos($site, $site1)){?>

				<li class="nav-item active">

			<?php }else{?>
				<li class="nav-item">
			<?php }?>
				<a class="nav-link" href="<?php echo base_url();?>borrowers/create-borrowers">
				<i class="material-icons">group</i>
				<p>Borrowers</p>
				</a>
			</li>
			
			<?php if(strpos($site,'loan/') || strpos($site,'promissory')){?>
				<li class="nav-item active">
			<?php }else{ ?>
				<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>loan/create-loan">
				<i class="material-icons">monetization_on</i>
				<p>Loan</p>
				</a>
			</li>

			<?php if(strpos($site,'payments/')){?>
				<li class="nav-item active">
			<?php }else{ ?>
				<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>payments/loan-details">
				<i class="material-icons">payment</i>
				<p>Payments</p>
				</a>
			</li>
    		<?php if(strpos($site, 'reports')){?>
			<li class="nav-item active">
			<?php }else{ ?>
			<li class="nav-item">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>reports">
				<i class="material-icons">insert_chart</i>
				<p>Reports</p>
				</a>
			</li>
			<?php if(strpos($site, 'staff')){?>
			<li class="nav-item active">
			<?php }else{ ?>
			<li class="nav-item ">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>staff">
				<i class="material-icons">person</i>
				<p>Staffs</p>
				</a>
			</li>
			<?php if(strpos($site, 'back-up')){?>
			<li class="nav-item active">
			<?php }else{ ?>
			<li class="nav-item ">
			<?php } ?>
				<a class="nav-link" href="<?php echo base_url();?>back-up">
				<i class="material-icons">backup</i>
				<p>Back up</p>
				</a>
			</li>

		<?php } ?>
		</ul>
	</div>
</div>