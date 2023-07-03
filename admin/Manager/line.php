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
                    <h2 style="font-size:25px"><b>Pendapatan Perbulan</b></h2>
                </div>
                <div class="card-body">

                    <div class="container">
                        <div class="container-fluid">

                            <div class="chart mt-3" style="color: black; background-color: white ; border: 4px solid #fda12dff; border-radius: 0.6em; width:75%; margin:auto;">
                                <canvas id="lineChart" class="chart-canvas"></canvas>
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
                                    <th class="text-center" style="color:#F7F6FB">Nama Bulan</th>
                                    <th class="text-center" style="color:#F7F6FB">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $jun = "SELECT MONTHNAME('2023-01-01') AS nama_bulan
,SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____01%'";
                                $juni = mysqli_query($conn, $jun);
                                $row1 = mysqli_fetch_row($juni);
                                $count1 = $row1[0];
                                $count1h = $row1[1];


                                $Feb = "SELECT MONTHNAME('2023-02-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____02%'";
                                $febr = mysqli_query($conn, $Feb);
                                $row2 = mysqli_fetch_row($febr);
                                $count2 = $row2[0];
                                $count2h = $row2[1];

                                $Mar = "SELECT MONTHNAME('2023-03-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____03%'";
                                $mare = mysqli_query($conn, $Mar);
                                $row3 = mysqli_fetch_row($mare);
                                $count3 = $row3[0];
                                $count3h = $row3[1];

                                $Apr = "SELECT MONTHNAME('2023-04-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____04%'";
                                $apri = mysqli_query($conn, $Apr);
                                $row4 = mysqli_fetch_row($apri);
                                $count4 = $row4[0];
                                $count4h = $row4[1];

                                $Mei = "SELECT MONTHNAME('2023-05-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____05%'";
                                $mei = mysqli_query($conn, $Mei);
                                $row5 = mysqli_fetch_row($mei);
                                $count5 = $row5[0];
                                $count5h = $row5[1];

                                $Juni = "SELECT MONTHNAME('2023-06-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____06%'";
                                $juni = mysqli_query($conn, $Juni);
                                $row6 = mysqli_fetch_row($juni);
                                $count6 = $row6[0];
                                $count6h = $row6[1];


                                $Juli = "SELECT MONTHNAME('2023-07-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____07%'";
                                $juli = mysqli_query($conn, $Juli);
                                $row7 = mysqli_fetch_row($juli);
                                $count7 = $row7[0];
                                $count7h = $row7[1];


                                $Agst = "SELECT MONTHNAME('2023-08-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____08%'";
                                $agst = mysqli_query($conn, $Agst);
                                $row8 = mysqli_fetch_row($agst);
                                $count8 = $row8[0];
                                $count8h = $row8[1];

                                $Sep = "SELECT MONTHNAME('2023-09-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____09%'";
                                $sep = mysqli_query($conn, $Sep);
                                $row9 = mysqli_fetch_row($sep);
                                $count9 = $row9[0];
                                $count9h = $row9[1];

                                $Oct = "SELECT MONTHNAME('2023-10-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____10%'";
                                $oct = mysqli_query($conn, $Oct);
                                $row10 = mysqli_fetch_row($oct);
                                $count10 = $row10[0];
                                $count10h = $row10[1];

                                $Nov = "SELECT MONTHNAME('2023-11-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____11%'";
                                $nov = mysqli_query($conn, $Nov);
                                $row11 = mysqli_fetch_row($nov);
                                $count11 = $row11[0];
                                $count11h = $row11[1];

                                $Des = "SELECT MONTHNAME('2023-12-01') AS nama_bulan, SUM(total) FROM `orders` WHERE orderStatus = '1' AND orderDate LIKE '_____12%'";
                                $des = mysqli_query($conn, $Des);
                                $row12 = mysqli_fetch_row($des);
                                $count12 = $row12[0];
                                $count12h = $row12[1];

                                $bul = array($count1, $count2, $count3, $count4, $count5, $count6, $count7, $count8, $count9, $count10, $count11, $count12);
                                $jull = array($count1h, $count2h, $count3h, $count4h, $count5h, $count6h, $count7h, $count8h, $count9h, $count10h, $count11h, $count12h);


                                // sort($jull);
                                $bleng = count($jull);

                                $age = array($count1 => $count1h, $count2 => $count2h, $count3 => $count3h, $count4 => $count4h, $count5 => $count5h, $count6 => $count6h, $count7 => $count7h, $count8 => $count8h, $count9 => $count9h, $count10 => $count10h, $count11 => $count11h, $count12 => $count12h);

                                // $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
                                asort($age);

                                foreach ($age as $x => $x_value) {

                                    if ($x_value != "") {
                                        echo '<tr>
                                
                                <td>
                                    <p class="text-center"><b>' . $x . '</b></p>
                                </td>
                                <td class="text-center">';

                                        if ($x_value > 1500000) {
                                            echo  '  <p class="text-center text-danger">' . $x_value . '</>';
                                        } else {
                                            echo ' <p class="text-center text-success">' . $x_value . '</>';
                                        }

                                        '</td>
                            </tr>';
                                    }
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
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
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