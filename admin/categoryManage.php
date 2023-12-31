<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">    
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
<link rel = "icon" href ="../image/icon.png" type = "image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
<title>Category</title>
<?php

        require 'partials/_dbconnect.php';
        require 'partials/_nav.php';

?>

<style>
    body{
        background: #80808045;
    }

    .goo{
        background-color: #ff3900ff;
        color:white;
    }

    .goo:hover{
        background-color: #fda12dff;
        color:white;
    }

    .pala{
        background-color: #fda12dff;
        color: white;
    }

    .card-footer .btn-primary {
        background-color: #ff3900ff;
        border: 2px solid #fda12dff;
    }

    .card-footer .btn-primary:hover {
        background-color: #ff3900ff;
        border: 2px solid #fda12dff;
    }

    .card-footer .btn-primary:active {
        background-color: #ff3900ff;
        border: 2px solid #fda12dff;
    }

    tbody td .btn-primary {
        background-color: #fda12dff;
        border: 2px solid #ff3900ff;
    }

    tbody td .btn-primary:focus, tbody td .btn-primary:focus {
        background-color: #fda12dff;
        border: 2px solid #ff3900ff;
    }

    tbody td .btn-primary:hover{
        background-color: #fda12dff;
        border: 2px solid #ff3900ff;
    }
    tbody td .btn-primary:active, tbody td .btn-primary:active {
        background-color: #fda12dff;
        border: 2px solid #ff3900ff;
    }

    tbody td .btn-primary.active.focus,
    tbody td .btn-primary.active:focus,
    tbody td .btn-primary.active:hover,
    tbody td .btn-primary:active.focus,
    tbody td .btn-primary:active:focus,
    tbody td .btn-primary:active:hover {
        background-color: #ff3900ff;
        border: 2px solid #fda12dff;
    }

</style>

<div class="container-fluid" style="margin-top:98px">
    <div class="col-lg-12">
        <div class="row">
            <!-- FORM Panel -->
            <div class="col" data-aos="zoom-in-right" data-aos-duration="1000">
                <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
                    <div class="card mt-3" style="border:1px solid #ff3900ff">
                        <div class="card-header" style="background-color: #fda12dff; color:white;">
                            Tambah Kategori Baru
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label">Nama Kategori: </label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label">Deskripsi Kategori: </label>
                                <input type="text" class="form-control" name="desc" required>
                            </div> 
                            <div class="form-group mt-3">
								<label for="image" class="control-label">Gambar</label>
								<input type="file" name="image" id="image" accept=".jpg" class="form-control" required style="border:none;">
								<small id="Info" class="form-text text-muted mx-3">Upload file .jpg.</small>
							</div>  
                        </div>  
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" name="createCategory" class="btn btn-primary d-grid gap-2 col-4 mx-auto"> Tambah </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            <!-- FORM Panel -->
    
            <!-- Table Panel -->
            <div class="col" data-aos="zoom-in-right" data-aos-duration="1000">
                <div class="card mt-3" style="border:1px solid #ff3900ff">
                    <div class="card-body">
                        <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0">
                        <thead style="background-color: #fda12dff; color:white;">
                        <tr>
                            <th class="text-center" style="width:7%;">No</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center" style="width:58%;">Detail Kategori</th>
                            <th class="text-center" style="width:18%;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $sql = "SELECT * FROM `kategori`"; 
                            $result = mysqli_query($conn, $sql);
                            $nomorct = 1;
                            while($row = mysqli_fetch_assoc($result)){
                                $katId = $row['kategoriId'];
                                $katName = $row['namaKategori'];
                                $katDesc = $row['kategoriDesc'];
                                

                                echo '<tr>
                                        <td class="text-center"><b>' .$nomorct++. '</b></td>
                                        <td><img src="/barigas/image/kateg-'.$katId. '.jpg" alt="image for this Category" width="150px" height="150px"></td>
                                        <td>
                                            <p>Nama : <b>' .$katName. '</b></p>
                                            <p>Deskripsi : <b class="truncate">' .$katDesc. '</b></p>
                                        </td>
                                        <td class="text-center">
                                            <div class="row mx-auto" style="width:112px">
                                        <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#updateCat' .$katId. '" style="width:100%">Ubah</button>';
                                
                                if($katId <= 4){
                                    echo '<button class="btn btn-danger" disabled style="width:100%">Hapus</button>';
                                }

                                else{
                                    echo ' <form action="partials/_categoryManage.php" method="POST">
                                    <button name="removeCategory" class="btn btn-danger" style="width:100%">Hapus</button>
                                    <input type="hidden" name="catId" value="'.$catId.'">
                                    </form>';
                                }
                                echo'
                               
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
    $katsql = "SELECT * FROM `kategori`";
    $katResult = mysqli_query($conn, $katsql);
    while($katRow = mysqli_fetch_assoc($katResult)){
        $katId = $katRow['kategoriId'];
        $katName = $katRow['namaKategori'];
        $katDesc = $katRow['kategoriDesc'];
        
?>

<!-- Modal -->
<div class="modal fade" id="updateCat<?php echo $katId; ?>" tabindex="-1" role="dialog" aria-labelledby="updateCat<?php echo $katId; ?>" aria-hidden="true" style="width: -webkit-fill-available;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header pala">
        <h5 class="modal-title" id="updateCat<?php echo $katId; ?>">Category Id: <b><?php echo $katId; ?></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="partials/_categoryManage.php" method="post" enctype="multipart/form-data">
		    <div class="text-left my-2 row" style="border-bottom: 2px solid #dee2e6;">
		   		<div class="form-group col-md-8">
					<b><label for="image">Gambar</label></b>
					<input type="file" name="catimage" id="catimage" accept=".jpg" class="form-control" required style="border:none;" onchange="document.getElementById('itemPhoto').src = window.URL.createObjectURL(this.files[0])">
					<small id="Info" class="form-text text-muted mx-3">Mohon upload .jpg.</small>
					<input type="hidden" id="catId" name="catId" value="<?php echo $katId; ?>">
					<button type="submit" class="btn goo my-1" name="updateCatPhoto">Perbarui Gambar</button>
				</div>
				<div class="form-group col-md-4">
					<img src="/barigas/image/kateg-<?php echo $katId; ?>.jpg" id="itemPhoto" name="itemPhoto" alt="Category image" width="100" height="100">
				</div>
			</div>
		</form>
        <form action="partials/_categoryManage.php" method="post">
            <div class="text-left my-2">
                <b><label for="name">Nama</label></b>
                <input class="form-control" id="name" name="name" value="<?php echo $katName; ?>" type="text" required>
            </div>
            <div class="text-left my-2">
                <b><label for="desc">Deskripsi</label></b>
                <textarea class="form-control" id="desc" name="desc" rows="2" required minlength="6"><?php echo $katDesc; ?></textarea>
            </div>
            <input type="hidden" id="catId" name="catId" value="<?php echo $katId; ?>">
            <button type="submit" class="btn goo d-grid gap-2 col-4 mx-auto" name="updateCategory">Perbarui</button>
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