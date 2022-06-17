<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\khachhang;

class apikhachhangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return khachhang::all();
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
        $db = new khachhang();
        $db->TenKH=$request->TenKH;
        $db->DiaChi=$request->DiaChi;
        $db->SDT=$request->SDT;
        $db->Email=$request->Email;
        $db->TenDN=$request->TenDN;
        $db->MatKhau=$request->MatKhau;
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
        return khachhang::findOrFail($id);

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
        $db = khachhang::find($id);
        $db->MaKH=$request->MaKH;
        $db->TenKH=$request->TenKH;
        $db->DiaChi=$request->DiaChi;
        $db->SDT=$request->SDT;
        $db->Email=$request->Email;
        $db->TenDN=$request->TenDN;
        $db->MatKhau=$request->MatKhau;
        $db->save();
        return $db;
    }


    
    public function editkh(Request $request, $id)
    {
        $db = khachhang::find($id);
        $db->MaKH=$request->MaKH;
        $db->TenKH=$request->TenKH;
        $db->DiaChi=$request->DiaChi;
        $db->SDT=$request->SDT;
        $db->Email=$request->Email;
        $db->TenDN=$request->TenDN;
        $db->MatKhau=$request->MatKhau;
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
        khachhang::findOrFail($id)->delete();
        return "Deleted";
    }
}
