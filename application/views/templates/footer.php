
    <div class="modal fade" id="change_pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold text-primary" >Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="change_pass_form">
                    <div class="col-md-12">
                        <div class="form-group mt-4">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" class="form-control pl-3 username" value="<?php echo $this->session->userdata('username');?>" name="username" readonly>
                        </div>
                        <div class="form-group mt-4">
                            <label class="bmd-label-floating">Enter New Password</label>
                            <input type="password" name="new_pass" class="form-control pl-3 new_pass">
                        </div>
                        <div class="form-group mt-4">
                            <label class="bmd-label-floating">Confirm Password</label>
                            <input type="password" name="conf_pass" class="form-control pl-3 conf_pass">
                        </div>
                    </div>
                    </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-round btn-sm" data-dismiss="modal"><i class="material-icons">cancel</i> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-round btn-sm change_pass">
                      <i class="material-icons">check_circle</i> Save
                    </button>
                </div>
            </div>
        </div>
    </div>

<div>
    <!--   Core JS Files   -->
       
    <script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="<?php echo base_url();?>assets/js/plugins/moment.min.js"></script>

    <script src="<?php echo base_url();?>assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/range_dates.js"></script>

    <?php $site = $_SERVER['REQUEST_URI'];?>
    <?php $site1 = 'reports';?>
    <?if(strpos($site, $site1)){?>
    <script src="<?php echo base_url();?>assets/js/plugins/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/buttons.flash.min.js"></script>
    <?php } ?>
    <script src="<?php echo base_url();?>assets/js/core/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="<?php echo base_url();?>assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
    <!-- Chartist JS -->
    <script src="<?php echo base_url();?>assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url();?>assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?php echo base_url();?>assets/js/material-dashboard.js?v=2.1.1"></script>

    <!-- my ajax here -->
    <script type="text/javascript"> 
        var BASE_URL = "<?php echo base_url();?>";
    </script>
    <script src="<?php echo base_url();?>assets/js/myscript.js"></script>
    <script src="<?php echo base_url();?>assets/js/myajax.js"></script>
    <script src="<?php echo base_url();?>assets/js/myajax2.js"></script>
    <script src="<?php echo base_url();?>assets/js/staff.js"></script>
    <script>
        $(document).ready(function() {
        $().ready(function() {
            $sidebar = $('.sidebar');

            $sidebar_img_container = $sidebar.find('.sidebar-background');

            $full_page = $('.full-page');

            $sidebar_responsive = $('body > .navbar-collapse');

            window_width = $(window).width();

            fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

            if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
            if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                $('.fixed-plugin .dropdown').addClass('open');
            }

            }

            $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
                if (event.stopPropagation) {
                event.stopPropagation();
                } else if (window.event) {
                window.event.cancelBubble = true;
                }
            }
            });

            $('.fixed-plugin .active-color span').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('color');

            if ($sidebar.length != 0) {
                $sidebar.attr('data-color', new_color);
            }

            if ($full_page.length != 0) {
                $full_page.attr('filter-color', new_color);
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.attr('data-color', new_color);
            }
            });

            $('.fixed-plugin .background-color .badge').click(function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');

            var new_color = $(this).data('background-color');

            if ($sidebar.length != 0) {
                $sidebar.attr('data-background-color', new_color);
            }
            });

            $('.fixed-plugin .img-holder').click(function() {
            $full_page_background = $('.full-page-background');

            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');


            var new_image = $(this).find("img").attr('src');

            if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                $sidebar_img_container.fadeOut('fast', function() {
                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $sidebar_img_container.fadeIn('fast');
                });
            }

            if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $full_page_background.fadeOut('fast', function() {
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                $full_page_background.fadeIn('fast');
                });
            }

            if ($('.switch-sidebar-image input:checked').length == 0) {
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
            }

            if ($sidebar_responsive.length != 0) {
                $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
            }
            });

            $('.switch-sidebar-image input').change(function() {
            $full_page_background = $('.full-page-background');

            $input = $(this);

            if ($input.is(':checked')) {
                if ($sidebar_img_container.length != 0) {
                $sidebar_img_container.fadeIn('fast');
                $sidebar.attr('data-image', '#');
                }

                if ($full_page_background.length != 0) {
                $full_page_background.fadeIn('fast');
                $full_page.attr('data-image', '#');
                }

                background_image = true;
            } else {
                if ($sidebar_img_container.length != 0) {
                $sidebar.removeAttr('data-image');
                $sidebar_img_container.fadeOut('fast');
                }

                if ($full_page_background.length != 0) {
                $full_page.removeAttr('data-image', '#');
                $full_page_background.fadeOut('fast');
                }

                background_image = false;
            }
            });

            $('.switch-sidebar-mini input').change(function() {
            $body = $('body');

            $input = $(this);

            if (md.misc.sidebar_mini_active == true) {
                $('body').removeClass('sidebar-mini');
                md.misc.sidebar_mini_active = false;

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            } else {

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                setTimeout(function() {
                $('body').addClass('sidebar-mini');

                md.misc.sidebar_mini_active = true;
                }, 300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function() {
                window.dispatchEvent(new Event('resize'));
            }, 180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function() {
                clearInterval(simulateWindowResize);
            }, 1000);

            });
        });
        });
    </script>
    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

        });
    </script>
</div>
</body>