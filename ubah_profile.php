<?php 
	require_once 'koneksi.php';
	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	if (isset($_POST['btnUbah'])) {
		$username = nl2br($_POST['username']);
		$nama_lengkap = $_POST['nama_lengkap'];

		// check username 
		$old_username = $data_user['username'];
		if ($username != $old_username) {
			$check_username = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
			if (mysqli_num_rows($check_username)) {
				echo "
					<script>
						alert('Username telah digunakan!')
						window.history.back();
					</script>
				";
				exit;
			}
		}


		$ubah_profile = mysqli_query($koneksi, "UPDATE user SET username = '$username', nama_lengkap = '$nama_lengkap' WHERE id_user='$id_user'");
		if ($ubah_profile) {
			echo "
				<script>
					alert('Profile berhasil diubah!')
					window.location.href='profile.php'
				</script>
			";
			exit;
		} else {
			echo "
				<script>
					alert('Profile gagal diubah!')
					window.location.href='profile.php'
				</script>
			";
			exit;
		}
	}
?>


<html>
<head>
    <title>Ubah Profile</title>
    <?php include_once 'include_head.php'; ?>
</head>
<body>
    <?php include_once 'include_navbar.php'; ?>
    <div class="container padding-10px margin-top-bottom-50px">
        <h1 class="text-center">Ubah Profile</h1>
		<form method="post">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" required value="<?= $data_user['username']; ?>">
			</div>
			<div class="form-group">
				<label for="nama_lengkap">Nama Lengkap</label>
				<input type="text" name="nama_lengkap" id="nama_lengkap" required value="<?= $data_user['nama_lengkap']; ?>">
			</div>
			<div class="form-group">
				<button type="submit" name="btnUbah">Ubah</button>
			</div>
		</form>
    </div>
</body>
</html>