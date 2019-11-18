<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
		<!--
			Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

			Tip 2: you can also add an image using data-image tag
		-->
	<div class="logo">
		<a href="#" class="simple-text logo-normal">CLAIMS</a>
	</div>
	<? $site = $_SERVER['PATH_INFO'];?>
	<div class="sidebar-wrapper">
		<ul class="nav">

		<? if($site == '/dashboard'){?>

			<li class="nav-item active  ">

			<?}else{ ?>

			<li class="nav-item">

			<?}?>

				<a class="nav-link" href="<? echo base_url();?>dashboard">
				<i class="material-icons">dashboard</i>
				<p>Dashboard</p>
				</a>
			</li>

			<? if($site == '/borrowers'){?>

			<li class="nav-item active">

			<?}else{?>

			<li class="nav-item">

			<?}?>

				<a class="nav-link" href="<? echo base_url();?>borrowers">
				<i class="material-icons">group</i>
				<p>Clients</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./tables.html">
				<i class="material-icons">monetization_on</i>
				<p>Loan</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./typography.html">
				<i class="material-icons">payment</i>
				<p>Payments</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./icons.html">
<<<<<<< HEAD
				<i class="material-icons">attach_money</i>
				<p>Interest</p>
=======
				<i class="material-icons">bubble_chart</i>
				<p>Icons</p>
>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./map.html">
<<<<<<< HEAD
				<i class="material-icons">insert_chart</i>
				<p>Reports</p>
=======
				<i class="material-icons">location_ons</i>
				<p>Maps</p>
>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./notifications.html">
<<<<<<< HEAD
				<i class="material-icons">person_alt</i>
				<p>Staffs</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./notifications.html">
				<i class="material-icons">language</i>
				<p>Logs</p>
=======
				<i class="material-icons">notifications</i>
				<p>Notifications</p>
				</a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="./rtl.html">
				<i class="material-icons">language</i>
				<p>RTL Support</p>
				</a>
			</li>
			<li class="nav-item active-pro ">
				<a class="nav-link" href="./upgrade.html">
				<i class="material-icons">unarchive</i>
				<p>Upgrade to PRO</p>
>>>>>>> 01351c1b6fee4ecb4a86f84955f8d50f375c2566
				</a>
			</li>
		</ul>
	</div>
</div>