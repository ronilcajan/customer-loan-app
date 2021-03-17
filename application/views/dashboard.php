<body class="">
<?php $this->load->view('loading_screen');?>
	<div class="wrapper ">

		<!-- Top NavBar -->
		<?php $this->load->view('navigation/sidebar');?>
		<!-- End of NavBar -->

		<div class="main-panel">

		<!-- Navbar -->
		<?php $this->load->view('navigation/topbar');?>
		<!-- End Navbar -->

		<div class="content">
			<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-warning card-header-icon">
					<div class="card-icon">
						<i class="material-icons pl-2">groups</i>
					</div>
					<p class="card-category">Clients</p>
					<h3 class="card-title"><?php echo $clients;?>
					</h3>
					</div>
					<div class="card-footer">
					<div class="stats">
						<i class="material-icons">groups</i>
						<a href="<?php echo base_url();?>borrowers/new-borrowers" class="text-warning">Show all..</a>
					</div>
					</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="material-icons">store</i>
					</div>
					<p class="card-category">Revenue</p>
					<h3 class="card-title">P <?php if(empty($payments['amnt'])){ echo '0.00' ;}else{ echo $payments['amnt'];}?></h3>
					</div>
					<div class="card-footer">
					<div class="stats">
						<i class="material-icons">date_range</i> Last 24 Hours
					</div>
					</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-success card-header-icon">
					<div class="card-icon">
						<i class="material-icons">verified_user</i> 
					</div>
					<p class="card-category">Active Loans</p>
					<h3 class="card-title"><?php echo $active;?></h3>
					</div>
					<div class="card-footer">
					<div class="stats">
						<i class="material-icons">monetization_on</i> All Active Loans
					</div>
					</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-danger card-header-icon">
					<div class="card-icon">
						<i class="material-icons">monetization_on</i>
					</div>
					<p class="card-category">Release Cash</p>
					<h3 class="card-title"><?echo $cash;?></h3>
					</div>
					<div class="card-footer">
					<div class="stats">
						<i class="material-icons">warning</i> 
						<a href="<?php echo base_url();?>loan/approved-loans" class="text-danger">Unfinish Cash Release...</a>
					</div>
					</div>
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="card">
						<div class="card-header card-header-primary">
							<div class="card-title">
								Loans
							</div>
							<p class="card-category">Loan due date for this month</p>
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<th>Loan No.</th>
									<th>Amount Loan</th>
									<th>Due Date</th>
								</thead>
								<tbody>

								<?php
								if(!empty($due)){?>
									<?php foreach ($due as $key => $d) {?>
									<tr>
										<td>
											<?php echo $d['loan_no'];?>
										</td>	
										<td>
											<?php echo $d['loan_amount'];?>
										</td>
										<td>
											<?php echo $d['due_date'];?>
										</td>
									</tr>
								<?php } }else{ ?>
									<tr>
										<td colspan="3" class="text-center">No data available</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="card">
						<div class="card-header card-header-primary">
	                        <h4 class="card-title">My Task</h4>
	                        <p class="card-category">You can add task in your profile</p>
	                    </div>
						<div class="card-body">
							<div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <?php if(!empty($task)){?>
                                        <?php foreach ($task as $key => $mytask) {?>
                                        <tr class="task<?php echo $mytask['task_id'];?>">
                                            <td><?php echo $mytask['description'];?>
                                            </td>
                                            <td><?php echo $mytask['status'];?></td>
                                            <?php if($mytask['status'] == "Doned"){?>
                                                 <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id'];?>">
                                                <i class="material-icons">close</i>
                                                </button></td>
                                            <?php }else{?>
                                            <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" title="Done Task" class="btn btn-success btn-link btn-sm done_task" id="<?php echo $mytask['task_id'];?>">
                                                <i class="material-icons">done_all</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm edit_task" id="<?php echo $mytask['task_id'];?>">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id'];?>">
                                                <i class="material-icons">close</i>
                                            </button>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <tr class="cancel_task<?php echo $mytask['task_id'];?>" style="display: none;">
                                            <form id="edit_task" method="POST">
                                                <td>
                                                    <input class="form-control task_des" type="text" name="description" value="<?php echo $mytask['description'];?>">
                                                </td>
                                                <td><?php echo $mytask['status'];?></td>
                                                <td class="td-actions text-right">
                                                    <button type="submit" rel="tooltip" title="Update Task" class="btn btn-success btn-link btn-sm update_task" id="<?php echo $mytask['task_id'];?>">
                                                        <i class="material-icons">done</i>
                                                    </button>
                                                    <button type="button" rel="tooltip" title="Cancel Update" class="btn btn-danger btn-link btn-sm cancel_task" id="<?php echo $mytask['task_id'];?>">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                            </td>
                                                </td>
                                            </form>
                                        </tr>
                                        <?php }}else{?>
                                            <tr><td class="text-center">No created task</td></tr>
                                        <?php } ?>
                                    </tbody>  
                                </table>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
