<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('fasilitas') }}">{{ __('Fasilitas') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('kamar') }}">{{ __('Kamar') }}</a>
                            </li>
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                                    <a class="nav-link" href="/home">Dashboard</a>
                            </li>
                        <?php
                                 $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                                 if(!empty($pesanan_utama))
                                    {
                                     $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                                    }
                                ?>
                                <a class="nav-link" href="/checkout">
                                    <i class="fa fa-shopping-cart"></i>
                                    @if(!empty($notif))
                                    <span>{{ $notif }} Pesanan saya</span>
                                    @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                
                                <a class="dropdown-item" href="/home">
                                            {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="/history">
                                            {{ __('Transaksi') }}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
    function checkout(){
        var checkin = new Date($('#cek_in').val());
        var dd = checkin.getDate()+1;
        var mm = checkin.getMonth()+1; //January is 0 so need to add 1 to make it 1!
        var yyyy = checkin.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        // if(dd=32){
        //     dd='01'
        //     // mm+=1
        // }
        if(mm<10){
            mm='0'+mm
        }

            today = yyyy+'-'+mm+'-'+dd;
            console.log(dd);
        document.getElementById("cek_out").setAttribute("min", today);
    }

</script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')
</body>
</html>
