<?php
namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class filescontroller extends Controller
{
    //
    public function addFiles(Request $request)
    {
        //
        if ($request->hasFile('files')) {
            $array_name = [];
            $files = $request->file('files');
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $array_name[] = $name;
                $file->move(public_path('/upload/sanpham/'), $name);
            }
            return $array_name;
        } else {
            return response()->json("failed");;
        }
    }
    public function deleteFiles(Request $request)
    {
        if ($request->has('paths')) {
            foreach($request->paths as $path) {
                File::delete(public_path("/upload/sanpham/" . $path));
            }
            return response()->json("success");
        } else {
            return response()->json("failed");
        }
    }
}