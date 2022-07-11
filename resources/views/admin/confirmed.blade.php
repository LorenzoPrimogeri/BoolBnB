@extends('layouts.app')
@section('content')
    <div class="wrapSuccess opacity-in">
        <div class="contSuccess animate-top">
            <div class="iconSuc logoBool"></div>
            <div class="iconSuc logoSuc"></div>
            <div class="textSuccess">
                <h1>Il pagamento è stato completato con successo!</h1>
                <p>Hai acquistato la sponsorizzata {{ $sponsor->type }}: {{ $sponsor->price }}</p>
                <div class="cnt-th cnt-btns h-100">
                    <div class="cnt-btn-cta">
                        <a href="{{ route('admin.apartments.index') }}">
                            <button class="btn-cta">Dashboard</button>
                        </a>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="main-slct-item gap-20">
        <h1>
            Your purchase is completed!
        </h1>
        <p>
            Your order payment was{{ $sponsor->price }}
        </p>
        <div class="cnt-th cnt-btns h-100">
            <a href="{{ route('admin.apartments.index') }}">
                <div class="cnt-btn" title="Dashboaard">
                    <button class="btn btn-home"></button>
                </div>
            </a>
        </div>
    </div> --}}
@endsection
