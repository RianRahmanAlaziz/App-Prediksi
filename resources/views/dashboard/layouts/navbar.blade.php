<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded position-sticky mt-4 left-auto top-1 z-index-sticky bg-gradient-dark"
    id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb text-white">
            <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bold mb-0 text-white">{{ $title }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                    {{-- <span class="input-group-text text-body bg-white  border-end-0 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </span>
                    <input type="text" class="form-control ps-0" placeholder="Search"> --}}
                </div>
            </div>

            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                {{-- <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg"
                            class="fixed-plugin-button-nav cursor-pointer" viewBox="0 0 24 24" fill="#fff">
                            <path fill-rule="evenodd"
                                d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </li> --}}

                <li class="nav-item dropdown ps-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="a" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="/assets/img/default-avatar.png" class="avatar avatar-sm" alt="avatar" />
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="a">
                        <li class="mb-2">
                            <a href="/" class="dropdown-item border-radius-md">
                                <i class="fa-solid fa-house"></i>
                                Home</a>
                        </li>
                        <li class="mb-2">
                            <button class=" dropdown-item border-radius-md" type="button" data-bs-toggle="modal"
                                data-bs-target="#logoutModal">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Log Out
                            </button>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin Logout?</h5>
            </div>
            <div class="modal-footer">
                <button class="btn btn-white" type="button" data-bs-dismiss="modal">Cancel</button>
                <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-dark" type="submit">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
