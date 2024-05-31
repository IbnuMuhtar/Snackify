<?php
include 'Koneksi.php';

if (isset($_GET['id_produk'])){
    $id_produk = $_GET['id_produk'];

    $stmt = $conn->prepare("DELETE FROM produk WHERE id_produk = ?");
    $stmt->bind_param("i", $id_produk);
    if ($stmt->execute()){
        echo "Produk berhasil dihapus";
    }else{
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
header("Location: dashboard.php");
exit;
?>