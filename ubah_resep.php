<?php 
	require_once 'koneksi.php';

	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	$id_resep = $_GET['id_resep'];
	$resep = mysqli_query($koneksi, "SELECT * FROM resep INNER JOIN user ON resep.id_user = user.id_user WHERE id_resep = '$id_resep' ORDER BY nama_resep ASC");
	$data_resep = mysqli_fetch_assoc($resep);

	$resepKu = false;
	if (isset($_SESSION['id_user'])) {
		$id_user = $_SESSION['id_user'];

		// cek apakah data resep termasuk resep ku
		if ($data_resep['id_user'] == $id_user) {
			$resepKu = true;
		}
	}

	if ($resepKu == false) {
		echo "
			<script>
				alert('Resep gagal diubah!')
				window.history.back()
			</script>
		";
		exit;
	}
	if (isset($_POST['btnUbahResep'])) {
		$nama_resep = $_POST['nama_resep'];
		$deskripsi_resep = nl2br($_POST['deskripsi_resep']);
		$bahan = nl2br($_POST['bahan']);
		$langkah = nl2br($_POST['langkah']);

		$foto_resep = $_POST['foto_resep_old'];

		$foto_resep_new = $_FILES['foto_resep']['name'];
        if ($foto_resep_new != '') {
            $acc_extension = array('png','jpg', 'jpeg', 'gif', 'pdf');
            $extension = explode('.', $foto_resep_new);
            $extension_lower = strtolower(end($extension));
            $size = $_FILES['foto_resep']['size'];
            $file_tmp = $_FILES['foto_resep']['tmp_name'];   
            
            if(!in_array($extension_lower, $acc_extension))
            {
                echo "
                    <script>
                        alert('File yang Anda upload bukan gambar!')
						window.history.back()
                    </script>
                ";
                exit;
            }

			unlink('img/'.$foto_resep);

            $foto_resep = uniqid() . $foto_resep_new;
            move_uploaded_file($file_tmp, 'img/'. $foto_resep);
        }

		$ubah_resep = mysqli_query($koneksi, "UPDATE resep SET nama_resep = '$nama_resep', deskripsi_resep = '$deskripsi_resep', bahan = '$bahan', langkah = '$langkah', foto_resep = '$foto_resep' WHERE id_user = '$id_user' && id_resep = '$id_resep'");

		if ($ubah_resep) {
			echo "
				<script>
					alert('Resep berhasil diubah!')
					window.location.href='resep.php'
				</script>
			";
			exit;
		} else {
			echo "
				<script>
					alert('Resep gagal diubah!')
					window.history.back()
				</script>
			";
			exit;
		}
	}
?>

<html>
<head>
	<title>Ubah Resep - <?= $data_resep['nama_resep']; ?></title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>
	<div class="container padding-10px margin-top-bottom-50px">
		<button type="button" onclick="return window.history.back()" class="button margin-top-5px">Kembali</button>
		<h1 class="text-center">Ubah Resep - <?= $data_resep['nama_resep']; ?></h1>
		<form method="post" class="form" enctype="multipart/form-data">
			<input type="hidden" name="foto_resep_old" value="<?= $data_resep['foto_resep']; ?>">
		  <div class="form-group">
		    <label for="nama_resep">Nama Resep</label>
		    <input type="text" id="nama_resep" name="nama_resep" required value="<?= $data_resep['nama_resep']; ?>">
		  </div>
		  <div class="form-group">
		    <label for="deskripsi_resep">Deskripsi Resep</label>
		    <textarea id="deskripsi_resep" name="deskripsi_resep" required><?= strip_tags($data_resep['deskripsi_resep']); ?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="bahan">Bahan-bahan</label>
		    <textarea id="bahan" name="bahan" required><?= strip_tags($data_resep['bahan']); ?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="langkah">Langkah-langkah</label>
		    <textarea id="langkah" name="langkah" required><?= strip_tags($data_resep['langkah']); ?></textarea>
		  </div>
		  <div class="form-group">
		    <label for="foto_resep">Foto Resep (upload foto jika ingin mengubah foto)</label>
		    <input type="file" id="foto_resep" name="foto_resep">
		  </div>
		  <button type="submit" name="btnUbahResep" class="button-submit">Ubah Resep</button>
		</form>
	</div>
</body>
</html>