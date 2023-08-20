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
      background-size: contain;
    }

    button{
      width: 100%;
    }

    box{
      padding: 0%;
    }

    @font-face {
    font-family: 'Lequire';
    src:  url('font/Lequire.otf');
    }

    .nama_brand{
      font-family: 'Lequire';
			color: black;
      text-align: left;
    }
    
    
  </style>

  <body>
    
    <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="{{ route('dashboard') }}">
            <h1 class="title is-4 nama_brand">Reka</h1>
          </a>
      
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-end">
            @guest
                <div class="navbar-item"> 
                    <div class="buttons">
                    <a class="button is-black is-outlined" href="{{ route('login') }}">
                        Log in
                    </a>
                    </div>
                </div>
            @else
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                    {{ Auth::user()->username }}
                    </a>
            
                    <div class="navbar-dropdown is-right">
                    <a class="navbar-item" href="{{ route('user_profile') }}">
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
      </nav>

      {{-- alert --}}
      @if ($message = Session::get('loginError'))
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

    <section class="section ">
      {{-- <div class="container"> --}}
        <div class="columns is-gapless card">
          <div class="column is-three-fifths" style="background: url('images/totebag4.jpg'); background-size:cover; ">
            {{-- <figure class="image is-3by2">
              <img src="{{ asset('images/totebag4.jpg') }}" alt="">
            </figure> --}}
            <div class="container is-fluid is-mobile content is-medium" style="padding: 50px; margin-top:100px; min-height:400px;">
              <h1 class="nama_brand " style="color:whitesmoke">Reka</h1>
              <p class="has-text-justified" style="color:whitesmoke">Produk kita dapat menjadi teman terbaik untuk menemani hari-harimu. Share Your Fun &#128521;.</p>
            </div>
          </div>

          <div class="column">
            <div class="container" style="padding: 30px; margin-top:30px;">
              <div class="content is-medium">
                <div class="media-content">
                  <p class="title is-4 has-text-centered">User Detail</p>
                  <p class="subtitle is-6 has-text-centered">Please fill in your details.</p><hr>
                </div>
              </div>
              <form action="{{ route('user_detail_process') }}" method="post">
                @csrf
                <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                <div class="field">
                  <label class="label">Name</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" id="name" name="name" placeholder="name" autofocus required>
                    <span class="icon is-small is-left">
                      <i class="fas fa-user"></i>
                    </span>
                    {{-- <span class="icon is-small is-right">
                      <i class="fas fa-exclamation-triangle"></i>
                    </span> --}}
                  </div>
                  {{-- @error('email')
                  <p class="help is-danger">This email is invalid</p>
                  @enderror --}}
                </div>
                <label class="label">Address</label>
                <textarea class="textarea" name="address" placeholder="e.g. Hello world"></textarea>

                <div class="field">
                  <label class="label">Phone</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" id="phone" name="phone" placeholder="phone">
                    <span class="icon is-small is-left">
                      <i class="fas fa-phone"></i>
                    </span>
                  </div>
                </div>
                <input type="text" name="status" value="utama" hidden>
                <div class="field is-horizontal">
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <button type="submit" class="button is-black">Daftar</button>
                      </div>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      {{-- </div> --}}
    </section>
    
    <footer class="footer" style="background-color: black">
      <div class="content has-text-centered" style="color: #f8f8ff">
        <p>
          <b>Bulma</b> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
          <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
          is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
        </p>
      </div>
    </footer>

    <script>
      //delete icon pada alert
      document.addEventListener('DOMContentLoaded', () => {
      (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        const $notification = $delete.parentNode;

        $delete.addEventListener('click', () => {
          $notification.parentNode.removeChild($notification);
        });
      });
    });

    //navbar
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

</body>
</html>