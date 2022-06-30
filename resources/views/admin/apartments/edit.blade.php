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
            <div class="cnt-row col-12">
                <p class="grey">(*) i campi contrassegnati con l’asterisco sono obbligatori </p>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Visibilità: <span class="red">*</span></h3>
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
                <h3>Titolo: <span class="red">*</span></h3>
                <input class="w-100 p-1" type="text" name="title" placeholder="titolo" value="{{ $apartment->title }}"
                    required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Descrizione: <span class="red">*</span></h3>
                <textarea name="description" class="w-100" rows="10" placeholder="descrizione"
                    required>{{ $apartment->description }}</textarea>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <div class="cnt-img">
                    <h3>Immagine: <span class="red">*</span></h3>
                    <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
                    <input type="file" name="img">
                </div>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <div class="autocomplete">
                    <h3>Indirizzo: <span class="red">*</span></h3>
                </div>
                <input id="oldAddress" type="hidden" value="{{$apartment->address}}">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Stanze: <span class="red">*</span></h3>
                <input class="w-100 p-1 onlynumber" type="number" name="room" placeholder="numero di stanze"
                    value="{{ $apartment->room }}" required min="1" max="15">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Bagni: <span class="red">*</span></h3>
                <input class="w-100 p-1 onlynumber" type="number" name="bathroom" placeholder="numero di bagni"
                    value="{{ $apartment->bathroom }}" required min="1" max="15">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Letti: <span class="red">*</span></h3>
                <input class="w-100 p-1 onlynumber" type="number" name="bed" placeholder="numero di letti"
                    value="{{ $apartment->bed }}" required min="1" max="30">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Metri Quadri: <span class="red">*</span></h3>
                <input class="w-100 p-1 onlynumber" type="number" name="mq" placeholder="numero di metri quadri"
                    value="{{ $apartment->mq }}" required min="6" max="1000">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Prezzo: <span class="red">*</span></h3>
                <input class="w-100 p-1 onlynumber" type="number" name="price" placeholder="prezzo"
                    value="{{ $apartment->price }}" required min="1" max="7000">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <div class="cnt-service">
                    <div class="col-1">
                        <h3>Servizi: <span class="red">*</span></h3>
                    </div>
                </div>
                <div class="cnt-items-services col-11">
                    @foreach ($services as $service)
                    <div class="cnt-item-service">
                        <input type="checkbox" value="{{ $service->id }}" name="services[]" {{
                            $apartment->services->contains($service) ? 'checked' : '' }}>
                        <span class="form-check-label">{{ $service->name }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <button class="btn-modify" type="submit">Salva modifiche</button>
                </div>
            </div>
        </form>
    </div>
    {{-- @push('input-validation')
    <script type="text/javascript" src="{{ asset('js/validation-input.js') }}"></script>
    @endpush --}}
</div>
@endsection