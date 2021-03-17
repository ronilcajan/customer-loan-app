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