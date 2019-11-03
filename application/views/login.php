<body style="background-color:#eeeeee;">
    <div class="contiainer-fluid ">
        <div class="content login-div">
            <form action="" method="POST">
                <div class="card">
                    <div class="card-header card-header-text card-header-primary text-center">
                        <div class="card-text w-50">
                            <h3 class="card-title font-weight-bold">Log in</h3>
                        </div>
                    </div>
                    <div class="card-body mt-4">
                            <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons text-primary usr-error-icon">face</i>
                                </span>
                                </div>
                                <input type="text" name="username" class="form-control username" required='true' placeholder="Please Enter Username..">
                            </div> 
                        </div>

                        <div class="form-group mt-4">  
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons text-primary psw-error-icon">lock_outline</i>
                                </span>
                                </div>
                                <input type="password" name="password" id="registerPassword" class="form-control password" required='true' placeholder="Please Enter Password..">                            </div>
                        </div>
                        <div class="form-check mt-3 remember-me ">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Remember me?
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                            <button class="btn btn-primary ml-3 mt-4 d-block login-submit">Submit</button>
                            <label class="ml-3 mt-3 forgot-password text-muted">Forgot password?<a href="<? echo base_url();?>forgot-password">Recover here</a></p>
                        </div>
                        
                </div>
            </div>
            </form>
        </div>
    </div>