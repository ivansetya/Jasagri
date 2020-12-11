<?php
session_start();
include "conf/config.php";
$getUserLogin = $connection->query("SELECT * FROM pengguna where email='".$_SESSION['email']."'")->fetch_assoc();
if (empty($_SESSION['email'])){
	header('location: login.php');
}
?>

<html>
<head>
	<title>Profil | Jasagri</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/logreg.css">
	<link rel="stylesheet" href="css/profil.css">
</head>
<body>
	<!-- Header -->
	<div class="header">
		<div class="inner_header">
			<div class="logo_container">
				<h1>JASAGRI</h1>
			</div>

			<ul class="navigation">
				<a href="homepage.html"><li>Home</li></a>
				<a href="profile.php"><li>Profil</li></a>
				<a href="profilUsaha.html"><li>Profil Usaha</li></a>
				<a href="logout.php"><li>Keluar</li></a>
			</ul>
		</div>
	</div>
	<!-- Header -->

	<div class="container-detail-akun">
		<div class="detail-akun">
			<h1><b>Detail Akun</b></h1>

			<div id="garis">
				<hr style="border: solid 1px #dedede">
			</div>
			<?php
				if (isset($_POST['simpan'])){
					if ($connection->query("Update pengguna set full_name = '".$_POST['nama']."', nohp = '".$_POST['nomortelefon']."', alamat = '".$_POST['alamat']."' where id_user='".$getUserLogin['id_user']."'")){
						echo "<br/><center><font id='alert' color='green'>Berhasil menyimpan pembaruan.</font></center>";
						header('refresh: 2');
					}else{
						echo "<br/><center><font id='alert' color='red'>Gagal menyimpan pembaruan.</font></center>";
					}
				}
			?>
			
			<div class="form-group">
				<div class="label">
					<label>Nama Lengkap</label>
					<label>Tanggal Bergabung</label>
					<label>Email Terdaftar</label>
					<label>Nomor Telepon</label>
					<label>Alamat</label>
				</div>

				<form action="" method="POST">
					<div class="data">
						<div class="grouping">
							<input type="text" value="<?= $getUserLogin['full_name']; ?>" name="nama" id="nama" class="form-control" placeholder="Isikan nama anda">
						</div>
						<div class="grouping">
							<input type="date" name="tglbergabung" value="<?= $getUserLogin['tanggal_daftar']; ?>" class="form-control" readonly>
						</div>
						<div class="grouping">
							<input type="email" value="<?= $getUserLogin['email']; ?>" name="email" class="form-control" readonly>
						</div>
						<div class="grouping">
							<input type="text" value="<?= $getUserLogin['nohp']; ?>" name="nomortelefon" class="form-control">
						</div>
						<div class="grouping">
							<textarea name="alamat" rows="4" class="form-control ta"><?= $getUserLogin['alamat']; ?></textarea>
						</div>
						<div class="submit-con">
							<button type="submit" name="simpan" class="submit-btn">Update Profile</button>
						</div>
					</div>
				</form>
			</div>
			
			<div class="isi-button">
			</div>
		</div>
	</div>


</body>
</html>