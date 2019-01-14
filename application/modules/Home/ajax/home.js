$jq(document).ready(function () {

    $jq("#page-content").parent().css("background-image", "url(" + BASE_APP + "assets/images/surFace-img.jpg" + ")");
    $jq("#page-content").parent().addClass("img-surface");

    $jq(".menu-app").click(function () {
        $jq("#page-content").parent().css("background-image", "");
        $jq("#page-content").parent().removeClass("img-surface");
    });

    // style="background-image: url('<?php echo base_url(); ?>assets/images/surFace-img.jpg');height: 615px;
});