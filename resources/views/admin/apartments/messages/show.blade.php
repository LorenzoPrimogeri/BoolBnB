@extends('layouts.app')
@section('content')
    <div class="main-slct-item">
        <div class="cnt-slct-btn">
            <div class="cnt-th cnt-btn h-100">
                <a href="{{ route('admin.apartments.messages.index', $apartment->id) }}">
                    <button>Torna ai messaggi</button>
                </a>
            </div>
        </div>
        <div class="cnt-item-details">
            <div class="cnt-row col-12">
                <h3>Email:</h3>
                <p>{{ $message->email }}</p>
            </div>
            <div class="cnt-row col-12">
                <h3>Oggetto:</h3>
                <p> {{ $message->object }}</p>
            </div>
            <div class="col-12 p-20">
                <h3 class="col-12">Messaggio:</h3>
                <p class="col-12 mt-2"> {{ $message->body }}</p>
            </div>
        </div>
    </div>
@endsection
