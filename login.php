<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | GaleriQu</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg shadow p-2 mb-2 bg-body-tertiary rounded"> <!--- shadow p-2 mb-2 and rounded -->
    <div class="container"> <!--- fluid hapus -->
      <a class="navbar-brand" href="index.php">GaleriQu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav me-auto"> <!-- ganti ini ul+li del -->

        </div>
        <a href="register.php" type="submit" class="btn btn-outline-primary m-1">Sign up</a>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h4>Log In</h4>
                    </div>
                    <form action="config/aksi_login.php" method="POST">
                        <label for="username" class="label-form">Username</label>
                        <input type="text" name="username" id="username" class="form-control my-2" required >
                        <label for="password" class="label-form">Password</label>
                        <input type="password" name="password" id="password" class="form-control my-2" required >
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Belum punya akun?  <a href="register.php">Daftar!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  
</body>
</html>