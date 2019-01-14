$jq(document).ready(function () {

    $jq("#page-content").parent().css("background-image", "url(" + BASE_APP + "assets/images/surFace-img.jpg" + ")");
    $jq("#page-content").parent().addClass("img-surface");

    $jq(".menu-app").click(function () {
        $jq("#page-content").parent().css("background-image", "");
        $jq("#page-content").parent().removeClass("img-surface");
    });

    $jq("#contact").click(function () {
        update("About");
        $jq("#nav-tab :nth-child(1)").removeClass("active");
        $jq("#nav-tab :nth-child(1)").removeClass("show");

        $jq("#nav-tab :nth-child(3)").addClass("active");
        $jq("#nav-tab :nth-child(3)").addClass("show");
        // $jq("#btn-add-img").trigger("click");
    });
    // style="background-image: url('<?php echo base_url(); ?>assets/images/surFace-img.jpg');height: 615px;
});