var STAND_BY_INPUT = 1;
var STAND_BY_VALUE = [];
var SELECT_STAND_BY = [];
Array.prototype.unique = function () {
    return this.filter(function (value, index, self) {
        return self.indexOf(value) === index;
    });
}


$jq(document).ready(function () {

    STAND_BY_VALUE.push("ALAMAT");
    STAND_BY_VALUE.push("TANGGAL");
    STAND_BY_VALUE.push("NAMA");

    console.log("load");
    console.log(STAND_BY_VALUE);

    $jq(".btn-search").on('click', function () {
        var tmp = $jq(".form-data");
        var kolom = Array();
        var query = Array();

        for (let i = 0; i < tmp.length; i++) {
            kolom.push($jq(tmp[i]).data("kolom"));
            query.push($jq(tmp[i]).val());


        }
        // kolom = kolom.join(',');
        // query = query.join(',');
        // console.log(query);
        $jq.ajax({
            type: "POST",
            url: BASE_URL + 'searchDashboard/search/',
            data: {
                "kolom": kolom,
                "query": query
            },
            dataType: "json",
            success: function (data) {
                console.log("flag");
                console.log(data.val);
                // console.log(data.nav);

                $jq("#page-content").html(data.page);
                // $jq("#nav-text").html(navText(data.nav, data.val));
            },
            error: function (data) {
                console.log(data)
            }
        });

    });


});

function addInput(x) {
    let s = $jq(x).parent();
    let ss = $jq(s).find("input").data("kolom");

    if ($jq(s).find("input").val() === "") {
        alert("input kosong");
        return;
    }

    $jq(x).attr("onclick", "delInput(this)");
    $jq(x).find("i").removeClass("fa-plus");
    $jq(x).find("i").addClass("fa-minus");
    $jq(x).prev().remove();


    // $jq(x + " i").removeClass("fa-plus");
    // $jq(x + " i").addClass("fa-minus");
    $jq('#search-input-add').append(generateSeacrhInput());




    // if (STAND_BY_VALUE.length <= 4) {
    //     removeData(ss);
    //     console.log("add"); // + STAND_BY_VALUE);
    //     console.log(STAND_BY_VALUE);
    // }

    if (STAND_BY_VALUE.length == 0) {
        // $jq(x).parent().next().find("div").addClass("hide");
        // console.log($jq(lp).find("div"));
        $jq('#btn-input.hide').prev().addClass("hide");

    }
}

function delInput(x) {
    // STAND_BY_VALUE.pop(x.innerText);
    let s = $jq(x).parent();
    let ss = $jq(s).find("input").data("kolom");

    // console.log(ss);
    if (STAND_BY_VALUE.length <= 4) {
        addData(ss);
        // STAND_BY_VALUE.push(ss);
        console.log("del in"); // + STAND_BY_VALUE);
        console.log(STAND_BY_VALUE);
    }

    if (STAND_BY_INPUT-- == 4) {
        $jq('#btn-input.hide').prev().removeClass("hide");

        $jq('#btn-input.hide').removeClass("hide");

    }
    $jq(x).parent().remove();
    // $jq(".input-group .dropdown-item").replaceWith(generateSeacrhInputButton());

    document.getElementsByClassName("input-group dropdown-item").innerHTML = generateSeacrhInputButton();
}


function generateName(x) {

    switch (x) {
        case "GOLONGAN_DARAH":
            return "Golongan Darah";

        case "ALAMAT":
            return "Tempat Tinggal";

        case "TANGGAL":
            return "Tahun";

        case "NAMA":
            return "Nama";
    }
}

function generateSeacrhInputButton() {
    let value = "";
    console.log("generateSeacrhInputButton");
    // console.log(STAND_BY_VALUE);
    for (let i = 0; i < STAND_BY_VALUE.length; i++) {
        value += '<button onclick="setVal(' + "'" + STAND_BY_VALUE[i] + "'" + ',this);" type="button" tabindex="0" class="dropdown-item">' + generateName(STAND_BY_VALUE[i]) + '</button>';
    }
    console.log(value);

    return value;
}

function generateSeacrhInput() {

    var value = '<div class="input-group spaceBefore-30">';
    value += '<input type="text" name="search" placeholder="' + generateName(STAND_BY_VALUE[0]) + '" class="form-control form-data" data-kolom="' + STAND_BY_VALUE[0] + '">';
    value += '<div class="input-group-btn">';
    value += '<div class="btn-group">';
    value += '<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle btn btn-primary"></button>';
    value += '<div tabindex="-1" aria-hidden="true" role="menu" class="dropdown-menu">';

    value += generateSeacrhInputButton();

    // value += '<button onclick="setVal(' + "'" + 'ALAMAT' + "'" + ',this);" type="button" tabindex="0" class="dropdown-item">Tempat Tinggal</button>';
    // value += '<button onclick="setVal(' + "'" + 'TANGGAL' + "'" + ',this);" type="button" tabindex="0" class="dropdown-item">Tahun</button>';
    // value += '<button onclick="setVal(' + "'" + 'NAMA' + "'" + ',this);" type="button" tabindex="0" class="dropdown-item">Nama</button>';

    value += '</div>';
    value += '</div>';
    value += '</div>';
    if (STAND_BY_INPUT++ < 3) {
        value += '<div id="btn-input" onclick="addInput(this)" class="input-group-addon add-search"><i class="fa fa-plus"></i></div>';

    } else {
        value += '<div id="btn-input" onclick="addInput(this)" class="input-group-addon add-search hide"><i class="fa fa-plus"></i></div>';
    }
    value += '</div>';

    removeData(STAND_BY_VALUE[0]);

    return value;
}


function removeData(x) {
    for (var i = 0; i < STAND_BY_VALUE.length; i++) {
        if (STAND_BY_VALUE[i] === x) {
            STAND_BY_VALUE.splice(i, 1);
        }
    }
    console.log("removeData"); // + STAND_BY_VALUE);
    console.log(STAND_BY_VALUE);
}

function addData(x) {
    if (x === "") {
        return;
    }
    for (var i = 0; i < STAND_BY_VALUE.length - 1; i++) {
        if (STAND_BY_VALUE[i] === x) {
            return;
        }
    }
    STAND_BY_VALUE.push(x);
    console.log("addData"); // + STAND_BY_VALUE);
    console.log(STAND_BY_VALUE);
}

function setVal(x, y) {

    if (STAND_BY_VALUE.length <= 4) {
        addData($jq(y).parent().parent().parent().prev().attr("data-kolom"));
        console.log("set add"); // + STAND_BY_VALUE);
        console.log(STAND_BY_VALUE);
    }


    $jq(y).parent().parent().parent().prev().attr("placeholder", y.innerText);
    $jq(y).parent().parent().parent().prev().attr("data-kolom", x);

    if (STAND_BY_VALUE.length <= 4) {
        removeData(x);
        console.log("set del"); // + STAND_BY_VALUE);
        console.log(STAND_BY_VALUE);
    }

}