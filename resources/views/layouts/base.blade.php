<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Title</title>
    <link rel="stylesheet" href="{{asset('/style.css')}}">
    @stack('styles')
    @stack('scripts')

</head>
<body>
<div class="header">
    <p><img src="images/logo.png"></p>
    <p><input type="search" name="q" placeholder="Поиск по сайту">
        <input type="submit" value="Найти"></p>

    @foreach($catalog as $cat)
        <h2> <a href = "{{asset('catalog/'.$cat->id)}}">
         {{$cat->name}} </a></h2>
            @endforeach

<ul>
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
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
    <p style="text-align: center"><button>Корзина</button>

</div>
<div class="container">
    <nav>
        <ul>
            <li><a href="">Главная</a></li>
            <li><a href="">Каталог</a>
                <ul>
                    <li><a href="#">Платья</a></li>
                    <li><a href="#">Футболки и топы</a></li>
                    <li><a href="#">Юбки</a></li>
                </ul>
            </li>

            <li><a href="{{asset('contacts')}}">Контакты</a></li>
            <li><a href="{{asset('product/all')}}">Products</a></li>
            <li><a href="">О нас</a></li>
        </ul>
    </nav>
</div>


<div class="left-column">
    <div class="main-foto">
    @yield('content')


    </div>
</div>

<div class="footer">Footer
    <footer>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">© 2021 Company, Inc</p>

                <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                </a>

                <ul class="nav col-md-4 justify-content-end">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
                </ul>
            </footer>
        </div>
    </footer>
</div>

</body>
</html>
