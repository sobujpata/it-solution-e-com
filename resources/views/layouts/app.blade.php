<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Bazer One of The Best Solution</title>

    <!--- favicon-->
    <link rel="shortcut icon" href="{{ asset('images/icons/apple.png') }}" type="image/x-icon">

    <!--- custom css link-->
    <link href="{{ asset('css/toastify.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style-prefix.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/progress.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/login.css') }}" /> --}}

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <!--- google font link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="chat.css"> -->
    
        {{-- <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> --}}
      
    <style>
        .d-none {
            display: none;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- chat div -->
    <div class="overlay" data-overlay></div>
    <div id="loader" class="LoadingOverlay d-none">
        <div class="Line-Progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    
    @include('layouts.partials.nav')

    <main>
        @yield('content')
    </main>
    @include('layouts.partials.footer')
    <script src="{{asset('js/script.js')}}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    

    @stack('custom-scripts')

    <!--- custom js link-->
    <!-- <script src="chat.js"></script> -->
</body>

</html>
