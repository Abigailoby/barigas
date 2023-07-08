<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="icon" href="../../image/icon.png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Dashboard</title>
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

    #myChart{
        margin-left: 20%;
        width: 100%;
    }

    #lineChart {
        height: 90% !important;
        width: 100%;
    }
</style>

<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">
        <div class="row">
            <!-- Data Analysis -->
            <div class="row">
                    <div class="w-100">
                        <div class="row justify-content-between">

                                <div class="card col-lg-5 p-3 " style="background-color:#fda12dff; color:#F7F6FB; border:4px solid #ff3900ff;">
                                    <div class="card-body">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Penjualan</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="users"></i>
                                                </div>
                                            </div>
                                        <?php
                                        $sql = "SELECT SUM(total) AS total_sum FROM orders";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $totalSum = $row["total_sum"];
                                        } else {
                                            $totalSum = 0;
                                        }

                                        $result->free_result();
                                        ?>

                                        <?php
                                        $html = '<h5 class="mt-1 mb-3">Rp ' . number_format($totalSum, 0, ",", ".") . '</h5>';
                                        echo $html;
                                        ?>

                                    </div>
                                </div>

                                <div class="card col-lg-5 p-3 mt-3" style="background-color:#fda12dff; color:#F7F6FB; border:4px solid #ff3900ff;">
                                    <div class="card-body">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Orders</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        <?php
                                        $sql = "SELECT COUNT(orderId) AS order_count FROM orders";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $orderCount = $row["order_count"];
                                        } else {
                                            $orderCount = 0;
                                        }

                                        $result->free_result();
                                        ?>


                                        <?php
                                        $html = '<h5 class="mt-1 mb-3">' . number_format($orderCount, 0, ",", ".") . '</h5>';
                                        echo $html;
                                        ?>


                                    </div>
                                </div>

                        </div>
                    </div>

                
                <div class="col-lg-12 mt-3" >
                    <div class="card flex-fill w-100" style="border: 1px solid #ff3900ff;">
                        <div class="card-header" style="background-color: #fda12dff; color: #F7F6FB">
                            <!--isinya chart buat nampilin data-->
                            <h5 class="card-title mb-0">Grafik</h5>
                        </div>
                        <div class="row">
                        <div class="card-body col-lg-6 py-3">
                                <b>GRAFIK PENJUALAN</b>
                                <div onclick="location.href='pie.php'" style="color: black; background-color: white; border: 4px solid #fda12dff; border-radius: 0.6em; width: 100%; height: 300px; cursor:pointer;" >
                                    <canvas id="myChart" class="chart-canvas"></canvas>
                                </div>
                                </div>
                                <div class="card-body col-lg-6 py-3" >
                                    <b>GRAFIK PENDAPATAN</b>
                                <div onclick="location.href='line.php'" style="cursor:pointer; color: black; background-color: white; border: 4px solid #fda12dff; border-radius: 0.6em; width: 100%; height: 300px;">
                                    <canvas id="lineChart" class="chart-canvas"></canvas>
                                </div>
                                </div>

                            
                        
                        </div>


                    </div>

                </div>
            </div>



        </div>

        <!-- data Analysis -->



    </div>
</div>

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




<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>