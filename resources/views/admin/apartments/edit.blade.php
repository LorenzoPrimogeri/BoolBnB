@extends('layouts.app')
@section('content')
<div class="main-slct-item">
    <div class="cnt-slct-btn">
        <div class="cnt-th cnt-btn h-100">
            <a href="{{ route('admin.apartments.index') }}">
                <button>Appartamenti</button>
            </a>
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
                    <option value="{{ $apartment->visible }}">
                        {{ $apartment->visible ? 'Visibile' : 'Non visibile' }}
                    </option>
                    @if ($apartment->visible == 1)
                    <option value="0">
                        {{ !$apartment->visible ? 'Visibile' : 'Non visibile' }}
                    </option>
                    @else
                    <option value="1">
                        {{ !$apartment->visible ? 'Visibile' : 'Non visibile' }}
                    </option>
                    @endif
                </select>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Titolo:</h3>
                <input class="w-100 p-1" type="text" name="title" placeholder="titolo" value="{{ $apartment->title }}"
                    required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Descrizione:</h3>
                <textarea name="description" class="w-100" rows="10" placeholder="descrizione"
                    required>{{ $apartment->description }}</textarea>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <div class="cnt-img">
                    <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
                    <input type="file" name="img">
                </div>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <div class="autocomplete">
                    <h3>Indirizzo: {{$apartment->address}}</h3>
                    {{-- <input class="w-100 p-1" type="text" name="address" placeholder="indirizzo"
                        value="{{ $apartment->address }}" required> --}}
                </div>
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
                <input class="w-100 p-1" type="text" name="price" placeholder="prezzo" value="{{ $apartment->price }}"
                    required>
            </div>
            <div class="cnt-service">
                <h3>Servizi:</h3>
                @foreach ($services as $service)
                <input type="checkbox" value="{{ $service->id }}" name="services[]" {{
                    $apartment->services->contains($service) ? 'checked' : '' }}>
                <span class="form-check-label">{{ $service->name }}</span>
                @endforeach
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <button class="btn-modify" type="submit">Salva modifiche</button>
            </div>
        </form>
    </div>
</div>
@endsection