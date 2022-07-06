<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\View;

class ViewController extends Controller
{
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $newView = new View();

        $newView->apartment_id = $data['apartment_id'];

        $newView->save();

        return response()->json([
            "success"=>true
        ]);
    }
}
