<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Cust;
use App\Models\Menu;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = Pesanan::with('cust')->get();
        return view('pesanan.index')->with(compact(['pesanan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cust = Cust::All();
        $menu = Menu::All();
        $formAction = 'http://localhost:8000/api/pesanan';
        $method = 'POST';
        return view('pesanan.tambah_pesanan')->with(compact('cust', 'menu', 'formAction', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pesanan::find($id)->first();
        $formAction = 'http://localhost:8000/api/pesanan/'.$id;
        $method = 'PUT';
        $cust = Cust::All();
        $menu = Menu::All();
        return view('pesanan.tambah_pesanan')->with(compact('id', 'cust', 'menu', 'pesanan', 'formAction', 'method'));
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
        //
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
