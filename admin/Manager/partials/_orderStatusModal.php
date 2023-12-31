<style>
    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #02e64e;
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #0ecf4e;
        color: #fff
    }

    .track .step.deactive:before {
        background: #e32020;
    }

    .track .step.deactive .icon {
        background: #e32020;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
    
</style>

<?php 
    $statusmodalsql = "SELECT * FROM `orders`";
    $statusmodalresult = mysqli_query($conn, $statusmodalsql);
    while($statusmodalrow = mysqli_fetch_assoc($statusmodalresult)){
        $orderid = $statusmodalrow['orderId'];
        $status = $statusmodalrow['orderStatus'];
        if ($status == 0) 
            $tstatus = "Pesanan Dikirim.";
        elseif ($status == 1) 
            $tstatus = "Pesanan Diterima.";
        elseif ($status == 2)
            $tstatus = "Sedang Disiapkan.";
        elseif ($status == 3)
            $tstatus = "Sedang Dijalan!";
        elseif ($status == 4) 
            $tstatus = "Sampai.";
        elseif ($status == 5) 
            $tstatus = "Pesanana Ditolak.";
        else
            $tstatus = "Pesanan Dibatalkan.";

        if($status >= 1 && $status <= 4) {
            $deliveryDetailSql = "SELECT * FROM `delivery` WHERE `orderId`= $orderid";
            $deliveryDetailResult = mysqli_query($conn, $deliveryDetailSql);
            $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);
            $trackId = isset($deliveryDetailRow['id']) ? $deliveryDetailRow['id'] : '';
            $deliveryBoyName = isset($deliveryDetailRow['deliveryName']) ? $deliveryDetailRow['deliveryName'] : '';
            $deliveryBoyPhoneNo = isset($deliveryDetailRow['deliveryPhone']) ? $deliveryDetailRow['deliveryPhone'] : '';
            $deliveryTime = isset($deliveryDetailRow['deliveryTime']) ? $deliveryDetailRow['deliveryTime'] : '';
            if($status == 4)
                $deliveryTime = 'xx';
        }
        else {
            $trackId = 'xxxxx';
            $deliveryBoyName = '';
            $deliveryBoyPhoneNo = '';
            $deliveryTime = 'xx';
        }

?>
<!-- Modal -->
<div class="modal fade" id="orderStatus<?php echo $orderid; ?>" tabindex="-1" aria-labelledby="orderStatus<?php echo $orderid; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="orderStatus<?php echo $orderid; ?>">Status Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body" id="printThis">
                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                    <article class="card">
                        <div class="card-body">
                            <h6><strong>Id Pemesanan:</strong> #<?php echo $orderid; ?></h6>
                            <article class="card">
                                <div class="card-body row">
                                    <div class="col"> <strong>Perkiraan Waktu:</strong> <br><?php echo $deliveryTime; ?> minute </div>
                                    <div class="col"> <strong>Diantar Oleh:</strong> <br> <?php echo $deliveryBoyName; ?> | <i class="fa fa-phone"></i> <?php echo $deliveryBoyPhoneNo; ?> </div>
                                    <div class="col"> <strong>Status:</strong> <br> <?php echo $tstatus; ?> </div>
                                    <div class="col"> <strong>Melacak #:</strong> <br> <?php echo $trackId; ?> </div>
                                </div>
                            </article>
                            <div class="track">
                            <?php
                                if($status == 0){
                                      echo '<div class="step active"> <span class="icon "> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Dikirim</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Diterima</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Disiapkan</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Dijalan </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box" style="margin-top: 10px;"></i> </span> <span class="text">Sampai</span> </div>';
                                }
                                elseif($status == 1){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Dikirim</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Diterima</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-times" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Disiapkan</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Dijalan </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box" style="margin-top: 10px;"></i> </span> <span class="text">Sampai</span> </div>';
                                }
                                elseif($status == 2){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Dikirim</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Diterima</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Disiapkan</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Dijalan  </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box" style="margin-top: 10px;"></i> </span> <span class="text">Sampai</span> </div>';
                                }
                                elseif($status == 3){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Dikirim</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Diterima</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Disiapkan</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Dijalan </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box" style="margin-top: 10px;"></i> </span> <span class="text">Sampai</span> </div>';
                                }
                                elseif($status == 4){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Dikirim</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Diterima</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Disiapkan</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck" style="margin-top: 10px;"></i> </span> <span class="text"> Sedang Dijalan</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-box" style="margin-top: 10px;"></i> </span> <span class="text">Sampai</span> </div>';
                                } 
                                elseif($status == 5){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Dikirim</span> </div>
                                          <div class="step deactive"> <span class="icon"> <i class="fa fa-times" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Ditolak.</span> </div>';
                                }
                                else {
                                    echo '<div class="step deactive"> <span class="icon"> <i class="fa fa-times" style="margin-top: 10px;"></i> </span> <span class="text">Pesanan Dibatalkan.</span> </div>';
                                }
                            ?>
                            </div>
                            <!-- <a href="contact.php" class="btn btn-warning">Help <i class="fa fa-chevron-right"></i></a> -->
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>

