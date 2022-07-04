<template>
  <div>
    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
        <div class="cnt-hdr-items">
          <div class="col-2 col-xs-12">
            <div class="cnt-logo">
              <a href="">
                <img src="../../../public/img/boolbnb-logo.svg"
                  alt="logo-BoolBnb" />
              </a>
            </div>
          </div>
          <div class="cnt-nav col-8 h-100">
            <!--search-->
            <div class="search">
              <div class="cnt-lens"></div>
              <div class="contStringSrc">
                <input class="accountInput" type="text"
                  placeholder="Cerca appartamento" v-model="input"
                  @input="onInputChanged">
                <!-- <div class="input">T-Shirt manica corta bianca i have a dream</div> -->
              </div>
              <a href="#">
                <div class="cnt-fine"></div>
              </a>
            </div>
            <!--search-->
          </div>
          <div class="col-2 d-flex jc-c ai-c">
            <div class="main-usr-set">
              <ul class="ul-log-reg">
                <!-- Authentication Links -->
                <!-- <a href="{{ route('login') }}"> -->
                <li>
                  <div class="ico-log ico-login"></div>
                  <a href=" /login">Login</a>
                </li>
                <!-- </a> -->
                <!-- <a href="{{ route('register') }}"> -->
                <li>
                  <div class="ico-log ico-reg"></div>
                  <a href="/register">Register</a>
                </li>
                <!-- </a> -->
                <!-- <div class="cnt-usr-set">
                  <div class="cnt-span">
                    <span>{{ Auth:: user()-> name }}</span>
                    <span>{{ Auth:: user()-> email }}</span>
                    <a id="arrowUsr" href="#">
                      <div class="cnt-arrow">
                        <span class="arrow"></span>
                      </div>
                    </a>
                  </div>
                  <div id="subMenuUsr" class="contUlAccount">
                    <ul class="ulSet-usr">
                      <li>
                        <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}"
                          method="POST" class="d-none">
                        </form>
                      </li>
                    </ul>
                  </div>
                </div> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="cnt-result-adress">
      <div class="cnt-items" v-for="(indirizzo, i) in indirizzi"
        :key="i + indirizzo.address">
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import ApartmentComponent from "../pages/ApartmentComponent.vue";
export default {
  name: "SearchComponent",
  components: {
    ApartmentComponent,
  },
  data() {
    return {
      input: "",
      lat: 0, //Riferito all'indirizzo inserito dal utente
      lng: 0, //Riferito all'indirizzo inserito dal utente
      indirizzi: [], //indirizzi che stampo per l'auto complete
      allApartaments: [], //tutti gli appartamenti visible
      correctApartments: [], //appartamenti che soddisfano la ricerca
      allServices: [],
      services: [],
      distanceKm: 20,
      room: 1,
      bed: 1,
    };
  },
  mounted() {
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data.apartments;
      console.log(this.allApartaments);
      this.allServices = results.data.services;
      console.log(this.allServices);
    });
  },
  methods: {
    onInputChanged() {
      // console.log(this.distanceKm);
      //Call axios che restituisce gli indirizzi autocomplete
      delete axios.defaults.headers.common["X-Requested-With"];
      this.indirizzi = [];
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=5&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      ).then((risp) => {
        const risultati = risp.data.results;
        console.log(risultati);
        this.indirizzi = risultati;
      });
      return this.indirizzi;
    },
    take(indirizzo) {
      this.input = indirizzo;
    },
    takeLatLng() {
      //prendo lat e long dal indirizzo
      console.log(this.input);
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      ).then((risp) => {
        const position = risp.data.results[0].position;
        this.lat = position.lat;
        this.lng = position.lon;
        console.log("lat:" + this.lat + " lng:" + this.lng);
        this.searchApartments();
      });
    },
    searchApartments() {
      console.log(this.services);
      //reset degli appartamenti corretti
      this.correctApartments = [];
      console.log(this.correctApartments);
      //console.log(this.apartaments);
      for (let i = 0; i < this.allApartaments.length; i++) {
        const apartment = this.allApartaments[i];
        const distance = this.distance(
          this.lat,
          this.lng,
          apartment.lat,
          apartment.lng
        );
        if (
          distance <= this.distanceKm &&
          apartment.room >= this.room &&
          apartment.bed >= this.bed
        ) {
          console.log("la distanza è: " + distance.toFixed(3) + " km :)");
          console.log(apartment.room);
          console.log(apartment.bed);
          console.log("Fatto");
          this.correctApartments.push(apartment);
        } else {
        }
        console.log(this.correctApartments);
      }
    },
    distance(lat1, lon1, lat2, lon2) {
      if (lat1 == lat2 && lon1 == lon2) {
        return 0;
      } else {
        var radlat1 = (Math.PI * lat1) / 180;
        var radlat2 = (Math.PI * lat2) / 180;
        var theta = lon1 - lon2;
        var radtheta = (Math.PI * theta) / 180;
        var dist =
          Math.sin(radlat1) * Math.sin(radlat2) +
          Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
          dist = 1;
        }
        dist = Math.acos(dist);
        dist = (dist * 180) / Math.PI;
        dist = dist * 60 * 1.1515;
        dist = dist * 1.609344;
        return dist;
      }
    },
  },
};
</script>

<style scoped lang="scss">
@import url('../../../public/css/layout-preset.css');


// #Header{
//     width: 100vw;
//     height:10vh;
//     display: flex;
//     #logo-container{
//         width: 15vw;
//         height:10vh;
//         display: flex;
//         justify-content: center;
//         align-items: center;
//         img{
//           width: 200px;
//         }
//     }
//     #search-container{
//         width: 70vw;
//         height:10vh;
//     }
//     #btn-container{
//         width: 15vw;
//         height:10vh;
//         display: flex;
//         justify-content: center;
//         align-items: center;
//         a{
//          margin: 1%;
//         }
//     }
// }
</style>