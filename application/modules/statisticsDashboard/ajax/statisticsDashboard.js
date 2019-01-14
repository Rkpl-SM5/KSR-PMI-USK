$jq(document).ready(function () {

    $jq.ajax({
        type: "POST",
        url: BASE_URL + 'statisticsDashboard/getAllTheTime/',
        dataType: "json",
        success: function (data) {
            // console.log(data.min.B);
            var dataAbs = toArray(data.total);
            // console.log(dataAbs);
            // console.log(dataAbs);
            var dataMin = toArray(data.min);
            var dataPls = toArray(data.plus);

            new Chart(document.getElementById("bar-chart-grouped"), {
                type: 'bar',
                data: {
                    labels: ["A", "AB", "B", "O"],
                    datasets: [{
                        label: "negative(-)",
                        backgroundColor: "red",
                        data: dataMin
                    }, {
                        label: "positive(+)",
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
});


function toArray(array) {
    var value = Array();
    var data = JSON.parse(JSON.stringify(array));

    value.push(data.A[0]);
    value.push(data.AB[0]);
    value.push(data.B[0]);
    value.push(data.O[0]);

    return value;
}