<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name">CodingLab</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="{{route('teacher.dashboard')}}" class="{{ Route::is('teacher.dashboard') ? 'active ' : '' }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{route('teacher.question.index')}}" class="{{ Route::is('teacher.question.*') ? 'active ' : '' }}">
                <i class='bx bx-box'></i>
                <span class="links_name">Questiona</span>
            </a>
        </li>





        <li class="log_out">
            <form method="POST" action="{{ route('teacher.logout') }}">
                @csrf
                <a href="route('teacher.logout')"
                    onclick="event.preventDefault();
                  this.closest('form').submit();">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </form>

        </li>
    </ul>


</div>
