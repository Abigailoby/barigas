<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  
    <title>Barigas</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon">
    <link rel="stylesheet" href="css/nav.css">
    <style>
    #cont {
        min-height : 515px;
    }

    .card-body .btn-primary {
        background-color: #ff3900ff;
        border: 1px solid #fda12dff;
    }

   .card-body .btn-primary:focus, .card-body .btn-primary:focus {
        background-color: #ff3900ff;
        border: 1px solid #fda12dff;
    }

    .card-body .btn-primary:hover{
        background-color: #fda12dff;
        border: 1px solid #ff3900ff;
    }
    .card-body .btn-primary:active, .card-body .btn-primary:active {
        background-color: #ff3900ff;
        border: 1px solid #fda12dff;
    }

    .card-body .btn-primary.active.focus,
    .card-body .btn-primary.active:focus,
    .card-body .btn-primary.active:hover,
    .card-body .btn-primary:active.focus,
    .card-body.btn-primary:active:focus,
    .card-body .btn-primary:active:hover {
        background-color: #fda12dff;
        border: 1px solid #ff3900ff;
    }
    
    </style>
</head>
<body>
    <?php include 'partials/_dbconnect.php';?>
    <?php require 'partials/_nav.php' ?>

    <div class="container my-3">
        <h2 class="py-2">Hasil Pencarian Untuk <em>"<?php echo $_GET['search']?>"</em> :</h2>
        <h3><span id="kat" class="py-2"></span></h3>
        <div class="row">
        <?php 
            $noResult = true;
            $query = $_GET["search"];
            $sql = "SELECT * FROM `kategori` WHERE MATCH(namaKategori, kategoriDesc) against('$query')";
 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?><script> document.getElementById("kat").innerHTML = "kategory: ";</script> <?php 
                $noResult = false;
                $katId = $row['kategoriId'];
                $katname = $row['namaKategori'];
                $katdesc = $row['kategoriDesc'];
                
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="image/kateg-'.$katId. '.jpg" class="card-img-top" alt="image for this barang" width="249px" height="270px">
                        <div class="card-body">
                            <h5 class="card-title"><a href="viewBarangList.php?katid=' . $katId . '">' . $katname . '</a></h5>
                            <p class="card-text">' . substr($katdesc, 0, 29). '...</p>
                            <a href="viewBarangList.php?katid=' . $katId . '" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>';
            }
        ?>
        </div>
    </div>

    <div class="container my-3" id="cont">
        <h3><span id="iteam" class="py-2"></span></h3>
        <div class="row">
        <?php 
            $query = $_GET["search"];
            $sql = "SELECT * FROM `barang` WHERE MATCH(NamaBarang, barangDesc) against('$query')"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?><script> document.getElementById("iteam").innerHTML = "Barang: ";</script> <?php
                $noResult = false;
                $barangId = $row['barangId'];
                $barangName = $row['NamaBarang'];
                $barangPrice = $row['hargaBarang'];
                $barangDesc = $row['barangDesc'];
                $barangkategoriId = $row['barangKategoriId'];
                
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="image/barang-'.$barangId. '.jpg" class="card-img-top" alt="image for this barang" width="249px" height="270px">
                        <div class="card-body">
                            <h5 class="card-title">' . substr($barangName, 0, 20). '...</h5>
                            <h6 style="color: #ff0000">Rp. '.$barangPrice. '/-</h6>
                            <p class="card-text">' . substr($barangDesc, 0, 29). '...</p>
                            <div class="row justify-content-center" style="display:block;">';
                                if($loggedin){
                                    $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE barangId = '$barangId' AND `userId`='$userId'";
                                    $quaresult = mysqli_query($conn, $quaSql);
                                    $quaExistRows = mysqli_num_rows($quaresult);
                                    if($quaExistRows == 0) {
                                        echo '<form action="partials/_manageCart.php" method="POST" style="display:contents;">
                                              <input type="hidden" name="itemId" value="'.$barangId. '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-3 btn-sm" style="width:48%;height:35px">Tambah Keranjang</button>';
                                    }else {
                                        echo '<a href="viewCart.php"><button class="btn btn-primary mx-3 btn-sm">Ke Keranjang</button></a>';
                                    }
                                }
                                else{
                                    echo '<button class="btn btn-primary mx-3 btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal" style="width:50%;height:35px">Tambah Keranjang</button>';
                                }
                                echo '</form>
                                <a href="viewBarang.php?barangid=' . $barangId . '" class="mx-auto btn-sm" style="display:contents;"><button class="btn btn-primary" style="width:30%">Lihat</button></a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            if($noResult) {
                echo '
                    <div class="container">
                        <h1>Anda Mencari - <em>"' .$_GET['search']. '"</em> - Hasil Tidak Ditemukan.</h1>
                        <p class="lead"> Saran: <ul>
                            <li>Pastikan bahwa semua kata dieja dengan benar.</li>
                            <li>Coba kata kunci yang berbeda.</li>
                            <li>Coba kata kunci yang lebih umum.</li></ul>
                        </p>
                    </div>
                ';
            }
        ?>
        </div>
    </div>
    
<style>
    footer img{
width: 150px;
}
</style>

    <?php require 'partials/_footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>