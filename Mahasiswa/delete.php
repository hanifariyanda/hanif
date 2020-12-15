<?php  
	include_once("fungsi.php");
	$id = $_GET['id'];
		if(Delete($id)>0){
			echo "<script>alert('Data Berhasil Dihapus!');window.location.href='show.php';</script>";
		}
		else{
			echo "<script>alert('Data Gagal Dihapus!');window.location.href='show.php';</script>";
		}
?>