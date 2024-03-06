<nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">@yield('title_page','Dashboard')</span>
    </div>

    <div class="profile-details">
        <span class="admin_name">{{Auth::guard('web')->user()->name}}</span>

        <i class='bx bx-chevron-down'></i>
    </div>
</nav>
