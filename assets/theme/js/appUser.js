var nav = "Home";
var flag = 0;

$jq(document).ready(function ($) {
    if (sessionStorage.getItem("flag")) {
        flag = sessionStorage.getItem("flag");
    }
    //set landing dashboard di menu search
    // update("Home");

    /*
     * function untuk action class menu-app
     * class menu-app memiliki attribute data-val untuk setiap controllers dan fungsididalamnya
     * update content-page dan nav-text setiap class menu-app diklik
     * */
    $(".menu-app").click(function () {
        var z = $(this).data("val");
        update(z);
    });


    if (flag != 0 && performance.navigation.type == 1) {
        // console.log($jq("#pos").data("val"));
        // console.log("ss");
        window.stop();
        nav = sessionStorage.getItem("nav");
        // console.log(nav);
        sessionStorage.setItem("nav", nav);

        update(nav);
    } else {
        flag++;
        sessionStorage.setItem("flag", flag);
        sessionStorage.setItem("nav", nav);

        update(nav);
    }
});


/*
 * Function untuk melakukan update pada content-page dan nav-texr
 * @param z nama controller dan function yang akan dipanggil
 * @return data json
 *   page => halaman html,
 *   nav => nama controller dan function
 *   val => nama kategori
 * */
function update(z) {
    nav = z;
    sessionStorage.setItem("nav", z);
    $jq.ajax({
        type: "POST",
        url: BASE_URL + z,
        dataType: "json",
        success: function (data) {
            $jq("#page-content").html(data);
            //navText(data.nav);
        },
        error: function (data) {
            alert(BASE_URL + z);
        }
    });
}