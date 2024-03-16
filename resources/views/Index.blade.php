<!DOCTYPE html>
<html lang="en">

<head>
    @include('Partials._Head')
</head>

<body>
    <!-- Pre-loader start -->
    @include('Partials._Loader')
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <div id="pcoded" class="pcoded">
                @include('Partials._Headbar')
                <div class="pcoded-overlay-box"></div>
                <div class="pcoded-container navbar-wrapper">
                    <div class="pcoded-main-container">
                        <div class="pcoded-wrapper">
                            @include('Partials._Sidebar')
                            @yield('konten')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('Partials._Script')
</body>

</html>