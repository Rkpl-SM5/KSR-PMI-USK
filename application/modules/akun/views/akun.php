<link href="<?php echo base_url();?>asset/theme/vendor/css/akun.css" rel="stylesheet">

<div class="container-fluid">
                <!-- Start Page Content -->
                <div class="">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-two">
                                    <header>
                                         <form class="form-horizontal" id="submit" style="display:none">
                                              <div class="form-group">
                                                  <input id=newFotoUser type="file" name="file" onchange="upload(this)">
                                                  <button class="btn btn-success" id="btn_upload" type="submit"></button>
                                              </div>
                                         </form>
                                        <div class="avatar">
                                            <img id="fotoUser" src="<?php echo base_url()."asset/images/".$resultF->id_foto ?>" alt="Allison Walker">
                                            <div id=divOverlay class="overlay">
                                            <a class="icon" title="User Profile">
                                              <i class="fa fa-camera"></i>
                                            </a>
                                          </div>
                                        </div>
                                    </header>

                                    <h3><?php echo $result->nama; ?></h3>
                                    <div class="desc">
                                         <?php echo $resultA->bio ?>
                                    </div>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" aria-selected="true">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                                <!--second tab-->
                                <div class="tab-pane active show" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $result->nama; ?></p>
                                            </div>

                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $result->email; ?></p>
                                            </div>

                                        </div>
                                        <hr>
                                        <p class="m-t-30">
                                             <?php echo $resultA->profile; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form id=profileUser class="form-horizontal form-material">
                                            <div class="form-group">
                                                <label class="col-md-12">Full Name</label>
                                                <div class="col-md-12">
                                                    <input name="nama" placeholder="<?php echo $result->nama; ?>" class="form-control form-control-line" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input name="email" placeholder="<?php echo $result->email; ?>" class="form-control form-control-line" type="email" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input name="password" value="<?php echo $result->password; ?>" class="form-control form-control-line" type="password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Profile</label>
                                                <div class="col-md-12">
                                                    <textarea name="profile" rows="5" class="form-control form-control-line"><?php echo $resultA->profile;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Bio</label>
                                                <div class="col-md-12">
                                                    <textarea name="bio" rows="5" class="form-control form-control-line"><?php echo $resultA->bio;?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button id=updateProfile type="button" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- End PAge Content -->
            </div>
            <script type="text/javascript">
            <?php
                 include APPPATH ."modules/akun/ajax/akun.js";
            ?>
            </script>
