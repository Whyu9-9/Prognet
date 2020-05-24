<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\response as respon;

class ResponseController extends Controller
{
    public function store(Request $request)
    {
        $respon = new respon;
        $respon->review_id = $request->review_id;
        $respon->admin_id = $request->admin_id;
        $respon->content = $request->content;
        $respon->save();
        
        return redirect()->back()->with(['terkirim'=>'Balasan Terkirim']);
    }
}
