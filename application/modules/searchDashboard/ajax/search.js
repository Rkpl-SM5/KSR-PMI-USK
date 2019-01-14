$jq(document).ready(function () {

    $jq(".btn-search").on('click', function () {
        $jq.ajax({
            type: "POST",
            url: BASE_URL + 'searchDashboard/search/',
            data: $jq('#form-search').serialize(),
            dataType: "json",
            success: function (data) {

                $jq("#page-content").html(data.page);
                // $jq("#nav-text").html(navText(data.nav, data.val));
            },
            error: function (data) {

            }
        });
    });

    $jq(".add-search").on('click', function () {
        $jq('#form-search').append(generateSeacrhInput());
    });
});


function generateSeacrhInput() {


    return value;
}