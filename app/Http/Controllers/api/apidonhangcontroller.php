<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\donhang;
use App\Models\ctdh;
use Illuminate\Support\Facades\Date;
use App\Http\Resources\donhangResource;


class apidonhangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return donhang::all();
    }

    public function getdonhang($id)
    {
        $db=donhang::all();
        $hang=[];
        foreach($db as $i){
            if($i->MaKH==$id){
                array_unshift($hang,$i);
            }
        }
        return $hang;
    }


    public function getDHAllInfo($id)
    {
        // return new donhangResource(donhang::findOrFail($id));
        return donhang::with(['ctdhs'])->findOrFail($id);

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
        $db = new donhang();
        $db->MaDH=$request->MaDH;
        $db->NgayDatHang=$request->NgayDatHang;
        $db->ThanhTien=$request->ThanhTien;
        $db->DiaChiGiaoHang=$request->DiaChiGiaoHang;
        $db->SDT=$request->SDT;
        $db->GhiChu=$request->GhiChu;
        $db->MaKH=$request->MaKH;
        $db->save();
        return $db;
    }



    public function themdonhang(Request $request)
    {
        $db = new donhang();
        // $db->MaDH=$request->MaDH;

        // $db->NgayDatHang=date('Y-m-d H:i:s', strtotime($request->NgayDatHang));

        $db->ThanhTien=$request->ThanhTien;
        $db->HoTen=$request->HoTen;
        $db->DiaChiGiaoHang=$request->DiaChiGiaoHang;
        $db->SDT=$request->SDT;
        $db->GhiChu=$request->GhiChu;
        $db->MaKH=$request->MaKH;
        $db->save();
        foreach($request->CTDH as $s){
            $ct = new ctdh();
            // $ct->MaCTDH = $s['MaCTDH'];
            $ct->MaSize = $s['MaSize'];
            $ct->GiamGia = $s['GiamGia'];
            $ct->SoLuong = $s['SoLuong'];
            $ct->MaDH =  $db->MaDH;
            $ct->save();
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
        return donhang::findOrFail($id);

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
        $db = donhang::find($id);
        $db->MaDH=$request->MaDH;
        $db->NgayDatHang=$request->NgayDatHang;
        $db->ThanhTien=$request->ThanhTien;
        $db->DiaChiGiaoHang=$request->DiaChiGiaoHang;
        $db->SDT=$request->SDT;
        $db->GhiChu=$request->GhiChu;
        $db->MaKH=$request->MaKH;
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
        donhang::findOrFail($id)->delete();
        return "Deleted";
    }
}
