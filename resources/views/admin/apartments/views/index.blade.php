@extends('layouts.app')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
        integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="main-slct-item">
        <div class="cnt-slct-btn">
            <div class="cnt-th cnt-btn h-100">
                <a href="{{ route('admin.apartments.index') }}">
                    <button>Torna indietro</button>
                </a>
            </div>
        </div>
        <div style="width:45%;">
            <div class="cnt-item-dash">
                {!! $chartjsV->render() !!}
            </div>
            <div class="cnt-item-dash mt-2">
                {!! $chartjsM->render() !!}
            </div>
        </div>
    </div>
@endsection
