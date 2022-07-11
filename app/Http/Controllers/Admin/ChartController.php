<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\View;
use App\Apartment;
use App\Message;

class ChartController extends Controller
{
    public function index($id)
    {

        $views = View::select('created_at')->where('apartment_id',$id)->orderBy("created_at")->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format("M");
        });

        $messages = Message::select('created_at')->where('apartment_id',$id)->orderBy("created_at")->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format("M");
        });


        $monthsV=[];
        $monthsCountV=[];

        foreach($views as $month => $values){
            $monthsV[]=$month;
            $monthsCountV[]=count($values);
        }

        $chartjsV = app()->chartjs
         ->name('visual')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels($monthsV)
         ->datasets([
             [
                 "label" => "visualizzazioni",
                 'backgroundColor' => ['rgb(128,255,234,0.5)', 'rgba(54, 162, 235, 0.2)'],
                 'data' => $monthsCountV
             ]
         ])
         ->options([]);

        $monthsM=[];
        $monthsCountM=[];

        foreach($messages as $month => $values){
            $monthsM[]=$month;
            $monthsCountM[]=count($values);
        }


         $chartjsM = app()->chartjs
         ->name('message')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels($monthsM)
         ->datasets([
             [
                 "label" => "messaggi",
                 'backgroundColor' => ['rgba(54, 162, 235, 0.2), rgb(128,255,234,0.5)'],
                 'data' => $monthsCountM
             ]
         ])
         ->options([]);

        return view('admin.apartments.views.index', compact('chartjsV','chartjsM'));
    }
}
