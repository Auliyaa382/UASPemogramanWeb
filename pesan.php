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
    <main>
    <div class="card">
    <h2>Menu</h2>
    <hr>
    <table>
    <form method="POST" action="insertpemesanan.php">
        <?php
        include "koneksi.php";
        $id=$_GET['id'];
        // $nopesanan=$_GET['nopesanan'];
        // $nomeja=$_GET['nomeja'];
        // $date=$_GET['date'];
        $datapesan = mysqli_query($koneksi, 'SELECT * FROM tbproduk where id_produk="'.$id.'"');
        while ($dp = mysqli_fetch_array($datapesan)){
        ?>
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $dp['gambar_produk'] ).'" style="width:100%;height:100%">';?> 
            <h2><?php echo $dp['nama_produk'];?></h2>
            <h3><?php echo "Rp. ",number_format($dp['harga'],0,",",".");?></h3><br> 
            <input type="number" name=qty min="1" max="<?php echo $dp['stok'];?>"><br>
            <input type="hidden" name="id" value=<?php echo $id;?>>
            <input type="hidden" name="nama_produk" value="<?php echo $dp['nama_produk']?>">
            <input type="hidden" name="harga" value=<?php echo $dp['harga']?>>
            <!-- <input type="text" name="nopesanan" value=$nopesanan>
            <input type="hidden" name="nomeja" value=$nomeja>
            <input type="hidden" name="date" value=$date> -->
					<!-- <a href="pesan.php?id=<?php echo $id;?>"> PESAN </a>  -->
                <input type="submit" name="submit" value="PESAN">
	<?php } ?>
    </table> 
        </div>
        </main>    
    <footer>
        <p>Copyright &#169; 2022</p>
    </footer> 
</body>
</html>