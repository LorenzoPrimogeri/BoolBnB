{{-- @extends('layouts.app')
@section('content') --}}
@foreach ($messages as $message)
    <div class="main-columns">
        <div class="cnt-column col-3 col-md-5">
            <div class="cnt-th h-100">
                {{ $message->email }}
            </div>
        </div>
        <div class="cnt-column col-3 col-md-2">
            <div class="cnt-th h-100">
                {{ $message->object }}
            </div>
        </div>
        <div class="cnt-column col-3 col-md-2">
            <div class="cnt-th h-100">
                {{ $message->body }}
            </div>
        </div>
    </div>
@endforeach
{{-- @endsection --}}
