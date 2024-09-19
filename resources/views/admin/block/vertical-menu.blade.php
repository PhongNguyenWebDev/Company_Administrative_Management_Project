<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>

                <li class="has_sub">
                    <a href="{{ route('dashboard') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span> </a>
                </li>

                <li class="has_sub">
                    <a href="{{ route('location') }}" class="waves-effect"><i class="mdi mdi-invert-colors"></i>
                        <span> Location </span></a>
                </li>

                <li class="has_sub">
                    <a href="{{ route('user.index') }}"
                        class="{{ auth()->check() && auth()->user()->hasRole('admin') ? 'visually-hidden' : '' }} waves-effect">
                        <i class="mdi mdi-layers"></i><span> Users & Roles </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('assets.index') }}" class="waves-effect"><i class="mdi mdi-calendar"></i><span>
                            Assets </span></a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

        <div class="help-box">
            <h5 class="text-muted m-t-0">For Help ?</h5>
            <p class=""><span class="text-dark"><b>Email:</b></span> <br /> support@support.com</p>
            <p class="m-b-0"><span class="text-dark"><b>Call:</b></span> <br /> (+123) 123 456 789</p>
        </div>

    </div>
    <!-- Sidebar -left -->

</div>
