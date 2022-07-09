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
    <div class="cnt-result-adress" v-if="!isClicked">
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
      
      <div class="container w-100 h-100 d-flex jc-c ai-c">
        <carousel class="w-100">
          <slide v-for="apartment in allApartaments" :key="apartment.id">
              <div class="box-card " @click="gotoDetails(apartment.id)" >
              <!-- <div class="row"> -->
              <router-link  :to="'/home/'+ apartment.id ">
              <div class="cnt-img">
                <a href="#">
                  <img :src="'/storage/' + apartment.img"  />
                </a>
              </div>
              </router-link>
              <!-- </div> -->
              <div class="cnt-txt cnt-h col-12">
                <h2>{{ apartment.title }}</h2>
                <h3>{{ apartment.address }}</h3>
              </div>
              <div class="price col-12">
                <span>{{ apartment.price }} €/notte</span>
              </div>
            </div>
          </slide>
        </carousel>
      </div>
      
    </main>

    <!--Main-->
    <!--Footer-->

  <footer>
    <div class="row-ftr">
      <div class="obj-cont-ftr">
        <div class="col-3 cnt-obj-ftr">
          <div class=" cnt-obj-ftr">
            <a href="#"> Contact us </a>
          </div>
          <div class=" cnt-obj-ftr">
            <a href="#"> Privacy Policy </a>
          </div>
          <div class=" cnt-obj-ftr">
            <a href="#">Terms & condition </a>
          </div>
        </div>
        <div class="col-9 cnt-obj-ftr">
          <div class="row-obj-ftr">
            <div class="ico-soc fb"></div>
            <div class="ico-soc ig"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row-ftr">
      <div class="obj-cont-ftr obj-cont-tm">
        <p class="tm">©
          <!-- <script>
          document.write(new Date().getFullYear())
          </script> -->
        </p>
        <div class="logo-tm"></div>
        <p class="tm"> - All Rights Reserved</p>
      </div>
    </div>
  </footer>
    <!--Footer-->
  </div>
</template>


<script>
import axios from "axios";
import { Carousel, Slide } from 'vue-carousel';
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
      isClicked: false,
      //  allServices: [],
      //  services: [],
      //  distanceKm: 20,
      //  room: 1,
      //  inputUser: ' ',
      //bed: 1,
    };

  },
   components: {
    Carousel,
    Slide
  },
  mounted() {
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      let result = [];
      result = results.data.apartments;
      console.log(results);
      for (let i = 0; i < result.length; i++) {
        let apartment = result[i];
        if (apartment.sponsorships.length >= 1) {
          console.log("ciao sono apparso");
          this.allApartaments.push(apartment);
        }
      }
      console.log(this.allApartaments);
      // this.allServices = results.data.services;
      // console.log(this.allServices);
    });
    // if (localStorage.input) {
    //   this.input = localStorage.input;
    // }
  },
  methods: {
    gotoDetails(id) {
      const url = ' '/home/' + id '
      return url
    },
    onInputChanged() {
        this.isClicked = false;
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
      this.isClicked = true;
      //   return searchedAdress;
      // console.log('risultato nuovo input', this.input);
    },
  },
};
</script>

<style scoped  lang="scss">
// style header
@import url("../../../public/css/layout-preset.css");
@import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');

// style main

main {
  .title{
    display: flex;
    justify-content: space-around;
    margin-bottom: 3%;
  }
  h2{
    font-family: 'Lobster', cursive;
    font-weight: bold;
    font-size: 2.8rem;
    color: #797cba;
  }
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
    width: 500px;
    flex-direction: column;
    .cnt-img {
      width: 100%;
      height: 200px;
       img {
        height: 100%;
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

   .box-card-csm {
   display: flex;
    width: 250px;
    flex-direction: column;
    .cnt-img {
      width: 100%;
      height: 200px;
       img {
        height: 100%;
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
  display: grid;
  position: relative;
  width: 100%;
  background-color: #2f2e41;
  padding: 0;
  gap: 10px;
  .row-ftr {
    width: 100%;
    display: flex;
    background-color: transparent;
    padding: 50px;
    &:nth-child(2) {
      padding: 10px;
      border: 1px solid #403f52;
    }
    .obj-cont-ftr {
      position: relative;
      width: 100%;
      background-color: transparent;
      display: flex;
      gap: 10px;
      padding: 50px 50px 0px;
      padding: 0;
      .cnt-obj-ftr {
        width: max-content;
        a {
          color: #b3b3b3;
          text-decoration: none;
          font-size: 0.8em;
          &:hover {
            color: #a4a7ea;
          }
        }
        &:nth-child(1) {
          display: flex;
          align-items: center;
          gap: 20px;
        }
        &:nth-child(4) {
          display: flex;
          justify-content: flex-end;
        }
      }
      .row-obj-ftr {
        display: flex;
        gap: 20px;
        justify-content: flex-end;
        width: 100%;
        background-color: transparent;
        &:nth-child(3) {
          display: flex;
          gap: 15px;
        }
        a {
          color: #b3b3b3;
          text-decoration: none;
          font-size: 0.8em;
          &:hover {
            color: #a4a7ea;
          }
        }
        & h4 {
          color: #d2d2d2;
          font-size: 1.2em;
        }
        & p {
          color: #d2d2d2;
          font-size: 0.6em;
        }
        .logo-tm,
        .logo-tm::nth-child(1) {
          position: relative;
          width: 100px;
          height: 30px;
          background-size: contain;
          &:after {
            content: "™";
            position: absolute;
            right: -5px;
            top: 0px;
            color: grey;
            font-size: 0.8em;
          }
          &::nth-child(1) {
            width: 150px;
            height: 50px;
          }
        }
      }
    }
  }
  .obj-cont-tm {
    display: flex;
    position: relative;
    width: max-content;
    padding: 0px;
    color: white;
    justify-content: center;
    align-items: center;
    margin: 0 auto;
    p.tm {
      display: inline-block;
      font-size: 1em;
      letter-spacing: 1px;
    }
    .logo-tm,
    .logo-tm:nth-child(1) {
      position: relative;
      width: 100px;
      height: 30px;
      background: url("../../../public/img/boolbnb-logo.svg") no-repeat center/contain;
      background-size: contain;
    }
    .logo-tm:nth-child(1) {
      width: 150px;
      height: 50px;
    }
    .logo-tm:after {
      content: "™";
      position: absolute;
      right: -5px;
      top: 0px;
      color: grey;
      font-size: 0.8em;
    }
  }
}

@media screen and (max-width: 1200px) {
  .container {
    .box-card {
      display: flex;
      width: calc(100% / 3 - 25px);
    }
  }
}
@media screen and (max-width: 800px) {
  .container {
    .box-card {
      display: flex;
      width: calc(100% / 2 - 25px);
    }
  }
}
@media screen and (max-width: 650px) {
  .container {
    .box-card {
      display: flex;
      width: 100%;
      max-width: 300px;
    }
  }
  header {
    .cnt-hdr-items {
      .cnt-nav {
        display: none;
      }
    }
    .cnt-logo {
      width: 100%;
      height: 100%;
      img,
      a {
        width: 150px;
        height: 100%;
      }
    }
  }
}

</style>
