<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>

        @if(Session::has('success'))

            toastr.success("{{ Session::get('success') }}")


        @endif

        @if(Session::has('info'))

toastr.info("{{ Session::get('info') }}")


@endif
    </script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
</head> 

<body>
    <div id="app">
        @include('partial.navbar')

        <div class="container">
            <div class="row">
                @if(Auth::check())

                <div class="col-sm-4">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{'/home'}}">Home</a>
                        </li>
                       <li class="list-group-item">
                            <a href="{{route('post.create')}}">Create new post</a>
                            
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('category.create')}}">Create new Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('categories')}}">View Categories</a>
                        </li>
                    </ul>
                </div>


                @endif
                <div class="col-sm-8">


                    @yield('content')

                </div>
            </div>
        </div>



    </div>
</body>

</html>