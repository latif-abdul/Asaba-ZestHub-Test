@extends('layout.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pesanan') }}</div>

                <div class="card-body">
                    <h3>Pesan</h3>
                    <form method="post" action="" id="detail_pesanan">
                        <input type="text" id="id" value="{{{old('id',isset($id)?$id : '')}}}" placeholder="{{{old('id',isset($id)?$id : '')}}}" hidden>
                        <label for="pilih_cust" class="col-sm-2 col-form-label">Pemesan :</label>
                        <select class="form-select" id="pilih_cust" name="cust_id_pemesan">
                            @foreach($cust as $customer)
                            <option value="{{$customer->id}}" {{ (old('cust_id_pemesan') ? old('cust_id_pemesan') : $order->cust_id ?? '') == $customer->id ? 'selected' : '' }}>{{$customer->nama_cust}}</option>
                            @endforeach
                        </select>
                        <label for="pilih_cust" class="col-sm-2 col-form-label">Customer :</label>
                        <select class="form-select" id="pilih_cust" name="cust_id">
                            @foreach($cust as $customer)
                            <option value="{{$customer->id}}">{{$customer->nama_cust}}</option>
                            @endforeach
                        </select>
                        <label for="pilih_pesanan" class="col-sm-2 col-form-label">Menu :</label>
                        <div class="row" style="margin:auto;">
                            <select class="form-select col-md" id="pilih_pesanan" name="menu_id">
                                @foreach($menu as $makanan)
                                <option value="{{$makanan->id}}">{{$makanan->nama_menu}}</option>
                                @endforeach
                            </select>
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                            <input type="number" class="form-group col-sm-4" name="jumlah" id="jumlah">
                        </div><br>
                        <button type="submit" id="tambah" onClick="load_data()" class="btn btn-submit btn-primary">Tambah</button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="detail">

                        </tbody>
                        <tfoot>
                            <tr>
                            <th colspan="4">Total</th>
                            <td></td>
                            </tr>
                        </tfoot>
                    </table>
                    <script>
                        function load_data(){
                            let endpoint = 'http://localhost:8000/api/pesanan'
                            $( "#detail" ).html('')
                            $( "#detail" ).each(function( index, element ) {
                                $.ajax({
                                    url: endpoint + "?id=" + $( '#id' ).val(),
                                    type: "get",
                                    dataType: 'json',
                                    success: function(result){
                                        $.each(result, function (key, value) {
                                            console.log(result)
                                            var total = value.jumlah*parseInt(value.menu.harga)
                                            $( element ).append(
                                                    '<tr>'+
                                                        '<td>'+value.cust.nama_cust+'</td>'+
                                                        '<td>'+value.menu.nama_menu+'</td>'+
                                                        '<td>'+value.jumlah+'</td>'+
                                                        '<td>'+value.menu.harga+'</td>'+
                                                        '<td>'+total+'</td>'+
                                                        '<td><a class="btn btn-danger" onClick="remove('+value.id+')" id="'+value.id+'">Delete</a></td>'+
                                                    '</tr>');
                                        })
                                        
                                        
                                    }
                                })
                            });
                        }; 

                        $( document ).ready(function() {                        
                            load_data();
                        });
                    $('#tambah').click(function(){
                        load_data();
                    });
                    
                    </script>
                    <script>
                        function remove(id){
                            var actionUrl = 'http://localhost:8000/api/pesanan/' + id;
                            console.log(actionUrl)
                            $.ajax({
                                type: "DELETE",
                                url: actionUrl,
                                success: function(data)
                                {
                                ; // show response from the php script.
                                }
                            });
                            load_data();
                        };
                    </script>
                    <script>
                        $("#detail_pesanan").submit(function(e) {

                        e.preventDefault(); // avoid to execute the actual submit of the form.

                        var form = $(this);
                        var actionUrl = form.attr('action');

                        $.ajax({
                            type: "{{$method}}",
                            url: "{{$formAction}}",
                            data: form.serialize(), // serializes the form's elements.
                            success: function(data)
                            {
                                $('#id').text(data.id)
                            }
                        });
                        
                        });
                        
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection