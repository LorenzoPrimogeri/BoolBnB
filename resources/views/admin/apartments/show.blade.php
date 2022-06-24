@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10  border-bottom">
            <h1>
                Dettaglio appartamento
            </h1>
        </div>
        <div class="col-2  border-bottom d-flex justify-content-end">
            <div>
                <a class="btn btn-primary" href="{{route('admin.apartments.index')}}">Tutti gli appartamenti</a>
            </div>
        </div>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
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
                <p class="w-100 p-1"> {{$apartment->title}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Indirizzo</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{$apartment->address}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">cover</h5>
            </div>
            <div class="col-12">
                <img class="w-100" src="{{asset('storage/'. $apartment->img)}}" alt="{{$apartment->title}}">
            </div>
            <div class="col-12">
                <h5 class="pt-2">descrizione</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{$apartment->description}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Numero Stanze</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{$apartment->room}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Numero Bagni</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{$apartment->bathroom}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Numero letti</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{$apartment->bed}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Metri Quadri</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{$apartment->mq}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Visible</h5>
            </div>
            <div class="col-12">
                {{-- Fare funzione per stampare visibile/non visibile --}}
                <p class="w-100 p-1"> {{$apartment->visible}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Prezzo</h5>
            </div>
            <div class="col-12">
                <p class="w-100 p-1"> {{$apartment->price}} </p>
            </div>
            <div class="col-12">
                <h5 class="pt-2">Service</h5>
            </div>
            <div class="col-12">
                @foreach ($apartment->services as $service)
                <p class="w-100 p-1">{{$service->name}} </p>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection