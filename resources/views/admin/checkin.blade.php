@extends('layouts.app')
@section('content')
    <div class="main-slct-item-card">
        @foreach ($sponsors as $sponsor)
            <div class="card">
                <h2>{{ $sponsor->type }}</h2>

                <span>Durata: {{ $sponsor->duration }} ore</span>
                <div class="cnt-btn">
                    <a
                        href="{{ route('admin.checkout', ['sponsor_id' => $sponsor->id, 'apartment_id' => $apartment->id]) }}">
                        <button>€ {{ $sponsor->price }}</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
