<?php 
	require_once('./class.php');
	if(@$_POST['simpan']){
		// handling image
		$dir = 'photo/';
		$temp = $_FILES['photo']['tmp_name'];
		$file = $dir . basename($_FILES['photo']['name']);
		$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		$img = $dir.$_POST['nama_lengkap'].'.'.$ext;
		$size = $_FILES['photo']['size'];
		if($size > 1000000){
			echo "<script>alert('maksimal file tidak boleh lebih dari 1 mb')</script>";
		}
		$table = 'target';
		$data = [
			'namalengkap' => $_POST['nama_lengkap'],
			'usia' => $_POST['usia'],
			'jln' => $_POST['jln'],
			'dusun' => $_POST['dusun'],
			'rt' => $_POST['rt'],
			'rw' => $_POST['rw'],
			'desa' => $_POST['desa'],
			'kecamatan' => $_POST['kecamatan'],
			'kabupaten' => $_POST['kabupaten'],
			'provinsi' => $_POST['provinsi'],
			'photo' => $img,
		];
		$x = new Mahindo();
		move_uploaded_file('photo/', $img);
		$x->setData($table, $data);
	}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>.:: Mahasiswa Peduli | Input Data Target::.</title>
	<link rel="stylesheet" type="text/css" href="./app.css">
</head>
<body style="background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.6)),url(https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80);background-size: cover;background-repeat: no-repeat;background-attachment: fixed;">
	<h1 class="text-center">Input Data Target Penerima Manfaat</h1>
	<div class="container">
		<form method="post" enctype="multipart/form-data">
			<div class="group">
				<input type="text" name="nama_lengkap" placeholder="Nama Lengkap Target" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="number" name="usia" placeholder="Usia Target" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="jln" placeholder="Nama Jalan" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="dusun" placeholder="Nama Dusun" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="rt" placeholder="RT" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="rw" placeholder="RW" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="desa" placeholder="Desa" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="kecamatan" placeholder="Kecamatan" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="kabupaten" placeholder="Kabupaten" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="text" name="provinsi" placeholder="provinsi" class="fluid" autocomplete="false" required>
			</div>
			<div class="group">
				<input type="file" name="photo" placeholder="Photo" class="fluid" autocomplete="false" required>
			</div>
			<div class="group text-right">
				<input type="submit" name="simpan" value="Simpan Data!" class="saveBtn">
			</div>
		</form>
	</div>
	<script type="text/javascript" src="./app.js"></script>
</body>
</html>
