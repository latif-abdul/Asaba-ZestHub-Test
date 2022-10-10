@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{route('cust.create')}}">Tambah Cust</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cust as $mn)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mn->nama_cust }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('cust.edit', ['cust'=>$mn->id])}}">Edit</a>
                                    <a class="btn btn-danger" href="{{route('cust.delete', ['id'=>$mn->id])}}">Delete</a>
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