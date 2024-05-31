<?php include 'Koneksi.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Jajanan</title>
    <link rel="stylesheet" href="../CSS/tambah_produk.css">
</head>
<body>
    <div class="container bg p-4 rounded-4 mt-5">
        <form action="tambah_produk.php" method="post">
        <h2 class="text-center mb-4">Tambah Produk</h2>
            <div class="mb-3">
                <label for="nama_produk" class="form-label fw-semibold">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label fw-semibold">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label fw-semibold">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Produk" required>
            </div>
            <button type="submit" class="btn btn-secondary w-100">Tambah Barang</button>
        </form>
        <a href="dashboard.php">Kembali Ke Halaman Utama</a>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama_produk = $_POST['nama_produk']; 
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nama_produk, $harga, $stok);
            if($stmt->execute()){
                echo "Produk baru berhasil ditambahkan";
            }else{
                echo "Error: ". $stmt->error;
            }
            $stmt->close();
        }
        ?>
    </div>
     <!-- Bootsrap 5 -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
