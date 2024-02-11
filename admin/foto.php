<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('blm lojin bjir');
    location.href='../login.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto | GaleriQu</title>
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

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        Add Foto
                    </div>
                    <div class="card-body">
                        <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                            <label for="judulfoto" class="form-label">Judul Foto</label>
                            <input type="text" name="judulfoto" id="judulfoto" class="form-control mb-1" required>
                            <label for="deskripsifoto" class="form-label mt-1">Deskripsi Foto</label>
                            <textarea name="deskripsifoto" id="deskripsifoto" cols="10" rows="2" class="form-control mb-1" required></textarea>
                            <label for="albumid" class="form-label mt-1">Album</label>
                            <select name="albumid" id="albumid" class="form-control mb-1" required>
                                <option>- pilih album bang -</option>
                                <?php
                                $userid = $_SESSION['userid'];
                                $sql = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                while ($data = mysqli_fetch_array($sql)) { ?>
                                    <option class="form-control" value="<?php echo $data['albumid'] ?>"><?php echo $data['namaalbum'] ?></option>
                                <?php } ?>
                            </select>
                            <label class="form-label mt-1">File foto</label>
                            <input type="file" name="lokasifile" class="form-control mb-4" required>
                            <hr>
                            <button type="submit" class="btn btn-primary" name="tambah">Add Foto</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        Data Foto
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Foto</th>
                                <th>Judul Foto</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    $userid = $_SESSION['userid'];
                                    $sql = mysqli_query($koneksi, "SELECT * FROM foto  WHERE userid='$userid'");
                                    while ($data = mysqli_fetch_array($sql)) { ?>
                                        <td><?php echo $no++ ?></td>
                                        <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" style="height: 5rem;"></td>
                                        <td><?php echo $data['judulfoto'] ?></td>
                                        <td><?php echo $data['deskripsifoto'] ?></td>
                                        <td><?php echo $data['tanggalunggah'] ?></td>
                                        <td>
                                            <!-- Edit album  -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_foto.php" method="POST">
                                                                <input type="hidden" class="form-control" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                                <label class="form-label">judul foto</label>
                                                                <input type="text" class="form-control mb-2" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" required>
                                                                <label class="form-label">Deskripsi</label>
                                                                <textarea name="deskripsifoto" cols="10" rows="2" class="form-control mb-3" required><?php echo $data['deskripsifoto']; ?></textarea>
                                                                <label class="form-label mt-2">Album</label>
                                                                <select name="albumid"  class="form-control" required>
                                                                    <?php
                                                                        $userid = $_SESSION['userid'];
                                                                        $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
                                                                        while($data = mysqli_fetch_array($sql_album)){ ?> 
                                                                            <option <?php if($data['albumid'] == $data['albumid']){ ?> selected="selected" <?php } ?> value="<?php echo $data['albumid'] ?>"><?php echo $data['namaalbum'] ?></option>
                                                                        <?php } ?>
                                                                </select>
                                                                <div class="row mt-3">
                                                                    <div class="col-md-4">
                                                                    <img src="../assets/img/<?php echo $data['lokasifile'] ?>" style="height: 5rem;">
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label for="lokasifile" class="form-label">File foto</label>
                                                                        <input type="file" class="form-control" name="lokasifile" value="<?php echo $data['lokasifile'] ?>">
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="edit" class="btn btn-success">Edit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>">
                                                Del
                                            </button>
                                            
                                            <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../config/aksi_foto.php" method="POST">
                                                                <input type="hidden" class="form-control" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                               Are u sure? 
                                                               <strong><?php echo $data['judulfoto'] ?></strong>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="edit" class="btn btn-danger">Del</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK RPL 2024 | Fivi Arova</p>
</footer>
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>

</html>