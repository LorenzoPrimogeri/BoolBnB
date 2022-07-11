<template>
  <div>
    <!--HEADER-->

    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
        <div class="cnt-hdr-items">
          <!-- LOGO -->
          <div class="col-2 col-xs-12">
            <div class="cnt-logo">
              <router-link to="/">
                <img class="logo-desk" src="../../img/pitto-logotype.svg"
                  alt="logo-BoolBnb" />
                <img class="logo-mob" src="../../img/pitto.svg"
                  alt="logo-BoolBnb" />
              </router-link>
            </div>
          </div>
          <!-- LOGO -->

          <!-- SEARCH -->
          <div class="cnt-nav col-8 h-100">
            <div class="cnt-search">
              <div class="search">
                <div class="cnt-lens"></div>
                <div class="contStringSrc">
                  <input id="userInput" class="accountInput" type="text"
                    placeholder="Cerca appartamento" v-model="input"
                    @input="onInputChanged" />
                </div>
                <router-link :to="{
                  name: 'search',
                  params: { input: input },
                }">
                  <div class="cnt-fine"></div>
                </router-link>
              </div>
            </div>
          </div>
          <!-- SEARCH -->

          <!-- LOGIN-REGISTER -->
          <div class="col-2 d-flex jc-c ai-c">
            <div v-if="user_id">
              <span>{{ username }}</span>
            </div>
            <div v-else class="main-usr-set"
              v-show="$route.name === 'home' ? true : false">
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
            <div class="col-2 d-flex jc-c ai-c">
              <div id="filter" class="cnt-btn-filter"
                v-show="$route.name === 'search' ? true : false">
                <div class="btn-filter"></div>
                <span>Filtri</span>
              </div>
            </div>
            <!-- FILTER-BTN -->
          </div>
        </div>
      </div>
      <div class="container container-src wmax-100 h-100 pd-20-lr bg-white">
        <div class="cnt-hdr-src">
          <!--search-->
          <div class="search">
            <div class="cnt-lens"></div>
            <div class="contStringSrc">
              <input id="userInput" class="accountInput" type="text"
                placeholder="Cerca appartamento" v-model="input"
                @input="onInputChanged" />
            </div>
            <router-link :to="{
              name: 'search',
              params: { input: input },
            }">
              <div class="cnt-fine"></div>
            </router-link>
          </div>
          <!--search-->
        </div>
      </div>
      <div class="cnt-result-adress" v-if="!isClicked">
        <div class="cnt-items" v-for="(indirizzo, i) in indirizzi"
          :key="i + indirizzo.address">
          <a href="#" @click="take(indirizzo.address.freeformAddress)">
            {{ indirizzo.address["freeformAddress"] }}
          </a>
        </div>
      </div>
    </header>

    <!--HEADER-->

    <!--MAIN-->
    <main>
      <!-- <div class="container"> -->
      <!-- MAIN-CAROUSEL-LAYOUT -->
      <div class="main-carousel-layout">
        <!-- CAROUSEL -->
        <div class="cnt-carousel">
          <div class="title">
            <h1>Appartamenti in evidenza</h1>
          </div>
          <div class="container w-100 h-100 d-flex jc-c ai-c">
            <carousel class="w-100">
              <slide v-for="apartment in allApartaments" :key="apartment.id">
                <div class="box-card" @click="gotoDetails(apartment.id)">
                  <!-- <div class="row"> -->
                  <router-link :to="'/home/' + apartment.id">
                    <div class="cnt-img">
                      <a href="#">
                        <img :src="'/storage/' + apartment.img" />
                      </a>
                    </div>
                  </router-link>
                  <!-- </div> -->
                  <div class="cnt-txt cnt-h">
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
        </div>
        <!-- CAROUSEL -->

        <!-- LAYOUT-SECTIONS -->
        <div class="cnt-layout">
          <section class="cnt-section uno">
            <div class="cnt-section-layout first">
              <div class="cnt-lft fadeLeft">
                <h2>
                  Boolbnb ti aiuta a trovare l'appartamento per le tue vacanze
                  da sogno
                </h2>
                <p>
                  Boolbnb ha una delle più grandi raccolte d'Italia di
                  appartamenti di livello medio alto che ogni città d’italia ha
                  da offrire.<br />
                  Con una ricerca intuitiva e semplificata, garantiamo
                  un'esperienza utente il più completa e soddisfacente
                  possibile.
                </p>
              </div>
              <div class="cnt-rgt fadeRight">
                <img
                  src="../../img/illustrations/undraw_travel_booking_re_6umu.svg"
                  loading="lazy" alt="Coder Boy" />
              </div>
            </div>
          </section>
          <section class="cnt-section due">
            <div class="cnt-section-layout second">
              <div class="cnt-lft fadeLeft">
                <img src="../../img/illustrations/Current-Location.svg"
                  loading="lazy" alt="Coder Girl" />
              </div>
              <div class="cnt-rgt fadeRight">
                <h2>Le migliori proposte di appartamenti intorno a te</h2>
                <p>
                  Ti proponiamo i migliori alloggi nella località di tuo
                  interesse focalizzando la ricerca sulle strutture ricettive
                  maggiormente richieste tra cui:<br />
                  <strong>B&b, Case Vacanze, BeautyFarm e Agriturismo</strong>
                </p>
              </div>
            </div>
          </section>
          <section class="cnt-section tre">
            <div class="cnt-section-layout third">
              <div class="cnt-lft fadeLeft">
                <h2>Possibilità di scelta tra servizi aggiuntivi</h2>
                <p>
                  <strong>Boolbnb</strong> propone anche dei servizi aggiuntivi
                  per rendere la tua esperienza di viaggio il più
                  <strong>completa</strong> possibile, senza doverti preoccupare
                  di nulla e godereti la tua vacanza da semplice turista a
                  ospite nella località da te scelta.
                </p>
              </div>
              <div class="cnt-rgt fadeRight">
                <img
                  src="../../img/illustrations/Family-walking-ocean-beach.svg"
                  loading="lazy" alt="LoFi Mood" />
              </div>
            </div>
          </section>
        </div>
        <!-- LAYOUT-SECTIONS -->
      </div>
      <!-- MAIN-CAROUSEL-LAYOUT -->
      <!-- </div> -->
    </main>
    <!-- MAIN -->

    <!-- FOOTER -->
    <footer>
      <div class="cnt-main-rows-ftr">
        <div class="row-ftr">
          <div class="cnt-info weare">
            <router-link to="weare"> Chi Siamo </router-link>
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
    <!-- FOOTER -->

    <!--MENU-SLIDE-->
    <div class="subMenu closeMenu" id="subMenuSlide" style="
        filter: progid:DXImageTransform.Microsoft.Shadow(color='#dedede', Direction=135, Strength=10);
        -webkit-overflow-scrolling: touch;
      ">
      <div class="contSubMenuSlide">
        <div class="cnt-ul">
          <ul>
            <li>
              <div class="ico aprt"></div>
              <a href="/admin/apartments">Dashboard</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!--MENU-SLIDE-->

    <div class="scrollToTop"></div>
  </div>
