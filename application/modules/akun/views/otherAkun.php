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
                                        <div class="avatar">
                                            <img id="fotoUser" src="<?php echo base_url()."asset/images/".$resultF->id_foto ?>" alt="Allison Walker">
                                            <div id=divOverlay class="overlay">

                                          </div>
                                        </div>
                                    </header>

                                    <h3><?php echo $result->nama; ?></h3>
                                    <div class="desc">
                                         <?php echo $resultA->bio ?>
                                    </div>
                                    <div class="contacts" style="width:100%">
                                         <div style="text-align:center;width: 100px;height: 50px;margin-left: 424px;">
                                             <a  style="margin-right: 9px;" href=""><i class="fa fa-plus"></i></a>
                                             <a  href=""><i class="fa fa-envelope"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                               <div class="row">
                                    <div class="col-lg-6 col-xs-6 b-r"> <strong>Full Name</strong>
                                       <br>
                                       <p class="text-muted"><?php echo $result->nama; ?></p>
                                    </div>

                                    <div class="col-lg-6 col-xs-6 b-r"> <strong>Email</strong>
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
                    </div>

                </div>

                <!-- End PAge Content -->
            </div>
