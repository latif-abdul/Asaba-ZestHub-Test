<?php

namespace App\Http\Controllers;
use App\Models\Cust;
use Illuminate\Http\Request;

class CustController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cust = Cust::All();
        return view('cust.index')->with(compact('cust'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formAction = "http://localhost:8000/cust";
        return view('cust.manage')->with(compact('formAction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['nama_cust'] = $request->nama_cust;
        
        Cust::create($data);
        return redirect()->route('cust.index');
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
        $formAction = "http://localhost:8000/cust/".$id;
        $mn = Cust::where('id', $id)->first();
        return view('cust.manage')->with(compact('formAction', 'mn'));
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
        $cust = Cust::find($id);
        $data['nama_cust'] = $request->nama_cust;
        
        $cust->update($data);
        return redirect()->route('cust.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cust::find($id)->delete();
        return redirect()->route('cust.index');
    }
}
