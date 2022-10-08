<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('layout.header_scripts')
        <title>PESAN MAKAN</title>

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