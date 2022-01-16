<?php
//koneksi database
include ('koneksi.php');
if(isset($_POST['submit']))
{
//mengambil data yang dikirim dari form
    $nomeja=$_POST['no_meja'];

    
//membuat id pesanan
$query = mysqli_query($koneksi, "SELECT max(no_pesanan) as nopesanan FROM tbpesanan");
$data = mysqli_fetch_array($query);
$nopesanan = $data['nopesanan'];
$urutan = (int) substr($nopesanan, 3, 3);
$urutan++;
$huruf = "PES";
$nopesanan = $huruf . sprintf("%03s", $urutan);
$date = date("Y-m-d");

//simpan data 
    $insertdata="INSERT INTO tbpesanan(no_pesanan, no_meja, tgl_pesanan) VALUES('$nopesanan','$nomeja','$date')";
    $sql=mysqli_query($koneksi,$insertdata);    
        if ($sql){
            echo "<script type='text/javascript'> alert('Silahkan pilih menu'); window.location='menu.php';</script>";
        } else {
            
            echo "<script type='text/javascript'>; window.location='meja.php';</script>";
        }	
    }
?>