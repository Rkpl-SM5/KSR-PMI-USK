$jq(document).ready(function () {

    $jq(".btn-donor").on('click', function () {
        // console.log($jq('#form-donor').serialize());
        $jq.ajax({
            type: "POST",
            url: BASE_URL + 'donorDashboard/donor',
            data: $jq('#form-donor').serialize(),
            success: function (data) {
                let values = $jq.parseJSON(data);
                if (values.err == 'ss') {
                    alert(values.klas);
                    $jq(values.klas).focus();
                } else {
                    // alert(values.err);
                    console.log($jq.parseJSON(data));
                    $jq(values.klas).focus();
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});