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

    .chart-canvas {
        margin: 10px;
    }
    
    
</style>

<body>

<!-- content -->

    
            <div class="row">
                <!-- grafik-->
                <div class="col-lg-12 mx-auto" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="card mt-3" style="border:1px solid #ff3900ff">
                        <div class="card-header" style="background-color: #fda12dff; color:#F7F6FB">
                            <h2 style="font-size:25px"><b>PENJUALAN PRODUK</b></h2>
                        </div>
                        <div class="card-body">

                            <div class="container">
                                <div class="container-fluid">

                                    <div class="chart mt-3" style="color: black; background-color: white ; border: 4px solid #fda12dff; border-radius: 0.6em; width:40%; margin:auto;">
                                        <canvas id="myChart" class="chart-canvas"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
    <!-- Grafikk end -->

                <!-- daftar barangnya -->

                <div class="col-lg-12 mx-auto" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="card mt-3" style="border:1px solid #ff3900ff">
                        
                        <div class="card-body">

                        <div class="table-responsive">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: #fda12dff;">
								<tr>
									<th class="text-center" style="color:#F7F6FB">Jenis Barang</th>
									<th class="text-center" style="color:#F7F6FB" >Total</th>
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
                                $no =1;
                            $daftar = "SELECT k.namaKategori, SUM(oi.itemQuantity) as 'susum' FROM orderitems oi JOIN barang b ON(oi.barangId = b.barangId) JOIN kategori k ON(k.kategoriId = b.barangKategoriId) WHERE b.barangKategoriId=$totkat GROUP BY k.namaKategori ORDER BY susum DESC";
                            $bb = mysqli_query($conn, $daftar);
                            while($brs = mysqli_fetch_assoc($bb)) {
                                $no++;
                                $nama = $brs['namaKategori'];
                                $tutal = $brs['susum'];
                                

                                echo '<tr>
                                
                                <td>
                                    <p class="text-center"><b>' .$nama. '</b></p>
                                </td>
                                <td class="text-center">
                                    <p class="text-center ">' .$tutal . '</>
                                </td>
                            </tr>';
                            
                            }
                        
                        $totkat++;
                            }

                            
                            ?>
							</tbody>
						</table>
                        <div class="card-footer mt-5 ">
                                <div class="row ">
                                    <div class="col-md-12 text-center ">
                                        <a href="Dashboard.php" class="btn btn-primary  " id="bulik" style="color: #F7F6FB; background-color: #fda12dff; border: 1px outset #ff3900ff; border-radius: 0.6em;"><b>Kembali</b></a>
                                    </div>
                                </div>
                            </div>
						</div>
                        </div>
                    </div>
                </div>

                <!-- daftar barangnya end -->


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
    <script>
        var namanya = [<?php

                        $mak = "SELECT MAX(kategoriId) FROM kategori";
                        $go = mysqli_query($conn, $mak);

                        while ($barisea = mysqli_fetch_assoc($go)) {
                            $lulu = $barisea['MAX(kategoriId)'];
                        }

                        $totnama = 1;
                        while ($totnama <= $lulu) {
                            $ngaran = "SELECT namaKategori FROM `kategori` where kategoriId = '$totnama'";
                            $keluaran = mysqli_query($conn, $ngaran);
                            $rowwe = mysqli_fetch_row($keluaran);
                            $bismillah = isset($rowwe[0]) ? $rowwe[0] : '';

                            echo "'" . $bismillah . "'" . ", ";
                            $totnama++;
                        }

                        ?>];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: namanya,
                datasets: [{
                    backgroundColor: barColors,
                    data: [
                        <?php

                        $bts = "SELECT MAX(orderId) FROM orderitems";
                        $coba = mysqli_query($conn, $bts);

                        while ($baris = mysqli_fetch_assoc($coba)) {
                            $lala = $baris['MAX(orderId)'];
                        }

                        $bnykbrng = 1;
                        while ($bnykbrng < $lala) {

                            $bar1 = "SELECT SUM(oi.itemQuantity) FROM orderitems oi JOIN barang b ON(oi.barangId = b.barangId) JOIN kategori k ON(k.kategoriId = b.barangKategoriId) WHERE b.barangKategoriId = $bnykbrng; ";
                            $hasilnya = mysqli_query($conn, $bar1);
                            $row1 = mysqli_fetch_row($hasilnya);
                            $count1 = $row1[0];

                            echo $count1 . ",";
                            $bnykbrng++;
                        }



                        ?>


                    ]
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: "World Wide Wine Production 2018"
                }
            }
        });
    </script>
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