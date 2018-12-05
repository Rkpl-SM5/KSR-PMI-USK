$jq(document).ready(function($) {

    //set landing dashboard di menu search
    update("Home");

    /*
    * function untuk action class menu-app
    * class menu-app memiliki attribute data-val untuk setiap controllers dan fungsididalamnya
    * update content-page dan nav-text setiap class menu-app diklik
    * */
    $(".menu-app").click(function(){
        var z = $(this).data("val");
        update(z);
    });
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
    $jq.ajax({
        type: "POST",
        url:BASE_URL+z,
        dataType : "json",
        success: function(data){
            $jq("#page-content").html(data);
            //navText(data.nav);
        },
        error: function(data){
            alert(z);
        }
    });
}
