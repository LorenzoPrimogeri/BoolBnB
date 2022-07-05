@extends('layouts.app')
@section('content')
<div class="main-slct-item">

    @foreach ($sponsors as $sponsor)
    <div>
        {{$sponsor->type}}
    </div>
    <div>
        {{$sponsor->price}}
    </div>
    <div>
        {{-- {{$sponsor->description}} --}}
    </div>
    <div>
        {{$sponsor->duration}}
    </div>
    <div>
        <a href="{{ route('admin.apartments.sponsors.show', [$apartment->id,$sponsor->id ]) }}">
            <button>buy</button>
        </a>
    </div>
    @endforeach
</div>
@endsection