{{-- @extends('layouts.app') --}}
@section('content')
    <div class="subMenu closeMenu" id="subMenuSlide"
        style="filter: progid:DXImageTransform.Microsoft.Shadow(color='#dedede', Direction=135, Strength=10);
-webkit-overflow-scrolling:touch;">
        <div class="contSubMenuSlide">
            <ul>
                <li>
                    <div class="ico aprt"></div><a href="#">Appartamenti</a>
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
            <div class="cnt-obj-hdr-mob">
                <div class="cnt-actions">
                    <!-- <div class="obj-actions"></div> -->
                    <a class="a-log" href="#">
                        <div class="obj-actions log"></div>
                        <div>LogIn</div>
                    </a>
                    <a class="a-reg" href="#">
                        <div class="obj-actions reg"></div>
                        <div>Register</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
