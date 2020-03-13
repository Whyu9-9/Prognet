<?php

namespace App\Http\Controllers;

use App\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $dataAdmin=admins::where('username',$request->User)->first();

        if($dataAdmin != NULL){
            if($dataAdmin->password == $request->Password){
                //Login Admin Sukses
                Auth::guard('admin')->LoginUsingId($dataAdmin->id);
                return redirect('/admin');
            }else {
            return 'gagal';
            }
        }
    }
    public function logout(){
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        }else if (Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect('/login');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy(admins $admins)
    {
        //
    }
}
