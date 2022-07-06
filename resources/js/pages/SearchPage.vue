<template>
  <div>
    <!--Header-->

    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
        <div class="cnt-hdr-items">
          <div class="col-2 col-xs-12">
            <!--logo-->

            <div class="cnt-logo">
              <a href="">
                <img
                  src="../../../public/img/boolbnb-logo.svg"
                  alt="logo-BoolBnb"
                />
              </a>
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

              <button class="cnt-fine" @click="takeLatLng()"></button>
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
    <!--Filter-->

    <div id="bgExpand" class="bgExpandFilter"></div>
    <div id="cntExpand" class="cntExpandFilter">
      <div class="main-filter">
        <div class="row-filter-ttl jc-e">
          <div class="cnt-ttl">
            <h2>Filtri</h2>
          </div>
          <div class="cnt-btn-close">
            <div class="btn-closed"></div>
          </div>
        </div>
        <div class="cnt-row">
          <div class="row-filter">
            <div class="cnt-filter">
              <h3>Numero Stanze</h3>
              <div class="cnt-filter-select">
                <input type="number" min="1" max="30" v-model="room" />
              </div>
            </div>
          </div>
          <div class="row-filter">
            <div class="cnt-filter">
              <h3>Numero posti Letto</h3>
              <div class="cnt-filter-select">
                <input type="number" min="1" max="30" v-model="bed" />
              </div>
            </div>
          </div>
          <!-- <div class="row-filter">
            <div class="cnt-filter">
              <h3>Servizi</h3>
              <div class="cnt-filter-select d-flex gp-20">
                <div class="main-check">
                  <div class="cnt-checkbox">
                    <input
                      class="input-check"
                      type="checkbox"
                      value=""
                      name="services[]"
                    />
                    <span class="checkmark"></span>
                  </div>
                  <div class="form-check-label">Wi-Fi</div>
                </div>
              </div>
            </div>
          </div> -->
          <div class="row-filter">
            <div class="cnt-filter">
              <h3>Distanza</h3>
              <div class="cnt-filter-select">
                <input type="number" v-model="distanceKm" />
              </div>
            </div>
          </div>
          <div class="cnt-filter">
            <button class="cnt-fine" @click="takeLatLng()"></button>
          </div>
        </div>
      </div>
    </div>

    <!--Filter-->
    <!--Main-->

    <main>
      <div class="container w-100">
        <div class="cnt-cards pd-20">
          <div
            v-for="apartment in correctApartments"
            :key="apartment.id"
            class="box-card"
          >
            <!-- <div class="cnt-img"></div> -->
            <div class="cnt-txt cnt-h col-12">
              <h2>{{ apartment.title }}</h2>
              <h3>{{ apartment.room }}</h3>
              <h3>{{ apartment.bed }}</h3>
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
  name: "SearchPage",
  data() {
    return {
      input: "",
      userInput: "",
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
    delete axios.defaults.headers.common["X-Requested-With"];
    // console.log(this.$route.params.input);
    this.input = this.$route.params.input;
    $("#filter").click(function () {
      $("#bgExpand").toggleClass("enlargeFilter");
      $("#cntExpand").toggleClass("enlargeFilter");
      $("body").toggleClass("enlargeFilter");
    });

    $(".cnt-btn-close").click(function () {
      $("#cntExpand").toggleClass("enlargeFilter");
      $("#bgExpand").toggleClass("enlargeFilter");
      $("body").toggleClass("enlargeFilter");
    });
    //prendo lat e long dal indirizzo
    axios
      .get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      )
      .then((risp) => {
        const position = risp.data.results[0].position;
        this.lat = position.lat;
        this.lng = position.lon;
        // console.log("lat:" + this.lat + " lng:" + this.lng);
      });
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data.apartments;
      console.log(this.allApartaments);
      this.searchApartments();
    });
  },
  methods: {
    take(indirizzo) {
      // const searchedAdress = indirizzo;
      this.input = indirizzo;
      //   return searchedAdress;
      // console.log('risultato nuovo input', this.input);
    },
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
    takeLatLng() {
      //prendo lat e long dal indirizzo
      console.log(this.input);
      axios
        .get(
          "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
          { params: { query: this.input } }
        )
        .then((risp) => {
          const position = risp.data.results[0].position;
          this.lat = position.lat;
          this.lng = position.lon;
          // console.log("lat:" + this.lat + " lng:" + this.lng);
          this.searchApartments();
        });
    },
    searchApartments() {
      console.log("ciao sono qui");
      // console.log(this.services);
      //reset degli appartamenti corretti
      this.correctApartments = [];
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
          // console.log("la distanza è: " + distance.toFixed(3) + " km :)");
          // console.log(apartment.room);
          // console.log(apartment.bed);
          // console.log("Fatto");
          this.correctApartments.push(apartment);
        }
      }
      console.log(this.correctApartments);
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

