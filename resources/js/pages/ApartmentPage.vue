<template>
  <div>
    <header>
      <div class="container wmax-100 h-100 pd-20-lr">
        <div class="cnt-hdr-items">
          <!-- LOGO -->
          <div class="col-2 col-xs-12">
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
          <div class="cnt-nav col-8 h-100">
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
    <div class="main">
      <div class="container flex">
        <!-- title -->
        <div class="cnt-row col-12 text-box">
          <h2>{{ apartment.title }}</h2>
          <h5>
            <span
              ><img
                src="../../../public/img/position-svgrepo-com.svg"
                alt="position" /></span
            >{{ apartment.address }}
          </h5>
        </div>
        <!-- title-->

        <!-- img-box -->
        <div class="cnt-row col-12 img-box">
          <div class="cont-img">
            <img
              class="img-fluid"
              :src="`/storage/${apartment.img}`"
              :alt="apartment.title"
            />
          </div>
        </div>
        <!-- img-box -->

        <!-- description -->
        <div class="description-text cnt-row col-12">
          <p>{{ apartment.description }}</p>
        </div>
        <!-- description -->

        <!-- service and tecnic data -->
        <div class="services-box cnt-row col-12">
          <div class="details col-6">
            <h3 class="mb-4">Caratteristiche:</h3>
            <div class="d-flex service-icon">
              <p>
                <img
                  src="../../../public/img/room-svgrepo-com.svg"
                  alt="room"
                />{{ apartment.room }}
              </p>
            </div>

            <div class="d-flex service-icon">
              <p>
                <img
                  src="../../../public/img/bathroom-svgrepo-com.svg"
                  alt="bath"
                />{{ apartment.bathroom }}
              </p>
            </div>

            <div class="d-flex service-icon">
              <p>
                <img
                  src="../../../public/img/bed-svgrepo-com.svg"
                  alt="bed"
                />{{ apartment.bed }}
              </p>
            </div>

            <div class="d-flex service-icon">
              <p>
                <img
                  src="../../../public/img/square-layout-with-boxes-svgrepo-com.svg"
                  alt="square-meter"
                />{{ apartment.mq }}mq
              </p>
            </div>

            <div class="d-flex service-icon">
              <p>
                <img
                  src="../../../public/img/euro-svgrepo-com.svg"
                  alt="euro"
                />{{ apartment.price }}€ /notte
              </p>
            </div>
          </div>

          <div class="services col-6">
            <div class="cnt-row col-12">
              <h3 class="mb-4">Servizi:</h3>
              <div v-for="(service, j) in services" :key="j">{{ service }}</div>
            </div>
          </div>
        </div>
        <!-- service and tecnic data -->

        <!-- map -->
        <div class="main-map mt-5">
          <div class="cnt-map">
            <div id="map"></div>
          </div>
        </div>
        <!-- map -->

        <!-- contacts -->
        <div class="col-12 d-flex jc-c mb-5 mt-5">
          <a id="contacts" class="btn-cta">Contatta</a>
        </div>
        <!-- contacts -->
      </div>

      <div id="bgExpand" class="bgExpandFilter"></div>
      <div id="cntExpand" class="cntExpandFilter">
        <div class="main-filter">
          <div class="row-filter-ttl jc-e">
            <div class="cnt-ttl">
              <h2>Messaggio</h2>
            </div>
            <div class="cnt-btn-close">
              <div class="btn-closed"></div>
            </div>
          </div>
          <div class="cnt-row">
            <form method="POST" @submit.prevent="sendForm()">
              <div class="row-filter d-flex jc-c">
                <div class="cnt-filter">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    v-model="email"
                    id="email"
                    placeholder="name@example.com"
                    required
                  />
                </div>
              </div>
              <div class="row-filter d-flex jc-c">
                <div class="cnt-filter">
                  <label for="object" class="form-label">Oggetto</label>
                  <input
                    type="text"
                    class="form-control"
                    id="object"
                    v-model="object"
                    placeholder="Oggetto dell'email"
                    required
                  />
                </div>
              </div>
              <div class="row-filter d-flex jc-c">
                <div class="cnt-filter">
                  <label for="body" class="form-label">Messaggio</label>
                  <textarea
                    class="form-control"
                    id="body"
                    rows="3"
                    v-model="body"
                    required
                  ></textarea>
                </div>
              </div>
              <div
                class="cnt-row"
                v-if="success"
                style="color: blue; display: flex; justify-content: center"
              >
                Messaggio inviato!
              </div>
              <div class="d-flex jc-c">
                <button class="btn-cta" type="submit" :disabled="sending">
                  Invia mail
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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
// import LoaderComponent from '../components/LoaderComponent.vue';
export default {
  name: "ApartmentComponent",
  components: {
    // LoaderComponent,
  },
  data() {
    return {
      input: "",
      apartment: [],
      lat: 0,
      lng: 0,
      services: [],
      email: "",
      object: "",
      body: "",
      apartment_id: null,
      sending: false,
      success: false,
      user_id: this.$userId,
      isClicked: false,
      username: "",
      indirizzi: [],
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

    axios.get(`/api/user/${this.user_id}`).then((risp) => {
      console.log(risp);
      this.username = risp.data[0].name;
    });

    axios.get(`/api/user/${this.user_id}`).then((risp) => {
      console.log(risp);
      this.user_email = risp.data[0].email;
      this.email = this.user_email;
    });

    const id = this.$route.params.id;

    const url = "/api/apartments/" + id;
    window.axios.get(url).then((result) => {
      this.apartment = result.data.results;
      console.log(this.apartment);
      this.lat = this.apartment.lat; //prendo lat
      this.lng = this.apartment.lng; //prendo lng
      this.title = this.apartment.title; //prendo title
      this.address = this.apartment.address; //prendo address
      this.apartment_id = this.apartment.id; //prendo id
      for (let i = 0; i < this.apartment.services.length; i++) {
        const servizio = this.apartment.services[i]["name"];
        console.log(servizio);
        this.services.push(servizio);
        console.log(this.services);
      }
      console.log(this.lat);
      console.log(this.lng);
      this.createMap(); //funzione per generare la mappa
    });

    //axios post per salvare le visualizzazioni
    window.axios
      .post(`/api/views/`, {
        apartment_id: id,
      })
      .then((resp) => console.log(resp))
      .catch((err) => console.log(err));

    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      let result = [];
      result = results.data.apartments;
      for (let i = 0; i < result.length; i++) {
        let apartment = result[i];
        if (apartment.sponsorships.length >= 1) {
          this.allApartaments.push(apartment);
        }
      }
      console.log(this.allApartaments);
    });

    $("#contacts").click(function () {
      $("#bgExpand").toggleClass("enlargeFilter");
      $("#cntExpand").toggleClass("enlargeFilter");
      $("body").toggleClass("enlargeFilter");
    });

    $(".cnt-btn-close").click(function () {
      $("#cntExpand").toggleClass("enlargeFilter");
      $("#bgExpand").toggleClass("enlargeFilter");
      $("body").toggleClass("enlargeFilter");
    });
  },
  methods: {
    gotoDetails(id) {
      const url = " " / home / " + id ";
      return url;
    },
    onInputChanged() {
      this.isClicked = false;
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
          this.indirizzi = risultati;
        });
    },
    take(indirizzo) {
      this.input = indirizzo;
      this.isClicked = true;
    },

    createMap() {
      let center = [this.lng, this.lat];

      const map = tt.map({
        key: "GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        container: "map",
        countrySet: "IT",
        center: center,
        zoom: 15,

        style: {
          map: "basic_night",
        },
        around: center,
        renderingMode: "3d",
      });
      map.on("load", () => {
        new tt.Marker({ anchor: "center" })
          .setLngLat(center)
          .setPopup(popup)
          .addTo(map); //adding marker
      });

      let nav = new tt.NavigationControl({});
      map.addControl(nav, "top-left");
      //navigation control (top-left of map)

      let markerHeight = 18,
        markerRadius = 10,
        linearOffset = 25;
      let popupOffsets = {
        top: [0, 0],
        "top-left": [0, 0],
        "top-right": [0, 0],
        bottom: [0, -markerHeight],
        "bottom-left": [
          linearOffset,
          (markerHeight - markerRadius + linearOffset) * -1,
        ],
        "bottom-right": [
          -linearOffset,
          (markerHeight - markerRadius + linearOffset) * -1,
        ],
        left: [markerRadius, (markerHeight - markerRadius) * -1],
        right: [-markerRadius, (markerHeight - markerRadius) * -1],
      };

      let title = this.title;
      let address = this.address;

      let popup = new tt.Popup({ offset: popupOffsets, className: "my-class" })
        .setLngLat(center)
        .setHTML(
          `<span><strong>${title}</strong></span><br><span>${address}</span>`
        )
        .addTo(map);
    },
    sendForm() {
      this.sending = true;
      this.success = false;
      const id = this.$route.params.id;
      console.log(id);

      window.axios
        .post(`/api/messages/`, {
          email: this.email,
          object: this.object,
          body: this.body,
          apartment_id: this.apartment_id,
        })
        .then(({ data, status }) => {
          //    console.log(data);
          this.email = "";
          this.object = "";
          this.body = "";
          this.sending = false;

          if (status === 200) {
            this.success = data.success;

            if (!data.success) {
              this.errors = data.errors;
              console.log(this.errors);
            }
          }
          // this.message = '';
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
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

.main {
  min-height: 100vh;
  padding: 100px 0px;

  .flex {
    display: flex;
    flex-direction: column;
  }

  .text-box {
    h2 {
      font-weight: bold;
      font-size: 2.8rem;
      color: #797cba;
    }

    h5 {
      display: flex;
      margin-top: 1%;
      gap: 15px;
      align-items: center;

      img {
        width: 30px;
      }
    }

    border-bottom: 1px solid #80808070;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .img-box {
    border-bottom: 1px solid #80808070;

    img {
      width: 100%;
      height: 600px;
      border-radius: 1%;
    }
  }

  .description-text {
    border-bottom: 1px solid #80808070;
    margin-top: 4%;
  }

  .services-box {
    border-bottom: 1px solid #80808070;
    justify-content: space-between;
    display: flex;

    p {
      margin-left: 3%;
    }

    .details {
      margin-top: 4%;
      gap: 20px;

      img {
        width: 30px;
        margin-right: 25px;
        vertical-align: none;
      }
    }

    .services {
      margin-top: 4%;
      gap: 20px;

      div {
        gap: 5px;
        display: flex;
        flex-direction: column;
      }

      img {
        width: 30px;
        margin-right: 25px;
        vertical-align: none;
      }
    }
  }
}

.main-map {
  .cnt-txt {
    h2 {
    }
  }

  .cnt-map {
    width: 100%;
    height: 299px;
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

.btn-cta {
  text-align: center;
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

body.enlargeFilter {
  position: fixed;
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

#map {
  width: 100%;
  height: 100%;
  border-bottom: 1px solid #80808070;
}

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

@media only screen and (max-width: 700px) {
  .img-box {
    .cont-img {
      img {
        width: 100%;
        height: 350px;
      }
    }
  }
}
@media only screen and (max-width: 650px) {
  .main {
    padding: 160px 0 0;
  }
}
@media only screen and (max-width: 550px) {
  .img-box {
    .cont-img {
      img {
        width: 100%;
        height: 250px;
      }
    }
  }
}

@media only screen and (max-width: 360px) {
  #map {
    width: 100%;
    height: auto;

    .mapboxgl-canvas {
      width: 100% !important;
      /* height: 225px; */
      margin: 0 auto;
    }
  }
}
</style>

