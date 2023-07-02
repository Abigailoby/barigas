<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barigas</title>
  <link rel = "icon" href ="image/icon.png" type = "image/x-icon">

  <!-- bs cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Rubik&display=swap" rel="stylesheet">

  <!-- css modif -->
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/nav.css">
  
  <style>
  .modal-open{
    padding-right: 0px !important;
  }

  footer img{
    width:150px;
  }

  .card-body .btn-primary {
        background-color: #ff3900ff;
        border: 1px solid #fda12dff;
    }

   .card-body .btn-primary:focus, .card-body .btn-primary:focus {
        background-color: #ff3900ff;
        border: 1px solid #fda12dff;
    }

    .card-body .btn-primary:hover{
        background-color: #fda12dff;
        border: 1px solid #ff3900ff;
    }
    .card-body .btn-primary:active, .card-body .btn-primary:active {
        background-color: #ff3900ff;
        border: 1px solid #fda12dff;
    }

    .card-body .btn-primary.active.focus,
    .card-body .btn-primary.active:focus,
    .card-body .btn-primary.active:hover,
    .card-body .btn-primary:active.focus,
    .card-body.btn-primary:active:focus,
    .card-body .btn-primary:active:hover {
        background-color: #fda12dff;
        border: 1px solid #ff3900ff;
    }
</style>

</head>

<body>
<?php include 'partials/_dbconnect.php';?>
<?php require 'partials/_nav.php'; ?>

  <!-- section1 -->
  <section class="main mt-0" data-aos="fade-up" data-aos-duration="1000">
    <div class="container py-0">
      <div class="row py-0">
        <div class="col-lx-7 pt-0 text-center">
          <div class="kata py-5 my-5 animate__animated animate__slideInLeft">
            <h4>Jadilah  <span>Aktif,</span> Siap Beraksi!</h4>
            <h1 class='kata'>
            
             Tempat Tepat untuk Perlengkapan Olahraga Anda
            </h1>
            <p>Menjual berbagai macam Perlengkapan olahraga dengan harga murah dan lengkap</p>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- section1 end -->

  <!-- welcome -->
  <section class="welcome text-center pb-5" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="750">
    <div class="container py-5">
      <div class="row py-5 text-white">
        <div class="col-lg-6 m-auto ">
          <h1> Welcome To Barigas</h1>
          <div class="line2 my-4"></div>
          <p class="">Menyediakan Pakaian olahraga, alat-alat olahraga, dan multi-vitamin dengan harga yang terjangkau serta berkualitas .</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="card my-3">
            <div class="card-body py-5">
              <span><i class="bi bi-truck"></i></span>
              <h5 class="head1 py-3">Free Delivery</h5>
              <p class="per1">Dengan 2 km atau kurang Barigas akan menyediakan Pengiriman pesanan gratis</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card my-3">
            <div class="card-body py-5">
              <span><i class="bi bi-moon-stars"></i></span>
              <h5 class="head1 py-3">Halal</h5>
              <p class="per1">Menjual berbagai perlengkapan olahraga untuk mendukung kegiatanmu</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card my-3">
            <div class="card-body py-5">
              <span><i class="bi bi-cash"></i></span>
              <h5 class="head1 py-3">Cheap</h5>
              <p class="per1">Harga yang sesuai dengan kantong mahasiswa, dijamin LAYAK UNTUK DIBELI!!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- welcome end-->

  <!-- product -->
  <section class="product bg-light " data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="750">
  <div class="container">
      <div class="row py-5 text-center">
        <div class="col-lg-6 m-auto">
            <h1>Our Menu</h1>
          <div class="line my-4"></div>
        </div>
      </div>
    
      <div class="row">
      <?php 
        $sql = "SELECT * FROM `kategori`"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          $id = $row['kategoriId'];
          $kat = $row['namaKategori'];
          $desc = $row['kategoriDesc'];

          if($id <= 4){
          echo '<div class="col-auto mx-auto mt-3">
                  <div class="card" style="width: 20rem;border: 1px groove #5572fe;">
                    <img src="image/kateg-'.$id. '.jpg" class="card-img-top" alt="image for this kategori" width="249px" height="270px">
                    <div class="card-body">
                      <h5 class="card-title"><a href="viewBarangList.php?katid=' . $id . '">' . $kat . '</a></h5>
                      <p class="card-text">' . substr($desc, 0, 20). '... </p>
                      <a href="viewBarangList.php?katid=' . $id . '" class="btn btn-primary  d-grid gap-2 col-auto mx-auto">Selengkapnya</a>
                    </div>
                  </div>
                </div>';
              }
              else{
                break;
              }
        }
      ?>
    </div>
    <div class="row text-center py-5">
        <div class="col-lg-6 m-auto">
          <button class="mbtn1" onclick="location.href='menu.php'">Lihat Menu</button>
        </div>
      </div>
  </div>
      </section>
 
  <!-- product end -->

  <!-- About -->
  <section class="about" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="750">
    <div class="container">
      <div class="row py-3">
        <div class="col-lg-5 py-5 offset-lg-7 col-md-12 col-sm-12 col-12 text-center">
          
          <h1>About Barigas</h1>
          <div class="line my-4 text-start"></div>
          <p class="text-start">Barigas adalah sebuah website yang menjual berbagai macam perlengkapan olahraga
            kita.</p>

          <button class="mbtn1 mt-4" onclick="location.href='about.php'">Baca Lebih Lanjut</button>
        </div>
      </div>
    </div>
  </section>
  <!-- about end -->

  <!-- testi -->
  <section id="testimonial" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="750">
    <div class="wrapper testimonial-section pb-5">
      <div class="container text-center">
        <div class="judulT text-center pt-5">
          <h2>Testimonial</h2>
        </div>
        <div class="row">
           <div class="col-lg-12">
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                  aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                  aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="carousel-caption ">
                    <div class="person" >
                      <img src="./image/alam.png" alt="Pelanggan" style="height: 100%;">
                    </div>
                    <div class="content text-center">
                      <p>"Multi-vitaminnya murah- murah!"</p>
                      <h5>bre</h5>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption ">
                    <div class="person">
                      <img src="./image/lakian.png" alt="Pelanggan">
                    </div>
                    <div class="content text-center">
                      <p>"Barangnya lengkap semua."</p>
                      <h5>anu</h5>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="carousel-caption">
                    <div class="person">
                      <img src="./image/legenda.png" alt="Pelanggan" style="height: 100%;">
                    </div>
                    <div class="content text-center">
                      <p>"Berigas pengirimannya cepat."</p>
                      <h5>ciciw</h5>
                    </div>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- testi end -->

  

  <?php require 'partials/_footer.php';?>


  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</body>

</html>