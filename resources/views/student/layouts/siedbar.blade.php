<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">CodingLab</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="{{route('dashboard')}}" class="{{ Route::is('dashboard') ? 'active ' : '' }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{route('assgnment.index')}}" class="{{ Route::is('assgnment.index.*') ? 'active ' : '' }}">
                <i class='bx bx-box'></i>
                <span class="links_name">Assignment</span>
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
