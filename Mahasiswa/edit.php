<?php  
	include_once("fungsi.php");
	$id = $_GET["id"];
	$mhs = tampil("SELECT * FROM tb_mahasiswa WHERE id_mhs = $id");
	foreach($mhs as $row){
		$row["nim"];
		$row["nama_mhs"];
		$row["tempat"];
		$row["tanggal"];
		$row["id_fakultas"];
		$row["id_jurusan"];
	}
	if(isset($_POST["tambah"])){
		if(Update($_POST)>0){
			echo "<script>alert('Data Berhasil Diubah!');window.location.href='show.php';</script>";
		}
		else{
			echo "<script>alert('Data Gagal Diubah!');window.location.href='show.php';</script>";
		}
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
    	<div class="row">
    		<div class="col-md">
    			<div class="card">
				  <div class="card-header">
				    Form Data Mahasiswa
				  </div>
				  <div class="card-body">
				    <form method="POST" action="">
				    	<div class="form-group">
						    <label for="nim">NIM</label>
						    <input type="hidden" name="id_mhs" value="<?= $row["id_mhs"] ?>">
						    <input type="text" class="form-control" id="nim" name="nim" value="<?= $row["nim"] ?>">
  						</div>
  						<div class="form-group">
						    <label for="nama_mhs">Nama Mahasiswa</label>
						    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $row["nama_mhs"] ?>">
  						</div>
  						<div class="form-group">
						    <label for="tempat">Tempat Lahir</label>
						    <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $row["tempat"] ?>">
  						</div>
  						<div class="form-group">
						    <label for="tanggal">Tanggal Lahir</label>
						    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $row["tanggal"] ?>">
  						</div>
  						<div class="form-group">
						    <label for="id_fakultas">Fakultas</label>
						    <input type="text" class="form-control" id="id_fakultas" name="id_fakultas" value="<?= $row["id_fakultas"] ?>">
  						</div>
  						<div class="form-group">
						    <label for="id_jurusan">Jurusan</label>
						    <input type="text" class="form-control" id="id_jurusan" name="id_jurusan" value="<?= $row["id_jurusan"] ?>">
  						</div>
  						<button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
				    </form>
				  </div>
				</div>
    		</div>
    	</div>
    </div>
  </body>
</html>

