<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

@include('student.layouts.header')

<body>
    @include('student.layouts.siedbar')
    <section class="home-section">
        @include('student.layouts.navbar')

        <div class="home-content">
            @yield('content')
        </div>
    </section>

@include('student.layouts.script')
</body>

</html>
