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
        while ($data = mysqli_fetch_assoc($query1)){
            // echo '<img src="data:image/jpeg;base64,'.base64_encode( $data1['gambar_produk'] ).'"/>';
            $namaproduk=$data['nama_produk'];
            $harga=$data['harga'];
            $id = $data['id_produk'];
            ?>
            <tr>
				<td> <?php echo $id;?> </td>
				<td> <?php echo $namaproduk;?> </td>
                <td> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['gambar_produk'] ).'" style="width:100%;height:100%">';?></td>
				<td> <?php echo $harga;?> </td>
				<td>
					<a href="pesan.php?id=<?php echo $id;?>"> PESAN </a> 
				</td>
        </tr>
	<?php}?>
    <!-- <?php }?> -->
    <!-- <div class="popup" onclick="myFunction()">Click me to toggle the popup!
  <span class="popuptext" id="myPopup">A Simple Popup!</span>
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
} -->
        
    </table> 
        </div>
        </main>    
    <footer>
        <p>Copyright &#169; 2021</p>
    </footer> 
</body>
</html>