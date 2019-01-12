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
    num++;
});

$jq("#btn-add-img").on("change", function (event) {
    var files = event.target.files;
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
    var temp = "";
    for (let i = 0; i < files.length; i++) {
        if (/^image/.test(files[i].type)) {
            // only image file
            // temp += "ss";
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[i]); // read the local file
            reader.onloadend = function () {
                // set image data as background of div
                //     createThumbnail(num, this.result);
                temp += " ff " + this.result;
            };
        }
    }
    console.log(JSON.stringify(temp));
});

function getAllValues() {
    var allVal;
    $jq("#image-add :input").each(function () {
        allVal += "&" + $jq(this).attr("name") + "=" + $jq(this).val();
    });
    alert(allVal);
}

function createThumbnail(id, src) {
    let values = "";
    let pos = "#img" + id;

    values += "<div id=img" + id + ' class="col-sm-6 col-lg-4 centered-content" style="display:none">';
    values += '<div class="img-add card text-black">';
    values += '<div class="card-body text-center img-container">';
    // values += '<h1>foto</h1>';
    // values += '<div id=tes></div>';

    values += '<input type="file" name="file" style="display:none">';
    values += "</div>";
    values += "</div>";
    values += "</div>";

    $jq("#image-add").prepend(values);
    $jq(pos + " .card-body").css("background-image", "url(" + src + ")");
    $jq(pos).change(function (e) {
        $jq(pos).show();
    });
}


function tes() {
    alert(3);
}

$jq(document).ready(function ($) {
    tes();
});