<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
    <div class="jumbotron">
            <h1>Jajan Kuy</h1>
            <p></p>
        </div>
    </header>
    <nav>
            <ul>
                <li><a href="index.php">Keranjang</a></li>
            </ul>
        </nav>
    <main>
    <div class="card">
    <h2>Menu</h2>
    <hr>
    <table>
        <?php
        
        include "koneksi.php";
        $query1 = mysqli_query($koneksi, 'SELECT * FROM tbproduk');
        while ($data1 = mysqli_fetch_assoc($query1)){
            $namaproduk=$data1['nama_produk'];
            $harga=$data1['harga'];
            $id = $data1['id_produk'];
            ?>
            <!-- <form action="" method ="POST"> -->
            <div class="kotak" style="width:300px;height:350px;margin:25px;background:;float:left;">
               <div class="gambar" style="width:100%;height:60%;background:yellow;">
               <?php
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $data1['gambar_produk'] ).'" style="width:100%;height:100%">';
                ?>
               </div>
               <div class="untuktext">
                      <h4><?php echo $namaproduk?><h/4>
                      <div class="btn btn-sm btn-success"><?php echo "Rp. ",number_format($harga,0,",",".")?></div><br>
               </div>
               <div class="button">  
            <a href="pesan.php?id=<?php echo $id ?>">TAMBAH PESANAN</a>
        </div> 
        </div>
    <?php }?>
    
    </table> 
        </div>
        </main>    
    <footer>
        <p>Copyright &#169; 2022</p>
    </footer> 
</body>
</html>