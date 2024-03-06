<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

@include('admin.layouts.header')

<body>
    @include('admin.layouts.siedbar')
    <section class="home-section">
        @include('admin.layouts.navbar')

        <div class="home-content">
            @yield('content')
        </div>
    </section>

@include('admin.layouts.script')
</body>

</html>
