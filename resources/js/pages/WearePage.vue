<template>
  <div>
    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
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
          <div class="col-3 d-flex jc-c ai-c">
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
              v-show="$route.name === 'single-apartment' ? true : false"
            >
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
              <div
                id="filter"
                class="cnt-btn-filter"
                v-show="$route.name === 'search' ? true : false"
              >
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
    <!-- HEADER -->

    <!-- MAIN -->
    <main>
      <div class="cnt-layout">
        <div class="cnt-h1">
          <h1>I Fantastici</h1>
          <p>del</p>
          <h2>A-TEAM 5</h2>
        </div>
        <section class="sctn-cards cnt-section">
          <div class="cnt-section-layout">
            <div class="cnt-lft-tm fadeLeft-tm">
              <h2>Lorenzo Primogeri</h2>
              <p>
                L’umiltà la fa da padrone, mai fuori posto è sempre in prima
                linea….lo descrive al meglio una celebre frase: Io sono io e voi
                non siete un ca..o. (cit. Giuseppe Gioachino Belli )
              </p>
              <h5>L'Umile</h5>
            </div>
            <div class="cnt-rgt-tm fadeRight-tm">
              <div class="cards box-card">
                <div class="picture">
                  <img class="img-fluid" src="assets/img/photo.jpg" />
                </div>
                <div class="team-content">
                  <h3 class="name">Lorenzo Primogeri</h3>
                  <h4 class="title">Jr. FullStack Developer</h4>
                  <!-- <h5>Front-Back Developer</h5> -->
                </div>
                <ul class="social">
                  <li>
                    <a href="#" class="ico ico-lnkd" aria-hidden="true"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section class="sctn-cards cnt-section">
          <div class="cnt-section-layout">
            <div class="cnt-lft-tm fadeLeft-tm">
              <h2>Antonio Ruggiero</h2>
              <p>
                Nessun bug può sfuggirgli, grazie al suo potere di ricerca ogni
                soluzione è sempre a portata di mano.
              </p>
              <h5>Il Ricercatore</h5>
            </div>
            <div class="cnt-rgt-tm fadeRight-tm">
              <div class="cards box-card">
                <div class="picture">
                  <img class="img-fluid" src="assets/img/photo.jpg" />
                </div>
                <div class="team-content">
                  <h3 class="name">Antonio Ruggiero</h3>
                  <h4 class="title">Jr. FullStack Developer</h4>
                  <!-- <h5>Front-Back Developer</h5> -->
                </div>
                <ul class="social">
                  <li>
                    <a href="#" class="ico ico-lnkd" aria-hidden="true"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section class="sctn-cards cnt-section">
          <div class="cnt-section-layout">
            <div class="cnt-lft-tm fadeLeft-tm">
              <h2>Francesco Moles</h2>
              <p>
                Lavora nell’ombra, pensi non ci sia, invece è sempre lì al tuo
                fianco, pronto a risolvere ogni problema…
              </p>
              <h5>Il Cavaliere Oscuro</h5>
            </div>
            <div class="cnt-rgt-tm fadeRight-tm">
              <div class="cards box-card">
                <div class="picture">
                  <img class="img-fluid" src="assets/img/photo.jpg" />
                </div>
                <div class="team-content">
                  <h3 class="name">Francesco Moles</h3>
                  <h4 class="title">Jr. FullStack Developer</h4>
                  <!-- <h5>Front-Back Developer</h5> -->
                </div>
                <ul class="social">
                  <li>
                    <a href="#" class="ico ico-lnkd" aria-hidden="true"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section class="sctn-cards cnt-section">
          <div class="cnt-section-layout">
            <div class="cnt-lft-tm fadeLeft-tm">
              <h2>Michele Camera</h2>
              <p>
                Un entità suprema di cui ignoto è il verbo…non servono tante
                parole, lui ti legge nel pensiero e in tempi di crisi energetica
                è una grande qualità.
              </p>
              <h5>X Files</h5>
            </div>
            <div class="cnt-rgt-tm fadeRight-tm">
              <div class="cards box-card">
                <div class="picture">
                  <img class="img-fluid" src="assets/img/photo.jpg" />
                </div>
                <div class="team-content">
                  <h3 class="name">Michele Camera</h3>
                  <h4 class="title">Jr. FullStack Developer</h4>
                  <!-- <h5>Front-Back Developer</h5> -->
                </div>
                <ul class="social">
                  <li>
                    <a href="#" class="ico ico-lnkd" aria-hidden="true"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <section class="sctn-cards cnt-section">
          <div class="cnt-section-layout">
            <div class="cnt-lft-tm fadeLeft-tm">
              <h2>Marco Cataldi</h2>
              <p>
                Quando tutto sembra non andare o c'è bisongo di tenere alto il
                morale eccolo che ti ricarica.
              </p>
              <h5>Supradyn</h5>
            </div>
            <div class="cnt-rgt-tm fadeRight-tm">
              <div class="cards box-card">
                <div class="picture">
                  <img class="img-fluid" src="assets/img/photo.jpg" />
                </div>
                <div class="team-content">
                  <h3 class="name">Marco Cataldi</h3>
                  <h4 class="title">Jr. FullStack Developer</h4>
                  <!-- <h5>Front-Back Developer</h5> -->
                </div>
                <ul class="social">
                  <li>
                    <a href="#" class="ico ico-lnkd" aria-hidden="true"></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
      </div>
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
        </div>
      </div>
    </div>
    <!--MENU-SLIDE-->

    <div class="scrollToTop"></div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "WearePage",
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
      user_id: this.$userId,
      username: "",
      //  allServices: [],
      //  services: [],
      //  distanceKm: 20,
      //  room: 1,
      //  inputUser: ' ',
      //bed: 1,
    };
  },
  mounted() {
    let cards = $(".sctn-cards");
    for (var i = 0; i < cards.length; i++) {
      var target = Math.floor(Math.random() * cards.length - 1) + 1;
      var target2 = Math.floor(Math.random() * cards.length - 1) + 1;
      cards.eq(target).before(cards.eq(target2));
    }

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
    function imgFadeInTm(ele) {
      // calcolo l'altezza della finestra
      var wh = $(window).height();
      var x = window.matchMedia("(max-width: 800px)");
      // ciclo tutte le immagini identificate mediante il selettore
      // passato in argomento alla funzione imgFadeIn()
      $(ele).each(function () {
        // calcolo la posizione, lungo l'asse verticale, dell'immagine
        var thisPos = $(this).offset().top;
        // calcolo la posizione attuale dello scroll
        var topOfWindow = $(window).scrollTop();

        // faccio una serie di calcoli per capire quando l'utente si avvicina all'immagine
        if (topOfWindow + wh - 50 > thisPos) {
          // appena l'immagine entra nello schermo applico la classe 'fadein'
          // (...e tutto quello che succederà è definito mediante CSS)
          $(this).addClass("fadein-left-tm");
          $(this).addClass("fadein-right-tm");
        }
        if (x.matches && topOfWindow + wh - 1000 > thisPos) {
          $(this).addClass("fadein-left-tm");
          $(this).addClass("fadein-right-tm");
        }
      });
    }
    /*
Lancio la funzione al verificarsi di alcuni eventi (scrolling e resize)
legati alla finestra del browser
*/
    $(window).on("scroll resize", function () {
      // applico l'effetto alle sole immagini con classe 'fadeimg'
      imgFadeInTm(".fadeLeft-tm, .fadeRight-tm");
    });
    $(window).on("load resize", function () {
      // applico l'effetto alle sole immagini con classe 'fadeimg'
      imgFadeInTm(".fadeLeft-tm, .fadeRight-tm");
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
@import url("../../sass/layout-preset.css");
@import url("https://fonts.googleapis.com/css2?family=Changa+One&family=Montserrat:wght@200;400;600;900&family=Splash&display=swap");
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

ul.ul-log-reg {
  position: absolute;
  display: flex;
  width: max-content;
  gap: 20px;
  list-style-type: none;
  margin: 0 !important;

  li {
    display: flex;
    align-items: center;
    gap: 5px;

    &:hover .ico-login {
      background: url("../../img/ico/login/login.svg") no-repeat center/contain;
    }

    &:hover .ico-reg {
      background: url("../../img/ico/login/register.svg") no-repeat
        center/contain;
    }

    &:hover span {
      color: #4b5663;
      /* transition: 0.4s ease-in-out; */
    }
  }

  .ico-log {
    width: 30px;
    height: 30px;
  }

  .ico-login {
    background: url("../../img/ico/login/login-lgt.svg") no-repeat
      center/contain;
  }

  .ico-reg {
    background: url("../../img/ico/login/register-lgt.svg") no-repeat
      center/contain;
  }

  a {
    font-weight: 600;
    text-decoration: none;
    color: grey;
    font-size: 0.9em;
  }
}
main {
  min-height: 100vh;
  padding-top: 150px;

  .cnt-h1 {
    h1,
    h2,
    p {
      text-align: center;
      color: #7174b6;
      font-family: "Changa One", sans-serif;
    }
    h1 {
      font-size: 5em;
    }

    h2 {
      font-size: 3.5em;
    }

    p {
      font-size: 2em;
      font-weight: bold;
    }
  }

  .box-card {
    display: flex;
    flex-direction: column;
    position: relative;
    width: 300px;
    padding: 30px 0 80px;
    margin: 0 auto;
    background-color: #d2d9ff;
    text-align: center;
    overflow: hidden;
    border-radius: 20px;
    border: 1px solid #dfdfdf;
    -webkit-box-shadow: 0px 0px 10px 5px rgba(150, 150, 150, 0.2);
    -moz-box-shadow: 0px 0px 10px 5px rgba(150, 150, 150, 0.2);
    box-shadow: 0px 0px 10px 5px rgba(150, 150, 150, 0.2);

    .picture {
      position: relative;
      display: inline-block;
      height: 130px;
      width: 130px;
      margin: 0 auto 20px;
      z-index: 1;

      &::before {
        content: "";
        width: 100%;
        height: 0;
        border-radius: 50%;
        background-color: #9eadff;
        position: absolute;
        bottom: 135%;
        right: 0;
        left: 0;
        opacity: 0.9;
        transform: scale(3);
        transition: all 0.3s linear 0s;
      }

      img {
        width: 100%;
        height: auto;
        border-radius: 50%;
        transform: scale(1);
        transition: all 0.9s ease 0s;
      }
    }

    &:hover .picture::before {
      height: 100%;
    }

    .picture img {
      box-shadow: 0 0 0 5px #f7f5ec;
      transform: scale(0.7);
    }

    .team-content {
      display: flex;
      flex-direction: column;
      gap: 5px;

      h3,
      h5 {
        color: #3b426c;
      }

      h4 {
        color: #fff;
      }
    }

    .title {
      display: block;
      font-size: 15px;
      color: #4e5052;
      text-transform: capitalize;
    }

    .social {
      display: flex;
      padding: 10px;
      justify-content: center;
      width: 100%;
      margin: 0;
      background-color: #313131;
      position: absolute;
      bottom: -100px;
      left: 0;
      transition: all 0.5s ease 0s;

      li {
        display: inline-block;

        a {
          display: block;
          padding: 10px;
          font-size: 17px;
          color: white;
          transition: all 0.3s ease 0s;
          text-decoration: none;
        }

        .ico {
          width: 30px;
          height: 30px;
          background-color: lightgray;
          margin: 0 auto;
        }

        .ico-lnkd {
          background: url("../../img/ico/ico-lnkd.svg");
        }
      }
    }

    &:hover .social {
      bottom: 0;
    }
  }
}

.cnt-layout {
  width: 90%;
  max-width: 1400px;
  margin: 0 auto;

  .cnt-section {
    position: relative;
    display: flex;
    width: 100%;
    background-size: cover;
    padding: 50px 0;

    .cnt-section-layout {
      display: flex;
      width: 100%;
      padding: 50px;
      align-items: center;
    }

    .cnt-cntr {
      width: 100%;
      padding: 20px;
    }

    .cnt-lft-tm,
    .cnt-rgt-tm {
      display: flex;
      position: relative;
      width: 50%;
      padding: 50px;
      gap: 5px;
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

.fadeLeft-tm,
.fadeRight-tm {
  visibility: hidden;
}

.fadeLeft-tm.fadein-left-tm {
  visibility: visible !important;
  -webkit-animation: animateleft 1.5s;
  animation: animateleft 1.5s;
  padding: 0 0 0 60px;
}

.fadeRight-tm.fadein-right-tm {
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
          background: url("../../img/ico/dashboard/ico-dash-lgt.svg") no-repeat
            center/contain;
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

@media screen and (max-width: 1200px) {
  main {
    .cnt-cards {
      .box-card {
        width: calc(100% / 3 - 25px);
      }
    }
  }
}

@media screen and (max-width: 1024px) {
  .main-usr-set,
  .usr-log,
  .cnt-ul-mob {
    display: none;
  }
  .cnt-layout {
    padding: 80px 0 0;

    .cnt-section {
      padding: 0;
      .cnt-section-layout {
        flex-direction: column;
        padding: 0;
      }

      .second {
        flex-direction: column-reverse;
      }

      .cnt-lft-tm,
      .cnt-rgt-tm {
        width: 100%;
      }
    }
  }
}

@media screen and (max-width: 800px) {
  main {
    .cnt-cards {
      .box-card {
        width: calc(100% / 2 - 25px);
      }
    }
  }
}

@media screen and (max-width: 750px) {
  footer {
    .cnt-main-rows-ftr {
      .weare {
      }

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

@media screen and (max-width: 650px) {
  main {
    .cnt-h1 {
      h1,
      h2 {
        text-align: center;
        color: #7174b6;
      }

      h1 {
        font-size: 3em;
      }

      h2 {
        font-size: 2em;
      }

      margin-bottom: 50px;
    }
    .cnt-layout {
      width: 100%;
      .cnt-section-layout {
        flex-direction: column-reverse !important;
        padding: 0;
      }
    }

    .box-card {
      width: 100%;
    }
  }
  .scrollToTop {
    right: 20px;
    bottom: 50px;
  }
}
</style>
