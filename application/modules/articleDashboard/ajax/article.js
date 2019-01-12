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
    url: BASE_URL + 'articleDashboard/selectActivity/',
    dataType: "json",
    success: function(data) {
      $jq('#activity-content').html(data[0]);
      $jq('#nf-date').val(data[1]);
    },
    error: function(data) {
      alert("Error Selection;");
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

$jq("#content-activity").click(function() {
  alert("tes");
});


$jq("#delete").click(function() {

  if ($jq(this).attr("value").localeCompare("del") == 0) {
    $jq(this).val("!del");
    $jq("#delete").attr("onclick", "deleteKelas()");
    $jq('#add').css('visibility', 'hidden');
    $jq('#sort').css('visibility', 'hidden');
    $jq('#cancel').css('visibility', 'visible');
    $jq('.content-activity').css('background', 'rgb(219, 215, 219)');

  } else {
    $jq("#delete").val("del");
    $jq("#delete").attr("onclick", null);
    $jq('#add').css('visibility', 'visible');
    $jq('#sort').css('visibility', 'visible');
    $jq('#cancel').css('visibility', 'hidden');
    $jq('.content-activity').css('background', 'white');
  }
});

function cancel() {
  //change add
  DELETE_KELAS = new Array();
  $jq("#delete").val("del");
  $jq("#delete").attr("onclick", null);
  $jq('#add').css('visibility', 'visible');
  $jq('#sort').css('visibility', 'visible');
  $jq('#cancel').css('visibility', 'hidden');
  $jq('.content-activity').css('background', 'white');
}



$jq(".confirm").click(function() {
  $jq.ajax({
    type: "POST",
    url: BASE_URL + 'articleDashboard/addActivity',
    data: $jq('#activity-group-form').serialize(),
    dataType: "json",
    success: function(data) {
      location.reload();
    },
    error: function(data) {
      alert("Please Complete Form");
    }
  });
});
