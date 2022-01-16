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
        <?php
        include "koneksi.php";
        $query1 = mysqli_query($koneksi, 'SELECT * FROM tbproduk');
        while ($data1 = mysqli_fetch_assoc($query1)){
            // echo '<img src="data:image/jpeg;base64,'.base64_encode( $data1['gambar_produk'] ).'"/>';
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
               <!-- <div class="inputpesan">
                    <input type="text" name="id" value=<?php echo $id ?>>
                    <input type="text" name="nama_produk" value=<?php echo $namaproduk ?>>
                    <input type="text" name="harga" value=<?php echo $harga ?>>
                    <input type="number" name="qty" min="0" max="100">
               </div> -->
               <div class="button">  
            <!-- <input type="submit" name="submit" value="TAMBAH KE KERANJANG"> -->
            <a href="pesan.php?id=<?php echo $id ?>">TAMBAH PESANAN</a>
        </div> 
        </div>
    <?php }?>
    <!-- <div class="popup" onclick="myFunction()">Click me to toggle the popup!
  <span class="popuptext" id="myPopup">A Simple Popup!</span>
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
} -->
<!-- </script> -->
    </table> 
        </div>
        </main>    
    <footer>
        <p>Copyright &#169; 2022</p>
    </footer> 
</body>
</html>