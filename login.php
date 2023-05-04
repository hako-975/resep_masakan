<?php
    include 'koneksi.php';
    
    // cek sudah login
    if (isset($_SESSION['id_user'])) {
        echo "
            <script>
                window.location='index.php'
            </script>
        ";
        exit;
    }

    if (isset($_POST['btnLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query_login = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
        
        if ($data_user = mysqli_fetch_assoc($query_login)) {
            if (password_verify($password, $data_user['password'])) {
                $_SESSION['id_user'] = $data_user['id_user'];
                header("Location: index.php");
                exit;
            } else {
                echo "
                    <script>
                        alert('gagal username atau password salah!')
                        window.history.back()
                    </script>
                ";
                exit;
            }
        } else {
            echo "
                <script>
                    alert('gagal username atau password salah!')
                    window.history.back()
                </script>
            ";
            exit;
        }
    }
?>

<html>
<head>
    <title>Login</title>
    <?php include_once 'include_head.php'; ?>
</head>
<body>
    <?php include_once 'include_navbar.php'; ?>

    <div class="container padding-10px margin-top-bottom-50px">
        <img src="img/logo.png" alt="Logo" class="logo">
        <h1 class="text-center">Login</h1>
        <form method="post" class="form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="btnLogin" class="button-submit">Login</button>
        </form>
        <a href="registrasi.php" class="link-center text-center">Belum memiliki akun? Registrasi</a>
    </div>
</body>

</html>