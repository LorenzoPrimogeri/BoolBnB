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
            <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
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
                    <textarea name="description" class="w-100" rows="10" placeholder="descrizione" value="{{ old('decription') }}"
                        required></textarea>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <input type="file" name="img">
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Indirizzo:</h3>
                    <input class="w-100 p-1" type="text" name="address" placeholder="indirizzo"
                        value="{{ old('address') }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Stanze:</h3>
                    <input class="w-100 p-1 onlynumber" type="number" min="1" name="room"
                        placeholder="numero di stanze" value="{{ old('room') }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Bagni:</h3>
                    <input class="w-100 p-1 onlynumber" type="number" min="0" name="bathroom"
                        placeholder="numero di bagni" value="{{ old('bathroom') }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Letti:</h3>
                    <input class="w-100 p-1 onlynumber" type="number" min="1" name="bed"
                        placeholder="numero di letti" value="{{ old('bed') }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Metri Quadri:</h3>
                    <input class="w-100 p-1 onlynumber" type="number" min="5" name="mq"
                        placeholder="numero di metri quadri" value="{{ old('mq') }}" required>
                </div>

                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <h3>Prezzo:</h3>
                    <input class="w-100 p-1 onlynumber" type="text" name="price" placeholder="prezzo"
                        value="{{ old('price') }}" required>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <div class="cnt-service">
                        <div class="col-1">
                            <h3>Servizi:</h3>
                        </div>
                    </div>
                    <div class="cnt-items-services col-11">
                        @foreach ($services as $service)
                            <div class="cnt-item-service">
                                <input type="checkbox" value="{{ $service->id }}" name="services[]"
                                    {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                <span class="form-check-label">{{ $service->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                    <button class="btn-modify" type="submit">Inserisci</button>
                </div>
            </form>
        </div>
        @push('input-validation')
            <script type="text/javascript" src="{{ asset('js/validation-input.js') }}"></script>
        @endpush
    </div>
@endsection
