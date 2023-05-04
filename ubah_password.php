<?php 
	require_once 'koneksi.php';
	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	if (isset($_POST['btnUbah'])) {
		$password_lama = $_POST['password_lama'];
		$password_baru = $_POST['password_baru'];
		$verifikasi_password_baru = $_POST['verifikasi_password_baru'];

		// check password with verify
		if ($password_baru != $verifikasi_password_baru) {
			echo "
				<script>
					alert('Password baru harus sama dengan verifikasi password baru!');
					window.history.back();
				</script>
			";
			exit;
		}

		// check password lama
		if (!password_verify($password_lama, $data_user['password'])) {
			echo "
				<script>
					alert('Password lama tidak sesuai!');
					window.history.back();
				</script>
			";
			exit;
		}

		$password_baru = password_hash($password_baru, PASSWORD_DEFAULT);

		$ubah_password = mysqli_query($koneksi, "UPDATE user SET password = '$password_baru' WHERE id_user = '$id_user'");

		if ($ubah_password) {
			echo "
				<script>
					alert('Password berhasil diubah!');
					window.location.href='profile.php';
				</script>
			";
			exit;
		} else {
			echo "
				<script>
					alert('Password gagal diubah!');
					window.history.back();
				</script>
			";
			exit;
		}
	}
?>


<html>
<head>
    <title>Ubah Password</title>
    <?php include_once 'include_head.php'; ?>
</head>
<body>
    <?php include_once 'include_navbar.php'; ?>
    <div class="container padding-10px margin-top-bottom-50px">
        <h1 class="text-center">Ubah Password</h1>
		<form method="post">
			<div class="form-group">
				<label for="password_lama">Password Lama</label>
				<input type="password" name="password_lama" id="password_lama" required>
			</div>
			<div class="form-group">
				<label for="password_baru">Password Baru</label>
				<input type="password" name="password_baru" id="password_baru" required>
			</div>
			<div class="form-group">
				<label for="verifikasi_password_baru">Verifikasi Password Baru</label>
				<input type="password" name="verifikasi_password_baru" id="verifikasi_password_baru" required>
			</div>
			<div class="form-group">
				<button type="submit" name="btnUbah">Ubah</button>
			</div>
		</form>
    </div>
</body>
</html>