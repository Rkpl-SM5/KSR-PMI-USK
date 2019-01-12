// $(document).ready(function() {
//   $(".btn").click(function(){
//     var cari = $("#cari").val();
//     var rank = $("#rank").val();

//     $.ajax({
//            url: BASE_URL+'Dashboard/Query/'+cari+'/'+rank,
//            dataType : "json",
//            success: function(data){
//                  // alert(data);
//                  $('#time').html(data[0]);
//             },
//             error: function(data){
//                  alert("Please insert your command");
//             }
//         });
// });

$jq(document).ready(function() {
    $jq.ajax({
        url: BASE_URL+'articleDashboard/selectActivity/',
        dataType : "json",
        success: function(data){
            alert(JSON.stringify(data));
                // $('#activity-content').html(data[0]);
        },
        error: function(data){
            alert(JSON.stringify(data));
                // alert("error");
        }
    });
});


// $jq("#add").click(function() {
//   $jq.ajax({
//     type: "POST",
//     url: BASE_URL + "articleDashboard/addActivity",
//     dataType: "json",
//     success: function(data) {
//       // $jq("#pos").val(z);
//       // alert($jq("#pos").data("val"));
//       $jq("#page-content").html(data.page);
//       $jq("#nav-text").html(navText(data.nav, data.val));
//       //navText(data.nav);
//     },
//     error: function(data) {
//       alert(z);
//     }
//   });
// });

$jq("#sort").click(function() {
  alert("sort");
});

