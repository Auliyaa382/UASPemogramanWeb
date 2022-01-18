<?php
// include('template.php');
include('koneksi.php');
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['no_meja'])) {
    header("Location: berhasil_login.php");
}
 
if (isset($_POST['submit'])) {
    $no_meja = $_POST['no_meja'];
    $sql = "SELECT * FROM meja WHERE no_meja='$no_meja'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['no_meja'] = $row['no_meja'];
        echo "<script>alert('Nomor Meja Tersedia')</script>";
        session_destroy();
    } else {
        echo "<script>alert('Nomor Meja Tidak Tersedia')</script>";
        session_destroy();
    }
}
?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <title> Jajan Kuy </title>
    <link rel="icon" href="logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="meja.css"> -->
  </head>
 <body>
 <section class="vh-100 gradient-custom">
   <form action="insertdata.php" method="post">
 <div class="bg-image" style ="background-image: url('bg.jpg'); height: 100vh; ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Enter your table</h2>
              <p class="text-white-50 mb-5">Please enter your table number</p>
              <div class="form-outline form-white mb-4">
              <select select class="form-select" name="no_meja" required>
						  <option value="A01"> A01 </option>
						  <option value="A02"> A02 </option>
              <option value="A03"> A03 </option>
						  <option value="A04"> A04 </option>
              <option value="A05"> A05 </option>
						  <option value="A06"> A06 </option>
              <option value="B01"> B01 </option>
						  <option value="B02"> B02 </option>
              <option value="B03"> B03 </option>
						  <option value="B04"> B04 </option>
              <option value="B05"> B05 </option>
						  <option value="B06"> B06 </option>
              <option value="C01"> C01 </option>
						  <option value="C02"> C02 </option>
              <option value="C03"> C03 </option>
              </select>
              </div>
              <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit">Next</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</form>
</section>
 </body>
</html>
