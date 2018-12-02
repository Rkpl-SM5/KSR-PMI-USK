/* array navTextVal akan menampung
        nama controller
        nama funtion
        pada class nav-text html
*/
var navTextVal=new Array();

$jq(document).ready(function($) {

    //set landing dashboard di menu search
    update("searchDashboard");

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


/* function untuk melakukan update ketika user melakukan klik pada nav-text
    jika yang diklik adalah menu paling kiri(utama) maka tampilkan
        menu yang dipilih user dari menu utama tersebut

    pada versi ini function hanya akan bekerja untuk 2 sub kategori , ex : Article/Activities
     @param x url untuk update content page dan nav-text
* */
function menuNav(x) {
    //variable untu menampung nama dari controller dan fungsi yang akan dipanggil
    var navVal="";

    for(i=0 ;i <navTextVal.length;i++){
        if($jq(x).data("val").toString()===navTextVal[i].toString()){
            navVal+=navTextVal[i]+"/"+navTextVal[i+1];
            break;
        }
    }
    update(navVal);
}

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
            $jq("#page-content").html(data.page);
            $jq("#nav-text").html(navText(data.nav,data.val));
            //navText(data.nav);
        },
        error: function(data){
            alert(z);
        }
    });
}

/*
* Function untuk membuat nav-text sesuai dengan posisi controller yag dipanggil
* @param x variable nama kategori
* @param y variable nama controller dan function
* @return string html sesuai dengan bentuk template
* */
function navText(x,y) {
    var html="";
    navTextVal=new Array();
    for(i=0 ;i <x.length-1;){
        navTextVal.push(y[i]);
        html+="<li>";
        html+="<a class='menu-nav' onclick='menuNav(this)' data-val="+y[i]+">";
        html+=x[i++];
        html+="</a>";
        html+="</li>";
    }
    navTextVal.push(y[y.length-1]);
    html+='<li class="active">'+x[x.length-1]+'</li>';
    return html;
}
