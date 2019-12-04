      <nav class="navbar navbar-expand-md navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/') }}">Pagina principală</a>
                  </li>
                  <li class="nav-item">
                    <a class="navbar-brand" href="{{ url('/category') }}">Categorii</a>
                  </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="{{ url('/speech') }}">Vorbire</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="navbar-brand" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{ __('Autentificare') }}</a></li>
                        <li><a class="navbar-brand" href="{{ route('register') }}">{{ __('Creați un cont') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="navbar-brand dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa fa-user-circle" aria-hidden="true"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/home">Seturi</a>
                                <a class="dropdown-item" href="/results">Rezultate</a>
                                <div class="dropdown-divider"></div>
                                @if(Auth::user()->role_id == 10)
                                    <a class="dropdown-item" href="/adminpanel">Panoul administrator</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Deconectare ') }}<i class="fa fa-sign-out" aria-hidden="true"></i>
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>