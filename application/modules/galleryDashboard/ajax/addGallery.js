$jq(".add-confirm").click(function () {
    $jq.ajax({
        type: "POST",
        url: BASE_URL + 'galleryDashboard/addNewGallery',
        data: $jq('#gallery-form').serialize(),
        dataType: "json",
        success: function (data) {
            alert(data);
        },
        error: function (data) {
            alert("add new gallery err " + data);
        }
    });
});