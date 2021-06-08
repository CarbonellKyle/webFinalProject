<!doctype html>
<html lang="en">
  <head><base href="">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="welcome/bootstrap.min.css">
    <link rel="stylesheet" href="welcome/style.css">

    <title>Cerberus | POS</title>
  </head>
  <body>
    <section class="site-header">
      <nav class="navbar navbar-expand-sm navbar-dark">
        <div class="container">
          <a href="/" class="navbar-brand">
            <img src="welcome/logo.jpg" style="height: 35px; width: auto;"> Cerberus
         </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link me-4">Login</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link me-4">Signup</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    
    <div id="site-banner">
      <div class="col-12">
        <h1 class="text-white text-center display-4">Point of Sale & Inventory</h1><br>
        <p class="text-white text-center lead">Developed by:</p>
        <ul class="list-unstyled text-white text-center">
          <li>Carbonell, Kyle</li>
          <li>Ermio, Johnny</li>
          <li>Peligrino, Adrian Pol</li>
        </ul>
      </div>

      <div class="animation-area">
        <ul class="box-area">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="welcome/bootstrap.bundle.min.js"></script>
  </body>
</html>