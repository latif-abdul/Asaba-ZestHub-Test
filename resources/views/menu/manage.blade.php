@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">
                    <h3>Menu</h3>
                    <form method="post" class="form-group" action="{{$formAction}}">
                    
                        @if(isset($mn)) @method('PUT') @else @method('POST') @endif
                        @csrf
                        <label for="nama_menu" class="col-sm-2 col-form-label">Nama Menu :</label>
                        <input class="form-control" type="text" id="nama_menu" name="nama_menu" value="{{{old('nama_menu',isset($mn->nama_menu)?$mn->nama_menu : '')}}}" placeholder="{{{old('nama_menu',isset($mn->nama_menu)?$mn->nama_menu : '')}}}"><br>
                        <label for="harga" class="col-sm-2 col-form-label">Harga :</label>
                        <input class="form-control" type="number" id="harga" name="harga" value="{{{old('harga',isset($mn->harga)?$mn->harga : '')}}}" placeholder="{{{old('harga',isset($mn->harga)?$mn->harga : '')}}}">
                        <br>
                        <button type="submit" id="tambah" class="btn btn-primary form-control btn-submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection