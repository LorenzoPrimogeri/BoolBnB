@extends('layouts.app')
@section('content')
<div style="margin:500px;">
    <h1>
        Your purchase is completed!
    </h1>
    <p>
        Your order payment was{{$sponsor->price}}
    </p>
    <a href="{{route('admin.apartments.index')}}">
        <button>home</button>
    </a>
</div>
@endsection