<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">    
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
<link rel = "icon" href ="../../image/icon.png" type = "image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
<title>Menu</title>
<?php

        require 'partials/_dbconnect.php';
        require 'partials/_nav.php';

?>

<style>
	body{
        background: #80808045;
    }
	.goo{
        background-color: #5572fe;
        color:white;
    }

    .goo:hover{
        background-color: #4169E1;
        color:white;
    }

    .pala{
        background-color: #fac031;
    }
</style>

<div class="container-fluid" style="margin-top:98px">	
	
	<div class="col-lg-12">
		<div class="row">
		

			<!-- Table Panel -->
			<div class="col-12" data-aos="zoom-in-left" data-aos-duration="1000">
				<div class="card" style="border:1px solid #5572fe">
					<div class="card-body">
						<div class="table-responsive">
						<table class="table table-bordered table-hover mb-0">
							<thead style="background-color: #fac031;">
								<tr>
									<th class="text-center" >Id</th>
									<th class="text-center">Gambar</th>
									<th class="text-center" >Detail Barang</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
                            <?php
                                $sql = "SELECT * FROM `barang`";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $barangId = $row['barangId'];
                                    $barangName = $row['NamaBarang'];
                                    $barangPrice = $row['hargaBarang'];
                                    $barangDesc = $row['barangDesc'];
                                    $barangKategoriId = $row['barangKategoriId'];

                                    echo '<tr>
                                            <td class="text-center">' .$barangKategoriId. '</td>
                                            <td>
                                                <img src="/barigas/image/barang-'.$barangId. '.jpg" alt="image for this item" width="150px" height="150px">
                                            </td>
                                            <td>
                                                <p>Nama : <b>' .$barangName. '</b></p>
                                                <p>Deskripsi : <b class="truncate">' .$barangDesc. '</b></p>
                                                <p>Harga : <b>' .$barangPrice. '</b></p>
                                            </td>
                                            <td class="text-center">
												<div class="row mx-auto" style="width:112px">
												<div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#updateItem' .$barangId. '" style="width:100%">Ubah</button>
                                <form action="partials/_menuManage.php" method="POST">
                                <button name="removeItem" class="btn btn-danger" style="width:100%">Hapus</button>
                                <input type="hidden" name="barangId" value="'.$barangId.'">
                                </form>
                                        </div>
													
												</div>
                                            </td>
                                        </tr>';
                                }
                            ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		
	</div>	
</div>

<?php 
    $barangsql = "SELECT * FROM `barang`";
    $barangResult = mysqli_query($conn, $barangsql);
    while($barangRow = mysqli_fetch_assoc($barangResult)){
        $barangId = $barangRow['barangId'];
        $barangName = $barangRow['NamaBarang'];
        $barangPrice = $barangRow['hargaBarang'];
        $barangKategoriId = $barangRow['barangKategoriId'];
        $barangDesc = $barangRow['barangDesc'];
?>

<!-- Modal -->
<div class="modal fade" id="updateItem<?php echo $barangId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateItem<?php echo $barangId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header pala">
        <h5 class="modal-title" id="updateItem<?php echo $barangId; ?>">Item Id: <?php echo $barangId; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
	  	<form action="partials/_menuManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Gambar</label></b>
					<input type="file" name="itemimage" id="itemimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Please .jpg file upload.</small>
					<input type="hidden" id="barangId" name="barangId" value="<?php echo $barangId; ?>">
					<button type="submit" class="btn goo my-1 mt-2" name="updateItemPhoto">Perbarui Gambar</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/barigas/image/makan-<?php echo $barangId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="item image" width="100" height="100">
				</div>
			</div>
		</form>
		<form action="partials/_menuManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Nama</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $barangName; ?>" type="text" required>
            </div>
			<div class="text-left my-2 row">
				<div class="form-group col-md-6">
                	<b><label for="price">Harga</label></b>
                	<input class="form-control" id="price" name="price" value="<?php echo $barangPrice; ?>" type="number" min="1" required>
				</div>
				<div class="form-group col-md-6">
					<b><label for="catId">Id Kategori</label></b>
                	<input class="form-control" id="catId" name="catId" value="<?php echo $barangKategoriId; ?>" type="number" min="1" required>
				</div>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Deskripsi</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $barangDesc; ?></textarea>
            </div>
            <input type="hidden" id="barangId" name="barangId" value="<?php echo $barangId; ?>">
            <button type="submit" class="btn goo d-grid gap-2 col-4 mx-auto" name="updateItem">Perbarui</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
	}
?>

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
