$jq(".img-gallery").click(function () {
    var id = $jq(this).parent().attr('id')
    // alert(z);
    $jq.ajax({
        type: "POST",
        url: BASE_URL + "galleryDashboard/show/" + id,
        dataType: "json",
        success: function (data) {
            sessionStorage.setItem("nav", "galleryDashboard/show/" + id);
            $jq("#page-content").html(data.page);
            $jq("#nav-text").html(navText(data.nav, data.val));
        },
        error: function (data) {
            alert(JSON.stringify(data));
        }
    });
});

function show(x) {
    // alert(xh);
    var y = $jq(x).parent();
    // $jq(y).width(980);
    $jq(y).parent().css("position", "relative");
    $jq(y).parent().removeClass("col-md-4");
    $jq(y).parent().removeClass("image-gallery");
    $jq('.image-gallery').css("display", "none");
    $jq(y).parent().addClass("col-lg-11");
    $jq(y).css("z-index", "10");


    $jq.ajax({
        type: "POST",
        url: BASE_URL + "galleryDashboard/navImage/" + $jq(y).parent().attr("id"),
        dataType: "json",
        success: function (data) {
            // sessionStorage.setItem("nav", nav + "/add");
            // $jq("#page-content").html(data.page);
            sessionStorage.setItem("nav", "galleryDashboard/navImage/" + $jq(y).parent().attr("id"));
            $jq("#nav-text").html(navText(data.nav, data.val));
        },
        error: function (data) {
            alert("galleryDashboard/navImage/" + $jq(y).parent().attr("id"));
        }
    });
    // $jq("#" + y).width(100);
    // console.log(t);
}