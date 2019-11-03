<body class="">
  <div class="wrapper ">
    <<!-- Top NavBar -->
		<? $this->load->view('navigation/sidebar');?>
		<!-- End of NavBar -->

		<div class="main-panel">

		<!-- Navbar -->
		<? $this->load->view('navigation/topbar');?>
    <!-- End Navbar -->

      <div class="content">
        <div class="container-fluid">
          <div class="row col-md-12">

          <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true">
              Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false">
              Add new
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false">
              options
                </a>
            </li>
        </ul>
        <div class="tab-content tab-space w-100">

            <div class="tab-pane active" id="link1" aria-expanded="true">

              <div class="card mt-5">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Borrowers List</h4>
                  <p class="card-category">Here is the list of borrowers/clients..</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Account No.</th>
                        <th>Name</th>
                        <th>Contacts</th>
                        <th>Address</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Dakota Rice</td>
                          <td>Niger</td>
                          <td>Oud-Turnhout</td>
                          <td class="text-primary">$36,738</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card mt-5">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Loan Applicants</h4>
                  <p class="card-category">Here is the list of loan applicants..</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Account No.</th>
                        <th>Name</th>
                        <th>Contacts</th>
                        <th>Address</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Dakota Rice</td>
                          <td>Niger</td>
                          <td>Oud-Turnhout</td>
                          <td class="text-primary">$36,738</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      
        </div>   
        
        <div class="tab-pane" id="link2" aria-expanded="false">
        Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
            </div>
            
            <div class="tab-pane" id="link3" aria-expanded="false">
              Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.<br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
            </div>
        
          </div>
      </div>
  </div>
  </div>


      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>

