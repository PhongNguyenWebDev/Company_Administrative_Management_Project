<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="index.html" class="logo">
            <span>Zir<span>cos</span></span>
            <i class="mdi mdi-cube"></i>
        </a>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-expand-lg navbar-light p-0" role="navigation">
        <div class="container-fluid" style="background: #3ac9d6">

            <!-- Navbar-left -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>

            <!-- Right(Notification) -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown user-box">
                    <a href="#" class="nav-link dropdown-toggle waves-effect waves-light user-link"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img loading="lazy" src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="user-img"
                            class="img-fluid img-circle rounded-circle user-img">

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <h5 class="dropdown-item">
                                @if (session()->has('user_name'))
                                    {{ session('user_name') }}
                                @endif
                            </h5>
                        </li>
                        {{-- <li><a href="javascript:void(0)" class="dropdown-item"><i class="ti-user m-r-5"></i> Profile</a>
                        </li> --}}
                        <li><a href="{{ route('logout') }}" class="dropdown-item"><i class="ti-power-off m-r-5"></i>
                                Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
