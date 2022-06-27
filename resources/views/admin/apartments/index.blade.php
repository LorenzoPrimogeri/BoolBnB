@extends('layouts.app')
@section('content')
    <div class="main-slct-item">
        <div class="cnt-slct-btn">
            <div class="cnt-th cnt-btn h-100">
                <a href="{{ route('admin.apartments.create') }}">
                    <button>Inserisci</button>
                </a>
            </div>
        </div>
        <div class="cnt-item-dash">
            <div class="cnt-table">
                <div class="main-body-th">
                    <div class="cnt-th col-3">Immagine</div>
                    <div class="cnt-th col-3">Titolo</div>
                    <div class="cnt-th col-3">Prezzo</div>
                    <div class="cnt-th col-3"></div>
                </div>
                @foreach ($apartments as $apartment)
                    <div class="main-columns">
                        <div class="cnt-column col-3">
                            <div class="cnt-th">
                                <div class="cnt-img">
                                    <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="cnt-column col-3">
                            <div class="cnt-th h-100">
                                {{ $apartment->title }}
                            </div>
                        </div>
                        <div class="cnt-column col-3">
                            <div class="cnt-th h-100">
                                {{ $apartment->price }}
                            </div>
                        </div>
                        <div class="cnt-column col-3">
                            <div class="cnt-th cnt-btn h-100">
                                <a href="{{ route('admin.apartments.show', $apartment->id) }}">
                                    <button>Mostra</button>
                                </a>
                                <a href="{{ route('admin.apartments.edit', $apartment->id) }}">
                                    <button>Modifica</button>
                                </a>
                                <form class="d-inline  w-100"
                                    action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger w-100 " onclick="return confirm('Are your sure?')"
                                        type="submit">Elimina</button>
                                </form>
                                {{-- <a href="#">
                                        <button>Elimina</button>
                                    </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- </main> --}}
    {{-- <div class="container">
        <div class="row d-flex flex-column">
            <div class=" col-12 d-flex justify-content-center ">
                <h1>
                    Appartamenti
                </h1>
            </div>
            <div class=" col-12 p-2  border-bottom d-flex justify-content-center">
                <div>
                    <a class="btn btn-insert " href="{{ route('admin.apartments.create') }}">Inserisci</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($apartments ?? '' as $apartment)
                <div class="cnt-img col-xs-3 col-sm-3 col-md-3 col-lg-2 p-2 d-flex align-items-center  border-bottom">
                    <img src="{{ asset('storage/' . $apartment->img) }}" alt="immagine">
                </div>
                <div class="col-xs-3 col-sm-2 col-md-3 col-lg-4 p-2 d-flex align-items-center  border-bottom">
                    <p class="m-0">{{ $apartment->title }}</p>
                </div>
                <div class="col-xs-3 col-sm-2 col-md-3 col-lg-4 p-2 d-flex align-items-center  border-bottom">
                    <p class="m-0">{{ $apartment->address }}</p>
                </div>
                <div
                    class="pt-2 pb-2 col-xs-3 col-sm-3 col-md-3 col-lg-2 flex-md-column d-flex align-items-center justify-content-center  border-bottom">
                    <a class='btn btn-primary w-100' href="{{ route('admin.apartments.show', $apartment->id) }}">DETTAGLI
                    </a>
                    <a class='m-1 btn btn-secondary w-100'
                        href="{{ route('admin.apartments.edit', $apartment->id) }}">MODIFICA
                    </a>
                    <form class="d-inline  w-100" action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger w-100 " onclick="return confirm('Are your sure?')"
                            type="submit">CANCELLA</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div> --}}
@endsection
