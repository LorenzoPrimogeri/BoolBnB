@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10  border-bottom">
            <h1>
                Creazione nuovo post
            </h1>
        </div>
        <div class="col-2  border-bottom d-flex justify-content-end">
            <div>
                <a class="btn btn-primary" href="{{route('admin.apartments.index')}}">Tutti i posts</a>
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
    <form action="{{route('admin.apartments.update',$apartment->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            {{-- Titolo --}}
            <div class="col-12">
                <h5 class="pt-2">Titolo</h5>
            </div>
            <div class="col-12">
                <input class="w-100 p-1" type="text" name="title" placeholder="Inserisci il titolo" value="{{$apartment->title}}" required>
            </div>
            {{-- /Titolo --}}
            {{--description--}}
            <div class="col-12">
                <h5 class="pt-2">Descrizione</h5>
            </div>
            <div class="col-12">
                <textarea name="description" class="w-100" rows="10" required>{{$apartment->description}}</textarea>
            </div>
            {{-- /description --}}
            {{-- room --}}
            <div class="col-12">
                <h5 class="pt-2">Stanze</h5>
            </div>
            <div class="col-12">
                <input class="w-100 p-1" type="number" name="room" placeholder="Inserisci il numero di stanze" value="{{$apartment->room}}" required>
            </div>
            {{-- /room --}}
            {{-- bed --}}
            <div class="col-12">
                <h5 class="pt-2">letti</h5>
            </div>
            <div class="col-12">
                <input class="w-100 p-1" type="number" name="bed" placeholder="Inserisci il numero di letti" value="{{$apartment->bed}}" required>
            </div>
            {{-- /bed --}}
            {{-- bathroom --}}
            <div class="col-12">
                <h5 class="pt-2">bagni</h5>
            </div>
            <div class="col-12">
                <input class="w-100 p-1" type="number" name="bathroom" placeholder="Inserisci il numero di bagni" value="{{$apartment->bathroom}}" required>
            </div>
            {{-- /bathroom --}}
            {{-- mq --}}
            <div class="col-12">
                <h5 class="pt-2">Metri quadri</h5>
            </div>
            <div class="col-12">
                <input class="w-100 p-1" type="number" name="mq" placeholder="Inserisci il numero di quadri" value="{{$apartment->mq}}" required>
            </div>
            {{-- /mq --}}
            {{-- address --}}
            <div class="col-12">
                <h5 class="pt-2">Indirizzo</h5>
            </div>
            <div class="col-12">
                <input class="w-100 p-1" type="text" name="address" placeholder="Inserisci l'indirizzo" value="{{$apartment->address}}" required>
            </div>
            {{-- /address --}}
            {{-- img --}}
            <div class="col-12">
                <h5>Immagine corrente </h5>
                <div>
                    <img class="w-100" src="{{asset('storage/'. $apartment->img)}}" alt="">
                </div>
                <h5 class="pt-2">Aggiorna immagine:</h5>
            </div>
            <div class="col-12">
                <input type="file" name="img">
            </div>
            {{-- /img --}}
            {{-- price --}}
            <div class="col-12">
                <h5 class="pt-2">Prezzo</h5>
            </div>
            <div class="col-12">
                <input class="w-100 p-1" type="text" name="price" placeholder="Inserisci il prezzo" value="{{$apartment->price}}" required>
            </div>
            {{-- /price --}}
            {{-- service --}}
            <div class="col-12">
                <h5 class="pt-2">Servizi</h5>
            </div>
            <div class="col-12">
                @foreach($services as $service)
                <input type="checkbox" value="{{$service->id}}" name="services[]" {{
                    $apartment->services->contains($service)?'checked':''
                }}>
                <span class="form-check-label">{{$service->name}}</span>
                @endforeach
            </div>
            {{-- /service --}}
            <div class="col-12 pt-2">
                <button type="submit" class="btn btn-success text-white">Aggiorna appartamento</button>
            </div>
        </div>
    </form>
</div>
@endsection