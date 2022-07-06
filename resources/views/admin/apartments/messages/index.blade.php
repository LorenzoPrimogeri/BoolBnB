@extends('layouts.app')
@section('content')
    <div class="main-slct-item">
        <div class="cnt-item-dash">
            <div class="cnt-table">
                <div class="main-body-th">
                    <div class="cnt-th col-3 col-md-5 tbl-title f-grow">Inviato da</div>
                    <div class="cnt-th col-3 col-md-5 tbl-title f-grow">Oggetto</div>
                    <div class="cnt-th col-3 col-md-2 tbl-title f-grow">Inviato il</div>
                    <div class="cnt-th col-3 col-md-2 tbl-title f-grow">Action</div>
                </div>
                @foreach ($messages as $message)
                    <div class="main-columns">
                        <div class="cnt-column col-3 col-md-5 f-grow">
                            <div class="cnt-th h-100">
                                {{ $message->email }}
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-2 f-grow">
                            <div class="cnt-th h-100">
                                {{ $message->object }}
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-2 f-grow">
                            <div class="cnt-th h-100">
                                {{ $message->created_at }}
                            </div>
                        </div>
                        <div class="cnt-column col-3 col-md-2 f-grow">
                            <div class="cnt-th h-100">
                                <a
                                    href="{{ route('admin.apartments.messages.show', ['apartment' => $apartment->id, 'message' => $message->id]) }}">Visualizza</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
