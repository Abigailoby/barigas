<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>

<?php include '../partials/_dbconnect.php';?>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Makanan", "Minuman"];
var barColors = [
  "#b91d47",
  "#00aba9"
];

new Chart("myChart", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: [
        <?php

        $bar = "SELECT SUM(itemQuantity) FROM orderitems where barangId = '2'";
        $hasilnya = mysqli_query($conn, $bar);
        $row1 = mysqli_fetch_row($hasilnya);
        $count1 = $row1[0];

        $bari = "SELECT SUM(itemQuantity) FROM orderitems where barangId = '3' ";
        $hasilnya1 = mysqli_query($conn, $bari);
        $row2 = mysqli_fetch_row($hasilnya1);
        $count2 = $row2[0];

        echo $count1 .",";
        echo $count2;



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

</body>
</html>
