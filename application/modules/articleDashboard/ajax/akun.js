
$jq("#add").click(function() {
  $jq.ajax({
    type: "POST",
    url: BASE_URL + "articleDashboard/addActivity",
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
});

$jq("#sort").click(function() {
  alert("sort");
});