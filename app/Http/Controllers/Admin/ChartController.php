<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\View;

class ChartController extends Controller
{
    public function index()
    {
        $data = View::select('created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format("M");
        });

        $months=[];
        $monthsCount=[];

        foreach($data as $month => $values){
            $months[]=$month;
            $monthsCount[]=count($values);
        }




        $chartjs = app()->chartjs
         ->name('barChartTest')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels(array_reverse($months))
         ->datasets([
             [
                 "label" => "visualizzazioni",
                 'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                 'data' => array_reverse($monthsCount)
             ]
         ])
         ->options([]);

        return view('admin.apartments.views.index', compact('chartjs'));
    }
}
