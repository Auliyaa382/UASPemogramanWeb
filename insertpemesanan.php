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

    
//membuat id detail
$query = mysqli_query($koneksi, "SELECT max(id_detail) as kodedetail FROM tbdetail");
$data = mysqli_fetch_array($query);
$kodedetail = $data['kodedetail'];
$urutan = (int) substr($kodedetail, 3, 3);
$urutan++;
$huruf = "DTL";
$kodedetail = $huruf . sprintf("%03s", $urutan);
//simpan data pemesanan
    $insertpesanan="INSERT INTO tbdetail(id_detail, id_produk, qty, subtotal) VALUES('$kodedetail','$id','$qty','$subtotal')";
    $sql=mysqli_query($koneksi,$insertpesanan);    
        if ($sql){
            echo "<script type='text/javascript'> alert('Data pesanan berhasil ditambahkan'); window.location='menu.php';</script>";
        } else {
            
            echo "<script type='text/javascript'> alert('Data pesanan gagal ditambahkan'); window.location='menu.php';</script>";
        }	
    }
?>