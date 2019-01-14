<script type="text/javascript">
    <?php
    include APPPATH . "modules/Activities/ajax/activities.js";
    ?>
</script>
<div class="row">

    <?php
    $content = "";

    foreach ($data as $row) {
        $content .= '<div class="container">
        <div class="col-md-8 centered-content">
        <div class="card">
        <div class="card-body zeroPadding">
        <div class="mx-auto d-block" onclick="show(' . $row->ID_ACTIVITIES . ')">
        <div class="media">
        <div class="media-body img-gallery">
        <h2 class="text-dark display-6">' . $row->TITLE . '</h2>';

        $content .= '<p>' . substr($row->CONTENT, 0, 210) . '  ....</p>';
        $content .= '</div>';
        $content .= '<div class="align-right mr-3 img-container" style="width: 40%;background-position: right;height: 180px;background-image: url(' . base_url() . 'Data/images/' . $row->ID_IMAGE . ')">
                    </div>';
        $content .= '
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>';

    }
    echo $content;
    ?>
</div>