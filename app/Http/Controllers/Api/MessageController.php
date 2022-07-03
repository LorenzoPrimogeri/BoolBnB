<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Message;

class MessageController extends Controller
{

    public function store(Request $request)
    {
        //
        $data = $request->all();

         $validator = Validator::make($data, [
            'email'=> 'required|email',
            'object'=> 'required',
            'body'=> 'required',
            'apartment_id' => 'exists:apartments,id'
        ]);

        if($validator->fails()){
            return response()->json([
                'success'=> false,
                'errors'=> $validator->errors()
            ]);
        }

        $newMessage = new Message();

        $newMessage->email = $data['email'];
        $newMessage->object = $data['object'];
        $newMessage->body = $data['body'];
        $newMessage->apartment_id = $data['apartment_id'];
        $newMessage->save();

        return response()->json([
            "success"=>true
        ]);
    }

}
