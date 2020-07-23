<header>
  {{-- INIZIO HEADER SX --}}
  <div class="header-sx">
    <div class="header-logo">
      <div class="logo-img">
        <a href="{{ route('home') }}">
          <img class="logobnb" src="{{asset('img/LOGO_UNO_MOD_BA.png')}}" alt="logo_boolbnb">
        </a>
      </div>
  </div>
  {{-- FINE HEADER SX --}}
  {{-- INIZIO HEADER DX --}}
  </div>
  <div class="header-dx">
    <ul>
      <li>
        <a href="{{ route('home')}}">Home</a>
      </li>
      @auth
        <li>
          <a href="{{ route('create') }}">Diventa un Host</a>
        </li>
      @endauth
      <li>
        <a href="{{ route('chi_siamo') }}">Chi siamo</a>
      </li>
        <!-- Authentication Links -->
        @guest
            <li id="login" class="nav-item">
                <a class="nav-link login-button" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="register-button nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a href="{{ route('my_apartments') }}" class="dropdown-item">I miei appartamenti</a>
                  <a href="{{ route('my_preferences') }}" class="dropdown-item">Preferiti</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </div>
  {{-- fine header dx --}}
  {{-- inizio header dx responsive --}}
  <div class="responsive-icon">
    <i class="fas fa-bars"></i>
    {{-- <i class="fas fa-times-circle"></i> --}}
  </div>
  <div class="dx-responsive">
    <ul>
      <a href="#" class="indietro"> <i class="fas fa-chevron-up"></i> </a>
        <!-- Authentication Links -->
        @guest
            <li id="login" class="nav-item">
                <a class="nav-link login-button" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="register-button nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a href="{{ route('my_apartments') }}" class="dropdown-item">I miei appartamenti</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        {{-- home assistenza host --}}
        <li>
          <a href="{{ route('home')}}">Home</a>
        </li>
        @auth
          <li>
            <a href="{{ route('create') }}">Diventa un Host</a>
          </li>
        @endauth
        <li>
          <a href="{{ route('chi_siamo')}}">Chi siamo</a>
        </li>
    </ul>
  </div>
  {{-- fine header dx responsive --}}
</header>
