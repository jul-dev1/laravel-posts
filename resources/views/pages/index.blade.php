<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name','Car')}}</title>


    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
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

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Car
            </div>
            <div class="m-3">
                
                <div class="m-1">
                    <a href="./about" class="btn btn-outline-primary m-2">About</a>
                    <a href="./services" class="btn btn-outline-primary m-2">Services</a>
                    <a href="./posts" class="btn btn-outline-primary m-2">Posts</a>
                    <a href="./posts/create" class="btn btn-outline-primary m-2">Create</a>

                </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus id ducimus quae velit nemo quasi recusandae blanditiis.
                    Accusamus tenetur maiores officia asperiores fugit numquam deserunt, omnis, maxime vitae commodi molestiae.
                </p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus id ducimus quae velit nemo quasi recusandae blanditiis.
                    Accusamus tenetur maiores officia asperiores fugit numquam deserunt, omnis, maxime vitae commodi molestiae.
                </p>
            </div>


        </div>
    </div>
</body>

</html>