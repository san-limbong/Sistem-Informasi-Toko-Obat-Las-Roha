<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title }}</title>
  <!-- Bootstrap-->
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/headers/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
  <!-- Custom styles for this template -->
  <link href="/css/headers.css" rel="stylesheet">
  <link href="/css/features.css" rel="stylesheet">



</head>

<body>

  <nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav nav-pills me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Las Roha</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === 'products' ? 'active' : '' }}" href="/layanan">Product</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ $active === 'pricelist' ? 'active' : '' }}" href="/daftarharga">Price List</a>
        </li>

        @if(!empty(auth()->user()->namalengkap))
        @if (auth()->user()->role == 3)
        <li class="nav-item">
          <a class="nav-link {{ $active === 'purchasehistory' ? 'active' : '' }}" href="/riwayatpemesanan">Order History</a>
        </li>
        @endif
        @endif
        <li class="nav-item" hidden>
          <a class="nav-link {{ $active === 'cart' ? 'active' : '' }}" href="/daftarharga">Price List</a>
        </li>

      </ul>
      <ul class="nav py-1">
        @if(empty(auth()->user()->namalengkap))
        <a href="/" class="btn btn-primary">Login</a>
        @else
        <div class="d-flex bd-highlight">
          @if (auth()->user()->role == 3)
          <div class="px-2 bd-highlight">
            <a href="/cart" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path
                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
              </svg></a>
          </div>
        @endif
          <div class="ms-auto bd-highlight py-1">
            <div class="flex-shrink-0 dropdown">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/img/images.png" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="/myprofile">{{ auth()->user()->namalengkap }}</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                @if (auth()->user()->role != 3)
                <li><a class="dropdown-item" href="/dashboard">Pengelola Toko</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                @endif
                <li><a class="dropdown-item" href="/logout">Sign out</a></li>
              </ul>
            </div>
          </div>

        </div>
        @endif
        
      </ul>
    </div>
  </nav>


  <main class="content">
    @yield('content')
  </main>

</body>

</html>