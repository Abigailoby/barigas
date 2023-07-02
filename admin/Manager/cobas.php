<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="icon" href="../../image/icon.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Grafik Penjualan</title>
<?php

require 'partials/_dbconnect.php';
require 'partials/_nav.php';

?>

<style>
    body {
        background: #80808045;
    }

    .goo {
        background-color: #5572fe;
        color: white;
    }

    .goo:hover {
        background-color: #4169E1;
        color: white;
    }

    .pala {
        background-color: #fac031;
    }
</style>

<body>

    <!-- content -->


    <div class="row">
        <!-- grafik-->


        <!-- Grafikk end -->

        <!-- daftar barangnya -->

        <div class="col-lg-6 mx-auto" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="card mt-3" style="border:1px solid #5572fe">
                <div class="card-header" style="background-color: #fac031;">
                    <h2 style="font-size:25px"><b>GRAFIK PENJUALAN PRODUK</b></h2>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead style="background-color: #fac031;">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Jenis Barang</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $batas = "SELECT MAX(kategoriId) FROM kategori";
                                $sambung = mysqli_query($conn, $batas);

                                while ($aa = mysqli_fetch_assoc($sambung)) {
                                    $kate = $aa['MAX(kategoriId)'];
                                }

                               $totkat =1;
                               while($totkat <= $kate) {
                                $daftar = "SELECT k.namaKategori, SUM(oi.itemQuantity) as 'susum' FROM orderitems oi JOIN barang b ON(oi.barangId = b.barangId) JOIN kategori k ON(k.kategoriId = b.barangKategoriId) WHERE b.barangKategoriId=$totkat";
                                $bb = mysqli_query($conn, $daftar);
                                while($brs = mysqli_fetch_assoc($bb)){
                                    $no = 1;
                                }
                                $totkat++;
                               }
                                // $jumlh = 1;
                                // $daftar = "SELECT k.namaKategori, SUM(oi.itemQuantity) as 'susum' FROM orderitems oi JOIN barang b ON(oi.barangId = b.barangId) JOIN kategori k ON(k.kategoriId = b.barangKategoriId) WHERE b.barangKategoriId=$jumlh";

                                // $bb = mysqli_query($conn, $daftar);
                                // while ($brs = mysqli_fetch_assoc($bb)) {

                                //     $no = 1;
                                //     $nama = $brs['namaKategori'];
                                //     $tutal = $brs['susum'];
                                //     echo $tutal;
                                // }


                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- daftar barangnya end -->


        <!-- tes -->
        <!-- <div class="col-12" data-aos="zoom-in-left" data-aos-duration="1000">
				<div class="card" style="border:1px solid #5572fe">
					<div class="card-body">
						<div class="table-responsive">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: #fac031;">
								<tr>
									<th class="text-center" >No</th>
									<th class="text-center">Jenis Barang</th>
									<th class="text-center" >Total</th>
								</tr>
							</thead>
							<tbody> -->
        <?php
        // $sql = "SELECT * FROM `food`";
        // $result = mysqli_query($conn, $sql);
        // while($row = mysqli_fetch_assoc($result)){
        //     $foodId = $row['foodId'];
        //     $foodName = $row['foodName'];
        //     $foodPrice = $row['foodPrice'];
        //     $foodDesc = $row['foodDesc'];
        //     $foodCategorieId = $row['foodCategorieId'];

        //     echo '<tr>
        //             <td class="text-center">' .$foodCategorieId. '</td>
        //             <td>
        //                 <img src="/foodKita/image/makan-'.$foodId. '.jpg" alt="image for this item" width="150px" height="150px">
        //             </td>
        //             <td>
        //                 <p>Nama : <b>' .$foodName. '</b></p>
        //                 <p>Deskripsi : <b class="truncate">' .$foodDesc. '</b></p>
        //                 <p>Harga : <b>' .$foodPrice. '</b></p>
        //             </td>
        //             <td class="text-center">
        // 				<div class="row mx-auto" style="width:112px">
        // 				<div class="d-grid gap-2">
        // <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#updateItem' .$foodId. '" style="width:100%">Ubah</button>
        // <form action="partials/_menuManage.php" method="POST">
        // <button name="removeItem" class="btn btn-danger" style="width:100%">Hapus</button>
        // <input type="hidden" name="foodId" value="'.$foodId.'">
        // </form>
        //         </div>

        // 				</div>
        //             </td>
        //         </tr>';
        // }
        ?>
        </tbody>
        </table>
    </div>
    </div>
    </div>
    </div>
    <!-- tes end -->

    </div>

    <!-- content end -->

    <!-- piechart -->

    <!-- piechart end -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>