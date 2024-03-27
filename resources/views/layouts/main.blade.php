@include('layouts.base.header')

<body class="container mx-auto bg-dots-darker">

    @include('layouts.base.nav')
    @yield('content')
    @include('layouts.base.footer')

    @yield('scripts')
    {{-- <script src="{{ asset('js/cart.js') }}"></script> --}}
    <script src="{{ asset('js/search.js') }}"></script>
    <script src="{{ asset('js/newCart.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
