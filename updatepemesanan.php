<?php
//koneksi database
include ('koneksi.php');
if(isset($_POST['submit']))
{
//mengambil data yang dikirim dari form
    $id=$_POST['id'];
    $namaproduk=$_POST['nama_produk'];
	$harga=$_POST['harga'];
	$qty=$_POST['qty'];
    $subtotal=$qty*$harga;

//update data pemesanan
$updatepemesanan=mysqli_query($koneksi,"UPDATE tbdetail SET qty='$qty', subtotal='$subtotal' WHERE id_produk=$id");

if ($updatepemesanan)
echo "<script type='text/javascript'> alert('Data pesanan telah diubah'); window.location='index.php';</script>";
 else
 echo "<script type='text/javascript'> alert('Data pesanan gagal diubah'); window.location='index.php';</script>";
}
?>