<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | GaleriQu</title>
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
        <a href="login.php" type="submit" class="btn btn-outline-success m-1">Log in</a>
      </div>
    </div>
  </nav> 

  <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="text-center">
                        <h4>Sign Up</h4>
                    </div>
                    <form action="config/aksi_register.php" method="post">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control mb-1" id="username" required>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <label for="namalengkap" class="label-form">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-control" id="namalengkap" required>
                        <label for="alamat" class="label-form">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="2" required></textarea>
                        <div class="d-grid mt-2">
                            <button type="submit" class="btn btn-primary" name="kirim">Sign up</button>
                        </div>
                    </form>
                    <hr>
                    <div class="text-center">
                        <p>Sudah punya akun? <a href="login.php">login</a> </p> 
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</body>
</html>