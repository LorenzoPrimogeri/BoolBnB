<template>
  <div>
    <!--Header-->

    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
        <div class="cnt-hdr-items">
          <div class="col-2 col-xs-12">
            <!--logo-->

            <div class="cnt-logo">
              <router-link to="/">
                <img
                  src="../../../public/img/boolbnb-logo.svg"
                  alt="logo-BoolBnb"
                />
              </router-link>
            </div>

            <!--logo-->
          </div>
          <div class="cnt-nav col-8 h-100">
            <!--search-->

            <div class="search">
              <div class="cnt-lens"></div>
              <div class="contStringSrc">
                <input
                  id="userInput"
                  class="accountInput"
                  type="text"
                  placeholder="Cerca appartamento"
                  v-model="input"
                  @input="onInputChanged"
                />
              </div>
              <router-link
                :to="{
                  name: 'search',
                  params: { input: input },
                }"
              >
                <div class="cnt-fine"></div>
              </router-link>
            </div>

            <!--search-->
          </div>
          <div class="col-2 d-flex jc-c ai-c">
            <!--login/register button-->

            <div
              class="main-usr-set"
              v-show="$route.name === 'home' ? true : false"
            >
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

            <!--login/register button-->

            <!--filter button-->

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

            <!--filter button-->
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

    <!--Header-->
    <!--Main-->

    <main>
      <div class="container w-100">
        <div class="cnt-cards pd-20">
          <div class="box-card">
            <div class="cnt-img"></div>
            <div class="cnt-txt cnt-h col-12">
              <h2>Trentino, Italy</h2>
              <h3>Appartamento</h3>
            </div>
            <div class="price col-12">
              <span>129,00€/notte</span>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!--Main-->
    <!--Footer-->

    <footer id="Footer">
      <div class="container wmax-100 h-100 pd-20-lr">
        <div class="col-2 h-100"></div>
        <div class="cnt-footer-items col-8 h-100">
          <div class="cnt-items-ftr">
            <ul>
              <li><a href="#">link1</a></li>
              <li><a href="#">link2</a></li>
              <li><a href="#">link3</a></li>
            </ul>
          </div>
        </div>
        <div class="col-2 h-100"></div>
      </div>
    </footer>

    <!--Footer-->
  </div>
</template>


<script>
import axios from "axios";
export default {
  name: "HomeComponent",
  data() {
    return {
      input: "",
      searchedAdress: "",
      //  lat: 0, //Riferito all'indirizzo inserito dal utente
      //  lng: 0, //Riferito all'indirizzo inserito dal utente
      indirizzi: [], //indirizzi che stampo per l'auto complete
      allApartaments: [], //tutti gli appartamenti visible
      correctApartments: [], //appartamenti che soddisfano la ricerca
      //  allServices: [],
      //  services: [],
      //  distanceKm: 20,
      //  room: 1,
      //  inputUser: ' ',
      //bed: 1,
    };
  },
  mounted() {
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data.apartments;
      // console.log(this.allApartaments);
      // this.allServices = results.data.services;
      // console.log(this.allServices);
    });
    // if (localStorage.input) {
    //   this.input = localStorage.input;
    // }
  },
  methods: {
    // persist() {
    //   localStorage.input = this.input;
    //   console.log("Storage Input " + localStorage.input);
    // },
    onInputChanged() {
      // console.log(this.distanceKm);
      //Call axios che restituisce gli indirizzi autocomplete
      delete axios.defaults.headers.common["X-Requested-With"];
      this.indirizzi = [];
      axios
        .get(
          "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=5&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
          { params: { query: this.input } }
        )
        .then((risp) => {
          const risultati = risp.data.results;
          // console.log('risultato', this.input);
          this.indirizzi = risultati;
        });
      //return this.indirizzi;
    },
    take(indirizzo) {
      // const searchedAdress = indirizzo;
      this.input = indirizzo;
      //   return searchedAdress;
      // console.log('risultato nuovo input', this.input);
    },
  },
};
</script>

<style scoped  lang="scss">
// style header
@import url("../../../public/css/layout-preset.css");

// style main

main {
  display: flex;
  width: 100%;
  margin: 180px auto;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}

// style main card

.container {
  position: relative;
  .cnt-label {
    position: sticky;
    display: flex;
    padding: 20px;
    color: #fff;
    height: auto;
    left: 50px;
    justify-content: center;
    align-items: center;
    font-weight: 600;
    font-size: 2em;
  }
  .cnt-cards {
    display:flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
  }
  .box-card {
   display: flex;
    width: calc(100% / 4 - 25px);
    flex-direction: column;
    .cnt-img {
       img {
         width: 100%;
         border-radius: 20px;
     }
    }
    .cnt-h {
      height: 50px;
      padding: 10px 0;
      h2 {
        font-size: 1em;
      }
      h3 {
        color: grey;
        font-size: 0.8em;
      }
    }
    .price {
      display: contents;
      span {
        width: 100%;
        text-align: left;
        font-weight: 600;
      }
    }
  }
}

// style footer

footer {
  background-color: white;
  border-top: 1px solid lightgray;
  position: fixed;
  bottom: 0;
  height: auto;
  width: 100%;

  .cnt-footer-items {
    display: flex;
    justify-content: center;
    width: 100%;

    .cnt-items-ftr {
      ul {
        display: flex;
        align-items: center;
        gap: 10px;
        list-style-type: none;
        margin: 0 !important;
        padding: 15px;

        li {
          a {
            text-decoration: none;
            color: darkslategray;

            &:hover {
              color: #7174b6;
            }
          }
        }
      }
    }
  }
}
</style>
