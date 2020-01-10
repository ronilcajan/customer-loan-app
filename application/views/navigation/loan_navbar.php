<ul class="nav nav-pills nav-pills-primary" role="tablist">
    <? $site = $_SERVER['PATH_INFO'];?>
    <li class="nav-item">
        <? if(strpos($site, 'loan/create-loan')){ ?>
        <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<? echo base_url();?>loan/create-loan">Create New Loan</a>
        <?}else{?> 
        <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Create Loan Here" href="<? echo base_url();?>loan/create-loan">Create New Loan</a> 
        <? } ?>
    </li>
    <li class="nav-item">
        <? if(strpos($site, 'loan/new-loans')){ ?>
        <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of New Loans" href="<? echo base_url();?>loan/new-loans">New Loans</a>
        <? }else{?>
        <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of New Loans" href="<? echo base_url();?>loan/new-loans">New Loans</a>
        <? } ?>
    </li>
    <li class="nav-item">
        <? if(strpos($site, 'loan/approved-loans')){ ?>
        <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of Approved Loans" href="<? echo base_url();?>loan/approved-loans">Approved Loans</a>
        <? }else{?> 
        <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of Approved Loans" href="<? echo base_url();?>loan/approved-loans">Approved Loans</a>
        <? } ?>
    </li>
    <li class="nav-item">  
        <? if(strpos($site, 'loan/rejected-loans')){ ?>
        <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="List of Rejected Loans" href="<? echo base_url();?>loan/rejected-loans">Rejected Loans</a>
        <? }else{ ?>
        <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="List of Rejected Loans" href="<? echo base_url();?>loan/rejected-loans">Rejected Loans</a>
        <? } ?>
    </li>
</ul>