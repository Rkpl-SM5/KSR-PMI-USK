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

    let values = "";
    let pos = "#img" + num;

    values += '<div id=img' + num + ' class="col-sm-6 col-lg-4 centered-content" style="display:none">';
    values += '<div class="img-add card text-black">'
    values += '<div class="card-body text-center img-container">';
    // values += '<h1>foto</h1>';
    // values += '<div id=tes></div>';

    values += '<input type="file" name="file" style="display:none">';
    values += '</div>';
    values += '</div>';
    values += '</div>';

    $jq("#image-add").prepend(values);

    $jq(pos + " input").trigger('click');

    $jq(pos).change(function (e) {
        // console.log("show");
        // $jq("#tes").attr("src", $jq(pos + " input").val());
        $jq(pos).show();
    });

    $jq(pos + " input").on("change", function () {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () { // set image data as background of div
                $jq(pos + " .card-body").css("background-image", "url(" + this.result + ")");
            }
        }
    });
    // if (document.getElementById("img" + num).files.length == 0) {
    //     console.log("no files selected");
    // }
    // getAllValues();
    num++;
});

function getAllValues() {
    var allVal;
    $jq('#image-add :input').each(function () {
        allVal += '&' + $jq(this).attr('name') + '=' + $jq(this).val();
    });
    alert(allVal);

}