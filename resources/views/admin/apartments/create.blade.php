@extends('layouts.app')
@section('content')
<div class="main-slct-item">
    <div class="cnt-slct-btn">
        <div class="cnt-th cnt-btn h-100">
            <a href="{{ route('admin.apartments.index') }}">
                <button>Appartamenti</button>
            </a>
            {{-- <a href="#"><button>Elimina</button></a> --}}
        </div>
    </div>
    <div class="cnt-item-details">
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <form autocomplete="off" action="{{ route('admin.apartments.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Visibilità:</h3>
                <select class="form-select" aria-label="Default select example" name="visible">
                    <option value="1">si</option>
                    <option value="0">no</option>
                </select>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Titolo:</h3>
                <input class="w-100 p-1" type="text" name="title" placeholder="titolo" value="{{ old('title') }}"
                    required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Descrizione:</h3>
                <textarea name="description" class="w-100" rows="10" placeholder="descrizione"
                    value="{{ old('decription') }}" required></textarea>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <input type="file" name="img">
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Indirizzo:</h3>
                {{-- <input class="w-100 p-1" type="text" name="address" placeholder="indirizzo"
                    value="{{ old('address') }}" required> --}}
                <div class="autocomplete" style="width:300px;">
                    <input id="myInput" type="text" name="address" placeholder="Indirizzo" value="{{ old('address') }}"
                        onkeyup="array()">
                </div>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Stanze:</h3>
                <input class="w-100 p-1" type="number" name="room" placeholder="numero di stanze"
                    value="{{ old('room') }}" required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Bagni:</h3>
                <input class="w-100 p-1" type="number" name="bathroom" placeholder="numero di bagni"
                    value="{{ old('bathroom') }}" required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Letti:</h3>
                <input class="w-100 p-1" type="number" name="bed" placeholder="numero di letti" value="{{ old('bed') }}"
                    required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Metri Quadri:</h3>
                <input class="w-100 p-1" type="number" name="mq" placeholder="numero di metri quadri"
                    value="{{ old('mq') }}" required>
            </div>
            <div class="cnt-row col-12 flex-dr-col algn-itm-init b-0">
                <h3>Prezzo:</h3>
                <input class="w-100 p-1" type="text" name="price" placeholder="prezzo" value="{{ old('price') }}"
                    required>
            </div>
            <div class="cnt-service">
                <h3>Servizi:</h3>
                @foreach ($services as $service)
                <input type="checkbox" value="{{ $service->id }}" name="services[]" {{ in_array($service->id,
                old('services', [])) ? 'checked' : '' }}>
                <span class="form-check-label">{{ $service->name }}</span>
                @endforeach
            </div>
            <button class="btn-modify" type="submit">Inserisci</button>
        </form>
    </div>
</div>
<style>
    .autocomplete {
        position: relative;
        display: inline-block;
    }

    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>
<script>
    let address = ['afghanistan','albania','livorno'];
    function array(){
        var indirizzo = document.getElementById('myInput').value;
        if(indirizzo.length >5){
       address=[];
        axios
      .get('https://api.tomtom.com/search/2/geocode/' +indirizzo+'.json?storeResult=false&limit=5&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK')
      .then((response) => {
        console.log(response);
        this.result = response.data.results[0].address.freeformAddress;
        this.result2 = response.data.results[1].address.freeformAddress;
        this.result3 = response.data.results[2].address.freeformAddress;
        this.result4 = response.data.results[3].address.freeformAddress;
        this.result5 = response.data.results[4].address.freeformAddress;
        address.push(this.result,this.result2,this.result3,this.result4,this.result5);
       // address= arrayAddress;
        console.log(address);
      });
    }
        return address;
    }
    function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("onkeyup", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}
autocomplete(document.getElementById("myInput"), address);
</script>






{{-- <div class="container">
    <div class="row">
        <div class="col-10  border-bottom">
            <h1>
                Creazione appartamento
            </h1>
        </div>
        <div class="col-2  border-bottom d-flex justify-content-end">
            <div>
                <a class="btn btn-primary" href="{{route('admin.apartments.index')}}">Tutti gli appartamenti</a>
            </div>
        </div>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    -
    <form action="{{route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Titolo</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="text" name="title" placeholder="Inserisci il t value=" {{old('title')}}"
                    required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Descrizione</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <textarea name="description" class="w-100" rows="10" placeholder="Inserisci una descri value="
                    {{old('description')}}" required></textarea>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Stanze</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="room" placeholder="Inserisci il numero di s value="
                    {{old('room')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">letti</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="bed" placeholder="Inserisci il numero di  value="
                    {{old('bed')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">bagni</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="bathroom" placeholder="Inserisci il numero di  value="
                    {{old('bathroom')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Metri quadri</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="number" name="mq" placeholder="Inserisci il numero di q value="
                    {{old('mq')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Indirizzo</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="text" name="address" placeholder="Inserisci l'indi value="
                    {{old('address')}}" required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Immagine</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input type="file" name="img">
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Prezzo</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <input class="w-100 p-1" type="text" name="price" placeholder="Inserisci il p value=" {{old('price')}}"
                    required>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Servizi</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                @foreach ($services as $service)
                <input type="che value=" {{$service->id}}" name="services[]" {{in_array($service->id,
                old('services',[]))?'checked':''}}>
                <span class="form-check-label">{{$service->name}}</span>
                @endforeach
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <h5 class="pt-2">Visibile</h5>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0">
                <select class="form-select" aria-label="Default select example" name="visible">
                    < value="1">si</ovalue=>
                        < value="0">no</ovalue=>
                </select>
            </div>
            <div class="col-12 flex-dr-col algn-itm-init b-0 pt-2">
                {{-- ['','','','','','','','','img','slug','visible','',''] --}
                <button type="submit" class="btn btn-success text-white">Crea appartamento</button>
            </div>
        </div>
    </form>

</div> --}}
@endsection