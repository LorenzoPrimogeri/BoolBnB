@extends('layouts.app')
@section('content')
    <div class="main-slct-item">
        <div class="cnt-slct-btn">
            <div class="cnt-th cnt-btns h-100">
                <a href="{{ route('admin.apartments.index') }}">
                    <div class="cnt-btn" title="Dashboaard">
                        <button class="btn btn-home"></button>
                    </div>
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
            <form id="form-validate" name="modulo" autocomplete="off" action="{{ route('admin.apartments.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="cnt-row col-12">
                    <p class="grey">(*) i campi contrassegnati con l’asterisco sono obbligatori </p>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Visibilità: <span class="red">*</span></h3>
                    <select class="form-select" aria-label="Default select example" name="visible">
                        <option value="1">si</option>
                        <option value="0">no</option>
                    </select>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Titolo: <span class="red">*</span></h3>
                    <input id="title" class="w-100 p-1" type="text" name="title" placeholder="titolo"
                        value="{{ old('title') }}" required autocomplete="on" minlength="5">
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Descrizione: <span class="red">*</span></h3>
                    <textarea id="description" name="description" class="w-100" rows="10" placeholder="descrizione" required
                        minlength="10">{{ old('description') }}</textarea>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Immagine: <span class="red">*</span></h3>
                    <input type="file" name="img" value="{{ old('img') }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Indirizzo: <span class="red">*</span></h3>
                    <div class="autocomplete">

                    </div>
                    <input id="oldAddress" type="hidden" value="{{ old('address') }}">
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Stanze: <span class="red">*</span></h3>
                    <input id="rooms" class="w-100 p-1 onlynumber invalid" type="number" name="room"
                        placeholder="numero di stanze" value="{{ old('room') }}" min="1" max="15" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Bagni: <span class="red">*</span></h3>
                    <input id="baths" class="w-100 p-1 onlynumber invalid" type="number" name="bathroom"
                        placeholder="numero di bagni" value="{{ old('bathroom') }}" min="1" max="15"
                        required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Letti: <span class="red">*</span></h3>
                    <input id="beds" class="w-100 p-1 onlynumber invalid" type="number" name="bed"
                        placeholder="numero di letti" value="{{ old('bed') }}" min="1" max="30" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Metri Quadri: <span class="red">*</span></h3>
                    <input id="mq" class="w-100 p-1 onlynumber invalid" type="number" name="mq"
                        placeholder="numero di metri quadri" value="{{ old('mq') }}" min="6" max="1000"
                        required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Prezzo: <span class="red">*</span></h3>
                    <input id="price" class="w-100 p-1 onlynumber invalid" type="number" name="price"
                        placeholder="prezzo" value="{{ old('price') }}" min="1" max="7000" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <div class="cnt-service">
                        <div class="col-1">
                            <h3>Servizi:<span class="red">*</span></h3>
                        </div>
                    </div>
                    <div id='checkdiv'></div>
                    <div class="cnt-items-services col-11">
                        @foreach ($services as $service)
                            <div class="cnt-item-service">
                                <label for="{{ $service->name }}">
                                    <input type="checkbox" value="{{ $service->id }}" name="services[]"
                                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }} required>
                                    {{ $service->name }}</label>
                            </div>
                        @endforeach
                        {{-- <label for="services[]" class="error lbl-services" style="display: none;">Field
                            required</label> --}}
                    </div>
                </div>
                <div class="cnt-th cnt-btn h-100" id='btn-submit'>
                    <button class="btn-modify" type="submit" {{-- onclick="SelezTT()" --}}>Inserisci</button>
                </div>
            </form>


        </div>
    </div>
@endsection
