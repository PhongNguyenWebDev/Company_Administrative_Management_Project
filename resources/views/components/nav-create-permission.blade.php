<div class="row mt-tabs p-0 text-center text-uppercase d-flex justify-content-center">
    <div class="col-6 nav-item">
        <h3>
            <a class="nav-link item-detail {{ request()->routeIs('user.create') ? 'active bg-primary text-white' : '' }}"
                href="{{ route('user.create') }}">USERS</a>
        </h3>
    </div>
    <div class="col-6 nav-item px-xl-5 px-2">
        <h3>
            <a class="nav-link item-detail {{ request()->routeIs('role.create') ? 'active bg-primary text-white' : '' }}"
                href="{{ route('role.create') }}">ROLES</a>
        </h3>
    </div>
    <hr>
</div>
