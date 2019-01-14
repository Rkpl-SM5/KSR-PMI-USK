$jq(document).ready(function () {
    // console.log($jq('#form-login').serialize());

    $jq(".btn-sign").on('click', function () {
        $jq.ajax({
            type: "POST",
            url: BASE_URL + 'SignIn/admin',
            data: $jq('#form-login').serialize(),
            success: function (data) {
                let values = $jq.parseJSON(data);
                if (values.err == 'ss') {
                    window.open(BASE_URL + 'dashboard', "_self");
                } else {
                    alert(values.err);
                    $jq(values.klas).focus();
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

});