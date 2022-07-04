<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brother's Institute</title>
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    <script src="https://kit.fontawesome.com/9491f9c560.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        #PreLoader {
            height: 100vh !important;
            width: 100% !important;
            position: absolute;
            top: 0;
            background-color: white;
            left: 0;
            background-position: center;
            background-position: center;
            background-size: 30%;
            background-repeat: no-repeat;
            z-index: 99999;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @yield('f-style')
</head>

<body>
    <a href="#scroll-hero" class="Moving-Top">
        <i class="fa-solid fa-arrow-up"></i>
    </a>
    <div id="PreLoader" style="background-image:url('{{ asset('frontend/image/loader.gif') }}')"></div>
    @include('frontend.layout.header')
    @include('frontend.layout.sidebar')
    @yield('f-content')
    @include('frontend.layout.footer')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                prevEl: ".swiper-button-next-icon",
                nextEl: ".swiper-button-prev-icon",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
            autoplay: {
                delay: 4000,
            },
            loop: true,
        });
    </script>
    <script src="{{ asset('frontend/js/app.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script>
        // let us make the js code for the side bar
        const SideBar = document.querySelector('.Side-Bar');
        const Wrapper = document.querySelector('.Siderbar-Wrapper');
        Wrapper.addEventListener("click", () => {
            SideBar.classList.toggle('sidebar-active');
            Wrapper.classList.toggle('Wrapper-active');
        });
        const PreLoader = document.getElementById('PreLoader');
        setTimeout(() => {
            PreLoader.style.display = "none";
        }, 3600);
    </script>
    <!-- Swiper JS -->
</body>

</html>
