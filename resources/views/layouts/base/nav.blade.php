<section class="sticky top-0 z-40">
    <nav id="navbar" class="flex flex-wrap items-center justify-between p-3 bg-white">
        <h1 class="leading-none text-2xl text-grey-darkest font-bold">
            <a href="/" class="no-underline text-grey-darkest hover:text-black" href="#">
                {{-- Seek<span class="text-orange-400">Bird</span> --}}
                <img width="60" src="{{ asset('logo.jpeg') }}" />
            </a>
        </h1>
        <div class="flex md:hidden">
            <button id="hamburger">
                <img class="toggle block" src="https://img.icons8.com/fluent-systems-regular/2x/menu-squared-2.png"
                    width="40" height="40" />
                <img class="toggle hidden" src="https://img.icons8.com/fluent-systems-regular/2x/close-window.png"
                    width="40" height="40" />
            </button>
        </div>

        <div
            class="toggle hidden w-full md:w-auto md:flex text-right text-bold mt-5 md:mt-0 border-t-2 border-blue-900 md:border-none">
            <a href="{{ route('home.index') }}"
                class="block md:inline-block text-black hover:text-orange-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Home</a>

            <a href="#contact"
                class="block md:inline-block text-black hover:text-orange-500 px-3 py-3 border-b-2 border-blue-900 md:border-none">Contact</a>
            <a href="{{ route('cart.index') }}"
                class="block md:inline-block text-black hover:text-orange-500 px-3 py-3 border-b-2 border-blue-900 md:border-none relative">
                <span class="">Cart</span>
                <span id="cartItem"
                    class="absolute top-0 right-0 bg-orange-500 text-white rounded-full w-5 h-5 flex items-center justify-center">{{$total_items}}</span>
                <i class="fas fa-shopping-cart ml-1"></i>
            </a>
        </div>
        <form class="mb-4 w-full md:mb-0 md:w-1/4 md:mt-0 mt-2">
            <input id="searchField"
                class="bg-grey-lightest border-2 focus:border-orange p-2 rounded-lg shadow-inner w-full text-center"
                placeholder="Search your product here..." type="text">
        </form>
    </nav>
</section>
{{-- <section>
    <div class="flex justify-between text-green-200 shadow-inner rounded p-3 bg-green-600">
        <p class="self-center">
            <strong>Success </strong>This is Success alert.
        </p>
        <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
    </div>
</section> --}}
@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("hamburger").addEventListener("click", function() {
                const navToggle = document.getElementsByClassName("toggle");
                for (let i = 0; i < navToggle.length; i++) {
                    navToggle.item(i).classList.toggle("hidden");
                }
            });
            window.addEventListener('scroll', function() {
                var navbar = document.getElementById('navbar');
                if (window.scrollY > 0) {
                    navbar.classList.add('shadow-sm');
                    navbar.classList.add('bg-white');
                } else {
                    navbar.classList.remove('shadow-sm');
                    navbar.classList.remove('bg-white');
                }
            });

        });
    </script>
@endsection
