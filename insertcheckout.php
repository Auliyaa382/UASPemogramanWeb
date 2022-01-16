<?php
$total = 0;
$date = date("yyyy-mm-dd");
include "koneksi.php";
$query = mysqli_query($koneksi, 'SELECT * FROM tbproduk JOIN tbdetail on tbproduk.id_produk=tbdetail.id_produk');
while ($data = mysqli_fetch_array($query)) {
    $idproduk = $data['id_produk'];
    $data['subtotal'] = $data['harga']*$data['qty'];
    $total += $data['subtotal'];
}
echo $date;
$insertpesanan="INSERT INTO tbpesanan (tgl_pesanan, total) VALUES('$tgl_pesanan','$total')";
    $sql=mysqli_query($koneksi,$insertpesanan);    
        if ($sql){
            echo "<script type='text/javascript'> alert('Pemesanan Berhasil'); window.location='pemesanan_berhasil.php';</script>";
        } else {
            
            echo "<script type='text/javascript'> alert('Pemesanan Gagal'); window.location='menu.php';</script>";
        }	

?>


    