</template>


<script>
import axios from "axios";
import { Carousel, Slide } from "vue-carousel";
export default {
  name: "HomeComponent",
  data() {
    return {
      input: "",
      searchedAdress: "",
      username: "",
      //  lat: 0, //Riferito all'indirizzo inserito dal utente
      //  lng: 0, //Riferito all'indirizzo inserito dal utente
      indirizzi: [], //indirizzi che stampo per l'auto complete
      allApartaments: [], //tutti gli appartamenti visible
      correctApartments: [], //appartamenti che soddisfano la ricerca
      isClicked: false,
      user_id: this.$userId,
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
    Slide,
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
    function imgFadeIn(el) {
      // calcolo l'altezza della finestra
      var wh = $(window).height();
      var x = window.matchMedia("(max-width: 800px)");
      // ciclo tutte le immagini identificate mediante il selettore
      // passato in argomento alla funzione imgFadeIn()
      $(el).each(function () {
        // calcolo la posizione, lungo l'asse verticale, dell'immagine
        var thisPos = $(this).offset().top;
        // calcolo la posizione attuale dello scroll
        var topOfWindow = $(window).scrollTop();

        // faccio una serie di calcoli per capire quando l'utente si avvicina all'immagine
        if (topOfWindow + wh - 50 > thisPos) {
          // appena l'immagine entra nello schermo applico la classe 'fadein'
          // (...e tutto quello che succederà è definito mediante CSS)
          $(this).addClass("fadein-left");
          $(this).addClass("fadein-right");
        }
        if (x.matches && topOfWindow + wh - 1000 > thisPos) {
          $(this).addClass("fadein-left");
          $(this).addClass("fadein-right");
        }
      });
    }
    /*
Lancio la funzione al verificarsi di alcuni eventi (scrolling e resize)
legati alla finestra del browser
*/
    $(window).on("scroll resize", function () {
      // applico l'effetto alle sole immagini con classe 'fadeimg'
      imgFadeIn(".fadeLeft, .fadeRight");
    });
    $(window).on("load resize", function () {
      // applico l'effetto alle sole immagini con classe 'fadeimg'
      imgFadeIn(".fadeLeft, .fadeRight");
    });
    $(document).ready(function () {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 250) {
          $(".scrollToTop").fadeIn();
        } else {
          $(".scrollToTop").fadeOut();
        }
      });
      $(".scrollToTop").click(function () {
        $("html, body").animate(
          {
            scrollTop: 0,
          },
          900
        );
      });
    });

    axios.get(`/api/user/${this.user_id}`).then((risp) => {
      console.log(risp);
      this.username = risp.data[0].name;
    });
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
      const url = " " / home / " + id ";
      return url;
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

