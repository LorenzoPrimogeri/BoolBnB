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
                    <div class="cnt-th col-3 col-md-4">Immagine</div>
                    <div class="cnt-th col-3 col-md-4">Titolo</div>
                    <div class="cnt-th col-3 col-md-4">Prezzo</div>
                    <div class="cnt-th col-3"></div>
                </div>
                @foreach ($apartments as $apartment)
                    <div class="main-columns">
                        <div class="cnt-column col-3 col-md-4">
                            <div class="cnt-th">
                                <div class="cnt-img">
                                    <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-4">
                            <div class="cnt-th h-100">
                                {{ $apartment->title }}
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-4">
                            <div class="cnt-th h-100">
                                {{ $apartment->price }}
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-12">
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
