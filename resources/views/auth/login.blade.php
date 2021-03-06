<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d3ebe7dadd.js" crossorigin="anonymous"></script>
    <!-- Fontawsome -->
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="{{ asset('article/css/nicepage.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('article/css/showarticle.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('article/css/article.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('article/css/article.css') }}" media="screen"> -->
    <link rel="stylesheet" href="{{asset('/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('/css/footer.css')}}">

    <!-- Slick -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick/slick-theme.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}" /> -->

</head>

<body style="margin:0 ; padding :0;">
    <div class="col" style=" pading:0; margin:0; ">
        <div class="row align-items-start">
            <div class="col ">
                <div class="col login">
                    <img src="/img/login.png" alt="">
                </div>
            </div>
            <div class="col" style="padding:0 ; margin:0;">
                <div class="col" style="height:100% ; border-style:solid; background-color:#2D2E33; padding:30px; ">
                    <div class="col login" style="background-color:#DADADA; padding:30px;border-radius:20px;">
                        <!-- <div class="card"> -->
                        <h5 style="text-align: center; padding: 15px">{{ __('LOGIN') }}</h5>
                        <!-- <div class="card-body row row-cols-10"> -->
                        <div>
                            <form method="POST" action="{{ route('login') }}" class="offset-md-1">
                                @csrf

                                <div class="form-group row" style="padding: 10px">
                                    <div class="col">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus
                                            placeholder="Email atau Ponsel">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" style="padding: 10px">
                                    <div class="col">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" style="padding-left: 10px">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="padding: 10px; margin-left: 30%;">
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-danger" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                                <div class="container">
                                    <div class="row align-items-start">
                                        <div class="col .login">
                                            <button type="submit">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                            </form>
                            <div class="col-1">
                                <a href="">or</a>
                            </div>
                            <div class="col register">
                                <a href="/register" class="btn">
                                    Register 
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <footer class="jumbotron-fluid " id="Footer">
        <div class="container">
            <div class="row">
                <div class="col" style="margin-top: 10px;">
                    <a>Contact</a>
                    <h3>pusris.phc@unpad.ac.id</h3>
                    <h3>(022) 84288828</h3>
                    <a>Location</a>
                    <h3>Kampus UNPAD Jatinangor Jalan Raya Bandung-Sumedang KM21 Jatinangor, 45363</h3>
                </div>
                <div class="col footer">
                    <img style="margin-top: 40px;" src="/img/tw.png" alt="">
                    <img style="margin-top: 40px;" src="/img/ig.png" alt="">
                    <img style="margin-top: 40px;" src="/img/yt.png" alt="">
                    <img style="margin-top: 40px;" src="img/fb.png" alt="">

                </div>
            </div>
        </div>
    </footer>
</body>
