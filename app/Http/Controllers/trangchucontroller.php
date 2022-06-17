<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class trangchucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        $db=sanpham::with(['mausacs'])
        ->limit(12)
        ->get();
        $qt=0;
        return view('_layout_index',['sanphams'=>$db,'qt'=>$qt]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function showadd($id,$qty)
    {
        $db =sanpham::find($id);
        session()->put('cart',$db);
        if($qty==0){
            $qty++;
        }
        else{
            $qty++;
        }
        return view('_layout_index',['qt',$qty]);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit(sanpham $sanpham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}