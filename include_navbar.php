<nav class="navbar">
  <div class="navbar-container">
    <a class="navbar-title" href="index.php">Resep Masakan</a>
    <div class="navbar-search">
      <input type="text" placeholder="Cari...">
      <button>Cari</button>
    </div>
    <div class="navbar-buttons">
      <?php if (isset($_SESSION['id_user'])): ?>
        <a href="resep.php">Resep</a>
        <a href="profile.php">Profile</a>
      <?php else: ?>
        <a href="registrasi.php">Registrasi</a>
        <a href="login.php">Login</a>
      <?php endif ?>
    </div>
  </div>
</nav>