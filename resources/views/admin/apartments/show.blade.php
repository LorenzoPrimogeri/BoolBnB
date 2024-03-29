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
                <a href="{{ route('admin.apartments.edit', $apartment->id) }}">
                    <div class="cnt-btn" title="Modifica">
                        <button class="btn btn-modify"></button>
                    </div>
                </a>
                <form class="d-inline wmax-100" action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <input name="_method" type="hidden" value="DELETE">
                    <div class="cnt-btn" title="Elimina">
                        <button class="btn btn-delete wmax-100" onclick="return confirm('Are your sure?')"
                            type="submit"></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="cnt-item-details">
            <div class="cnt-row col-12">
                <h3>Visibilità:</h3>
                <p class="w-100 p-1"> {{ $apartment->visible ? 'visibile al momento' : 'Non visibile' }} </p>
            </div>
            <div class="cnt-row col-12">
                <h3>Titolo:</h3>
                <p> {{ $apartment->title }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Indirizzo:</h3>
                <p> {{ $apartment->address }}</p>
            </div>
            <div class="cnt-row col-12">
                <div class="cnt-img">
                    <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
                </div>
            </div>
            <div class="cnt-row col-12">
                <h3>Descrizione:</h3>
                <p> {{ $apartment->description }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Stanze:</h3>
                <p> {{ $apartment->room }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Bagni:</h3>
                <p> {{ $apartment->bathroom }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Letti:</h3>
                <p> {{ $apartment->bed }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Metri Quadri:</h3>
                <p> {{ $apartment->mq }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Prezzo:</h3>
                <p> {{ $apartment->price }}$</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Servizi:</h3>
                @foreach ($apartment->services as $service)
                    <p> {{ $service->name }} </p>
                @endforeach
            </div>
            <div class="cnt-row col-12">
                <h3>Sponsor attiva:</h3>
                @if (sizeof($apartment->sponsorships) == 0)
                    <p>Nessuna sponsorizzazione</p>
                @else
                    <p>{{ $apartment->sponsorships[0]['type'] }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
