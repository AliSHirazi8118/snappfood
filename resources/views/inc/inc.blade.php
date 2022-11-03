<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snappfood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!-- Just an image -->
        <nav class="navbar navbar-light bg-light" style="margin-left: 10px">
            <a class="navbar-brand" href="#">
            <img src="{{asset('snappfood/snappfood-logos-idxesAu4KJ.svg')}}" width="100px" height="70px" alt="">
            </a>
        </nav>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a class="navbar-brand" style="margin-left: 850px" href="#">{{auth()->user()->name}}</a>
                        <a class="nav-link" href="{{ url('/dashboard') }}">داشبورد</a>
                    @else
                        <a class="nav-link" style="margin-left: 850px" href="{{ route('login') }}">ورود</a>
                        @if (Route::has('register'))
                            <a class="nav-link mt-2" style="margin-left: 850px" href="{{ route('register') }}">ثبت نام</a>
                        @endif
                    @endauth
                </div>
            @endif
            </li>
          <form class="d-flex form-inline my-2 my-lg-0" style="margin-left: 100px">
            <input class="form-control mr-sm-2" type="search" placeholder="جستجو در رستوران ها" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>

</head>
  <body style="background-color: #FF00A4">
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
