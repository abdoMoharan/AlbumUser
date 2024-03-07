<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">User Albums</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="{{route('admin.dashboard')}}" class="{{ Route::is('admin.dashboard') ? 'active ' : '' }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.albums.index')}}" class="{{ Route::is('admin.albums.index.*') ? 'active ' : '' }}">
                <i class='bx bx-box'></i>
                <span class="links_name">Albums</span>
            </a>
        </li>





        <li class="log_out">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')"
                    onclick="event.preventDefault();
                  this.closest('form').submit();">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </form>

        </li>
    </ul>


</div>
