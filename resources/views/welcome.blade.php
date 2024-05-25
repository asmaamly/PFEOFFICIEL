<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RBAM Importation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
              html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-image: url('{{asset('images/bg3.jpg')}}');
                background-size : 120%;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-left{
                position: absolute;
                left: 30px;
                top: 5px;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 25px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 80px;           
                margin-bottom: 30px;
                font-weight: bold;
                background: linear-gradient(to top, rgb(255, 40, 40), #e6c9c9); /* degraded red and white */
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                /* color: transparent;
                background-image: radial-gardient(center, rgb(255, 62, 62), #e6c9c9);
                -webkit-background-clip: text;
                background-clip: text; */
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
        <div class="top-left">
        <a href="https://www.djezzy.dz/" target="_blank">
                <img src="{{ asset('images/djezzy.png') }}" alt="Logo" width="70" height="80">
        </a>
            </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ route('import') }}">Import page</a>
                    @else
                        <a href="{{ route('services') }}">A propos de nous</a>
                        <a href="{{ url('/login') }}">Se connecter</a>
                        <a href="{{ url('/register') }}">S'inscrire</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                RBAM importation
                </div>

                <div class="links">
                <a class="" href="https://www.djezzy.dz/" target="_blank">Djezzy</a>
                <a class="scroll-to-section" href="{{ route('services') }}">services</a>
                </div>
            </div>
        </div>
    </body>
</html>