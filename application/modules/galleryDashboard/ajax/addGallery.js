$jq(".add-confirm").click(function () {
    var x = $jq('#gallery-form');
    var input = $jq(x).find(':input')
    var arr = [].slice.call(input);
    var dataForm = Array();
    var dataFile = Array();

    var idGallery;
    for (let i = 0; i < arr.length - 1; i++) {
        dataForm.push($jq(arr[i]).val());
    }

    for (let i = 0; i < arr[arr.length - 1].files.length; i++) {
        dataFile.push($jq(arr[arr.length - 1].files[i]));

    }
    // console.log(dataForm);
    // alert(dataForm);

    $jq.ajax({
        type: "POST",
        url: BASE_URL + 'galleryDashboard/addNewGallery/',
        data: {
            data: dataForm
        },
        dataType: "json",
        success: function (data) {
            dataFile.forEach(function (file) {
                sendImg(file, data.id);
            });
            update("galleryDashboard/");
        },
        error: function (data) {
            alert("add new gallery err ");
        }
    });
});


function sendImg(file, id) {
    let data = new FormData();
    data.set('file', file[0]);
    // console.log(data.getAll('file'));

    $jq.ajax({
        type: 'post',
        url: BASE_URL + 'galleryDashboard/uploadImage/' + id,
        data: data,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            // location.reload();
        },
        error: function (data) {
            console.log(data);
        }

    });
    // console.log(file);
}