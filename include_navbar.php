<nav class="navbar">
  <div class="navbar-container">
    <a class="navbar-title" href="index.php"><img src="img/logo.png" width="25"> <span>Resep Masakan</span></a>
    <form action="index.php" method="get" class="navbar-search">
      <input type="text" name="cari" placeholder="Cari..." value="<?= (isset($_GET['cari'])? $_GET['cari'] : ""); ?>" required>
      <button type="submit">Cari</button>
    </form>
    <div class="navbar-buttons">
      <?php if (isset($_SESSION['id_user'])): ?>
        <a href="resep.php">Resep Ku</a>
        <?php 
          $id_user = $_SESSION['id_user'];
          $data_user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'"));
          $username = $data_user['username'];
        ?>
        <a href="kategori.php">Kategori</a>
        <a href="profile.php">Profile</a>
      <?php else: ?>
        <a href="registrasi.php">Registrasi</a>
        <a href="login.php">Login</a>
      <?php endif ?>
    </div>
  </div>
</nav>