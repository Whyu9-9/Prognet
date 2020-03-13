<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $dataUser=users::where('email',$request->email)->first();

        if($dataUser != NULL){
            if($dataUser->password == $request->Password){
                //Login User Sukses
                Auth::guard('user')->LoginUsingId($dataUser->id);
                return redirect('/user');
            }else{
                return 'gagal';
            }
        }
    }
    public function logout(){
        if (Auth::guard('user')->check()){
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
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(users $users)
    {
        //
    }
}
