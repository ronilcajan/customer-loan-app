<ul class="nav nav-pills nav-pills-primary" role="tablist">
    <? $site = $_SERVER['PATH_INFO'];?>
    <? if($this->session->userdata('usertype') == 'Guest') {?>
        <li class="nav-item">
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<? echo base_url();?>loan/create-loan"><i class="material-icons">add_box</i> Create New Loan</a>
        </li>
    <? }else{ ?>
        <li class="nav-item">
            <? if(strpos($site, 'loan/create-loan')){ ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<? echo base_url();?>loan/create-loan"><i class="material-icons">add_box</i> Create New Loan</a>
            <?}else{?> 
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<? echo base_url();?>loan/create-loan"><i class="material-icons">add_box</i> Create New Loan</a> 
            <? } ?>
        </li>
        <li class="nav-item">
            <? if(strpos($site, 'loan/new-loans')){ ?>
            <a class="btn btn-info btn-round btn-sm" rel="tooltip" title="List of New Loans" href="<? echo base_url();?>loan/new-loans"><i class="material-icons">monetization_on</i> New Loans</a>
            <? }else{?>
            <a class="btn btn-outline-info btn-round btn-sm" rel="tooltip" title="List of New Loans" href="<? echo base_url();?>loan/new-loans"><i class="material-icons">monetization_on</i> New Loans</a>
            <? } ?>
        </li>
        <li class="nav-item">  
            <? if(strpos($site, 'loan/rejected-loans')){ ?>
            <a class="btn btn-warning btn-round btn-sm" rel="tooltip" title="List of Rejected Loans" href="<? echo base_url();?>loan/rejected-loans"><i class="material-icons">warning</i> Rejected Loans</a>
            <? }else{ ?>
            <a class="btn btn-outline-warning btn-round btn-sm" rel="tooltip" title="List of Rejected Loans" href="<? echo base_url();?>loan/rejected-loans"><i class="material-icons">warning</i> Rejected Loans</a>
            <? } ?>
        </li>
        <li class="nav-item">
            <? if(strpos($site, 'loan/approved-loans')){ ?>
            <a class="btn btn-success btn-round btn-sm" rel="tooltip" title="List of Approved Loans" href="<? echo base_url();?>loan/approved-loans"><i class="material-icons">verified_user</i> Approved Loans</a>
            <? }else{?> 
            <a class="btn btn-outline-success btn-round btn-sm" rel="tooltip" title="List of Approved Loans" href="<? echo base_url();?>loan/approved-loans"><i class="material-icons">verified_user</i> Approved Loans</a>
            <? } ?>
        </li>
    <? } ?>
</ul>