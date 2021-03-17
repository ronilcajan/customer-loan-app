<body class="">
<?php $this->load->view('loading_screen');?>
	<div class="wrapper ">

		<!-- Top NavBar -->
		<?php $this->load->view('navigation/sidebar');?>
		<!-- End of NavBar -->

		<div class="main-panel">

		<!-- Navbar -->
		<?php $this->load->view('navigation/topbar');?>
        <!-- End Navbar -->

        <div class="content">
            <div class="container-fluid">
                    <?php if(empty($staff)){?>
                        <div class="row"> 
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Edit Profile</h4>
                                        <p class="card-category">Complete your profile</p>
                                    </div>
                                    <div class="card-body">

                                        
                                        <form method="POST" id="create_staff">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Company</label>
                                                        <input type="text" class="form-control" value="RFS Corporation" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Email address</label>
                                                        <input type="email" name="email" class="form-control email">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Contact Number</label>
                                                        <input type="number" name="num" class="form-control num">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Fist Name</label>
                                                        <input type="text" name="fname" class="form-control fname">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Middle Name</label>
                                                        <input type="text" name="mname" class="form-control mname">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Last Name</label>
                                                        <input type="text" name="lname" class="form-control lname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Address</label>
                                                        <input type="text" name="address" class="form-control address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">City</label>
                                                        <input type="text" name="city" class="form-control city">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                      <label class="bmd-label-floating">Country</label>
                                                      <input type="text" name="country" value="Philippines" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Postal Code</label>
                                                        <input type="number" name="postal" class="form-control postal">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Position</label>
                                                        <input type="text" name="position" value="<?php echo $this->session->userdata('usertype');?>" class="form-control text-center" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>About Me</label>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"> Write something about yourself.</label>
                                                            <textarea class="form-control" rows="5" name="bio"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button id="btn_create_staff" class="btn btn-primary pull-right btn-sm btn-round"><i class="material-icons">check_circle</i> Save</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <div class="card-avatar">
                                            <img class="img" src="<?php echo base_url();?>assets/images/person.png" />
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-gray"><?php echo $this->session->userdata('usertype');?></h6>
                                        <h4 class="card-title">Your name</h4>
                                        <p class="card-description">
                                             Your bio...
                                        </p>
                                      <!--  <button class="btn btn-primary btn-round btn-sm">Select Profile Picture</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php }else{ ?>
                            <div class="row"> 
                                <div class="col-md-8">
                                    <button class="btn btn-primary btn-round btn-sm" data-target="#my_task" data-toggle="modal"><i class="material-icons">add_circle</i> Add Task</button>
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">My Task</h4>
                                            <p class="card-category">You can add task or reminder</p>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tbody>
                                                    <?php if(!empty($task)){?>
                                                    <?php foreach ($task as $key => $mytask) {?>
                                                    <tr class="task<?php echo $mytask['task_id'];?>">
                                                        <td><?php echo $mytask['description'];?>
                                                        </td>
                                                        <td><?php echo $mytask['status'];?></td>
                                                        <?php if($mytask['status'] == "Doned"){?>
                                                             <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id'];?>">
                                                            <i class="material-icons">close</i>
                                                            </button></td>
                                                        <?php }else{?>
                                                        <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Done Task" class="btn btn-success btn-link btn-sm done_task" id="<?php echo $mytask['task_id'];?>">
                                                            <i class="material-icons">done_all</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm edit_task" id="<?php echo $mytask['task_id'];?>">
                                                            <i class="material-icons">edit</i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id'];?>">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr class="cancel_task<?php echo $mytask['task_id'];?>" style="display: none;">
                                                        <form id="edit_task" method="POST">
                                                            <td>
                                                                <input class="form-control task_des<?php echo $mytask['task_id'];?>" type="text" name="description" value="<?php echo $mytask['description'];?>">
                                                            </td>
                                                            <td><?php echo $mytask['status'];?></td>
                                                            <td class="td-actions text-right">
                                                                <button rel="tooltip" title="Update Task" class="btn btn-success btn-link btn-sm update_task" id="<?php echo $mytask['task_id'];?>">
                                                                    <i class="material-icons">done</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" title="Cancel Update" class="btn btn-danger btn-link btn-sm cancel_task" id="<?php echo $mytask['task_id'];?>">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                        </td>
                                                            </td>
                                                        </form>
                                                    </tr>
                                                    <?php }}else{?>
                                                        <tr><td class="text-center">No created task</td></tr>
                                                    <?php } ?>
                                                </tbody>  
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card card-profile">
                                        <div class="card-avatar" style="height: 150px">
                                            <?php if(empty($staff['profile_img'])){?>
                                                <img class="img" src="<?php echo base_url();?>assets/images/person.png" />
                                            <?}else{?>
                                                <img class="img"  style="height:130px" src="<?php echo base_url().'uploads/'.$staff['profile_img'];?>" />
                                            <?php } ?>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-category text-gray"><?php echo $staff['user_type'];?></h6>
                                            <h4 class="card-title"><?php echo $staff['firstname'];?> <?php echo $staff['middlename'];?><?php echo $staff['lastname'];?></h4>
                                            <p class="card-description">
                                                <?php echo $staff['bio'];?>
                                            </p>
                                            <table class="w-100">
                                                <tr class="text-left">
                                                    <td class="font-weight-bold">Email Address:</td>
                                                    <td><?php echo $staff['email'];?> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td class="font-weight-bold">Contact Number</td>
                                                    <td><?php echo $staff['number'];?> </td>
                                                </tr>
                                                <tr class="text-left">
                                                    <td class="font-weight-bold">Address</td>
                                                    <td><?php echo $staff['address'];?> </td>
                                                </tr>
                                            </table>
                                            <?php if($this->session->userdata('username') == $staff['user']){?>
                                            <button class="btn btn-primary btn-sm btn-round mt-4 pl-2 pr-3" data-target="#edit_my_profile" data-toggle="modal"><i class="material-icons">edit</i> Update</button>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>

                    </div>
                </div>
                    <!-- Modal for task-->
                    <div class="modal fade" id="my_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold text-primary" >Create Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="task_form" method="POST">
                                         <div class="row mt-1">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-primary">Create Your Task</label>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Write something about your task.. </label>
                                                        <textarea class="form-control" name="task" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i> Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-round" id="my_task_btn">
                                      <i class="material-icons">check_circle</i> Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                               <!-- Modal for edit profile-->
                        <div class="modal fade" id="edit_my_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold text-primary" >Update Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="update_my_form" enctype="mutlipart/form-data" method="POST">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <div class="form-group form-file-upload form-file-multiple ">
                                                            <input type="file" accept="image/*" onchange="loadFile(event)" name="img" class="inputFileHidden"s required>
                                                            <div class="fileinput-new thumbnail img-raised text-center">
                                                                <?php if(empty($staff['profile_img'])){?>
                                                                    <img class="img-fluid" src="<?php echo base_url();?>assets/images/person.png"  width="200" height="200" id="output"/>
                                                                <?php }else{ ?>
                                                                    <img class="img-fluid" src="<?php echo base_url().'uploads/'.$staff['profile_img'];?>" id="output"/>
                                                                <?php } ?> 
                                                            </div>
                                                            <div class="input-group mt-2">
                                                                <span class="input-group-btn">
                                                                    <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                        <i class="material-icons">attach_file</i>
                                                                    </button>
                                                                </span>
                                                                <input type="text" class="form-control inputFileVisible" placeholder="Choose client picture..">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">First Name</label>
                                                                <input type="text" class="form-control" name="fname" value="<?= !empty($staff['firstname']) ? $staff['firstname'] : null; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Middle Name</label>
                                                                <input type="text" class="form-control" name=
                                                                "mname" value="<?= !empty($staff['middlename']) ? $staff['middlename'] : null; ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Last Name</label>
                                                                <input type="text" class="form-control" name="lname" value="<?= !empty($staff['lastname']) ? $staff['lastname'] : null; ?>"  required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Contact Number</label>
                                                                <input type="number" class="form-control" name="num" value="<?= !empty($staff['number']) ? $staff['number'] : null; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Email Address</label>
                                                                <input type="email" class="form-control" name=
                                                                "email" value="<?= !empty($staff['email']) ? $staff['email'] : null; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Address</label>
                                                                <input type="text" class="form-control" name="address" value="<?= !empty($staff['address']) ? $staff['address'] : null; ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="row mt-1">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Additional Info(Optional)</label>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Write something about your self.. </label>
                                                            <textarea class="form-control" name="bio" rows="5"><?= !empty($staff['bio']) ? $staff['bio'] : null; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i> Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-round" id="update_my_profile">
                                          <i class="material-icons">check_circle</i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of modal -->
                            </div>
                        </div>

            </div>
        </div>
    </div>
    <?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
