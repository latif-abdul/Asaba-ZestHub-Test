<?php

namespace App\Http\Controllers;
use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Cust;
use App\Models\Menu;
use Illuminate\Http\Request;

class DetailPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pesanan = Pesanan::find($request->id)->first();
        $cust = Cust::All();
        $menu = Menu::All();
        return view('tambah_pesanan')->with(compact(['pesanan', 'cust', 'menu']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataPemesan['cust_id'] = $request->cust_id_pemesan;
        $pesanan = Pesanan::create($dataPemesan);

        $data['cust_id'] = $request->cust_id;
        $data['pesanan_id'] = $pesanan->id;
        $data['jumlah'] = $request->jumlah;
        $data['menu_id'] = $request->menu_id;
        
        DetailPesanan::create($data);
        return response()->json(["result" => "ok"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $pesanan = Pesanan::find($id);
        $detail = DetailPesanan::where('pesanan_id' , '=', $id)
            ->with('pesanan')
            ->with('cust')
            ->with('menu')->get();
        return $detail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['cust_id'] = $request->cust_id;
        $data['pesanan_id'] = $id;
        $data['jumlah'] = $request->jumlah;
        $data['menu_id'] = $request->menu_id;
        
        DetailPesanan::create($data);
        return response()->json(["result" => "ok"], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
