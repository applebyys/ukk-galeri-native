<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home GaleriQu</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
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
                <a href="home.php" class="nav-link">Home</a>
                <a href="album.php" class="nav-link">Album</a>
                <a href="foto.php" class="nav-link">Foto</a>
            </div>
            <a href="../config/aksi_logout.php" type="submit" class="btn btn-outline-danger m-1">Log out</a>
        </div>
        </div>
    </nav>
</body>
</html>