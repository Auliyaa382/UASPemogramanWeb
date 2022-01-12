<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Keranjang Transaksi</h2>
<table border="1">
    <tr>
        <td>No.</td>
        <td>NAMA PRODUK</td>
        <td>HARGA</td>
        <td>QTY</td>
        <td>SUBTOTAL</td>
        <td>AKSI</td>

    </tr>
        <?php
        $n =1;
        include "koneksi.php";
        $query = mysqli_query($koneksi, 'SELECT * FROM tbproduk JOIN tbdetail on tbproduk.id_produk=tbdetail.id_produk');
        while ($data = mysqli_fetch_array($query)) {
        ?>
        
            <tr>
                <td><?php echo $n++;?></td>
                <td><?php echo $data['nama_produk'] ?></td>
                <td><?php echo $data['harga'] ?></td>
                <td><?php echo 'x'; echo $data['qty'] ?></td>
                <td><?php echo $data['harga']*$data['qty'] ?></td>
                <td>
                    <a href="hapus.php?id=<?php echo $data['id_produk'];?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
 </table>
            <br>
            <a href="menu.php">Lanjut Belanja</a>
            <a href="checkout.php">Checkout</a>
</body>
</html>