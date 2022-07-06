@extends('layouts.app')
{{-- @dd($user); --}}
@section('content')

<div style="margin: 500px;">
    <div>
        <div>
            {{-- title --}}
            <h5>...</h5>
            @foreach ($sponsors as $sponsor)
            <ul>
                <li>
                    <a href="{{ route('admin.checkout', $sponsor->id) }}">
                        <h5>Type: {{ $sponsor->type }}</h5>

                        <span>Duration: {{ $sponsor->duration }}</span>
                    </a>
                </li>
                <li>Price: {{ $sponsor->price }}</li>
                <li>ID APARTMENT: {{ $apartment->id }}</li>
            </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection
