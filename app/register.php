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
    <title>Daftar | Jasagri</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/logreg.css">
    <script defer type="text/javascript" src="js/validreg.js"></script>
</head>
<body>
    <!-- Header -->
    <!-- <div class="header">
        <div class="inner_header">
            <div class="logo_container">
                <h1>Jasagri</h1>
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

    <div class="container" style="margin: 7vh auto 40px;">

        <form id="form_registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1 class="judul">Daftar di Jasagri</h1>
			
            <?php
				if (isset($_POST['submit'])){

					$q = $connection->query("SELECT * FROM pengguna where email='".$_POST['email']."' or nohp='".$_POST['nohp']."'");
					
                    if ($q->num_rows == 0){
						
                        if ($connection->query("INSERT INTO pengguna (full_name, nohp, email, alamat, password, tanggal_daftar) values ('".$_POST['nama_lengkap']."', '".$_POST['nohp']."', '".$_POST['email']."', '".$_POST['alamat']."', '".$_POST['password']."', '".date('Y-m-d')."')")){
							echo "<center><font id='alert' color='green'>Berhasil mendaftarkan akun.</font><br/><br/></center>";
							header('refresh: 3; url=login.php');
						}else{
							echo "<center><font id='alert' color='red'>".$connection->error."</font><br/><br/></center>";
						}   
					}else{
						echo "<center><font id='alert' color='red'>Email atau nomor hp telah digunakan.</font><br/><br/></center>";
					}

				}
			?>

            <div class="input_group">
                <input type="text" class="input" id="fullname" name="nama_lengkap" placeholder="Nama Lengkap" required>
                <span class="help-block"></span>
            </div>

            <div class="input_group ">
                <input type="email" class="input" value="" id="email" name="email" placeholder="Email" required>
            </div>
			<div class="input_group ">
                <input type="number" class="input" value="" id="nohp" name="nohp" placeholder="Nomor Ponsel" required>
            </div>
            <div class="input_group">
                <textarea style="resize:none" class="input" id="alamat" name="alamat" placeholder="Alamat" rows="4" cols="50" required></textarea>
            </div>

            <div class="input_group">
                <input type="password" id="pass" class="input" onkeyup='checkPass()' name="password" placeholder="Password" required>
            </div>

            <div class="input_group">
                <input type="password" class="input" id="validpass" onkeyup='checkPass()' name="confirm_password" placeholder="Konfirmasi Password" required>
            </div>

            <input type="submit" value="DAFTAR" id="submit" name="submit" class="form_button" disabled>

            <div id="error"></div>

            <p class="form_teks">
                <br> Sudah mempunyai akun? <a href="login.php" class="form_link" id="LoginAkun">Login disini</a>
            </p>
        </form>

    </div>

	<script>
	function checkPass(){
		if (document.getElementById("pass").value != document.getElementById("validpass").value){
			document.getElementById("validpass").style.border = "1px solid red";
			document.getElementById("submit").disabled = true;
		}else{
			document.getElementById("validpass").style.border = "1px solid #4bb544";
			document.getElementById("submit").disabled = false;
		}
	}
	</script>
    
</body>
</html>