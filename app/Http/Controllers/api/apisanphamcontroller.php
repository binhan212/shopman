<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\mausac;
use App\Models\size;
use App\Http\Resources\sanphamResource;
use \Datetime;
class apisanphamcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return sanphamResource::collection(sanpham::all());
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
        $db = new sanpham();
        $db->TenSP=$request->TenSP;
        $db->MoTa=$request->MoTa;
        $db->GiamGia=$request->GiamGia;
        $db->MaDMC=$request->MaDMC;
        $db->save();

        //mau sac
        foreach($request->mausacs as $s){
            $ms = new mausac();
            $ms->MaSP = $db->MaSP;
            $ms->TenMS = $s['TenMS'];
            // return $s->files('AnhMS');
            $ms->AnhMS = $s['AnhMS'];
            $ms->Gia = $s['Gia'];
            $ms->save();

            foreach($s['sizes'] as $z){
                $size = new size();
                $size->MaMS = $ms->MaMS;
                $size->TenSize = $z['TenSize'];
                $size->SoLuongTonKho = $z['SoLuongTonKho'];
                $size->save();
            }
        }
        
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
        return new sanphamResource(sanpham::findOrFail($id));

    }

    

    public function getSpDmc($id)
    {
        //
        return sanphamResource::collection(sanpham::where('MaDMC',$id)->get());

    }

    public function getSpDmcDetail($id)
    {
        //
        return sanphamResource::collection(sanpham::where('MaDMC',$id)->limit(4)->get());

    }


    public function search($text)
    {
        //
        return sanphamResource::collection(sanpham::query()->where('TenSP','LIKE', "%{$text}%")->get());

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
        $db = sanpham::find($id);
        $db->MaSP=$id;
        $db->TenSP=$request->TenSP;
        $db->MoTa=$request->MoTa;
        $db->GiamGia=$request->GiamGia;

        //mau sac
        foreach($request->mausacs as $s){
            $ms = mausac::find($s['MaMS']);
            $ms->TenMS = $s['TenMS'];
            $ms->AnhMS = $s['AnhMS'];
            $ms->Gia = $s['Gia'];
            foreach($s['sizes'] as $z){
                $size = size::find($z['MaSize']);
                $size->TenSize = $z['TenSize'];
                $size->SoLuongTonKho = $z['SoLuongTonKho'];
                $size->save();
            }
            $ms->save();
        }
        $db->save();
        //$db->save();
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        sanpham::findOrFail($id)->delete();

        return "Deleted";
    }
}