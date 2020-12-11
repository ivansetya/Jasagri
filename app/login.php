<?php
include "conf/config.php";

session_start();

// if (!empty($_SESSION['email'])){
// 	header('location: profile.php');
// }

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Masuk | Jasagri</title>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/logreg.css">
</head>
<body>

	<!-- Header -->
	<!-- <div class="header">
		<div class="inner_header">
			<div class="logo_container">
				<h1>JASAGRI</h1>
			</div>

			<ul class="navigation">
				<a href="homepage.html"><li>Home</li></a>
				<a href="#"><li>About</li></a>
				<a href="profile.php"><li>Profil</li></a>
				<a href="#"><li>Profil Usaha</li></a>
				<a href="login.php"><li>Masuk</li></a>
			</ul>
		</div>
	</div> -->
	<!-- Header -->

	<div class="container" style="margin: 25vh auto 0px;">

		<form id="form_login" action="" method="POST">
			<h1 class="judul">Selamat datang di Jasagri</h1>
			
			<?php
			if (isset($_POST['submit'])){
				
					$q = $connection->query("SELECT * FROM pengguna where email='".$_POST['email']."'");
					
					if ($q->num_rows > 0){
						$get = $q->fetch_assoc();
						if ($get['password'] == $_POST['password']){
							$_SESSION['email'] = $_POST['email'];
							echo "<center><font id='alert' color='green'>Berhasil login. Akan diarahkan ke halaman selanjutnya...</font><br/><br/></center>";
							header('refresh: 3; url=homepage.html');
						}else{
							echo "<center><font id='alert' color='red'>Username atau password salah.</font><br/><br/></center>";
						}
					}else{
						echo "<center><font id='alert' color='red'>Username atau password salah.</font><br/><br/></center>";
					}
				
				}
			?>

			<div class="input_group">
				<input type="text" class="input" id="email" name="email" placeholder="Email" required>
			</div>
			<div class="input_group">
				<input type="password" class="input" id="password" name="password" placeholder="Password" required>
			</div>
				<input type="submit" value="LOG IN"  name="submit" class="form_button">
				<div id="error"></div>
				<p class="form_teks">
					 <br> Belum mempunyai akun? <a class="form_link" href="register.php" id="BikinAkun">Daftar disini</a>
				</p>
		</form>
	</div>
</body>
</html>