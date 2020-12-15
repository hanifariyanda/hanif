<?php  
	include_once("fungsi.php");
	$mhs = tampil("SELECT * FROM tb_mahasiswa");
	$jur = tampil("SELECT * FROM tb_jurusan");
	$fk = tampil("SELECT * FROM tb_fakultas");

	if (isset($_POST["cari"])){
		$mhs = search($_POST["tombol"]);
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
    			<form class="form-inline" action="" method="POST">  
            <input class="form-control mr-sm-1" type="search" placeholder="Search" name="tombol" aria-label="Search" autofocus autocomplete="off">
            <button class="btn btn-primary my-2 my-sm-0" type="submit" name="cari">Search</button>
        </form>
    			<div class="card mt-2">
				  <div class="card-header">
				    Table Data Mahasiswa
				    <div class="float-right">
				    	<a href="tambahdata.php" class="btn btn-primary">Tambah Data</a>
				    </div>
				  </div>
				  <div class="card-body">
				    <div class="table-responsive">
		<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama Mahasiswa</th>
				<th>Tempat Tanggal Lahir</th>
				<th>Fakultas</th>
				<th>Jurusan</th>
				<th>aksi</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama Mahasiswa</th>
				<th>Tempat Tanggal Lahir</th>
				<th>Fakultas</th>
				<th>Jurusan</th>
				<th>aksi</th>
			</tr>
		</tfoot>
		<tbody>
			<?php $no = 1; ?>
			<?php foreach ($mhs as $data) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $data["nim"] ?></td>
				<td><?= $data["nama_mhs"] ?></td>
				<td><?= $data["tempat"] . ", " . $data["tanggal"] ?></td>
				<td>
					<?php foreach ($fk as $fakul) : ?>
                        <?php if ($fakul["id_fakultas"] == $data["id_fakultas"]) : ?>
                            <?= $fakul["nama_fakultas"] ?>
                        <?php endif ?>
                    <?php endforeach ?>
				</td>
				<td>
					<?php foreach ($jur as $jurus) : ?>
                        <?php if ($jurus["id_jurusan"] == $data["id_jurusan"]) : ?>
                            <?= $jurus["nama_jurusan"] ?>
                        <?php endif ?>
                    <?php endforeach ?>					
				</td>
				<td>
					<a  href="edit.php?id=<?= $data['id_mhs'] ?>" class="btn btn-primary">Edit</a>
					<a href="delete.php?id=<?= $data['id_mhs'] ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			<?php endforeach ?>	
		</tbody>
	</table>
	</div>
				  </div>
				</div>
    		</div>
    	</div>
    </div>
  </body>
</html>

