<?php
		if(isset($_POST["view"]))
		{
		 include("connect.php");
		 if($_POST["view"] != '')
		 {
		  $update_query = "UPDATE notifikasi SET comment_status=1 WHERE comment_status=0";
		  mysqli_query($connect, $update_query);
		 }
		 $query = "SELECT * FROM notifikasi ORDER BY id_notifikasi DESC LIMIT 5";
		 $result = mysqli_query($connect, $query);
		 $output = '';

		 if(mysqli_num_rows($result) > 0)
		 {
		  while($row = mysqli_fetch_array($result))
		  {
		   $output .= '
		   <li>
		    <a href="#">
		     <strong>'.$row["Dosen"].'</strong><br />
		     <strong><small>'.$row["status"].'</small></strong><br />
		     <small><em>'.$row["Komentar"].'</em></small><br />
		     <small><em>'.$row["waktu"].'</em></small>
		    </a>
		   </li>
		   <li class="divider"></li>
		   ';
		  }
		 }
		 else
		 {
		  $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
		 }

		 $query_1 = "SELECT * FROM notifikasi WHERE comment_status=0";
		 $result_1 = mysqli_query($connect, $query_1);
		 $count = mysqli_num_rows($result_1);
		 $data = array(
		  'notification'   => $output,
		  'unseen_notification' => $count
		 );
		 echo json_encode($data);
		}
?>
