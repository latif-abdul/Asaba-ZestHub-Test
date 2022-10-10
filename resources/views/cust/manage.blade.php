@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Customer') }}</div>

                <div class="card-body">
                    <h3>Customer</h3>
                    <form method="post" class="form-group" action="{{$formAction}}">
                    
                        @if(isset($mn)) @method('PUT') @else @method('POST') @endif
                        @csrf
                        <label for="nama_cust" class="col-sm-2 col-form-label">Nama Customer</label>
                        <input class="form-control" type="text" id="nama_cust" name="nama_cust" value="{{{old('nama_cust',isset($mn->nama_cust)?$mn->nama_cust : '')}}}" placeholder="{{{old('nama_cust',isset($mn->nama_cust)?$mn->nama_cust : '')}}}"><br>
                        <button type="submit" id="tambah" class="btn btn-primary form-control btn-submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection