@extends('layouts.dashboard')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10  border-bottom">
            <h1>
                Tutti gli Appartamenti
            </h1>
        </div>
        <div class="col-2 pb-2 border-bottom d-flex justify-content-end">
            <div>
                <a class="btn btn-primary" href="{{route('admin.apartments.create')}}">Crea nuovo appartamento</a>
            </div>
        </div>
    </div>
    <div class="row py-2 ">
        <div class="col-3 border-bottom">
            <h4>ID</h4>
        </div>
        <div class="col-3 border-bottom">
            <h4>Titolo</h4>
        </div>
        <div class="col-3 border-bottom">
            <h4>User ID</h4>
        </div>
        <div class="col-3 border-bottom">
            <h4>Azioni</h4>
        </div>
    </div>
    <div class="row py-2 ">
        @foreach ($apartments as $apartment)
        <div class="col-3 border-bottom">
            <p>{{$apartment->id}}</p>
        </div>
        <div class="col-3 border-bottom">
            <p>{{$apartment->title}}</p>
        </div>
        <div class="col-3 border-bottom">
            <p>{{$apartment->user_id}}</p>
        </div>
        <div class="col-3 border-bottom">
            <a href="{{route('admin.apartments.show', $apartment->id)}}">show </a>/
            <a href="{{route('admin.apartments.edit', $apartment->id)}}">edit </a>/
            <form class="d-inline" action="{{route('admin.apartments.destroy',$apartment->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input name="_method" type="hidden" value="DELETE">

                <button class="border-0 text-primary bg-transparent" onclick="return confirm('Are your sure?')"
                    type="submit">remove</button>
            </form>
        </div>
        @endforeach
    </div>

</div>
@endsection