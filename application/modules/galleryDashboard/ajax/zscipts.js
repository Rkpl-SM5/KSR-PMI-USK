var data = Array();
var num = 0;

$jq("#add").click(function () {
    $jq.ajax({
        type: "POST",
        url: BASE_URL + "galleryDashboard/add",
        dataType: "json",
        success: function (data) {
            sessionStorage.setItem("nav", nav + "/add");
            $jq("#page-content").html(data.page);
            $jq("#nav-text").html(navText(data.nav, data.val));
        },
        error: function (data) {
            alert(z);
        }
    });
});

$jq("#sort").click(function () {
    alert("sort");
});

$jq(".add-image").click(function () {
    $jq("#btn-add-img").trigger("click");
});

function setFileThumbnail(fileName) {
    let reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(fileName); // read the local file

    reader.onloadend = function () { // set image data as background of div
        // $jq(pos + " .card-body").css("background-image", "url(" + this.result + ")");
        // return this.result;
        createThumbnail(num++, this.result);
    };

}

$jq("#btn-add-img").on("change", function (event) {

    var files = event.target.files;
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
    for (let i = 0; i < files.length; i++) {
        if (/^image/.test(files[i].type)) {
            // createThumbnail(num++, files[i]);
            setFileThumbnail(files[i]);
        };
    }
    // console.log(JSON.stringify(temp));
});

function getAllValues() {
    var allVal = "";
    var x = document.getElementById("image-add").querySelectorAll(".img-container");

    for (var i = 0; i < x.length; i++) {
        allVal += x[i].style.backgroundImage;
        alert(x[i].style.backgroundImage);
    }
}

function createThumbnail(id, src) {
    let values = "";
    let pos = "#img" + id;

    values += "<div id=img" + id + ' class="col-sm-6 col-lg-4 centered-content">';
    values += '<div class="img-add card text-black">';
    values += '<div class="card-body text-center img-container">';
    values += "</div>";
    values += "</div>";
    values += "</div>";

    $jq("#image-add").prepend(values);
    $jq(pos + " .card-body").css("background-image", "url(" + src + ")");

}