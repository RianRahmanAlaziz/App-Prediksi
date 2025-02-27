<nav class="navbar navbar-expand-lg  fixed-top bg-white transparency border-bottom  border-light navbar-light"
    id="transmenu">
    <div class="container">
        <a class="navbar-brand text-success " href="/">
            <img src="/assets/img/icon-dpr-black.png" width="67" height="16" style="margin:0 auto;"
                alt="Dewan Perwakilan Rakyat">
        </a>
        <button data-bs-toggle="collapse" class="navbar-toggler collapsed bg-dark"
            data-bs-target="#navcol-1"><span></span><span></span><span></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item " href="/about-us">About Us</a></li>
                        <li><a class="dropdown-item" href="/visi-misi">Visi Misi</a></li>

                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link text-dark fw-bold" href="/fasilitas">Fasilitas</a></li>
                <li class="nav-item">

                    @if (Auth::check())
                        <a class="nav-link text-dark fw-bold" href="/dashboard">Dashboard</a>
                    @else
                        {{-- <a class="nav-link text-dark fw-bold" href="" data-bs-target="#login"
                            data-bs-toggle="modal">Login</a> --}}
                        <a class="nav-link text-dark fw-bold" href="/login">Login</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
