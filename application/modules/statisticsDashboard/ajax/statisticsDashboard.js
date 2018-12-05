$jq(document).ready(function() {
    new Chart(document.getElementById("bar-chart-grouped"), {
        type: 'bar',
        data: {
            labels: ["1900", "1950", "1999", "2050"],
            datasets: [
                {
                    label: "O",
                    backgroundColor: "red",
                    data: [133,221,783,2478]
                }, {
                    label: "A",
                    backgroundColor: "blue",
                    data: [408,547,675,734]
                }, {
                    label: "B",
                    backgroundColor: "green",
                    data: [308,247,175,334]
                }, {
                    label: "AB",
                    backgroundColor: "black",
                    data: [308,247,175,334]
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Population growth (millions)'
            }
        }
    });
});