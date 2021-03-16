<ul class="nav nav-pills nav-pills-primary" role="tablist">
    <?php $site = $_SERVER['PATH_INFO'];?>
    <?php if($this->session->userdata('usertype') == 'Guest') {?>
        <li class="nav-item">
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<?php echo base_url();?>loan/create-loan"><i class="material-icons">add_box</i> Create New Loan</a>
        </li>
    <?php }else{ ?>
        <li class="nav-item">
            <?php if(strpos($site, 'loan/create-loan')){ ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<?php echo base_url();?>loan/create-loan"><i class="material-icons">add_box</i> Create New Loan</a>
            <?php }else{ ?> 
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<?php echo base_url();?>loan/create-loan"><i class="material-icons">add_box</i> Create New Loan</a> 
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if(strpos($site, 'loan/new-loans')){ ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of New Loans" href="<?php echo base_url();?>loan/new-loans"><i class="material-icons">monetization_on</i> New Loans</a>
            <?php }else{?>
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of New Loans" href="<?php echo base_url();?>loan/new-loans"><i class="material-icons">monetization_on</i> New Loans</a>
            <?php } ?>
        </li>
        <li class="nav-item">  
            <?php if(strpos($site, 'loan/rejected-loans')){ ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of Rejected Loans" href="<?php echo base_url();?>loan/rejected-loans"><i class="material-icons">warning</i> Rejected Loans</a>
            <?php }else{ ?>
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of Rejected Loans" href="<?php echo base_url();?>loan/rejected-loans"><i class="material-icons">warning</i> Rejected Loans</a>
            <?php } ?>
        </li>
        <li class="nav-item">
            <?php if(strpos($site, 'loan/approved-loans')){ ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of Approved Loans" href="<?php echo base_url();?>loan/approved-loans"><i class="material-icons">verified_user</i> Approved Loans</a>
            <?php }else{?> 
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of Approved Loans" href="<?php echo base_url();?>loan/approved-loans"><i class="material-icons">verified_user</i> Approved Loans</a>
            <?php } ?>
        </li>
         <li class="nav-item">
            <?php if(strpos($site, 'loan/paid-loans')){ ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of Paid Loans" href="<?php echo base_url();?>loan/paid-loans"><i class="material-icons">check</i> Paid Loans</a>
            <?php }else{?> 
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of Paid Loans" href="<?php echo base_url();?>loan/paid-loans"><i class="material-icons">check</i> Paid Loans</a>
            <?php } ?>
        </li>
    <?php } ?>
</ul>