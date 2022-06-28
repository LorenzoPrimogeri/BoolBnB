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

            <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Visibilità:</h3>
                    <select class="form-select" aria-label="Default select example" name="visible">
                        <option value="1">si</option>
                        <option value="0">no</option>
                    </select>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Titolo:</h3>
                    <input class="w-100 p-1" type="text" name="title" placeholder="titolo"
                        value="{{ $apartment->title }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Descrizione:</h3>
                    <textarea name="description" class="w-100" rows="10" placeholder="descrizione" required>{{ $apartment->description }}</textarea>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <div class="cnt-img">
                        <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
                        <input type="file" name="img">
                    </div>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Indirizzo:</h3>
                    <input class="w-100 p-1" type="text" name="address" placeholder="indirizzo"
                        value="{{ $apartment->address }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Stanze:</h3>
                    <input class="w-100 p-1" type="number" name="room" placeholder="numero di stanze"
                        value="{{ $apartment->room }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Bagni:</h3>
                    <input class="w-100 p-1" type="number" name="bathroom" placeholder="numero di bagni"
                        value="{{ $apartment->bathroom }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Letti:</h3>
                    <input class="w-100 p-1" type="text" name="bed" placeholder="numero di letti"
                        value="{{ $apartment->bed }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Metri Quadri:</h3>
                    <input class="w-100 p-1" type="number" name="mq" placeholder="numero di metri quadri"
                        value="{{ $apartment->mq }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Prezzo:</h3>
                    <input class="w-100 p-1" type="text" name="price" placeholder="prezzo"
                        value="{{ $apartment->price }}" required>
                </div>
                <div class="cnt-service">
                    <h3>Servizi:</h3>

                    @foreach ($services as $service)
                        <input type="checkbox" value="{{ $service->id }}" name="services[]"
                            {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                        <span class="form-check-label">{{ $service->name }}</span>
                    @endforeach

                    {{-- @foreach ($services as $service)
                    <input type="checkbox" value="{{ $service->id }}" name="services[]"
                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                    <span class="form-check-label">{{ $service->name }}</span>
                @endforeach --}}
                </div>
                <button class="btn-modify" type="submit">Salva modifiche</button>
            </form>
        </div>
    </div>


    {{-- <div class="container">
        <div class="row">
            <div class="col-10  border-bottom">
                <h1>
                    Modifica Appartamento
                </h1>
            </div>
            <div class="col-2  border-bottom d-flex justify-content-end">
                <div>
                    <a class="btn btn-primary" href="{{ route('admin.apartments.index') }}">Tutti i posts</a>
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
        <form action="{{ route('admin.apartments.update', $apartment->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-12">
                    <h5 class="pt-2">Titolo</h5>
                </div>
                <div class="col-12">
                    <input class="w-100 p-1" type="text" name="title" placeholder="Inserisci il titolo"
                        value="{{ $apartment->title }}" required>
                </div>

                <div class="col-12">
                    <h5 class="pt-2">Descrizione</h5>
                </div>
                <div class="col-12">
                    <textarea name="description" class="w-100" rows="10" required>{{ $apartment->description }}</textarea>
                </div>

                <div class="col-12">
                    <h5 class="pt-2">Stanze</h5>
                </div>
                <div class="col-12">
                    <input class="w-100 p-1" type="number" name="room" placeholder="Inserisci il numero di stanze"
                        value="{{ $apartment->room }}" required>
                </div>

                <div class="col-12">
                    <h5 class="pt-2">letti</h5>
                </div>
                <div class="col-12">
                    <input class="w-100 p-1" type="number" name="bed" placeholder="Inserisci il numero di letti"
                        value="{{ $apartment->bed }}" required>
                </div>

                <div class="col-12">
                    <h5 class="pt-2">bagni</h5>
                </div>
                <div class="col-12">
                    <input class="w-100 p-1" type="number" name="bathroom" placeholder="Inserisci il numero di bagni"
                        value="{{ $apartment->bathroom }}" required>
                </div>

                <div class="col-12">
                    <h5 class="pt-2">Metri quadri</h5>
                </div>
                <div class="col-12">
                    <input class="w-100 p-1" type="number" name="mq" placeholder="Inserisci il numero di quadri"
                        value="{{ $apartment->mq }}" required>
                </div>

                <div class="col-12">
                    <h5 class="pt-2">Indirizzo</h5>
                </div>
                <div class="col-12">
                    <input class="w-100 p-1" type="text" name="address" placeholder="Inserisci l'indirizzo"
                        value="{{ $apartment->address }}" required>
                </div>

                <div class="col-12">
                    <h5>Immagine corrente </h5>
                    <div>
                        <img class="w-100" src="{{ asset('storage/' . $apartment->img) }}" alt="">
                    </div>
                    <h5 class="pt-2">Aggiorna immagine:</h5>
                </div>
                <div class="col-12">
                    <input type="file" name="img">
                </div>

                <div class="col-12">
                    <h5 class="pt-2">Prezzo</h5>
                </div>
                <div class="col-12">
                    <input class="w-100 p-1" type="text" name="price" placeholder="Inserisci il prezzo"
                        value="{{ $apartment->price }}" required>
                </div>

                <div class="col-12">
                    <h5 class="pt-2">Servizi</h5>
                </div>
                <div class="col-12">
                    @foreach ($services as $service)
                        <input type="checkbox" value="{{ $service->id }}" name="services[]"
                            {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                        <span class="form-check-label">{{ $service->name }}</span>
                    @endforeach
                </div>

                <div class="col-12">
                    <h5 class="pt-2">Visibile</h5>
                </div>
                <div class="col-12">
                    <select class="form-select" aria-label="Default select example" name="visible">
                        <option value="{{ $apartment->visible }}">
                            {{ $apartment->visible ? 'Visibile' : 'Non visibile' }}
                        </option>
                        @if ($apartment->visible == 1)
                            <option value="0">
                                {{ !$apartment->visible
                                    ? 'Visibile'
                                    : 'Non
                                                                                                                                                                                                                                                                                                                                                        visibile' }}
                            </option>
                        @else
                            <option value="1">
                                {{ !$apartment->visible
                                    ? 'Visibile'
                                    : 'Non
                                                                                                                                                                                                                                                                                                                                                        visibile' }}
                            </option>
                        @endif
                    </select>
                </div>

                <div class="col-12 pt-2">
                    <button type="submit" class="btn btn-success text-white">Aggiorna appartamento</button>
                </div>
            </div>
        </form>
    </div> --}}
@endsection
