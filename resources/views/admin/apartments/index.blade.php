@extends('layouts.app')
@section('content')
    <div class="main-slct-item">
        <div class="cnt-slct-btn">
            <div class="cnt-th cnt-btns h-100">
                <a href="{{ route('admin.apartments.create') }}">
                    <div class="cnt-btn" title="Inserisci">
                        <button class="btn btn-add"></button>
                    </div>
                </a>
            </div>
        </div>
        <div class="cnt-item-dash">
            <div class="cnt-table">
                <div class="main-body-th">
                    <div class="cnt-th col-3 col-md-5">Immagine</div>
                    <div class="cnt-th col-3 col-md-5">Titolo</div>
                    <div class="cnt-th col-3 col-md-2">Prezzo</div>
                    <div class="cnt-th col-3"></div>
                </div>
                @foreach ($apartments as $apartment)
                    <div class="main-columns">
                        <div class="cnt-column col-3 col-md-5">
                            <div class="cnt-th">
                                <div class="cnt-img">
                                    <img src="{{ asset('storage/' . $apartment->img) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-5">
                            <div class="cnt-th h-100">
                                {{ $apartment->title }}
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-2">
                            <div class="cnt-th h-100">
                                {{ $apartment->price }}
                            </div>
                        </div>
                        <div class="cnt-column cnt-col-btns col-3">
                            <div class="cnt-th cnt-btns h-100">
                                <a href="{{ route('admin.apartments.show', $apartment->id) }}">
                                    <div class="cnt-btn" title="Mostra">
                                        <button class="btn btn-show"></button>
                                    </div>
                                </a>
                                <a href="{{ route('admin.apartments.edit', $apartment->id) }}">
                                    <div class="cnt-btn" title="Modifica">
                                        <button class="btn btn-modify"></button>
                                    </div>
                                </a>
                                <a href="{{ route('admin.apartments.messages.index', $apartment->id) }}">
                                    <div class="cnt-btn" title="Messaggi">
                                        <button class="btn btn-msg"></button>
                                    </div>
                                </a>
                                <a href="{{ route('admin.checkin', $apartment->id) }}">
                                    <div class="cnt-btn" title="Sponsorizzate">
                                        <button class="btn btn-ads"></button>
                                    </div>
                                </a>
                                <a href="{{ route('admin.apartments.views.index', $apartment->id) }}">
                                    <div class="cnt-btn" title="Statistiche">
                                        <button class="btn btn-stcs"></button>
                                    </div>
                                </a>
                                <form class="d-inline  wmax-100"
                                    action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input name="_method" type="hidden" value="DELETE">

                                    <div class="cnt-btn" title="Cancella">
                                        <button class="btn btn-delete wmax-100 " onclick="return confirm('Are your sure?')"
                                            type="submit"></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
