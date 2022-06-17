<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\sanpham;

class apitrangchucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        // if ($request->hasCookie('cart')) {
        //     $cart = json_decode(Cookie::get('cart'));
        //     if($cart==null){
        //         $product = sanpham::with(['mausacs', 'mausacs.sizes'])->findOrFail($id);
        //         $product->product_id=$id;
        //         $product->quantity = 1;
        //         $product->cart_id = $cart[0]->cart_id;
        //         $cart[0] = $product;
        //     }
        //     return $cart;

        // }
        // $ONE_MONTH = 60 * 24 * 30;
        // $cookie = cookie('cart', json_encode($cart), $ONE_MONTH);
        // return response()->json(['status' => 'success', 'quantity_in_stock' => $size->quantity, 'cart' => $cart])->cookie($cookie);
        // $sl=$id;
        // return $sl;
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
