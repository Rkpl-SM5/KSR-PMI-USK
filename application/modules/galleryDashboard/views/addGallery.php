<link href="<?php echo base_url(); ?>assets/theme/css/modules/galleryDashboard.css" rel="stylesheet">
<script type="text/javascript">
    <?php
    include APPPATH . "modules/galleryDashboard/ajax/zscipts.js";
    include APPPATH . "modules/galleryDashboard/ajax/addGallery.js";
    ?>
</script>

<div class="row">
    <div class="col-lg-8 centered-content">
        <div class="card">
            <div class="card-header">
                <strong>Form Gallery</strong>
            </div>
            <form id="gallery-form">
                <div class="card-body card-block">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control input-center" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control input-center" name="lable" placeholder="Lable">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="date" class="form-control input-center" name="date">
                            <div class="right-content-calender"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="image-add" class="input-group">
                            <!-- add static for add button -->
                            <div class="col-sm-6 col-lg-4 centered-content">
                                <div class="img-add card text-white add-image">
                                    <div class="card-body text-center">
                                        <h1 style="margin: 10% 0 0 0;"><i class="fa fa-photo color-gray icon-app"></i></h1>
                                    </div>
                                </div>
                                <input id="btn-add-img" type="file" name="img-file" style="display:none" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-2 fixed-right middle-content-15">
        <button type="button" class="add-confirm btn btn-outline-primary centered-content vertical circle-100"><i class="ti-plus"></i></button>
        <button type="button" class="cencel-confirm btn btn-outline-danger centered-content vertical circle-100"><i
                class="ti-close"></i></button>
    </div>
</div>