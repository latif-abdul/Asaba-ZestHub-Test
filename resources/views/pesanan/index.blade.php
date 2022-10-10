@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pesanan') }}</div>

                <div class="card-body">
                    <a type="button" class="btn btn-submit" href="{{route('pesanan.create')}}">Tambah Pesanan</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanan as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->cust->nama_cust }}</td>
                                <td>
                                    <a class="btn btn-primary" type="button" href="{{route('pesanan.edit', ['pesanan' => $order->id])}}">Edit</a>
                                    <a class="btn btn-danger" type="button" href="{{route('pesanan.delete', ['id' => $order->id])}}">Delete</a>
                                </td>
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