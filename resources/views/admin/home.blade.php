@extends('layouts.app')
@section('content')
    @yield('content')
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar">
                <div class="cnt-ul">
                    <ul>
                        <li>
                            <div class="ico aprt"></div><a href="{{ route('admin.apartments.index') }}">Dashboard</a>
                        </li>
                        <li>
                            <div class="ico msg"></div><a href="#">Messaggi</a>
                        </li>
                        <li>
                            <div class="ico ads"></div><a href="#">Sponsorizzate</a>
                        </li>
                        <li>
                            <div class="ico stcs"></div><a href="#">Statistiche</a>
                        </li>
                    </ul>
                </div>
            </div>​
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
@endsection

</html>
