<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mausac;
use App\Helpers\helper;

class apimausaccontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return mausac::all();
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
        $db = new mausac();
        $db->MaMS=$request->MaMS;
        $db->TenMS=$request->TenMS;
        $db->AnhMS = $request->imageName;
        $image = $request->dataImage;
        $path = public_path().'\\upload\\sanpham\\'.$db->AnhMS;
        if($image != null){
            Helper::savePictureInServer($path, $image);
        }
        $db->MaSP=$request->MaSP;
        $db->Gia=$request->Gia;
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
        return mausac::findOrFail($id);

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
        $db = mausac::find($id);
        $db->MaMS=$request->MaMS;
        $db->TenMS=$request->TenMS;
        $db->AnhMS = $request->imageName;
        $image = $request->dataImage;
        $path = public_path().'\\upload\\sanpham\\'.$db->AnhMS;
        if($image != null){
            Helper::savePictureInServer($path, $image);
        }
        $db->MaSP=$request->MaSP;
        $db->Gia=$request->Gia;
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
        mausac::findOrFail($id)->delete();
        return "Deleted";
    }
}
