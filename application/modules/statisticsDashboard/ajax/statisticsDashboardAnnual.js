$jq(document).ready(function () {
    $jq("#input-tahun").val((new Date()).getFullYear());
    createChart($jq("#input-tahun").val());
});

$jq(".btn-stat").click(function () {
    var x = $jq("#input-tahun").val();
    if (parseInt(x)) {
        createChart(x);
    }
});

function createChart(x) {

    $jq.ajax({
        type: "POST",
        url: BASE_URL + 'statisticsDashboard/getAnnualTime/' + x,
        dataType: "json",
        success: function (data) {
            var dataAbs = toArray(data.total);
            var dataMin = toArray(data.min);
            var dataPls = toArray(data.plus);

            new Chart(document.getElementById("bar-chart-grouped"), {
                type: 'bar',
                data: {
                    labels: ["A", "AB", "B", "O"],
                    datasets: [{
                        label: "min(-)",
                        backgroundColor: "red",
                        data: dataMin
                    }, {
                        label: "min(+)",
                        backgroundColor: "blue",
                        data: dataPls
                    }, {
                        label: "total(~)",
                        backgroundColor: "green",
                        data: dataAbs
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Donor (negatif : positive :total)'
                    }
                }
            });
        },
        error: function (data) {
            console.log(data);
        }
    });
}

function toArray(array) {
    var value = Array();
    var data = JSON.parse(JSON.stringify(array));

    value.push(data.A[0]);
    value.push(data.AB[0]);
    value.push(data.B[0]);
    value.push(data.O[0]);

    return value;
}