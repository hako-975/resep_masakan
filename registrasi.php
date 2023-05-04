<?php 
	require_once 'koneksi.php';

    // cek sudah login
	if (isset($_SESSION['id_user'])) {
        echo "
            <script>
                window.location='index.php'
            </script>
        ";
        exit;
    }

	if (isset($_POST['btnRegistrasi'])) {
		$username = htmlspecialchars($_POST['username']);
		$password = $_POST['password'];
		$verifikasi_password = $_POST['verifikasi_password'];
		$nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
		
		// check username 
		$query_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
		
		if (mysqli_num_rows($query_user) > 0) {
			echo "
				<script>
					alert('Username sudah digunakan!')
					window.history.back();
				</script>
			";
			exit;
		}

		if ($password != $verifikasi_password) {
			echo "
				<script>
					alert('Password harus sama dengan verifikasi password!')
					window.history.back();
				</script>
			";
			exit;
		}
		
		$password = password_hash($password, PASSWORD_DEFAULT);

		$insert_user = mysqli_query($koneksi, "INSERT INTO user (username, password, nama_lengkap) VALUES ('$username', '$password', '$nama_lengkap')");
		if ($insert_user) {
			echo "
				<script>
					alert('Registrasi berhasil!')
					window.location.href='login.php'
				</script>
			";
			exit;
		}
	}
?>

<html>
<head>
	<title>Registrasi</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>

	<div class="container padding-10px margin-top-bottom-50px">
        <img src="img/logo.png" alt="Logo" class="logo">
		<h1 class="text-center">Registrasi</h1>
		<form method="post" class="form">
		  <div class="form-group">
		    <label for="username">Username</label>
		    <input type="text" id="username" name="username" required>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" id="password" name="password" required>
		  </div>
		  <div class="form-group">
		    <label for="verifikasi_password">Verifikasi Password</label>
		    <input type="password" id="verifikasi_password" name="verifikasi_password" required>
		  </div>
		  <div class="form-group">
		    <label for="nama_lengkap">Nama Lengkap</label>
		    <input type="text" id="nama_lengkap" name="nama_lengkap" required>
		  </div>
		  <button type="submit" name="btnRegistrasi" class="button-submit">Registrasi</button>
		</form>
		<a href="login.php" class="link-center text-center">Sudah memiliki akun? Login</a>
	</div>
</body>
</html>