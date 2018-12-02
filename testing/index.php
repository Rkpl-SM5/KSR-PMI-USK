<!DOCTYPE html>
<html>
 <head>
  <title>Testing</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br /><br />




     <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
       <ul class="dropdown-menu"></ul>
      </li>
     </ul>


   <br />
   <br />
   <form method="post" id="comment_form">
    <div class="form-group">
      <br />
     <label>Dosen</label>
     <input type="text" name="nama_dosen" id="subject" class="form-control">
    </div>
    <div class="form-group">
     <label>komentar</label>
     <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
    </div>
    <input type="checkbox" name="cek" value="hadir">hadir
    <input type="checkbox" name="cek" value="tidak hadir">Tidak Hadir
    <div class="form-group">
     <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
    </div>
   </form>


 </body>
</html>

<script>
$(document).ready(function(){

  function load_unseen_notification(view = '')
  {
   $.ajax({
    url:"fetch.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
     $('.dropdown-menu').html(data.notification);
     if(data.unseen_notification > 0)
     {
      $('.count').html(data.unseen_notification);
     }
    }
   });
  }

 load_unseen_notification();

 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });

 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){
  load_unseen_notification();;
 }, 5000);

});
</script>
