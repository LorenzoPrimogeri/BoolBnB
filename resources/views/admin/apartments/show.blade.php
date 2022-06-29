@extends('layouts.app')
@section('content')
<div class="main-slct-item">
    <div class="cnt-slct-btn">
        <div class="cnt-th cnt-btn h-100">
            <a href="{{ route('admin.apartments.edit', $apartment->id) }}">
                <button>Modifica</button>
            </a>
            <form class="d-inline  w-100" action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger w-100 " onclick="return confirm('Are your sure?')"
                    type="submit">Elimina</button>
            </form>
            <a href="{{ route('admin.apartments.index') }}">
                <button>Appartamenti</button>
            </a>
        </div>
    </div>
    <div class="cnt-item-details">
        <div class="cnt-row col-12">
            <h3>Visibilità:</h3>
            <p class="w-100 p-1"> {{ $apartment->visible ? 'visibile al momento' : 'Non visibile' }} </p>
        </div>
        <div class="cnt-row col-12">
            <h3>Titolo:</h3>
            <p>{{ $apartment->title }}</p>
        </div>
        <div class="cnt-row col-12">
            <h3>Indirizzo:</h3>
            <p>{{ $apartment->address }}</p>
        </div>
        <div class="cnt-row col-12">
            <div class="cnt-img">
                <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
            </div>
        </div>
        <div class="cnt-row col-12">
            <h3>Descrizione:</h3>
            <p>{{ $apartment->description }}</p>
        </div>
        <div class="cnt-row col-12">
            <h3>Stanze:</h3>
            <p>{{ $apartment->room }}</p>
        </div>
        <div class="cnt-row col-12">
            <h3>Bagni:</h3>
            <p>{{ $apartment->bathroom }}</p>
        </div>
        <div class="cnt-row col-12">
            <h3>Letti:</h3>
            <p>{{ $apartment->bed }}</p>
        </div>
        <div class="cnt-row col-12">
            <h3>Metri Quadri:</h3>
            <p>{{ $apartment->mq }}</p>
        </div>
        <div class="cnt-row col-12">
            <h3>Prezzo:</h3>
            <p>{{ $apartment->price }}</p>
        </div>
        <div class="cnt-row col-12">
            <h3>Servizi:</h3>
            @foreach ($apartment->services as $service)
            <p>{{ $service->name }} </p>
            @endforeach
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row">
        <div class="col-10  border-bottom">
            <h1>
                Dettaglio appartamento
            </h1>
        </div>
        <div class="col-2  border-bottom d-flex justify-content-end">
            <div>
                <a class="btn btn-primary" href="{{ route('admin.apartments.index') }}">Appartamenti</a>
            </div>
        </div>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-12">
                <h5 class="pt-2">Titolo</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Indirizzo</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{ $apartment->address }} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Immagine</h5>
            </div>
            <div class="col-12">
                <div class="cnt-img">
                    <img class="w-100" src="{{ asset('storage/' . $apartment->img) }}" alt=">
                    </div>
                </div>
                <div class=" col-12">
                    <h5 class="pt-2">Descrizione</h5>
                </div>
                <div class="col-12">
                    <p class="w-100 p-1"> {{ $apartment->description }} </p>
                </div>
                <div class="col-12">
                    <h5 class="pt-2">Stanze</h5>
                </div>
                <div class="col-12">
                    <p class="w-100 p-1"> {{ $apartment->room }} </p>
                </div>
                <div class="col-12">
                    <h5 class="pt-2">Bagni</h5>
                </div>
                <div class="col-12">
                    <p class="w-100 p-1"> {{ $apartment->bathroom }} </p>
                </div>
                <div class="col-12">
                    <h5 class="pt-2">Letti</h5>
                </div>
                <div class="col-12">
                    <p class="w-100 p-1"> {{ $apartment->bed }} </p>
                </div>
                <div class="col-12">
                    <h5 class="pt-2">Metri Quadri</h5>
                </div>
                <div class="col-12">
                    <p class="w-100 p-1"> {{ $apartment->mq }} </p>
                </div>
                <div class="col-12">
                    <h5 class="pt-2">Visibile</h5>
                </div>
                <div class="col-12">
                    {{-- Fare funzione per stampare visibile/non visibile Fatto
                    <p class="w-100 p-1"> {{ $apartment->visible ? 'visibile al momento' : 'Non visibile' }} </p>
                </div>
                <div class="col-12">
                    <h5 class="pt-2">Prezzo</h5>
                </div>
                <div class="col-12">
                    <p class="w-100 p-1"> {{ $apartment->price }} </p>
                </div>
                <div class="col-12">
                    <h5 class="pt-2">Servizi</h5>
                </div>
                <div class="col-12">
                    @foreach ($apartment->services as $service)
                    <p class="w-100 p-1">{{ $service->name }} </p>
                    @endforeach

                </div>
            </div>
        </div>
    </div> --}}
    @endsection