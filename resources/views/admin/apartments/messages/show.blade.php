@extends('layouts.app')
@section('content')
    <div class="main-slct-item">
        <div class="cnt-item-details">
            <div class="cnt-row col-12">
                <h3>Email:</h3>
                <p>{{ $message->email }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Oggetto:</h3>
                <p> {{ $message->object }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3 class="col-12 w-100">Messaggio:</h3>
                <p class="col-12 w-100"> {{ $message->body }}</p>
            </div>
            <a href="{{ route('admin.apartments.messages.index', $apartment->id) }}">
                <button>Torna ai messaggi</button>
            </a>
        </div>
    </div>
@endsection
