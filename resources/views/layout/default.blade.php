<!DOCTYPE HTML>
<html>
    <head>
        @include('layout.header_scripts')
        <title>MAKROMEDIA</title>
    </head>
    <body>
        @include('sidebar')
        <div class="mainBoxContent">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer_scripts')
    </body>
</html>