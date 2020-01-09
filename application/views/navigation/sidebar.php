<div class="sidebar" data-color="purple" data-background-color="white" >
		<!--
			Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

			Tip 2: you can also add an image using data-image tag
		-->
	<div class="logo">
		<a href="#" class="simple-text logo-normal">RFS Corporation</a>
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
			<? if($site == '/loan' || strpos($site, 'loan/apply-loan')){?>
				<li class="nav-item active">
			<? }else{ ?>
				<li class="nav-item">
			<? } ?>
				<a class="nav-link" href="<? echo base_url();?>loan">
				<i class="material-icons">monetization_on</i>
				<p>Loan</p>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./typography.html">
				<i class="material-icons">payment</i>
				<p>Payments</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./icons.html">
				<i class="fa fa-percent"  style="font-size: 17px;"></i>
				<p>Interest</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./map.html">
				<i class="material-icons">insert_chart</i>
				<p>Reports</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./notifications.html">
				<i class="material-icons">person_alt</i>
				<p>Staffs</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./notifications.html">
				<i class="material-icons">language</i>
				<p>Logs</p>
				</a>
			</li>
		</ul>
	</div>
</div>