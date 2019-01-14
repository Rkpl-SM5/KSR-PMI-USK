$jq(document).ready(function () {

    $jq.ajax({
        type: "POST",
        url: BASE_URL + 'statisticsDashboard/addNewGallery/',
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


    new Chart(document.getElementById("bar-chart-grouped"), {
        type: 'bar',
        data: {
            labels: ["A", "AB", "B", "O"],
            datasets: [{
                label: "-",
                backgroundColor: "red",
                data: [133, 221, 783, 2478]
            }, {
                label: "+",
                backgroundColor: "blue",
                data: [408, 547, 675, 734]
            }, {
                label: "~",
                backgroundColor: "green",
                data: [308, 247, 175, 334]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Population growth (millions)'
            }
        }
    });
});