<style scoped lang="scss">
main {
  .title {
    display: flex;
    justify-content: space-around;
    margin-bottom: 50px;
  }

  h2 {
    font-weight: bold;
    font-size: 2.2rem;
  }

  display: flex;
  width: 100%;
  margin: 180px auto;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}

/* MAIN-CAROUSEL-LAYOUT */
.main-carousel-layout {}

/* MAIN-CAROUSEL-LAYOUT */

/* CNT-LAYOUT */

.cnt-layout {
  width: 90%;
  max-width: 1400px;
  margin: 0 auto;
  padding: 80px 0 0;

  .cnt-section {
    position: relative;
    display: flex;
    width: 100%;
    background-size: cover;
    padding: 50px 0;

    .cnt-section-layout {
      display: flex;
      width: 100%;
      padding: 50px 0;
      align-items: center;
    }

    .cnt-cntr {
      width: 100%;
      padding: 20px;
    }

    .cnt-lft,
    .cnt-rgt {
      display: flex;
      position: relative;
      width: 50%;
      padding: 50px;
      gap: 50px;
      flex-direction: column;
      visibility: hidden;

      img {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
      }

      h2 {
        font-size: 2em;
        font-weight: 600;
      }

      p {
        line-height: 1.8em;

        strong {
          font-size: 1.2em;
          color: #7174b6;
        }
      }
    }
  }
}

.fadeLeft,
.fadeRight {
  visibility: hidden;
}

.fadeLeft.fadein-left {
  visibility: visible !important;
  -webkit-animation: animateleft 1.5s;
  animation: animateleft 1.5s;
  padding: 0 0 0 60px;
}

.fadeRight.fadein-right {
  visibility: visible !important;
  -webkit-animation: animateright 2s;
  animation: animateright 2s;
}

@-moz-keyframes animateleft {
  from {
    left: -300px;
    opacity: 0;
  }

  to {
    left: 0px;
    opacity: 1;
  }
}