<style  lang="scss">
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
    background-color: violet;
    left: 50px;
    justify-content: center;
    align-items: center;
    font-weight: 600;
    font-size: 2em;
  }
  .cnt-cards {
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
  }
  .box-card {
    background-color: violet;
    width: 300px;
    height: 200px;
    flex-direction: column;
    .cnt-img {
      height: 200px;
      width: 100%;
      background-color: blue;
    }
    // img {
    //     width: 100%;
    //     border-radius: 20px;
    // }
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

// style filter

.cnt-btn-filter {
  height: 40px;
  border-radius: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 10px;
  border: 1px solid lightgray;
  -webkit-box-shadow: 0px 0px 20px 0px rgba(121, 121, 121, 0.46);
  -moz-box-shadow: 0px 0px 20px 0px rgba(121, 121, 121, 0.46);
  box-shadow: 0px 0px 20px 0px rgba(121, 121, 121, 0.46);
  cursor: pointer;

  .btn-filter {
    width: 20px;
    height: 20px;
    background: url("../../../public/img/filter.svg") no-repeat center/contain;
  }
}

body.enlargeFilter {
  overflow: hidden;
}

.bgExpandFilter {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  background-color: #010b2600;
  z-index: 3;
  transition: all 0.5s ease-in-out;
  visibility: hidden;
}

#bgExpand.enlargeFilter {
  visibility: visible;
}

#cntExpand.enlargeFilter {
  top: 0;
  opacity: 1;
  height: 100%;
  width: 100%;
  background-color: rgba(23, 23, 23, 0.9);
  margin-top: auto;
  left: 0;
  margin-left: auto;
}

.main-check {
  display: flex;
  align-items: center;
  gap: 10px;

  .cnt-checkbox {
    position: relative;
    height: 25px;
    width: 25px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

    .cnt-checkbox:hover input ~ .checkmark {
      background-color: #ccc;
    }

    .cnt-checkbox input:checked ~ .checkmark {
      background-color: #2196f3;
    }

    .cnt-checkbox input:checked ~ .checkmark:after {
      display: block;
    }

    input[type="checkbox"].input-check {
      position: absolute;
      width: 25px;
      height: 25px;
      left: 0;
      z-index: 2;
      accent-color: #7174b6;
    }

    .checkmark {
      position: absolute;
      top: 0;
      left: 0;
      height: 25px;
      width: 25px;
      background-color: #eee;

      &:after {
        content: "";
        position: absolute;
        display: none;
      }

      &:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
      }
    }
  }
}

.cnt-btn-close {
  position: relative;
  width: 40px;
  height: 40px;
  box-sizing: border-box;
  color: black;
  text-decoration: none;
  -webkit-transition: 0.5s ease-in-out;
  -moz-transition: 0.5s ease-in-out;
  -o-transition: 0.5s ease-in-out;
  transition: 0.5s ease-in-out;
  border-radius: 50%;
  background-color: #010b26;
  background-color: transparent;
  cursor: pointer;
  .btn-closed {
    &::after {
      content: "";
      display: block;
      height: 30px;
      width: 3px;
      background: #90a9e8;
      position: absolute;
      left: 20px;
      top: 5px;
      -webkit-transform: rotate(-45deg);
      -moz-transform: rotate(-45deg);
      -o-transform: rotate(-45deg);
      transform: rotate(-45deg);
      border-radius: 5px;
    }

    &::before {
      content: "";
      display: block;
      height: 30px;
      width: 3px;
      background: #90a9e8;
      position: absolute;
      left: 20px;
      top: 5px;
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      -o-transform: rotate(45deg);
      transform: rotate(45deg);
      border-radius: 5px;
    }
  }
}

.cntExpandFilter {
  position: fixed;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  top: -1000px;
  margin-top: -350px;
  z-index: 200;
  opacity: 0;
  transition: all 0.5s ease-in-out;

  .main-filter {
    width: 80%;
    height: calc(100% - 100px);
    border-radius: 5px;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    transform-style: preserve-3d;
    overflow: auto;

    &::-webkit-scrollbar {
      display: none;
    }

    & {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .row-filter-ttl {
      display: flex;
      justify-content: flex-end;
      position: sticky;
      width: 100%;
      top: 0;
      padding: 10px 20px;
      background-color: #fff;
      border-bottom: 1px solid #d9d9d9;
      z-index: 3;

      .cnt-ttl {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        h2 {
          font-size: 1.5em;
        }
      }
    }

    .cnt-row {
      padding: 50px;

      .row-filter {
        position: relative;
        display: flex;
        padding: 10px;
        border-bottom: 1px solid #d9d9d9;

        .cnt-filter-select {
          display: flex;
          flex-wrap: wrap;
          margin: 20px 0;

          input[type="number"] {
            display: inline-block;
            width: max-content;
            padding: 12px 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
          }
        }
      }
    }
  }
}

@media screen and (max-width: 1050px) {
  .contExpandLogMob,
  .contExpandLogRegMob {
    width: 90%;
    // background: url("../img/index/bg-dots-blu.svg") no-repeat center;
    background-color: white;
    background-size: cover;
    left: 50%;
    margin-left: -45%;
    border-radius: 5px;
    z-index: 200;
    opacity: 0;
    transition: all 0.5s ease-in-out;
  }

  #contExpandLogInMob.enlargeLogIn,
  #contExpandRegMob.enlargeLogIn {
    opacity: 1;
    width: 100%;
    height: 100%;
  }
}
</style>
