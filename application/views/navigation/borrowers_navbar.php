<ul class="nav nav-pills nav-pills-primary">
        <?php $site = $_SERVER['PATH_INFO'];?>

        <?php if($this->session->userdata('usertype') == 'Guest') {?>
            <li class="nav-item">
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create borrowers profile" href="<?php echo base_url();?>borrowers/create-borrowers"><i class="material-icons">add_box</i> Create Borrowers</a>
            </li>
        <?php }else{ ?>
            <?php if(strpos($site, 'borrowers/create-borrowers')){ ?>
                <li class="nav-item">
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create borrowers profile" href="<?php echo base_url();?>borrowers/create-borrowers"><i class="material-icons">add_box</i> Create Borrowers</a>
            <?php }else{ ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Create borrowers profile" href="<?php echo base_url();?>borrowers/create-borrowers"><i class="material-icons">add_box</i> Create Borrowers</a>
            <?php } ?>
            </li>
            <li class="nav-item">
            <?php if(strpos($site, 'borrowers/new-borrowers')){ ?>
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of all new borrowers" href="<?php echo base_url();?>borrowers/new-borrowers"><i class="material-icons">group</i> New Borrowers</a>
            <?}else{?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of all new borrowers" href="<?php echo base_url();?>borrowers/new-borrowers"><i class="material-icons">group</i> New Borrowers</a>
            <?php } ?>
            </li>
            <li class="nav-item">
            <?php if(strpos($site, 'borrowers/active-borrowers')){ ?>   
                <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Active borrowers loan" href="<?php echo base_url();?>borrowers/active-borrowers"><i class="material-icons">verified_user</i> Active Borrowers</a>
            <?php }else { ?>
                <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Active borrowers loan" href="<?php echo base_url();?>borrowers/active-borrowers"><i class="material-icons">verified_user</i> Active Borrowers</a>
            <?php } ?>
        </li>
    <?php } ?>
</ul>