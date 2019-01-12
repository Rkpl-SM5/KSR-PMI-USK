<link href="<?php echo base_url(); ?>assets/theme/css/modules/galleryDashboard.css" rel="stylesheet">
<script type="text/javascript">
    <?php
    include APPPATH . "modules/galleryDashboard/ajax/zscipts.js";
    ?>
</script>

<div class="row">
    <div class="col-lg-8 centered-content">
        <div class="card">
            <div class="card-header">
                <strong>Masked Input</strong> <small> Small Text Mask</small>
            </div>
            <div class="card-body card-block">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control input-center" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control input-center" placeholder="Lable">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control input-center" placeholder="Location">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control input-center" placeholder="Date">
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
                            <input id="btn-add-img" type="file" name="file" style="display:none" multiple>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>