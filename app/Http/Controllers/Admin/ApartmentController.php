<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Service;
use App\Http\Controllers\Controller;
use App\Message;
use App\Sponsorship;
use Braintree\Gateway;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\View;

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
        //dd($request);

        $request->validate(
            [
                'title' => 'required|min:5|max:30',
                'description' => 'required|min:10|max:300',
                'room' => 'required|numeric|min:1|max:15',
                'bed' => 'required|numeric|min:1|max:30',
                'bathroom' => 'required|numeric|min:1|max:15',
                'mq' => 'required|numeric|min:6|max:1000',
                'address' => 'required|min:3|max:100',
                'img' => 'required|image',
                'price' => 'required|integer|min:1|max:7000',
                'services' => 'required|array|min:1',

            ],
            [
                'title.required' => 'Inserire il titolo',
                'description.required' => 'Inserire il contenuto dell\'appartamento',
                'room.required' => 'inserisci il numero di stanze',
                'bed.required' => 'inserisci il numero di letti',
                'bathroom.required' => 'inserisci il numero di bagni',
                'mq.required' => 'inserisci il numero di metri quadri',
                'address.required' => 'inserisci l\'indirizzo dell\'appartamento',
                'img.required' => 'Carica un\'immagine',
                'img.image' => 'Carica un\'immagine con estensione( JPG, JPEG, PNG, BMP, GIF, SVG or WEBP)',
                'price.required' => 'inserisci il prezzo',
                'title.max' => 'hai superato i :max caratteri del titolo',
                'title.min' => 'il numero minimo di caratteri del titolo è :min',
                'description.max' => 'hai superato i :max caratteri della descrizione',
                'description.min' => 'il numero minimo di caratteri della descrizione è :min',
                'room.max' => 'puoi inserire massimo :max stanze',
                'room.min' => 'il numero minimo di stanze è :min',
                'bed.max' => 'puoi inserire massimo :max letti',
                'bed.min' => 'il numero minimo di letti è :min',
                'bathroom.max' => 'puoi inserire massimo :max bagni',
                'bathroom.min' => 'il numero minimo di bagni è :min',
                'mq.max' => 'puoi inserire massimo :max mq',
                'mq.min' => 'il numero minimo di mq è :min',
                'address.max' => 'l\'indirizzo non è valido',
                'address.min' => 'l\'indirizzo non è valido',
                'price.max' => 'il prezzo massimo è :max $',
                'price.min' => 'il prezzo minimo è :min $',
                'services' => 'Il servizio non esiste',
                'services.required' => 'Inserisci minimo un servizio',
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
        $data = $response->json();
        $lat = $data['results'][0]['position']['lat'];
        $long = $data['results'][0]['position']['lon'];
        $newApartment->lat = $lat;
        $newApartment->lng = $long;
        $newApartment->visible = $apartment['visible'];
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
        $user = Auth::user();
        if ($user->id == $apartment->user_id) {
            return view('admin.apartments.show', compact('apartment'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd(Auth::id());
        $user = Auth::user()->id;

        $apartment = Apartment::where('user_id', '=', $user)->findOrFail($id);

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
        $request->validate(
            [
                'title' => 'required|min:5|max:30',
                'description' => 'required|min:10|max:300',
                'room' => 'required|numeric|min:1|max:15',
                'bed' => 'required|numeric|min:1|max:30',
                'bathroom' => 'required|numeric|min:1|max:15',
                'mq' => 'required|numeric|min:5|max:1000',
                'address' => 'required|min:3|max:100',
                'price' => 'required|numeric|min:1|max:7000',
                'services' => 'required|array|min:1',

            ],
            [
                'title.required' => 'Inserire il titolo',
                'description.required' => 'Inserire il contenuto dell\'appartamento',
                'room.required' => 'inserisci il numero di stanze',
                'bed.required' => 'inserisci il numero di letti',
                'bathroom.required' => 'inserisci il numero di bagni',
                'mq.required' => 'inserisci il numero di metri quadri',
                'address.required' => 'inserisci l\'indirizzo dell\'appartamento',
                'price.required' => 'inserisci il prezzo',
                'title.max' => 'hai superato i :max caratteri del titolo',
                'title.min' => 'il numero minimo di caratteri del titolo è :min',
                'description.max' => 'hai superato i :max caratteri della descrizione',
                'description.min' => 'il numero minimo di caratteri della descrizione è :min',
                'room.max' => 'puoi inserire massimo :max stanze',
                'room.min' => 'il numero minimo di stanze è :min',
                'bed.max' => 'puoi inserire massimo :max letti',
                'bed.min' => 'il numero minimo di letti è :min',
                'bathroom.max' => 'puoi inserire massimo :max bagni',
                'bathroom.min' => 'il numero minimo di bagni è :min',
                'mq.max' => 'puoi inserire massimo :max mq',
                'mq.min' => 'il numero minimo di mq è :min',
                'address.max' => 'l\'indirizzo non è valido',
                'address.min' => 'l\'indirizzo non è valido',
                'price.max' => 'il prezzo massimo è :max $',
                'price.min' => 'il prezzo minimo è :min $',
                'services.required' => 'Inserisci minimo un servizio',

            ]
        );

        $data = $request->all();
        //  dd($data);
        if (array_key_exists('img', $data)) {
            Storage::delete($apartment->img);

            $img_path = Storage::put('uploads', $data['img']);
            $data['img'] = $img_path;
        }


        //  if(array_key_exists('image', $postData)){
        //     if($post->cover){
        //         Storage::delete($post->cover);
        //     }

        //     $img_path = Storage::put('uploads', $postData['image']);
        //     $postData['cover'] = $img_path;
        // }


        $apartment->visible = $data['visible'];
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
    public function checkIn($id)
    {
        $apartment = Apartment::find($id);
        $sponsors = Sponsorship::all();
        return view('admin.checkin', compact('sponsors', 'apartment'));
    }
    public function checkOut(Gateway $gateway, $sponsor_id, $apartment_id)
    {
        // dd($apartment_id);
        $apartment = Apartment::find($apartment_id);

        $apartment->sponsorships()->sync($sponsor_id);


        return view('admin.checkout', [
            "id" => $sponsor_id,
            "token" => $gateway->clientToken()->generate(),
            "apartment" => $apartment,
            "sponsor" => Sponsorship::find($sponsor_id)
        ]);
    }
    public function destroy(Apartment $apartment)
    {
        //riguardare il delete di Ruggiero con cover
        // dd($apartment);
        $apartment->services()->sync([]);
        $apartment->sponsorships()->sync([]);
        $message = Message::where("apartment_id",$apartment->id);
        $view = View::where("apartment_id",$apartment->id);
        $message->delete();
        $view->delete();
        $apartment->delete();
        return redirect()->route("admin.apartments.index");
    }
    public function confirmed(Request $request, Gateway $gateway)
    {
        $idSponsor = $request->id;
        $sponsor = Sponsorship::find($idSponsor);
        //   $apartment = Apartment::find(Apartment::id());
        //  $activeSponsor = $apartment->sponsorShips;
        $amount = $sponsor->price;
        $nonce = $request->payment_method_nonce;
        // $sponsorshipName = $sponsor->type;
        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        return view('admin.confirmed', ['sponsor' => $sponsor]);
    }
}