@-webkit-keyframes animateleft {
  from {
    left: -300px;
    opacity: 0;
  }

  to {
    left: 0px;
    opacity: 1;
  }
}

@keyframes animateleft {
  from {
    left: -300px;
    opacity: 0;
  }

  to {
    left: 0px;
    opacity: 1;
  }
}

@-moz-keyframes animateright {
  from {
    right: -300px;
    opacity: 0;
  }

  to {
    right: 0px;
    opacity: 1;
  }
}

@-webkit-keyframes animateright {
  from {
    right: -300px;
    opacity: 0;
  }

  to {
    right: 0px;
    opacity: 1;
  }
}

@keyframes animateright {
  from {
    right: -300px;
    opacity: 0;
  }

  to {
    right: 0px;
    opacity: 1;
  }
}

/* CNT-LAYOUT */

/* MAIN-CARDS */
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

/* MAIN-CARDS */

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
      color: #a2a2a2;
      font-size: 1em;
      font-weight: 300;
    }
  }
}

/* FOOTER */

/* MENU-SLIDE-DOWN */
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

    ul {
      width: max-content;
      display: flex;
      flex-direction: column;
      gap: 25px;
      margin: 0 auto;

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
          background: url("../../img/ico/dashboard/ico-dash-lgt.svg") no-repeat center/contain;
        }

        a {
          text-decoration: none;
          color: #4b5663;
          font-size: 1.2em;
        }
      }
    }
  }
}

ul {
  width: max-content;
  display: flex;
  flex-direction: column;
  gap: 25px;
  margin: 0 auto;

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
      background: url("../../img/ico/dashboard/ico-dash-lgt.svg") no-repeat center/contain;
    }

    a {
      text-decoration: none;
      color: #8da1b3;
      font-size: 1.2em;
    }
  }
}

/* MENU-SLIDE-DOWN */
.scrollToTop {
  position: fixed;
  width: 50px;
  height: 50px;
  display: none;
  bottom: 200px;
  right: 60px;
  border-radius: 50%;
  cursor: pointer;
  background: url(../../img/arrowUp.svg) no-repeat center;
  background-size: contain;
  background-color: white;
  -webkit-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
}

@media screen and (max-width: 1024px) {
  .main-usr-set {
    display: none;
  }

  .cnt-layout {
    padding: 80px 0 0;

    .cnt-section {
      .cnt-section-layout {
        flex-direction: column;
        padding: 0;
      }

      .second {
        flex-direction: column-reverse;
      }

      .cnt-lft,
      .cnt-rgt {
        width: 100%;
      }
    }
  }
}

@media screen and (max-width: 840px) {
  .container {
    .box-card {
      width: 340px;
      max-width: 340px;
    }
  }

  footer {
    .cnt-main-rows-ftr {
      .weare {}

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
}

@media screen and (max-width: 480px) {
  .container {
    .box-card {
      display: flex;
      width: 150px;
      max-width: 150px;
      height: 430px;

      .cnt-img {
        width: 100%;
        height: 200px;

        img {
          height: 85%;
          width: 100%;
          border-radius: 20px;
        }
      }
    }
  }

  main {
    h1 {
      padding: 0 20px;
    }

    h2 {
      padding: 0;
    }

    .cnt-layout {
      padding: 0;
    }
  }

  .cnt-layout {
    .cnt-section {
      margin-bottom: 50px;
      padding: 0;

      &:nth-child(1) {
        padding: 100px 0 0;
      }

      .cnt-section-layout {
        flex-direction: column;
        padding: 0;
      }

      .second {
        flex-direction: column-reverse;
      }

      .cnt-lft,
      .cnt-rgt {
        padding: 30px 0;

        h2 {
          font-size: 1.5em;
        }
      }
    }
  }

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

  .scrollToTop {
    right: 20px;
    bottom: 50px;
  }
}
</style>
