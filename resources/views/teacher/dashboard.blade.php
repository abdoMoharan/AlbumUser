<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

@include('teacher.layouts.header')

<body>
    @include('teacher.layouts.siedbar')
    <section class="home-section">
        @include('teacher.layouts.navbar')

        <div class="home-content">
            @yield('content')
        </div>
    </section>

@include('teacher.layouts.script')
</body>

</html>
