<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $apartments = Apartment::where('user_id', $user->id)->get();
        //  dd($apartments);
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.apartments.create', compact('services'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate(
            [ //da riguardare 
                //['title','room','bed','bathroom','mq','address','lat','lng','img','slug','visible','price','description']
                'title' => 'required|max:250',
                'description' => 'required|min:10|max:250',
            ],
            [
                'title.required' => 'Inserire il titolo',
                'title.max' => 'hai superato i :attribute caratteri',
                'description.required' => 'Inserire il contenuto del post',
                'description.max' => 'hai superato i :attribute caratteri',
                'description.min' => 'devi almeno inserire :attribute caratteri',
            ]
        );
        $user = Auth::user();
        $apartment = $request->all();

        if (array_key_exists('img', $apartment)) {
            $img_path = Storage::put('uploads', $apartment['img']);
            $apartment['img'] = $img_path;
        }
        $newApartment = new Apartment();
        $newApartment->user_id = $user->id;
        $address = $apartment['address'];

        $response = Http::get('https://api.tomtom.com/search/2/geocode/' . $address . '.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK');
        $response->json();
        $lat = '';
        $long = '';
        dd($response);

        $newApartment->fill($apartment);
        $newApartment->slug = Apartment::convertToSlug($newApartment->title);
        $newApartment->save();
        if (array_key_exists('services', $apartment)) {
            $newApartment->services()->sync($apartment['services']);
        }


        $newApartment->save();
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {

        $services = Service::all();
        return view('admin.apartments.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        $data = $request->all();
        Storage::delete($apartment->img);
        if (array_key_exists('img', $data)) {
            $img_path = Storage::put('uploads', $data['img']);
            $data['img'] = $img_path;
        }
        $apartment->fill($data);
        $apartment->slug = Apartment::convertToSlug($apartment->title);

        if (array_key_exists('services', $data)) {
            $apartment->services()->sync($data['services']);
        } else {
            $apartment->services()->sync([]);
        }
        $apartment->update();
        return redirect()->route('admin.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //riguardare il delete di Ruggiero con cover
        $apartment->services()->sync([]);
        $apartment->delete();

        return redirect()->route("admin.apartments.index");
    }
}
