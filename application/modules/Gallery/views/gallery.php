<link href="<?php echo base_url(); ?>assets/theme/css/modules/galleryDashboard.css" rel="stylesheet">
<script type="text/javascript">
    <?php
    include APPPATH . "modules/galleryDashboard/ajax/zscipts.js";
    ?>
</script>

<div id="content-gallery" class="row">
    <?php 
    $content = "";

    foreach ($data as $row) {
        $content .= '<div id="' . $row->ID_GALLERY . '" class="col-sm-6 col-lg-4 centered-content">';
        $content .= '<div class="img-gallery card text-black ">';
        $content .= '<div class="card-body text-center img-container fade-img" style="background-image: url('.base_url().'Data/images/' . $row->ID_IMAGE . ')">';
        $content .= '</div>';
        $content .= '<div class="card-footer">';
        $content .= '<strong class="card-title mb-3">' . $row->TITLE . '</strong>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';
    }
    echo $content;

    ?>
</div>

<script type="text/javascript">
    <?php
    include APPPATH . "modules/galleryDashboard/ajax/initGallery.js";
    ?>
</script>