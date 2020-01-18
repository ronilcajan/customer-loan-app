<div class="sidebar" data-color="purple" data-background-color="white" >
		<!--
			Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

			Tip 2: you can also add an image using data-image tag
		-->
	<div class="logo m-1"  style="background-color: #9D57B1; border-radius: 5px">
		<a href="#" class="simple-text logo-normal text-light font-weight-bold">RFS Corporation</a>
	</div>
	<? $site = $_SERVER['PATH_INFO'];?>
	<div class="sidebar-wrapper">
		<ul class="nav">

			<?if($site == '/dashboard'){?>

			<li class="nav-item active  ">

			<?}else{ ?>

			<li class="nav-item">

			<?}?>

				<a class="nav-link" href="<? echo base_url();?>dashboard">
				<i class="material-icons">dashboard</i>
				<p>Dashboard</p>
				</a>
			</li>

			<? $site1 = 'borrowers/client-profile';
			if(strpos($site, 'borrowers/') || strpos($site, $site1)){?>

				<li class="nav-item active">

			<?}else{?>
				<li class="nav-item">
			<? }?>
				<a class="nav-link" href="<? echo base_url();?>borrowers/create-borrowers">
				<i class="material-icons">group</i>
				<p>Borrowers</p>
				</a>
			</li>
			
			<? if(strpos($site,'loan/')){?>
				<li class="nav-item active">
			<? }else{ ?>
				<li class="nav-item">
			<? } ?>
				<a class="nav-link" href="<? echo base_url();?>loan/create-loan">
				<i class="material-icons">monetization_on</i>
				<p>Loan</p>
				</a>
			</li>

			<? if(strpos($site,'payments/')){?>
				<li class="nav-item active">
			<? }else{ ?>
				<li class="nav-item">
			<? } ?>
				<a class="nav-link" href="<? echo base_url();?>payments/loan-details">
				<i class="material-icons">payment</i>
				<p>Payments</p>
				</a>
			</li>
    		<?if(strpos($site, 'reports')){?>
			<li class="nav-item active">
			<? }else{ ?>
			<li class="nav-item">
			<? } ?>
				<a class="nav-link" href="<? echo base_url();?>reports">
				<i class="material-icons">insert_chart</i>
				<p>Reports</p>
				</a>
			</li>
			<?if(strpos($site, 'staff')){?>
			<li class="nav-item active">
			<? }else{ ?>
			<li class="nav-item ">
			<? } ?>
				<a class="nav-link" href="<? echo base_url();?>staff">
				<i class="material-icons">person</i>
				<p>Staffs</p>
				</a>
			</li>
			<?if(strpos($site, 'staff')){?>
			<li class="nav-item active">
			<? }else{ ?>
			<li class="nav-item ">
			<? } ?>
				<a class="nav-link" href="<? echo base_url();?>">
				<i class="material-icons">backup</i>
				<p>Back up</p>
				</a>
			</li>
		</ul>
	</div>
</div>