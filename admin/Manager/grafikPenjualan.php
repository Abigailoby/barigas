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

    canvas {
        width: 100% !important;
        height: 550px !important;
    }
</style>

<!-- GRAFIK  -->

<body>


    <div class="container-fluid" style="margin-top:98px">
        <div class="col-lg-12">
            <div class="row">
                <!-- FORM Panel -->
                <div class="col-lg-6 mx-auto" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="card mt-3" style="border:1px solid #5572fe">
                        <div class="card-header" style="background-color: #fac031;">
                            <h2 style="font-size:25px"><b>GRAFIK PENJUALAN PRODUK</b></h2>
                        </div>
                        <div class="card-body">

                            <div class="container">
                                <div class="container-fluid">

                                    <div class="chart mt-3" style="color: black; background-color: white ; border: 4px solid #F9D701; border-radius: 0.6em;">
                                        <canvas id="myChart" class="chart-canvas p-2" height="400px" width="500px"></canvas>
                                        <!-- <canvas id="bar-chart" class="bar-chart-canvas" height="100"></canvas> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer mt-5 ">
                                <div class="row ">
                                    <div class="col-md-12 text-center ">
                                        <a href="Dashboard.php" class="btn btn-primary  " style="color: black; background-color: #F9D701; border: 4px solid #F9D701; border-radius: 0.6em;"><b>Kembali</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6 mx-auto" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="card mt-3" style="border:1px solid #5572fe">
                        <div class="card-header" style="background-color: #fac031;">
                            <h2 style="font-size:25px"><b>GRAFIK PEMASUKAN</b></h2>
                        </div>
                        <div class="card-body">

                            <div class="container">
                                <div class="container-fluid">

                                    <div class="chart mt-3" style="color: black; background-color: white ; border: 4px solid #F9D701; border-radius: 0.6em;">
                                        <canvas id="lineChart" class="chart-canvas p-2" height="400px" width="500px" style="position: relative; width:-webkit-fill-available; height:auto"></canvas>
                                        <!-- <canvas id="bar-chart" class="bar-chart-canvas" height="100"></canvas> -->
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer mt-5 ">
                                <div class="row ">
                                    <div class="col-md-12 text-center ">
                                        <a href="Dashboard.php" class="btn btn-primary  " style="color: black; background-color: #F9D701; border: 4px solid #F9D701; border-radius: 0.6em;"><b>Kembali</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FORM Panel -->

    <!-- Grafikk end -->

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

                        $bnykbrng = 0;
                        while ($bnykbrng < $lala) {

                            $bar1 = "SELECT SUM(itemQuantity) FROM `orderitems` RIGHT JOIN kategori ON kategori.kategoriId = orderitems.barangId and orderitems.barangId = $bnykbrng; ";
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

    <!-- linechart -->
    <script type="text/javascript">
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];



        new Chart("lineChart", {
            type: "line",

            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Juni", "Juli", "Agst", "Sep", "Oct", "Nov", "Des"],
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    label: "Pemasukan",
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: [
                        <?php



                        $jun = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____01%'";
                        $juni = mysqli_query($conn, $jun);
                        $row1 = mysqli_fetch_row($juni);
                        $count1 = $row1[0];

                        echo $count1 . ",";

                        $Feb = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____02%'";
                        $febr = mysqli_query($conn, $Feb);
                        $row2 = mysqli_fetch_row($febr);
                        $count2 = $row2[0];

                        echo $count2 . ",";

                        $Mar = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____03%'";
                        $mare = mysqli_query($conn, $Mar);
                        $row3 = mysqli_fetch_row($mare);
                        $count3 = $row3[0];

                        echo $count3 . ",";

                        $Apr = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____04%'";
                        $apri = mysqli_query($conn, $Apr);
                        $row4 = mysqli_fetch_row($apri);
                        $count4 = $row4[0];

                        echo $count4 . ",";

                        $Mei = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____05%'";
                        $mei = mysqli_query($conn, $Mei);
                        $row5 = mysqli_fetch_row($mei);
                        $count5 = $row5[0];

                        echo $count5 . ",";

                        $Juni = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____06%'";
                        $juni = mysqli_query($conn, $Juni);
                        $row6 = mysqli_fetch_row($juni);
                        $count6 = $row6[0];

                        echo $count6 . ",";

                        $Juli = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____07%'";
                        $juli = mysqli_query($conn, $Juli);
                        $row7 = mysqli_fetch_row($juli);
                        $count7 = $row7[0];

                        echo $count7 . ",";

                        $Agst = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____08%'";
                        $agst = mysqli_query($conn, $Agst);
                        $row8 = mysqli_fetch_row($agst);
                        $count8 = $row8[0];

                        echo $count8 . ",";

                        $Sep = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____09%'";
                        $sep = mysqli_query($conn, $Sep);
                        $row9 = mysqli_fetch_row($sep);
                        $count9 = $row9[0];

                        echo $count9 . ",";

                        $Oct = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____10%'";
                        $oct = mysqli_query($conn, $Oct);
                        $row10 = mysqli_fetch_row($oct);
                        $count10 = $row10[0];

                        echo $count10 . ",";

                        $Nov = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____11%'";
                        $nov = mysqli_query($conn, $Nov);
                        $row11 = mysqli_fetch_row($nov);
                        $count11 = $row11[0];

                        echo $count11 . ",";

                        $Des = "SELECT SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____12%'";
                        $des = mysqli_query($conn, $Des);
                        $row12 = mysqli_fetch_row($des);
                        $count12 = $row12[0];

                        echo $count12;
                        ?>


                    ]
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 6,
                            max: 16
                        }
                    }],
                }
            }
        });
    </script>
    <!-- linechart end -->
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