<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\size;

class apisizecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return size::all();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new size();
        $db->MaSize=$request->MaSize;
        $db->TenSize=$request->TenSize;
        $db->SoLuongTonKho=$request->SoLuongTonKho;
        $db->save();
        return $db;
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
        return size::findOrFail($id);

    }

    

    public function getSPwithSize($id)
    {
        //
        return size::with(['mausac', 'mausac.sanpham'])->findOrFail($id);

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
        $db = size::find($id);
        $db->MaDM=$request->MaDM;
        $db->TenDM=$request->TenDM;$db->MaSize=$request->MaSize;
        $db->TenSize=$request->TenSize;
        $db->SoLuongTonKho=$request->SoLuongTonKho;
        $db->TenSize=$request->TenSize;
        $db->save();
        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        size::findOrFail($id)->delete();
        return "Deleted";
    }
}
