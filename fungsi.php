<?php

function Koneksi(){
	$server = "localhost";
    $username = "root";
    $password = "";
    $db = "data_mahasiswa";
    return mysqli_connect($server, $username, $password, $db);
}

function tampil($query){
	$connect = Koneksi();
	$result = mysqli_query($connect,$query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambahkan($data){
	$connect = Koneksi();
	$nim = htmlspecialchars($data["nim"]);  
	$nama = htmlspecialchars($data["nama_mhs"]);
	$tempat = htmlspecialchars($data["tempat"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$fakultas = htmlspecialchars($data["id_fakultas"]);
	$jurusan = htmlspecialchars($data["id_jurusan"]);

	$query = "INSERT INTO tb_mahasiswa VALUES (null,'$nim','$nama','$tempat','$tanggal','$fakultas','$jurusan')";
	mysqli_query($connect,$query);
	return mysqli_affected_rows($connect);
}

function Delete($id){
	$connect = Koneksi();
	$query = "DELETE FROM tb_mahasiswa WHERE id_mhs = $id";

	mysqli_query($connect,$query);
	return mysqli_affected_rows($connect);
}

function Update($data){
	$connect = Koneksi();
	$id_mhs = htmlspecialchars($data["id_mhs"]);
	$nim = htmlspecialchars($data["nim"]);  
	$nama = htmlspecialchars($data["nama_mhs"]);
	$tempat = htmlspecialchars($data["tempat"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$fakultas = htmlspecialchars($data["id_fakultas"]);
	$jurusan = htmlspecialchars($data["id_jurusan"]);

	$query = "UPDATE tb_mahasiswa SET nim='$nim' , nama_mhs='$nama' , tempat='$tempat' , tanggal='$tanggal' , id_fakultas='$fakultas' , id_jurusan='$jurusan' WHERE id_mhs=$id_mhs";
	mysqli_query($connect,$query);
	return mysqli_affected_rows($connect);
}

function search($keywords){
	$query = "SELECT * FROM tb_mahasiswa WHERE nim LIKE '%$keywords%' OR nama_mhs LIKE '%$keywords%'";
	return tampil($query);
}