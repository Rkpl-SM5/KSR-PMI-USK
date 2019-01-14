function show(x) {
    $jq.ajax({
        type: "POST",
        url: BASE_URL + "Activities/show/" + x,
        dataType: "json",
        success: function (data) {
            $jq("#page-content").html(data);
            //navText(data.nav);
        },
        error: function (data) {
            alert(JSON.stringify(data));
        }
    });
}