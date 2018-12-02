<?php
//insert.php
if(isset($_POST["nama_dosen"]))
{
 include("connect.php");
 $nama_dosen = mysqli_real_escape_string($connect, $_POST["nama_dosen"]);
 $comment = mysqli_real_escape_string($connect, $_POST["comment"]);
 $status = mysqli_real_escape_string($connect, $_POST["cek"]);
 $query = "
 INSERT INTO notifikasi(Dosen, Komentar, status, waktu)
 VALUES ('$nama_dosen', '$comment', '$status', NOW())
 ";
 mysqli_query($connect, $query);
}
?>
