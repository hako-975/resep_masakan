<?php 
	require_once 'koneksi.php';
	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));
?>


<html>
<head>
    <title>Profile</title>
    <?php include_once 'include_head.php'; ?>
</head>
<body>
    <?php include_once 'include_navbar.php'; ?>
    <div class="container padding-10px margin-top-bottom-50px">
        <h1 class="text-center">Profile</h1>
		<table class="profile" cellpadding="10">
		  <tr>
		    <td>Username</td>
		    <td>: <?= $data_user['username']; ?></td>
		  </tr>
		  <tr>
		    <td>Nama Lengkap</td>
		    <td>: <?= $data_user['nama_lengkap']; ?></td>
		  </tr>
		  <tr>
		  	<td>
  				<a href="ubah_profile.php" class="button">Ubah Profile</a>
		  	</td>
		  	<td>
				<a href="ubah_password.php" class="button">Ubah Password</a>
		  	</td>
		  </tr>
		  <tr>
		  	<td>
				<a href="logout.php" class="button bg-red">Logout</a>
		  	</td>
		  </tr>
		</table>
    </div>
</body>

</html>