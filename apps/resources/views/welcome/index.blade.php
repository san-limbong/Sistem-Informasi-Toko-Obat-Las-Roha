<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <!-- Custom styles for this template -->
  <link href="/css/carousel.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico">


  <title>SILAS</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Las Roha</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav px-2">
          <a class="nav-link text-white" href="#home">Home</a>
          <a class="nav-link text-white" href="#ourproduct">Our Product</a>
          <a class="nav-link text-white" href="#aboutus">About Us</a>
          <a class="nav-link text-white" href="#contactus">Contact Us</a>
          <a class="nav-link text-white" href="/layanan">Product</a>
        </div>
      </div>
    </div>

    @if(!empty(auth()->user()->namalengkap))
    <div class="d-flex">
      <!-- Example split danger button -->
      <div class="dropdown me-4">
        <button class="btn btn-success bg-dark dropdown-toggle me-4" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->namalengkap }}
        </button>
        <ul class="dropdown-menu me-4" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item me-4" href="/myprofile">Profil</a></li>
          @if (auth()->user()->role != 3)
          <li><a class="dropdown-item me-4" href="/dashboard">Pengelola Toko</a></li>
          @endif
          <li><a class="dropdown-item me-4" href="/logout">Logout</a></li>
        </ul>
      </div>
    </div>
    @endif

    

  </nav>
  <div class="b-example-divider"></div>
  <!-- Heroes -->
  <section id="home">
    <div class="container col-xxl-8 px-4 py-2">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-2">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="/img/cartoon.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
            height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Sistem Informasi Toko Obat Las Roha</h1>
          <p class="lead">Sistem Informasi Toko Obat Las Roha merupakan
            sebuah Sistem Informasi yang dibangun untuk Toko
            Obat Las Roha Balige untuk memberikan layanan
            transaksi pemesanan dan penjualan serta efisiensi
            pengelolaan barang pada toko obat Las Roha.</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            
          @if(empty(auth()->user()->namalengkap))
            <a href="/register" class="btn btn-success btn-lg px-4">Register</a>
            <a href="/login" class="btn btn-primary btn-lg px-4 me-md-2">Login</a>
          @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Main -->
  <hr class="featurette-divider">
  <div class="container marketing">
    <!-- Slider -->
    <section id="ourproduct">
      <a href="/layanan" style="text-decoration: none">
        <h1 class="text-center text-black pb-5">Our Product</h1>
      </a>
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">

              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="px-3 py-2">
                    <div class="card bg-dark text-white">
                      <img src="/images/products/suntik.jpg" class="card-img" alt="suntik">
                      <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                          style="background-color: rgba(0, 0, 0, 0.7)">Suntik Medis</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="px-3 py-2">
                    <div class="card bg-dark text-white">
                      <img src="/images/products/betamethasone.jpg" class="card-img" alt="betamethasone">
                      <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                          style="background-color: rgba(0, 0, 0, 0.7)">Betamethasone Valerate</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="px-3 py-2">
                    <div class="card bg-dark text-white">
                      <img src="/images/products/blackmores_vitamina.jpg" class="card-img" alt="blackmores_vitamina">
                      <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                          style="background-color: rgba(0, 0, 0, 0.7)">Black Mores</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="px-3 py-2">
                    <div class="card bg-dark text-white">
                      <img src="/images/products/paracetamol.jpg" class="card-img" alt="paracetamol">
                      <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                          style="background-color: rgba(0, 0, 0, 0.7)">Paracetamol</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="px-3 py-2">
                    <div class="card bg-dark text-white">
                      <img src="/images/products/acetylcysteine.jpg" class="card-img" alt="acetylcysteine" height="380px">
                      <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                          style="background-color: rgba(0, 0, 0, 0.7)">Acetylcysteine 200 mg</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="px-3 py-2">
                    <div class="card bg-dark text-white">
                      <img src="/images/products/amoxicillin.jpg" class="card-img" alt="amoxicillin" height="380px">
                      <div class="card-img-overlay d-flex align-items-center p-0">
                        <h5 class="card-title text-center flex-fill p-4 fs-3"
                          style="background-color: rgba(0, 0, 0, 0.7)">Amoxicillin</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>


    <!-- About Us -->
    <section id="aboutus">
      <hr class="featurette-divider">
      <h1 class="text-center pb-5">About Us</h1>
      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Toko Obat Las Roha</h2>
          <p class="lead">Alamat: Napitupulu Bagasan, Kec. Balige, Toba, Sumatera Utara</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img src="/img/Profil.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
            height="500">
        </div>
      </div>
    </section>

    <!-- Contact Us -->
    <section id="contactus">
      <hr class="featurette-divider">
      <h1 class="text-center pb-5">Contact Us</h1>
      <div class="row row-cols-1 mb-3 text-center">
        <div class="col-6">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">Telepon</h4>
            </div>
            <div class="card-body justify-content-center">
              <div class="pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                  class="bi bi-telephone-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd"
                    d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                </svg>
              </div>
              <div class="card-title pt-4">
                <h3>0813 9758 6902</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="col-6">
          <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
              <h4 class="my-0 fw-normal">Whatsapp</h4>
            </div>
            <div class="card-body justify-content-center">
              <div class="pt-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                  class="bi bi-whatsapp" viewBox="0 0 16 16">
                  <path
                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                </svg>
              </div>
              <div class="card-title pt-4">
                <h3>0813 9758 6902</h3>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>


  <!-- Footer -->
  <div class="b-example-divider"></div>

  <footer class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <ul class="nav justify-content-center pt-2 pb-3 mb-3">
        <li class="nav-item"><a href="#home" class="nav-link px-2 text-white-50">Home</a></li>
        <li class="nav-item"><a href="#ourproduct" class="nav-link px-2 text-white-50">Our Product</a></li>
        <li class="nav-item"><a href="#aboutus" class="nav-link px-2 text-white-50">About Us</a></li>
        <li class="nav-item"><a href="#contactus" class="nav-link px-2 text-white-50">Contact Us</a></li>
      </ul>
      <p class="text-center text-muted">SILAS-2022 &copy;</p>
    </div>
  </footer>
  </div>
</body>

</html>