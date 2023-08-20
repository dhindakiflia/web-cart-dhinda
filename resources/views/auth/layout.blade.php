<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reka Bags</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/image_slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.nice-number.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="{{ asset('/js/jquery.nice-number.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/all.js') }}"></script>
    
  </head>
  <style>
    body{
      background-color: #f8f8ff;
      /*  */
    }

    @font-face {
    font-family: 'Lequire';
    src:  url('./font/Lequire.otf') ;
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

    #column-grid{
      display: grid;
      grid-template-columns: repeat(4,1fr);
    }

    @media screen and (max-width: 760px) {
    #column-grid {
      display: grid;
      grid-template-columns: repeat(2,1fr);

    }
    
    }

    @media screen and (max-width: 500px) {
    #column-grid {
      grid-template-columns: repeat(1,1fr);
    }
    }
  </style>
  <body>
    {{-- slide --}}
    <section class="hero is-white ">
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
                  <a class="navbar-item is-inverted @yield('page_status_home')" href="{{ route('dashboard') }}">
                      <b>Home</b>
                    </a>
                    <a class="navbar-item is-inverted @yield('page_status_product')" href="{{ route('product.index') }}">
                      <b>Products</b>
                    </a>
                    <a class="navbar-item is-inverted @yield('page_status_order')" href="{{ route('history.index') }}">
                      <b>My Orders</b>
                    </a>
                    <a class="navbar-item @yield('page_status_cart')" href="{{ route('cart.index') }}">
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
          <h1 class="title p-brand" style="font-size: 50px; color:white; font-weight:700; ">
              <p style="text-shadow: 2px 2px 4px black"> @yield('nama_1') <strong style="font-size: 50px; color:black; text-shadow: 2px 2px 4px white">@yield('nama_2')</strong></p>
          </h1>
        </div>
      </div>
    </section>
    {{-- end slide --}}
    {{-- alert --}}
    @if ($message = Session::get('error'))
    <div class="notification is-danger">
        <button class="delete"></button>
        {{ session('loginError') }}
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="notification is-success">
        <button class="delete"></button>
        {{ session('success') }}
    </div>
    @endif
    {{-- end alert --}}

      @yield('content')

      {{-- @yield('page') --}}

      <footer class="footer" style="background-color: black">
        <div class="content has-text-centered" style="color: #f8f8ff">
          <p>
            <b>Bulma</b> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
            <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
            is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
          </p>
        </div>
      </footer>

      {{-- nav bar menu --}}
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

        //delete icon pada alert
        document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
          const $notification = $delete.parentNode;

          $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
          });
        });
      });
      </script>

      {{-- slide  --}}
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