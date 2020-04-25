<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Product;
use Illuminate\Support\Facades\DB;
use Redirect;

class AdminDiscountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $where = array('id_product' => $id);
        $discounts['discounts'] = DB::table('discounts')
                ->select('discounts.*')
                ->where('id_product',$where)->first();
        $valid = Discount::select('id','percentage','start','end')->where('id_product','=',$where)->get();
        $prd = $id;
        return view('product.admindiscount', compact('discounts','prd','valid','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['discount_info'] = Discount::where($where)->first();
 
        return view('product.admineditdiscount', $data);
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
        $messages = [
            'required' => ':attribute Wajib Diisi',
            'max' => ':attribute Harus Diisi maksimal :max karakter',
            'min' => ':attribute Harus Diisi minimum :min karakter',
            'string' => ':attribute Hanya Diisi Huruf dan Angka',
            'confirmed' => ':attribute Konfirmasi Password Salah',
            'unique' => ':attribute sudah ada',
            'email' => 'attribute Format Email Salah',
        ];

        $this->validate($request,[
            'percentage' => 'required|unique:discounts|numeric',
            'start' => 'required|unique:discounts|date',
            'end' => 'required|unique:discounts|date',
        ],$messages);

        $update = [
            'percentage' => $request->percentage,
            'start' => $request->start,
            'end' => $request->end,
        ];
        Discount::where('id', $id)->update($update);
        $idd =  Product::orderBy('id', 'desc')->first()->id;
        return Redirect::to('/discounts/'.$idd)->with(['success' => 'Berhasil Mengedit Discount']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discount::where('id', $id)->delete();
        return redirect()->back()->with('error','Berhasil Menghapus Data Diskon');;
    }
}
