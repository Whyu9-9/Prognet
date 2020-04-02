<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Redirect;

class AdminProductController extends Controller
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
        $data['products'] = Product::orderBy('id')->paginate(10);
  
        return view('product.adminlist',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'price' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'weight' => 'required',
        ]);
  
        Product::create($request->all());
   
        return Redirect::to('products')
       ->with('success','Great! Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
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
        $where = array('id' => $id);
        $data['product_info'] = Product::where($where)->first();

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required',
            'product_name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'weight' => 'required',
        ]);
        
        $update = ['price' => $request->price, 'description' => $request->description,
                'product_name' => $request->product_name, 'stock' => $request->stock];
        Product::where('id',$id)->update($update);
  
        return Redirect::to('products')
       ->with('success','Great! Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();
  
        return Redirect::to('products')->with('success','Product deleted successfully');
    }
}
