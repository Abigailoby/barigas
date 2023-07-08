<?php 
    $itemModalSql = "SELECT * FROM `orders` WHERE `userId`= $userId";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = $itemModalRow['orderId'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderItem<?php echo $orderid; ?>" tabindex="-1" aria-labelledby="orderItem<?php echo $orderid; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="orderItem<?php echo $orderid; ?>">Barang Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
            
                <div class="container">
                    <div class="row">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table text">
                            <thead>
                                <tr>
                                <th scope="col" class="border-0" style="background-color:#5572fe;color: white; ">
                                    <div class="px-3">Barang</div>
                                </th>
                                <th scope="col" class="border-0" style="background-color:#5572fe;color: white; ">
                                    <div class="text-center">Jumlah Pesanan</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $mysql = "SELECT * FROM `orderitems` WHERE orderId = $orderid";
                                    $myresult = mysqli_query($conn, $mysql);
                                    while($myrow = mysqli_fetch_assoc($myresult)){
                                        $barangId = $myrow['barangId'];
                                        $itemQuantity = $myrow['itemQuantity'];
                                        
                                        $itemsql = "SELECT * FROM `barang` WHERE barangId = $barangId";
                                        $itemresult = mysqli_query($conn, $itemsql);
                                        $itemrow = mysqli_fetch_assoc($itemresult);
                                        $barangName = $itemrow['NamaBarang'];
                                        $barangPrice = $itemrow['hargaBarang'];
                                        $barangDesc = $itemrow['barangDesc'];
                                        $barangCategorieId = $itemrow['barangKategoriId'];

                                        echo '<tr>
                                                <th scope="row">
                                                    <div class="p-2">
                                                    <img src="image/barang-'.$barangId. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">'.$barangName. '</a></h5><span class="text-muted font-weight-normal font-italic d-block">Rp. ' . number_format($barangPrice, 0, ",", "."). '/-</span>
                                                    </div>
                                                    </div>
                                                </th>
                                                <td class="align-middle text-center"><strong>' .$itemQuantity. '</strong></td>
                                            </tr>';
                                    }
                                ?>
                            </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
    }
?>