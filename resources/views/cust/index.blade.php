@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menu as $mn)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mn->nama_menu }}</td>
                                <td>{{ $mn->harga }}</td>
                            </tr>
                            @endforeach
                        </tbodY>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection