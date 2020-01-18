<body class="">
	<div class="wrapper ">

		<!-- Top NavBar -->
		<? $this->load->view('navigation/sidebar');?>
		<!-- End of NavBar -->

		<div class="main-panel">

		<!-- Navbar -->
		<? $this->load->view('navigation/topbar');?>
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
					<h3 class="card-title">49
					</h3>
					</div>
					<div class="card-footer">
					<div class="stats">
						<i class="material-icons">groups</i>
						<a href="#pablo" class="text-warning">Show all..</a>
					</div>
					</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-success card-header-icon">
					<div class="card-icon">
						<i class="material-icons">store</i>
					</div>
					<p class="card-category">Revenue</p>
					<h3 class="card-title">$34,245</h3>
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
					<div class="card-header card-header-danger card-header-icon">
					<div class="card-icon">
						<i class="material-icons">info_outline</i>
					</div>
					<p class="card-category">Fixed Issues</p>
					<h3 class="card-title">75</h3>
					</div>
					<div class="card-footer">
					<div class="stats">
						<i class="material-icons">local_offer</i> Tracked from Github
					</div>
					</div>
				</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header card-header-info card-header-icon">
					<div class="card-icon">
						<i class="fa fa-twitter"></i>
					</div>
					<p class="card-category">Followers</p>
					<h3 class="card-title">+245</h3>
					</div>
					<div class="card-footer">
					<div class="stats">
						<i class="material-icons">update</i> Just Updated
					</div>
					</div>
				</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12">
				<div class="card">
					<div class="card-header card-header-tabs card-header-primary">
					<div class="nav-tabs-navigation">
						<div class="nav-tabs-wrapper">
						<span class="nav-tabs-title">Tasks:</span>
						<ul class="nav nav-tabs" data-tabs="tabs">
							<li class="nav-item">
							<a class="nav-link active" href="#profile" data-toggle="tab">
								<i class="material-icons">bug_report</i> Bugs
								<div class="ripple-container"></div>
							</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="#messages" data-toggle="tab">
								<i class="material-icons">code</i> Website
								<div class="ripple-container"></div>
							</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="#settings" data-toggle="tab">
								<i class="material-icons">cloud</i> Server
								<div class="ripple-container"></div>
							</a>
							</li>
						</ul>
						</div>
					</div>
					</div>
					<div class="card-body">
					<div class="tab-content">
						<div class="tab-pane active" id="profile">
						<table class="table">
							<tbody>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="" checked>
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Sign contract for "What are conference organizers afraid of?"</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
								</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="" checked>
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Create 4 Invisible User Experiences you Never Knew About</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							</tbody>
						</table>
						</div>
						<div class="tab-pane" id="messages">
						<table class="table">
							<tbody>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="" checked>
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
								</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								
								<!-- <td>Sigdsdsdn contract for "What are conference organizers afraid of?"</td> -->
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							</tbody>
						</table>
						</div>
						<div class="tab-pane" id="settings">
						<table class="table">
							<tbody>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="">
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="" checked>
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
								</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							<tr>
								<td>
								<div class="form-check">
									<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="" checked>
									<span class="form-check-sign">
										<span class="check"></span>
									</span>
									</label>
								</div>
								</td>
								<td>Sign contract for "What are conference organizers afraid of?"</td>
								<td class="td-actions text-right">
								<button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
									<i class="material-icons">close</i>
								</button>
								</td>
							</tr>
							</tbody>
						</table>
						</div>
					</div>
					</div>
				</div>
				</div>
				<div class="col-lg-6 col-md-12">
				<div class="card">
					<div class="card-header card-header-warning">
					<h4 class="card-title">Employees Stats</h4>
					<p class="card-category">New employees on 15th September, 2016</p>
					</div>
					<div class="card-body table-responsive">
					<table class="table table-hover">
						<thead class="text-warning">
						<th>ID</th>
						<th>Name</th>
						<th>Salary</th>
						<th>Country</th>
						</thead>
						<tbody>
						<tr>
							<td>1</td>
							<td>Dakota Rice</td>
							<td>$36,738</td>
							<td>Niger</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Minerva Hooper</td>
							<td>$23,789</td>
							<td>Curaçao</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Sage Rodriguez</td>
							<td>$56,142</td>
							<td>Netherlands</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Philip Chaney</td>
							<td>$38,735</td>
							<td>Korea, South</td>
						</tr>
						</tbody>
					</table>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
</div>
