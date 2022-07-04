<?php

namespace App\Http\Controllers\Api\Sponsors;

use App\Http\Controllers\Controller;
use App\Http\Resources\SponsorResource;
use App\Sponsorship;
use Illuminate\Http\Request;

class SponsorShipController extends Controller
{
   public function index(Request $request)
   {
      $sponsor = Sponsorship::all();
      return SponsorResource::collection($sponsor);
   }
}
