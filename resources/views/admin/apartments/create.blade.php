@extends('layouts.app')
@section('content')
<div class="main-slct-item">
    <div class="cnt-slct-btn">
        <div class="cnt-th cnt-btn h-100">
            <a href="{{ route('admin.apartments.index') }}">
                <button>Appartamenti</button>
            </a>
            {{-- <a href="#"><button>Elimina</button></a> --}}
        </div>
    </div>
    <div class="cnt-item-details">
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
        <form autocomplete="off" action="{{ route('admin.apartments.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Visibilità:</h3>
                <select class="form-select" aria-label="Default select example" name="visible">
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Titolo:</h3>
                <input class="w-100 p-1" type="text" name="title" placeholder="titolo" value="{{ old('title') }}"
                    required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Descrizione:</h3>
                <textarea name="description" class="w-100" rows="10" placeholder="descrizione"
                    value="{{ old('description') }}" required></textarea>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <input type="file" name="img">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Indirizzo:</h3>
                {{-- <input class="w-100 p-1" type="text" name="address" placeholder="indirizzo"
                    value="{{ old('address') }}" required> --}}
                <div class="autocomplete">

                    {{-- <input class="w-100" id="myInput" type="text" name="address" placeholder="Indirizzo"
                        value="{{ old('address') }}" onkeyup="array()"> --}}
                        <input type="hidden" name="address" value="" id="inputValue">
                </div>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Stanze:</h3>
                <input class="w-100 p-1" type="number" name="room" placeholder="numero di stanze"
                    value="{{ old('room') }}" required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Bagni:</h3>
                <input class="w-100 p-1" type="number" name="bathroom" placeholder="numero di bagni"
                    value="{{ old('bathroom') }}" required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Letti:</h3>
                <input class="w-100 p-1" type="number" name="bed" placeholder="numero di letti" value="{{ old('bed') }}"
                    required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Metri Quadri:</h3>
                <input class="w-100 p-1" type="number" name="mq" placeholder="numero di metri quadri"
                    value="{{ old('mq') }}" required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Prezzo:</h3>
                <input class="w-100 p-1" type="text" name="price" placeholder="prezzo" value="{{ old('price') }}"
                    required>
            </div>
            <div class="cnt-service">
                <h3>Servizi:</h3>
                @foreach ($services as $service)
                <input type="checkbox" value="{{ $service->id }}" name="services[]" {{ in_array($service->id,
                old('services', [])) ? 'checked' : '' }}>
                <span class="form-check-label">{{ $service->name }}</span>
                @endforeach
            </div>
            <button class="btn-modify" type="submit">Inserisci</button>
        </form>
    </div>
</div>
@endsection


{{-- <div class="container">
    <div class="row">
        <div class="col-10  border-bottom">
            <h1>
                Creazione appartamento
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
    -
    <form action="{{route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Titolo</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="text" name="title" placeholder="Inserisci il t value=" {{old('title')}}"
                    required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Descrizione</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <textarea name="description" class="w-100" rows="10" placeholder="Inserisci una descri value="
                    {{old('description')}}" required></textarea>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Stanze</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="room" placeholder="Inserisci il numero di s value="
                    {{old('room')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">letti</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="bed" placeholder="Inserisci il numero di  value="
                    {{old('bed')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">bagni</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="bathroom" placeholder="Inserisci il numero di  value="
                    {{old('bathroom')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Metri quadri</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="mq" placeholder="Inserisci il numero di q value="
                    {{old('mq')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Indirizzo</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="text" name="address" placeholder="Inserisci l'indi value="
                    {{old('address')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Immagine</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input type="file" name="img">
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Prezzo</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="text" name="price" placeholder="Inserisci il p value=" {{old('price')}}"
                    required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Servizi</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                @foreach ($services as $service)
                <input type="che value=" {{$service->id}}" name="services[]" {{in_array($service->id,
                old('services',[]))?'checked':''}}>
                <span class="form-check-label">{{$service->name}}</span>
                @endforeach
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Visibile</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <select class="form-select" aria-label="Default select example" name="visible">
                    < value="1">si</ovalue=>
                        < value="0">no</ovalue=>
                </select>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0 pt-2">
                {{-- ['','','','','','','','','img','slug','visible','',''] --}
                <button type="submit" class="btn btn-success text-white">Crea appartamento</button>
            </div>
        </div>
    </form>

</div> --}}
