<?php include 'Koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Produk</title>
    <link rel="stylesheet" href="../CSS/update.css">
</head>
<body>
    <div class="container container bg p-4 rounded-4 mt-5">
        <h2 class="text-center mb-4">Edit Produk</h2>
        <?php
        if (isset($_GET['id_produk'])){
            $id_produk = $_GET['id_produk'];
            $result = $conn->query("SELECT * FROM produk WHERE id_produk = $id_produk");
            $produk = $result->fetch_assoc();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama_produk = $_POST['nama_produk']; 
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $stmt = $conn->prepare("UPDATE produk SET nama_produk = ?, harga = ?, stok = ? WHERE id_produk = ?");
            $stmt->bind_param("sssi", $nama_produk, $harga, $stok, $id_produk);
            if($stmt->execute()){
                echo "Produk Berhasil diperbarui";
                header("Location: dashboard.php");
                exit;
            }else{
                echo "Error: ". $stmt->error;
            }
            $stmt->close();

        }
        ?>
        <form action="update.php?id_produk=<?php echo $id_produk; ?>" method="post">
            <div class="mb-3">
                <label for="nama_produk" class="form-label fw-semibold">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="<?php echo $produk['nama_produk']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label fw-semibold">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" value="<?php echo $produk['harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label fw-semibold">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Produk" value="<?php echo $produk['stok']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Edit Produk</button>
        </form>
        <a href="dashboard.php">Kembali Ke Halaman Utama</a>
        <!-- Bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </div>
</body>
</html>
