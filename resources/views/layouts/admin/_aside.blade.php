<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{asset('assets/logo/logo.png')}}" alt="" width="50" height="50">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">DormLife</span>
        </a>

        <a class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item active open">
            <a class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a class="menu-link">
                        <div class="text-truncate" data-i18n="CRM">
                            <i class='bx bxs-conversation'></i>
                            Chats
                        </div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Manage Services Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manage Services</span>
        </li>

        <!-- Link to Rooms CRUD -->
        <li class="menu-item">
            <a class="menu-link" href="{{ route('admin.rooms.index') }}">
                <i class="menu-icon tf-icons bx bx-clipboard"></i>
                <div class="text-truncate" data-i18n="Rooms">Rooms</div>
            </a>
        </li>

        <!-- Link to Bookings CRUD -->
        <li class="menu-item">
            <a class="menu-link" href="{{ route('admin.bookings.index') }}">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div class="text-truncate" data-i18n="Appointments">Bookings</div>
            </a>
        </li>

        <!-- Link to Users CRUD (Admin Only) -->
        <li class="menu-item">
            <a class="menu-link" href="{{ route('admin.users.index') }}">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div class="text-truncate" data-i18n="Users">Users</div>
            </a>
        </li>

       
    </ul>
</aside>
