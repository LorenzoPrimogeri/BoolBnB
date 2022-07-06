@extends('layouts.app')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
        integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div style="width:40%;" class="main-slct-item-stat">
        <div class="cnt-item-dash-stat">
            {!! $chartjsV->render() !!}
        </div>
        <div class="cnt-item-dash-stat">
            {!! $chartjsM->render() !!}
        </div>
    </div>
@endsection
