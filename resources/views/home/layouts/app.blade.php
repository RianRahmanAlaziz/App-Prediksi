<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport" />


<style>
    /* Membuka dropdown saat hover */
    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
        /* Menghilangkan delay saat hover */
    }

    .nav-item.dropdown:hover .dropdown-toggle {
        color: #000;
        /* Menyesuaikan warna teks saat hover */
    }

    .padding {
        padding-top: 15vh;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }



    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }

    .feature-icon {
        width: 4rem;
        height: 4rem;
        border-radius: .75rem;
    }

    .icon-square {
        width: 3rem;
        height: 3rem;
        border-radius: .75rem;
    }

    .text-shadow-1 {
        text-shadow: 0 .125rem .25rem rgba(0, 0, 0, .25);
    }

    .text-shadow-2 {
        text-shadow: 0 .25rem .5rem rgba(0, 0, 0, .25);
    }

    .text-shadow-3 {
        text-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .25);
    }

    .card-cover {
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }

    .feature-icon-small {
        width: 3rem;
        height: 3rem;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Prediksi</title>
    <link rel="icon" type="image/png" href="/assets/img/logo.png">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet"
        href="/assets/css/-Fixed-Navbar-start-with-transparency-background-BS4--transparency-menu.css">
    <link rel="stylesheet" href="/css/login-1.css" />


</head>

<body>
    <header>
        @include('home.layouts.navbar')

        @yield('container')
    </header>


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/-Fixed-Navbar-start-with-transparency-background-BS4--transparency-menu.js"></script>

</body>

</html>
