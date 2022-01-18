<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<header>
    <div class="jumbotron">
            <h1>Jajan Kuy</h1>
            <p></p>
        </div>
    </header>
    <main>
    <div class="card">
<body>
    <h2>Transaksi Berhasil</h2>
<table>
    <tr>
        <td>No.</td>
        <td>NAMA PRODUK</td>
        <td>HARGA</td>
        <td>QTY</td>
        <td>SUBTOTAL</td>
    </tr>
        <?php
        $n =1;
        include "koneksi.php";
        $query1="SELECT no_pesanan FROM tbpesanan ORDER BY no_pesanan DESC LIMIT 1";
        $cek=mysqli_query($koneksi,$query1);
        while ($data=mysqli_fetch_assoc($cek)){
        $nopesanan=$data['no_pesanan'];
        }
        $query = mysqli_query($koneksi, 'SELECT * FROM tbdetail JOIN tbproduk on tbdetail.id_produk=tbproduk.id_produk where tbdetail.no_pesanan="$nopesanan"');
        while ($data = mysqli_fetch_array($query)) {
        ?>
        
            <tr>
                <?php 
                $idproduk = $data['id_produk'];
                $data['subtotal'] = $data['harga']*$data['qty']
                ?>
                <td><?php echo $n++;?></td>
                <td><?php echo $data['nama_produk'] ?></td>
                <td><?php echo "Rp. ",number_format($data['harga'],0,",",".") ?></td>
                <td><?php echo $data['qty'] ?></td>
                <td><?php echo "Rp. ",number_format($data['subtotal'],0,",",".") ?></td>

                <?php
                    if($data['subtotal'] != 0){
                @$total += $data['subtotal'];
                }?>
            </tr>
            
            <!-- <tr>
                <?php $data['total'] = $data['subtotal']?>
                <td>TOTAL</td>
                <td><?php $data['total']?></td>
            </tr> -->
        <?php } ?>
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php 
            if(!empty($total)){
                echo "Rp. ",number_format($total,0,",",".");
            }else{
                echo 0;
            }
            ?></td>
        </tr>
 </table>
 </main>
    <footer>
        <p>Copyright &#169; 2022</p>
    </footer>
</body>
</html>