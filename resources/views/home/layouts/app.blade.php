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
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Prediksi</title>
    <link rel="icon" type="image/png" href="/assets/img/logo.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet"
        href="assets/css/-Fixed-Navbar-start-with-transparency-background-BS4--transparency-menu.css">
</head>

<body>
    <div>
        <header>
            @include('home.layouts.navbar')
            @yield('container')
        </header>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/-Fixed-Navbar-start-with-transparency-background-BS4--transparency-menu.js"></script>

</body>

</html>
