<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v6.0.6, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v6.0.6, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="{{ asset("home/assets/images/logo20cirebon-96x100.png") }}" type="image/x-icon">
  <meta name="description" content="">
  
  
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset("home/assets/web/assets/mobirise-icons2/mobirise2.css") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/bootstrap/css/bootstrap.min.css") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/bootstrap/css/bootstrap-grid.min.css") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/bootstrap/css/bootstrap-reboot.min.css") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/parallax/jarallax.css") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/dropdown/css/style.css") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/socicon/css/styles.css") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/theme/css/style.css") }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"></noscript>
  <link rel="preload" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"></noscript>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <link rel="preload" as="style" href="{{ asset("home/assets/mobirise/css/mbr-additional.css?v=IcbtaY") }}">
  <link rel="stylesheet" href="{{ asset("home/assets/mobirise/css/mbr-additional.css?v=IcbtaY") }}" type="text/css">
  <style>
  .formulir-pengaduan {
    background-color: #f5f8ff;
    padding: 60px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .form-container {
    max-width: 600px;
    width: 100%;
    text-align: center;
  }

  .form-container h2 {
    font-size: 28px;
    margin-bottom: 10px;
    font-weight: bold;
    color: #222;
  }

  .form-container p {
    font-size: 16px;
    margin-bottom: 30px;
    color: #555;
  }

  .form-box {
    background-color: white;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    text-align: left;
  }

  .form-group {
    margin-bottom: 20px;
  }

  .form-group label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
  }

  .form-group input,
  .form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border-radius: 12px;
    border: 1px solid #ccc;
    font-size: 15px;
    transition: border-color 0.3s;
  }

  .form-group input:focus,
  .form-group textarea:focus {
    border-color: #007bff;
    outline: none;
  }

  .btn-kirim {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    font-weight: 600;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn-kirim:hover {
    background-color: #218838;
  }

  .navbar.scrolled {
    background-color: #1a237e !important;
    transition: background-color 0.3s ease;
  }

  #sambutan-kades {
  background: linear-gradient(to right, #f0f4ff, #ffffff);
  padding: 50px 0;
  }

  .gallery-image .item-wrapper {
    transition: transform 0.3s, box-shadow 0.3s;
  }
  .gallery-image .item-wrapper:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  }
  #preloader {
  position: fixed;
  width: 100%;
  height: 100%;
  background: #fff;
  top: 0;
  left: 0;
  z-index: 9999;
  display: flex;
  justify-content: center;
  align-items: center;
  }
  footer img {
  filter: grayscale(100%);
  transition: filter 0.3s ease;
  }
  footer img:hover {
    filter: grayscale(0%);
  }
   .berita-section {
        padding: 60px 0;
        background-color: #f9f9f9;
      }
      .berita-card {
        transition: transform 0.3s;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      }
      .berita-card:hover {
        transform: translateY(-5px);
      }
      .berita-img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        object-position: top;
        display: block;
        border-radius: 0 !important;
      }

      .berita-content {
        padding: 20px;
        flex-grow: 1;
      }
      .berita-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 10px;
      }
      .berita-desc {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 15px;
      }
      .btn-berita {
        background-color: #1a237e;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        font-size: 0.9rem;
        text-decoration: none;
      }
      .btn-berita:hover {
        background-color: #0d154a;
      }
</style>


  <style>
    .aparat-section {
      text-align: center;
      padding: 40px 20px;
    }

    .section-title {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .aparat-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .aparat-card {
      background-color: #1a237e; /* biru untuk latar belakang */
      color: white;
      border-radius: 15px;
      width: 220px;
      padding-bottom: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      transition: transform 0.3s;
    }

    .aparat-card:hover {
      transform: translateY(-5px);
    }

    .aparat-card img {
      width: 100%;
      height: auto;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
    }

    .aparat-card h3 {
      font-size: 16px;
      font-weight: bold;
      margin: 10px 0 5px;
    }

    .aparat-card p {
      font-size: 14px;
      margin: 0;
    }

  </style>

  
  
</head>
{{-- <div id="preloader">
  <div class="spinner-border text-primary" role="status"></div>
</div> --}}
<body>
  @include('guest.layouts.nav')

  @yield('main')

  @include('guest.layouts.footer')


  <script>
    window.addEventListener('scroll', function () {
      var navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script>
  window.addEventListener('load', () => {
    document.getElementById('preloader').style.display = 'none';
  });
</script>
<!-- Tambahkan sebelum </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/embla-carousel@8.0.0/embla-carousel.umd.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const emblaNode = document.querySelector('.embla');
    const viewportNode = emblaNode.querySelector('.embla__viewport');
    const prevBtn = emblaNode.querySelector('.embla__button--prev');
    const nextBtn = emblaNode.querySelector('.embla__button--next');

    const embla = EmblaCarousel(viewportNode, {
      loop: true,
      align: 'center',
      skipSnaps: false,
    });

    prevBtn.addEventListener('click', () => embla.scrollPrev());
    nextBtn.addEventListener('click', () => embla.scrollNext());
  });
</script>
</body>
</html>