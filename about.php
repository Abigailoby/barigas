<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barigas</title>

  <link rel="icon" href="image/icon.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/about.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Lobster&family=Nunito:wght@600;700&family=Rubik&display=swap"
    rel="stylesheet">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/about.css">
  <link rel="stylesheet" href="css/nav.css">

</head>

<body>

  <?php include 'partials/_dbconnect.php'; ?>
  <?php require 'partials/_nav.php'; ?>


  <!-- About Food Kita -->

  <!-- About Food Kita end -->

  <!-- About Food Kita -->
  <section class="main " data-aos="zoom-in-down">
    <!-- <section class="gambarbwh">
      <div class="container">
      </div>
    </section> -->
    <div class="container py-5">
      <div class="row py-4">
        <!-- < class="col-lg-7 pt-5 text-center"> -->
        <div class="kantinpoto col-lg-1 mt-4">
          <img src="./image/sports.jpg">
        </div>

        <div class="kata col-lg-6 ms-auto mt-3 text-bg-light">
          <h4 class="mb-3 pt-3 text-center">Barigas </h4>
          <p class="pt-3">Selamat datang di situs kami! Kami menyediakan platform online yang menghadirkan beragam
            informasi dan produk terkait olahraga untuk memenuhi kebutuhan Anda. Temukan artikel inspiratif, panduan
            latihan, ulasan produk, dan berbagai tips serta trik untuk meningkatkan kinerja dan kebugaran Anda. Dapatkan
            akses mudah untuk menjelajahi kategori-kategori produk berkualitas, mulai dari pakaian olahraga hingga
            alat-alat latihan terbaru. Situs kami memberikan pengalaman yang user-friendly, menyajikan informasi yang
            terpercaya dan relevan agar Anda dapat menjalani gaya hidup aktif dengan lebih baik. Selamat menjelajahi dan
            temukan potensi Anda dalam dunia olahraga bersama kami!</p>
        </div>

      </div>
      <div class="google-map">
        <br>
        <br>
        <h1>Maps</h1>
        <br>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.964937877668!2d110.4143109086833!3d-7.686911771736357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5f2453927085%3A0x2ed34ddad1b94c1f!2sUniversitas%20Islam%20Indonesia!5e0!3m2!1sen!2sid!4v1688812399840!5m2!1sen!2sid"
          width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="Location">
        <br>
        <br>
        <h1>Location</h1>
        <br>
        <h4>Address</h4>
        <p>8C68+X5F, Boulevard UII, Lodadi, Umbulmartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta
          55584</p>
      </div>
    </div>

  </section>
  <!-- About Food Kita end -->



  <?php require 'partials/_footer.php' ?>

  <style>
    footer img {
      width: 150px;
    }
  </style>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- JavaScript Bundle with Popper -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script> -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="./js/main.js"></script>
</body>

</html>