<template>
  <div>
    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
        <div class="cnt-hdr-items">
          <div class="col-2 col-xs-12">
            <div class="cnt-logo">
              <a href="">
                <img
                  src="../../../public/img/boolbnb-logo.svg"
                  alt="logo-BoolBnb"
                />
              </a>
            </div>
          </div>
          <div class="cnt-nav col-8 h-100">
            <!--search-->
            <div class="search">
              <div class="cnt-lens"></div>
              <div class="contStringSrc">
                <keep-alive>
                <input
                  @keyup.enter="saveValue(this)"
                  id="userInput"
                  class="accountInput"
                  type="text"
                  placeholder="Cerca appartamento"
                  v-model="input"
                  @input="onInputChanged"
                  @keypress="persist"
                />         
                  </keep-alive>

                <!-- <div class="input">T-Shirt manica corta bianca i have a dream</div> -->
              </div>
              <a href="/search" @click="persist" @change="$emit('search', input , searchedAdress)" >
                <div class="cnt-fine"></div>
              </a>
            </div>
            <!--search-->
          </div>
          <div class="col-2 d-flex jc-c ai-c">
            <div
              class="main-usr-set"
              v-show="$route.name === 'home' ? true : false">
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
            <div class="col-2 d-flex jc-c ai-c">
              <div
                id="filter"
                class="cnt-btn-filter"
                v-show="$route.name === 'search' ? true : false"
              >
                <div class="btn-filter"></div>
                <span>Filtri</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="cnt-result-adress">
      <div
        class="cnt-items"
        v-for="(indirizzo, i) in indirizzi"
        :key="i + indirizzo.address"
      >
        <a href="#" @click="take(indirizzo.address.freeformAddress)">
          {{ indirizzo.address["freeformAddress"] }}
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ApartmentComponent from "../pages/ApartmentComponent.vue";
export default {
  name: "HeaderComponent",
  components: {
    ApartmentComponent,
  },
  data() {
    return {
      input: "",
      searchedAdress: '',
      lat: 0, //Riferito all'indirizzo inserito dal utente
      lng: 0, //Riferito all'indirizzo inserito dal utente
      indirizzi: [], //indirizzi che stampo per l'auto complete
      allApartaments: [], //tutti gli appartamenti visible
      correctApartments: [], //appartamenti che soddisfano la ricerca
      allServices: [],
      services: [],
      distanceKm: 20,
      room: 1,
      inputUser: ' ',
      bed: 1,
    };
  },
  mounted() {
    
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data.apartments;
      // console.log(this.allApartaments);
      this.allServices = results.data.services;
      // console.log(this.allServices);
    });
    if (localStorage.input) {
      this.input = localStorage.input;
    }
  },
  methods: {
    persist() {
      localStorage.input = this.input;
      console.log("Storage Input " + localStorage.input);
    },
    onInputChanged() {
      // console.log(this.distanceKm);
      //Call axios che restituisce gli indirizzi autocomplete
      delete axios.defaults.headers.common["X-Requested-With"];
      this.indirizzi = [];
      axios.get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=5&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      ).then((risp) => {
        const risultati = risp.data.results;
        // console.log('risultato', this.input);
        this.indirizzi = risultati;
      });
      return this.indirizzi;
    },
    take(indirizzo) {
      const searchedAdress = indirizzo
      this.input = indirizzo;
      return searchedAdress
      // console.log('risultato nuovo input', this.input);
    },
  },
};
</script>

<style scoped lang="scss">
@import url("../../../public/css/layout-preset.css");
</style>
