<?php 
	require_once 'koneksi.php';

	if (!isset($_SESSION['id_user'])) {
		header("Location: login.php");
		exit;
	}

	$id_user = $_SESSION['id_user'];
	$data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));

	$kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY kategori ASC");

	if (isset($_POST['btnTambahResep'])) {
		$id_kategori = $_POST['id_kategori'];
		$nama_resep = $_POST['nama_resep'];
		$deskripsi_resep = nl2br($_POST['deskripsi_resep']);
		$bahan = nl2br($_POST['bahan']);
		$langkah = nl2br($_POST['langkah']);
		$tanggal_resep_dibuat = date("Y-m-d H:i:s");

		// cek kategori
		if ($id_kategori == 0) {
			echo "
                <script>
                    alert('Pilih Kategori terlebih dahulu!')
					window.history.back()
                </script>
            ";
            exit;
		}

		$foto_resep = $_FILES['foto_resep']['name'];
        if ($foto_resep != '') {
            $acc_extension = array('png','jpg', 'jpeg', 'gif', 'pdf');
            $extension = explode('.', $foto_resep);
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

            $foto_resep = uniqid() . $foto_resep;
            move_uploaded_file($file_tmp, 'img/'. $foto_resep);
        }
        else
        {
        	$foto_resep = 'default.png';
        }

		$tambah_resep = mysqli_query($koneksi, "INSERT INTO resep VALUES ('', '$nama_resep', '$deskripsi_resep', '$bahan', '$langkah', '$foto_resep', '$tanggal_resep_dibuat', '$id_kategori', '$id_user')");

		if ($tambah_resep) {
			echo "
				<script>
					alert('Resep berhasil ditambahkan!')
					window.location.href='resep.php'
				</script>
			";
			exit;
		} else {
			echo "
				<script>
					alert('Resep gagal ditambahkan!')
					window.history.back()
				</script>
			";
			exit;
		}
	}
?>

<html>
<head>
	<title>Tambah Resep</title>
	<?php include_once 'include_head.php'; ?>
</head>
<body>
	<?php include_once 'include_navbar.php'; ?>
	<div class="container padding-10px margin-top-bottom-50px">
		<button type="button" onclick="return window.history.back()" class="button margin-top-5px">Kembali</button>
		<h1 class="text-center">Tambah Resep</h1>
		<form method="post" class="form" enctype="multipart/form-data">
		  <div class="form-group">
		    <label for="id_kategori">Kategori</label>
		    <select id="id_kategori" name="id_kategori">
		    	<option value="0">--- Pilih Kategori ---</option>
		    	<?php foreach ($kategori as $data_kategori): ?>
		    		<option value="<?= $data_kategori['id_kategori']; ?>"><?= $data_kategori['kategori']; ?></option>
		    	<?php endforeach ?>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="nama_resep">Nama Resep</label>
		    <input type="text" id="nama_resep" name="nama_resep" required>
		  </div>
		  <div class="form-group">
		    <label for="deskripsi_resep">Deskripsi Resep</label>
		    <textarea id="deskripsi_resep" name="deskripsi_resep" required></textarea>
		  </div>
		  <div class="form-group">
		    <label for="bahan">Bahan-bahan</label>
		    <textarea id="bahan" name="bahan" required></textarea>
		  </div>
		  <div class="form-group">
		    <label for="langkah">Langkah-langkah</label>
		    <textarea id="langkah" name="langkah" required></textarea>
		  </div>
		  <div class="form-group">
		    <label for="foto_resep">Foto Resep</label>
		    <input type="file" id="foto_resep" name="foto_resep" required>
		  </div>
		  <button type="submit" name="btnTambahResep" class="button-submit">Tambah Resep</button>
		</form>
	</div>
</body>
</html>