<ul class="nav nav-pills nav-pills-primary">
    <li class="nav-item">
        <? $site = $_SERVER['PATH_INFO'];?>
        <? if(strpos($site, 'borrowers/create-borrowers')){ ?>
            <a class="btn btn-primary btn-round btn-sm" rel="tooltip" title="Create borrowers profile" href="<? echo base_url();?>borrowers/create-borrowers"><i class="material-icons">add_box</i> Create Borrowers</a>
        <? }else{ ?>
            <a class="btn btn-outline-primary btn-round btn-sm" rel="tooltip" title="Create borrowers profile" href="<? echo base_url();?>borrowers/create-borrowers"><i class="material-icons">add_box</i> Create Borrowers</a>
        <? } ?>
        </li>
        <li class="nav-item">
        <? if(strpos($site, 'borrowers/new-borrowers')){ ?>
            <a class="btn btn-info btn-round btn-sm" rel="tooltip" title="List of all new borrowers" href="<? echo base_url();?>borrowers/new-borrowers"><i class="material-icons">group</i> New Borrowers</a>
        <?}else{?>
            <a class="btn btn-outline-info btn-round btn-sm" rel="tooltip" title="List of all new borrowers" href="<? echo base_url();?>borrowers/new-borrowers"><i class="material-icons">group</i> New Borrowers</a>
        <? } ?>
        </li>
        <li class="nav-item">
        <? if(strpos($site, 'borrowers/active-borrowers')){ ?>   
            <a class="btn btn-success btn-round btn-sm" rel="tooltip" title="Active borrowers loan" href="<? echo base_url();?>borrowers/active-borrowers"><i class="material-icons">verified_user</i> Active Borrowers</a>
        <? }else { ?>
            <a class="btn btn-outline-success btn-round btn-sm" rel="tooltip" title="Active borrowers loan" href="<? echo base_url();?>borrowers/active-borrowers"><i class="material-icons">verified_user</i> Active Borrowers</a>
        <? } ?>
        </li>
</ul>