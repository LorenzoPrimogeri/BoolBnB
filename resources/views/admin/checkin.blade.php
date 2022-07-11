@extends('layouts.app')
@section('content')
    <div class="main-slct-item main-slct-item-card">
        <div class="container">
            <div class="main-heading-ads">
                <div class="cnt-heading">
                    <h1>Piani di Sponsorizzazione</h1>
                    <h2>Dai un boost al tuo appartamento</h2>
                    <h3>Scegli tra Gold, Silver e Bronze</h3>
                    <p>Maggiori possibilità di ricevere prenotazioni per il tuo appartamento</p>
                </div>
                <div class="main-cards-ads">
                    @foreach ($sponsors as $sponsor)
                        <div class="box-card-ads">
                            <div class="picture">
                                <div class="pic-ads">
                                </div>
                            </div>
                            <div class="cnt-txt-ads">
                                <h2>{{ $sponsor->type }}</h2>
                                <h4>Durata: {{ $sponsor->duration }} ore</h4>
                            </div>
                            <div class="cnt-btn-cta">
                                <a
                                    href="{{ route('admin.checkout', ['sponsor_id' => $sponsor->id, 'apartment_id' => $apartment->id]) }}">
                                    <button class="btn-cta">€ {{ $sponsor->price }}</button>
                                </a>
                            </div>
                        </div>
                        {{-- <div class="card">
                <h2>{{ $sponsor->type }}</h2>

                <span>Durata: {{ $sponsor->duration }} ore</span>
                <div class="cnt-btn">
                    <a
                        href="{{ route('admin.checkout', ['sponsor_id' => $sponsor->id, 'apartment_id' => $apartment->id]) }}">
                        <button>€ {{ $sponsor->price }}</button>
                    </a>
                </div>
            </div> --}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
