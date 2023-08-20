<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reka Bags</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fontawesome.min.css') }}">
    <script type="text/javascript" src="{{ asset('/js/all.js') }}"></script>
  </head>
  <style>
    body{
      background-color: #f8f8ff;
    }

    @font-face {
    font-family: 'Lequire';
    src:  url('font/Lequire.otf');
    }

    .nama_brand{
    font-family: 'Lequire';
    }
 
    .hero {
      color: white;
      height: 100%;
      width: 100%;
      
    }

    .btn-shop{
        box-shadow: 10px 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    }

    .btn-shop:hover{
        box-shadow: 0 0 0 0;
    }

    .card{
        -webkit-transition: 0.4s ease;
        transition: 0.4s ease;
    }

    .card:hover{
        box-shadow: 10px 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        -webkit-transform: scale(1.08);
        transform: scale(1.08);
    }
  </style>
  <body>
    {{-- slide --}}
    <section class="hero is-white is-fullheight ">
        <div class="hero-head">
          <nav class="navbar">
            <div class="container">
              <div class="navbar-brand">
                <a class="navbar-item" href="{{ route('dashboard') }}">
                    <h1 class="title is-3 nama_brand">Reka</h1>
                </a>
                <span class="navbar-burger" data-target="navbarMenuHeroB">
                  <span></span>
                  <span></span>
                  <span></span>
                </span>
              </div>
              <div id="navbarMenuHeroB" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item is-active is-inverted" href="{{ route('dashboard') }}">
                        <b>Home</b>
                      </a>
                      <a class="navbar-item is-inverted" href="{{ route('product.index') }}">
                        <b>Products</b>
                      </a>
                      <a class="navbar-item is-inverted @yield('page_status_order')" href="{{ route('history.index') }}">
                        <b>My Orders</b>
                      </a>
                      <a class="navbar-item" href="{{ route('cart.index') }}">
                        <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>
                      </a>
                    @guest
                        <div class="navbar-item"> 
                            <div class="buttons">
                            <a class="button is-black is-inverted" href="{{ route('login') }}">
                                Log in
                            </a>
                            </div>
                        </div>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                            <b>{{ Auth::user()->username }}</b>
                            </a>
                    
                            <div class="navbar-dropdown is-right">
                            <a class="navbar-item">
                                Profil
                            </a>
                            <a class="navbar-item">
                                Elements
                            </a>
                            <a class="navbar-item">
                                Components
                            </a>
                            <hr class="navbar-divider">
                            <div class="navbar-item">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="post">
                                    @csrf
                                </form>
                            </div>
                            </div>
                        </div>
                    @endguest
                  </div>
              </div>
            </div>
          </nav>
        </div>
      
        <div class="hero-body">
          <div class="container has-text-centered">
            <p class="subtitle" id="p-brand" style="color: black; font-size: 25px;font-weight:600;text-shadow: 1px 1px 0.5px white">
                Share Your Fun with 
            </p>
            <h1 class="title p-brand" style="font-size: 100px; color:white; font-weight:700; ">
                <p style="text-shadow: 2px 2px 4px black">REKA <strong style="font-size: 100px; color:black; text-shadow: 2px 2px 4px white">BAGS</strong></p>
            </h1>
            {{-- <p class="subtitle" style="color: #5b4b41; font-weight:500">
                Produk kita dapat menjadi teman terbaik untuk menemani hari-harimu.
            </p> --}}
            <a class="button is-black is-large btn-shop" href="{{ route('product.index') }}">SHOP NOW</a>
          </div>
        </div>
      
        <div class="hero-foot">
          <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
              <ul>
                <li>
                  <a href="#kategori"><b>Category</b></a>
                </li>
                <li>
                  <a href="#new_arrival"><b>New Arrival</b></a>
                </li>
                <li>
                  <a href="#ootd"><b>#REKAOOTD</b></a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </section>
      {{-- end slide --}}

      {{-- kategori --}}
      <section class="section is-medium" id="kategori">
        <h2 class="title is-2">CATEGORY</h2>
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/tote-slingbag.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Tote-Sling Bag</p>
                          <p class="subtitle is-6">Tote Bag dan Sling Bag jadi satu &#128525;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/tote-backpack.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Tote-Backpack</p>
                          <p class="subtitle is-6">Tote Bag tapi juga Backpack &#128077;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/sling-bag.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Sling Bag</p>
                          <p class="subtitle is-6">Buat kamu yang ga mau repot &#128526;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/sling-pouch.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Sling Pouch</p>
                          <p class="subtitle is-6">Males bawa tas besar?Ini solusinya &#128521;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
      </section>
      {{-- end kategori --}}

      <section class="section" style="background-color: black; color:white">
        <div class="container">
            <div class="content is-large has-text-centered is-spaced">
                <p>Dapatkan <b>Discount IDR 10K</b> untuk pembelian produk diatas 50K</p>
                <a class="button is-white is-large is-outlined" href="{{ route('product.index') }}">SHOP NOW</a>
              </div>
          </div>
      </section>

      {{-- new arrival --}}
      <section class="section is-medium" id="new_arrival">
        <h2 class="title is-2">NEW ARRIVAL</h2>
        <div class="columns">
            <div class="column is-3">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/tote-slingbag.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Tote-Sling Bag</p>
                          <p class="subtitle is-6">Tote Bag dan Sling Bag jadi satu &#128525;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column is-3">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/tote-backpack.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Tote-Backpack</p>
                          <p class="subtitle is-6">Tote Bag tapi bisa jadi Backpack &#128077;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column is-3">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/sling-bag.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Sling Bag</p>
                          <p class="subtitle is-6">Buat kamu yang ga mau repot &#128526;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="column is-3">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/product/sling-pouch.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="media">
                        <div class="media-content">
                          <p class="title is-4">Sling Pouch</p>
                          <p class="subtitle is-6">Males bawa tas besar?Ini solusinya &#128521;</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>
      </section>
      {{-- end new arrival --}}

      {{-- ootd --}}
      <section class="section is-medium" id="ootd">
        <h2 class="title is-2">#REKAOOTD</h2>
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/bg/ootd1.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/bg/ootd2.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/bg/ootd3.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-image">
                      <figure class="image is-4by4">
                        <img src="{{ asset('/images/bg/ootd4.webp') }}" alt="Placeholder image">
                      </figure>
                    </div>
                </div>
            </div>
          </div>
      </section>
      {{-- end ootd --}}

      <footer class="footer" style="background-color: black">
        <div class="content has-text-centered" style="color: #f8f8ff">
          <p>
            <b>Bulma</b> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
          </p>
        </div>
      </footer>

      {{-- navbar  --}}
      <script>
        document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Add a click event on each of them
        $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

        });
        });

        });
      </script>

      {{-- slide --}}
      <script src="{{ asset('/js/easy_background.js') }}"></script>

      <script>
      easy_background(".hero",

          {
          slide: ["images/bg/2.webp", "images/bg/1.webp", "images/bg/3.webp"],

          delay: [5000, 5000, 5000, 5000, 5000]
          }


      );
      </script>
  </body>
</html>