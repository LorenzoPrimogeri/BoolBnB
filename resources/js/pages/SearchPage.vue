<template>
  <div>
    <!--HEADER-->

    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
        <!-- CNT-HEADER-ITEMS -->
        <div class="cnt-hdr-items">
          <!-- LOGO -->
          <div class="col-3">
            <div class="cnt-logo">
              <router-link to="/">
                <img
                  class="logo-desk"
                  src="../../img/pitto-logotype.svg"
                  alt="logo-BoolBnb"
                />
                <img
                  class="logo-mob"
                  src="../../img/pitto.svg"
                  alt="logo-BoolBnb"
                />
              </router-link>
            </div>
          </div>
          <!-- LOGO -->

          <!-- SEARCH -->
          <div class="cnt-nav col-6 h-100">
            <div class="cnt-search">
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
            </div>
          </div>
          <!-- SEARCH -->

          <!-- LOGIN-REGISTER -->
          <div class="col-3 d-flex jc-end ai-c">
            <div v-if="user_id">
              <span class="usr-log">{{ username }}</span>
              <div class="cnt-ul cnt-ul-mob">
                <ul>
                  <li>
                    <div class="ico aprt"></div>
                    <a href="/admin/apartments">Dashboard</a>
                  </li>
                </ul>
              </div>
            </div>
            <div
              v-else
              class="main-usr-set"
              v-show="$route.name === 'search' ? true : false"
            >
              <ul class="ul-log-reg d-none-xs">
                <li>
                  <div class="ico-log ico-login"></div>
                  <a href=" /login">Login</a>
                </li>
                <li>
                  <div class="ico-log ico-reg"></div>
                  <a href="/register">Register</a>
                </li>
              </ul>
            </div>
            <!-- LOGIN-REGISTER -->

            <!-- BTN-HAMBURGER -->
            <div id="btn-hamburger">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- BTN-HAMBURGER -->

            <!-- FILTER-BTN -->
            <!-- <div class="col-2 d-flex jc-strt ai-c"> -->
            <div
              id="filter"
              class="cnt-btn-filter"
              v-show="$route.name === 'search' ? true : false"
            >
              <div class="btn-filter"></div>
              <span>Filtri</span>
            </div>
            <!-- </div> -->
            <!-- FILTER-BTN -->
          </div>
        </div>
      </div>
      <div class="container container-src wmax-100 h-100 pd-20-lr bg-white">
        <div class="cnt-hdr-src">
          <!--SEARCH-->
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
          <!--SEARCH-->
        </div>
      </div>
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
    </header>
    <!--HEADER-->

    <!--MAIN-->
    <main>
      <div class="container wmax-100 flex-dr-col">
        <div class="cnt-notMatch" v-if="!correctApartments.length">
          <h2>Nessun risultato!</h2>
        </div>

        <div class="cnt-cards pd-20">
          <router-link
            class="box-card"
            v-for="apartment in correctApartments"
            :key="apartment.id"
            :to="'/home/' + apartment.id"
          >
            <div>
              <div class="cnt-img">
                <img :src="'/storage/' + apartment.img" alt="" />
              </div>
              <div class="cnt-txt cnt-h col-12">
                <h2>{{ apartment.title }}</h2>
                <h3>{{ apartment.address }}</h3>
              </div>
              <div class="price col-12">
                <span>{{ apartment.price }} €/notte</span>
              </div>
            </div>
          </router-link>
        </div>
      </div>
    </main>
    <!--MAIN-->

    <!--FOOTER-->
    <footer>
      <div class="cnt-main-rows-ftr">
        <div class="row-ftr">
          <div class="cnt-info weare">
            <router-link to="/weare"> Chi Siamo </router-link>
          </div>
        </div>
        <div class="row-ftr">
          <div class="obj-cont-ftr">
            <div class="col-5 cnt-obj-ftr col-md-12">
              <div class="cnt-info">
                <a href="#"> Contact us </a>
              </div>
              <div class="cnt-info">
                <a href="#"> Privacy Policy </a>
              </div>
              <div class="cnt-info">
                <a href="#">Terms & condition </a>
              </div>
            </div>
            <div class="col-7 cnt-obj-ftr col-md-12">
              <div class="row-obj-ftr">
                <div class="ico-soc fb"></div>
                <div class="ico-soc ig"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row-ftr">
          <div class="obj-cont-ftr obj-cont-tm">
            <p class="tm">©{{ new Date().getFullYear() }}</p>
            <div class="logo-tm"></div>
            <p class="tm">- All Rights Reserved</p>
          </div>
        </div>
      </div>
    </footer>
    <!--FOOTER-->

    <!--MENU-SLIDE-->
    <div
      class="subMenu closeMenu"
      id="subMenuSlide"
      style="
        filter: progid:DXImageTransform.Microsoft.Shadow(color='#dedede', Direction=135, Strength=10);
        -webkit-overflow-scrolling: touch;
      "
    >
      <div class="contSubMenuSlide">
        <div class="cnt-ul">
          <ul>
            <li>
              <div class="ico aprt"></div>
              <a href="/admin/apartments">Dashboard</a>
            </li>
          </ul>
          <div class="main-usr-set-mob">
            <ul class="ul-log-reg">
              <li>
                <div class="ico-log ico-login"></div>
                <a href=" /login">Login</a>
              </li>
              <li>
                <div class="ico-log ico-reg"></div>
                <a href="/register">Register</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--MENU-SLIDE-->

    <!--FILTER-->
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
          <div class="row-filter">
            <div class="cnt-filter">
              <h3>Servizi</h3>
              <div class="cnt-filter-select d-flex gp-20">
                <div
                  v-for="(service, index) in allServiceFilter"
                  :key="index + service"
                  class="main-check"
                >
                  <div all class="cnt-checkbox">
                    <input
                      class="input-check"
                      type="checkbox"
                      :value="service"
                      :name="service"
                      v-model="allServiceFiltered"
                    />
                    <span class="checkmark"></span>
                  </div>
                  <div class="form-check-label">{{ service }}</div>
                </div>
              </div>
            </div>
          </div>
          <div class="row-filter">
            <div class="cnt-filter">
              <h3>Distanza</h3>
              <div class="cnt-filter-select">
                <input type="number" v-model="distanceKm" />
              </div>
            </div>
          </div>
          <div class="cnt-filter d-flex jc-c">
            <button class="btn-cta" @click="takeLatLng()">Invio</button>
          </div>
        </div>
      </div>
    </div>
    <!--FILTER-->
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
      username: "",
      lat: 0, //Riferito all'indirizzo inserito dal utente
      lng: 0, //Riferito all'indirizzo inserito dal utente
      indirizzi: [], //indirizzi che stampo per l'auto complete
      allApartaments: [], //tutti gli appartamenti visible
      correctApartments: [], //appartamenti che soddisfano la ricerca
      allServices: [],
      services: [],
      allServiceFilter: [],
      allServiceFiltered: [],
      distanceKm: 20,
      room: 1,
      bed: 1,
      isClicked: false,
      user_id: this.$userId,
    };
  },
  mounted() {
    $(document).ready(function () {
      $("#btn-hamburger").click(function () {
        ShowMenu();
      });
    });
    function ShowMenu() {
      let tag = document.getElementById("subMenuSlide");
      if (tag.style.maxHeight !== "100%") {
        tag.style.maxHeight = "100%";
      } else {
        tag.style.maxHeight = "0";
      }
    }

    $("#btn-hamburger").click(function () {
      $(this).toggleClass("open");
    });

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

    $(".btn-cta").click(function () {
      $("#cntExpand").toggleClass("enlargeFilter");
      $("#bgExpand").toggleClass("enlargeFilter");
      $("body").toggleClass("enlargeFilter");
    });
    axios.get(`/api/user/${this.user_id}`).then((risp) => {
      // console.log(risp);
      this.username = risp.data[0].name;
    });
    delete axios.defaults.headers.common["X-Requested-With"];
    // console.log(this.$route.params.input);
    this.input = this.$route.params.input;
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
      //console.log(results);
      this.allApartaments = results.data.allApartments;
      //console.log(this.allApartaments);
      const array = results.data.services;
      for (let i = 0; i < array.length; i++) {
        const element = array[i]["name"];
        //console.log(element);
        this.allServiceFilter.push(element);
      }
      // console.log(this.allServiceFilter);
      this.searchApartments();
    });
  },
  methods: {
    take(indirizzo) {
      this.isClicked = true;
      // const searchedAdress = indirizzo;
      this.input = indirizzo;
      //   return searchedAdress;
      // console.log('risultato nuovo input', this.input);
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
      console.log(this.allServiceFiltered);
      // console.log(this.services);
      //reset degli appartamenti corretti
      this.correctApartments = [];
      //console.log(this.apartaments);
      for (let i = 0; i < this.allApartaments.length; i++) {
        const apartmentservices = [];
        const apartment = this.allApartaments[i];
        if (this.allServiceFiltered.length >= 1) {
          for (let j = 0; j < apartment.services.length; j++) {
            const servizio = apartment.services[j]["name"];
            apartmentservices.push(servizio);
          }
          console.log(apartment.id + "   " + apartmentservices);
          if (
            this.allServiceFiltered.every((r) => apartmentservices.includes(r))
          ) {
            const distance2 = this.distance(
              this.lat,
              this.lng,
              apartment.lat,
              apartment.lng
            );
            if (
              distance2 <= this.distanceKm &&
              apartment.room >= this.room &&
              apartment.bed >= this.bed
            ) {
              // console.log("la distanza è: " + distance.toFixed(3) + " km :)");
              // console.log(apartment.room);
              // console.log(apartment.bed);
              // console.log("Fatto");
              this.correctApartments.push(apartment);
            }
            console.log("Funziona");
          }
        } else {
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
.usr-log {
  position: absolute;
  right: 180px;
  top: 50%;
  transform: translate(0, -50%);
}
.cnt-ul-mob {
  position: absolute;
  width: max-content;
  right: 0;
  top: 50%;
  transform: translate(0, -50%);
}
ul {
  width: max-content;
  display: flex;
  flex-direction: column;
  gap: 25px;
  margin: 0 auto;
  padding: 0;

  li {
    display: flex;
    align-items: center;
    gap: 10px;

    .ico {
      width: 30px;
      height: 30px;
      background-color: violet;
    }

    .aprt {
      background: url("../../img/ico/dashboard/ico-dash-lgt.svg") no-repeat
        center/contain;
    }

    a {
      text-decoration: none;
      color: #8da1b3;
      font-size: 1.2em;
    }
  }
}
.cnt-notMatch {
  width: 100%;
  display: flex;
  justify-content: center;
  h2 {
    font-size: 3em;
    font-weight: bold;
    color: #5870f0;
    text-align: center;
  }
}

*a {
  text-decoration: none;
  color: black;

  &:hover {
    color: black;
  }
}

// style main

main {
  display: flex;
  width: 100%;
  min-height: 100vh;
  margin: 0 !important;
  padding: 180px 0 100px;
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
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
  }

  .box-card {
    display: flex;
    width: 300px;
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
      padding: 10px 0;
      h2,
      h3 {
        font-weight: 400;
      }
      h2 {
        font-size: 1em;
      }

      h3 {
        color: grey;
        font-size: 0.8em;
      }
    }

    .price {
      span {
        width: 100%;
        text-align: left;
        font-weight: 600;
      }
    }
  }
}

// style footer

/* FOOTER */
footer {
  display: grid;
  position: relative;
  bottom: 0;
  width: 100%;
  background-color: #2f2e41;
  padding: 0;

  .cnt-main-rows-ftr {
    .row-ftr {
      width: 100%;
      display: flex;
      background-color: transparent;
      padding: 20px 50px;

      &:nth-child(2) {
        padding: 10px;
        border-top: 1px solid #403f52;
      }

      &:nth-child(3) {
        padding: 10px;
        border-top: 1px solid #403f52;
      }

      .weare {
        width: 100%;
        display: flex;
        justify-content: center;
        font-size: 1.5em;

        a {
          color: #888aba;

          &:hover {
            color: #a8aaeb;
          }
        }
      }

      .obj-cont-ftr {
        position: relative;
        width: 100%;
        background-color: transparent;
        display: flex;
        gap: 10px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0;

        .cnt-obj-ftr {
          display: flex;
          align-items: center;
          gap: 10px;

          .cnt-info {
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
        margin: 0;
      }

      .logo-tm,
      .logo-tm:nth-child(1) {
        position: relative;
        width: 100px;
        height: 30px;
        background: url("../../img/pitto-logotype.svg") no-repeat center/contain;
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
}

.ico-soc {
  width: 30px;
  height: 30px;
  cursor: pointer;
}

.fb {
  background: url(../../img/fb-g.svg) no-repeat center;
  background-size: contain;
}

.ig {
  background: url(../../img/ig-g.svg) no-repeat center;
  background-size: contain;
}

.fb:hover {
  background: url(../../img/fb.svg);
}

.ig:hover {
  background: url(../../img/ig.svg);
}

ul.ul-ftr {
  position: relative;
  display: block;
  width: max-content;
  margin: 0 auto;
  gap: 30px;

  li {
    position: relative;
    display: block;
    overflow: hidden;

    &:hover a:hover {
      color: #7174b6;
    }

    a {
      text-decoration: none;
      color: #4b5663;
      font-size: 1em;
    }
  }
}

/* FOOTER */

/* FILTER */

.cnt-btn-filter {
  display: flex;
  position: absolute;
  height: 40px;
  align-items: center;
  justify-content: center;
  left: 0;
  gap: 10px;
  padding: 10px;
  border-radius: 30px;
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
  overflow: auto;
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
/* FILTER */
.btn-cta {
  position: relative;
  display: block;
  width: 150px;
  border: none;
  background-color: #7174b6;
  padding: 15px;
  margin-top: 50px;
  border-radius: 30px;
  color: white;
  cursor: pointer;
  font-size: 1.1em;
  font-weight: 600;
  transition: 0.3s ease-in-out;

  &:hover {
    box-shadow: 0px 0px 0px 0px rgb(0, 0, 0), 0px 0px 5px 4px rgb(189, 189, 189);
    transform: scale(1.1);
    background-image: -webkit-gradient(
      linear,
      left top,
      right bottom,
      from(#8b9cf2),
      to(#5870f0)
    );
    background-image: linear-gradient(180deg, #8b9cf2, #5870f0);
    background-image: linear-gradient(180deg, #8b9cf2, #5870f0);
    background-image: linear-gradient(180deg, #8b9cf2, #5870f0);
    background-image: linear-gradient(180deg, #8b9cf2, #5870f0);
    background-image: linear-gradient(180deg, #2137a6, #6e83f4);
    /* filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, startColorstr=$secondgradientcolor, endColorstr=$firstgradientcolor); */
    box-shadow: 5px 6px 15px 0 rgba(179, 179, 179, 0.5);
    box-shadow: 0px 0px 15px 0 rgba(179, 179, 179, 0.5);
    box-shadow: 0 11px 16px -3px rgba(45, 35, 66, 0.3),
      0 4px 5px 0 rgba(45, 35, 66, 0.4), inset 0 -2px 0 0 #4b58ba;
    transform: translateY(-2px);
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
        .cnt-filter {
          h3 {
            font-weight: 400;
          }
        }
        .cnt-filter-select {
          display: flex;
          flex-wrap: wrap;
          flex-direction: column;
          max-height: 150px;
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

/* MENU-SLIDE */
.subMenu {
  position: fixed;
  width: 100%;
  height: 100%;
  top: 70px;
  max-height: 0;
  overflow: hidden;
  background: white;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  z-index: 2;

  &::-webkit-scrollbar {
    display: none;
  }

  .contSubMenuSlide {
    padding: 50px 0;
    -webkit-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 4px 0px 4px rgba(0, 0, 0, 0.2);
    &::-webkit-scrollbar {
      display: none;
    }
    .cnt-ul {
      display: flex;
      flex-direction: column;
      gap: 50px;
    }
    ul {
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 25px;
      margin: 0 auto;
      li {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        .ico {
          width: 25px;
          height: 25px;
        }

        .aprt {
          background: url("../../img/ico/dashboard/ico-dash-lgt.svg") no-repeat
            center/contain;
        }

        a {
          text-decoration: none;
          color: #4b5663;
          font-size: 1em;
        }
      }
    }
  }
}
/* MENU-SLIDE */

@media screen and (max-width: 1370px) {
  .usr-log,
  .cnt-ul-mob {
    display: none;
  }
}
@media screen and (max-width: 1200px) {
  .container {
    .box-card {
      display: flex;
      width: calc(100% / 3 - 25px);
    }
  }
  .main-usr-set {
    display: none;
  }
}
@media screen and (max-width: 1050px) {
  .contExpandLogMob,
  .contExpandLogRegMob {
    width: 90%;
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

  .cntExpandFilter {
    align-items: inherit;
    .main-filter {
      width: 95%;
      height: fit-content;
      margin: 30px 0;
      .cnt-row {
        padding: 50px 10px;
        .row-filter {
          .cnt-filter-select {
            flex-direction: column;
          }
        }
      }
    }
  }
}
@media only screen and (max-width: 480px) {
  footer {
    .cnt-main-rows-ftr {
      .row-ftr {
        padding: 20px 0;

        .obj-cont-ftr {
          flex-direction: column-reverse;

          .cnt-obj-ftr {
            flex-direction: column;
            align-items: center;
            margin: 0 auto;
            padding: 10px 0;
          }

          .row-obj-ftr {
            justify-content: center;
          }
        }
      }
    }
  }
  .cntExpandFilter {
    .main-filter {
      .cnt-row {
        .row-filter {
          .cnt-filter-select {
            flex-wrap: nowrap;
            max-height: none;
          }
        }
      }
    }
  }
}
</style>
