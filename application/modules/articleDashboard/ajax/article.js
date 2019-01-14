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
var DELETE_KELAS=[];
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
  // $jq.ajax({
  //   type: "POST",
  //   url: BASE_URL + "articleDashboard/addActivity",
  //   dataType: "json",
  //   success: function(data) {
  //     // $jq("#pos").val(z);
  //     // alert($jq("#pos").data("val"));
  //     $jq("#page-content").html(data.page);
  //     $jq("#nav-text").html(navText(data.nav, data.val));
  //     //navText(data.nav);
  //   },
  //   error: function(data) {
  //     alert(z);
  //   }
  // });
// });

$jq("#sort").click(function() {
  alert("sort");
});

function addDelete(x) {
  var SEND_ARR=[];
     var i,j;
     for (i = 0; i < DELETE_KELAS.length; i++) {
          if(i==0){
               SEND_ARR.push(DELETE_KELAS[0]);
               continue;
          }
          for (j = 0; j < SEND_ARR.length; j++) {

               if(SEND_ARR[j].localeCompare(DELETE_KELAS[i])!=0){
                    continue;
               }else {
                    break;
               }
          }
          if(j==SEND_ARR.length){
               SEND_ARR.push(DELETE_KELAS[i]);
          }
     }
     $jq.ajax({
          type: "POST",
          url: BASE_URL+'kelas/del',
          data: {
               data:SEND_ARR
          },
          dataType : "json",
          success: function(data){
                if(data.err=='s') {

                } else {
                   alert(data.err);
                }
           },
           error: function(data){
                alert("sss");
           }
      });
     $jq("#delete").attr("onclick",null);
     cancel();
}


$jq("#delete").click(function() {

  if ($jq(this).attr("value").localeCompare("del") == 0) {
    $jq(this).val("!del");
    $jq("#delete").attr("onclick", "deleteKelas()");
    $jq('#add').css('visibility', 'hidden');
    $jq('#sort').css('visibility', 'hidden');
    $jq('#cancel').css('visibility', 'visible');
    $jq('.content-activity').css('background', 'rgb(219, 215, 219)');
    $jq('.content-activity').attr("onclick","addDelete()");

  } else {
    $jq("#delete").val("del");
    $jq("#delete").attr("onclick", null);
    $jq('#add').css('visibility', 'visible');
    $jq('#sort').css('visibility', 'visible');
    $jq('#cancel').css('visibility', 'hidden');
    $jq('.content-activity').css('background', 'white');
    $jq('.content-activity').attr("onclick","Activity()");
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
  $jq('.content-activity').attr("onclick","Activity()");
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


$jq(".submit-activity").click(function() {
  $jq.ajax({
    type: "POST",
    url: BASE_URL + 'articleDashboard/addFormActivity',
    data: $jq('#activity-form').serialize(),
    dataType: "json",
    success: function(data) {
     // location.reload();
     upload(data);
    },
    error: function(data) {
      alert(JSON.stringify(data));
    }
  });
});

function upload(y) {
  var x = $jq('#activity-form');
  var input = $jq(x).find(':input');
  var arr = [].slice.call(input);

  $jq.ajax({
          url: BASE_URL+'articleDashboard/do_upload/'+y,
          type:"post",
          data:new FormData(arr[4].files[0]),
          processData:false,
          contentType:false,
          cache:false,
          async:false,
          success: function(data){
              alert(data);
          },
          error: function(data){
              alert(JSON.stringify(data));
          }
     });

}

function Activity(x) {
  $jq.ajax({
    type: "POST",
    url: BASE_URL + "articleDashboard/Activity/"+x,
    dataType: "json",
    success: function(data) {
      // $jq("#pos").val(z);
      // alert($jq("#pos").data("val"));
      $jq("#page-content").html(data.page);
      $jq("#nav-text").html(navText(data.nav, data.val));
      //navText(data.nav);
    },
    error: function(data) {
      alert(z);
    }
  });
}
