<template>
  <div class="main">
    <div class="container flex">


      <div class="cnt-row col-12 text-box">
        <h2>{{ apartment.title }}</h2>
        <h5>{{ apartment.address }}</h5>
      </div>


      <div class="cnt-row col-12 img-box">
        <div class="cont-img">
          <img class="img-fluid" :src="`/storage/${apartment.img}`"
            :alt="apartment.title" />
        </div>
      </div>

      <div class="description-text cnt-row col-12">
        <h2>{{ apartment.title }}</h2>
        <h5 class="mt-3">Descrizione:</h5>
        <p>{{ apartment.description }}</p>
      </div>
      <!-- map -->
      <div class="services-box cnt-row col-12">
        <div class="col-4">
          <div id="map"></div>
        </div>
        <div class="services col-3">
          <div class="d-flex">
            <h6>Stanze:</h6>
            <p class="">{{ apartment.room }}</p>
          </div>

          <div class="d-flex">
            <h6>Bagni:</h6>
            <p>{{ apartment.bathroom }}</p>
          </div>

          <div class="d-flex">
            <h6>Letti:</h6>
            <p>{{ apartment.bed }}</p>
          </div>

          <div class="d-flex">
            <h6>Metri Quadri:</h6>
            <p>{{ apartment.mq }}mq</p>
          </div>

          <div class="d-flex">
            <h6>Prezzo:</h6>
            <p>{{ apartment.price }}€ /notte</p>
          </div>
        </div>
      </div>
    </div>

      <div class="col-12 contacts">
        <a id="contacts" class="btn-cta">Contatta</a>
      </div>

      <div id="bgExpand" class="bgExpandFilter">
      </div>
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
                <input type="email" class="form-control" v-model="email"
                  id="email" placeholder="name@example.com" required>
              </div>
            </div>
            <div class="row-filter d-flex jc-c">
              <div class="cnt-filter ">
                  <label for="object" class="form-label">Oggetto</label>
                  <input type="text" class="form-control" id="object" v-model="object"
                  placeholder="Oggetto dell'email" required>
              </div>
            </div>
             <div class="row-filter d-flex jc-c">
              <div class="cnt-filter">
                    <label for="body" class="form-label">Messaggio</label>
                    <textarea class="form-control" id="body" rows="3" v-model="body"
                    required></textarea>
              </div>
            </div>
            <div class="d-flex jc-c ">
              <button class="btn-cta " type="submit" :disabled="sending">Invia mail</button>
            </div>
          </form>
        </div>
        </div>
      </div>



    <!-- /map -->

    <!-- <div class="cnt-row col-12">
          <h3>Servizi:</h3>
          @foreach (apartment.services as service)
          <p>{{ service->name }}</p>
          @endforeach
        </div> -->
    <!-- <div v-else>
        <LoaderComponent />
    </div> -->
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
      apartment: [],
      lat: 0,
      lng: 0,
      email: '',
      object: '',
      body: '',
      apartment_id: null,
      sending: false,
      success: false,
    };
  },
  mounted() {
    const id = this.$route.params.id;
    // console.log(id)
    const url = "/api/apartments/" + id;
    window.axios.get(url).then((result) => {
      this.apartment = result.data.results;
      console.log(this.apartment);
      this.lat = this.apartment.lat; //prendo lat
      this.lng = this.apartment.lng; //prendo lng
      this.title = this.apartment.title //prendo title
      this.address = this.apartment.address //prendo address
      this.apartment_id = this.apartment.id;//prendo id

      console.log(this.lat);
      console.log(this.lng);
      this.createMap(); //funzione per generare la mappa
    });


    //axios post per salvare le visualizzazioni
    window.axios.post(`/api/views/`, {
        apartment_id: id,
    }).then(resp => console.log(resp)).catch(err => console.log(err));



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
        .setHTML(`<span><strong>${title}</strong></span><br><span>${address}</span>`)
        .addTo(map);
    },
    sendForm() {
      this.sending = true;
      this.success = false;
      const id = this.$route.params.id;
      console.log(id)

      window.axios.post(`/api/messages/`, {
        email: this.email,
        object: this.object,
        body: this.body,
        apartment_id: this.apartment_id

      }).then(({ data, status }) => {
        console.log(data);
        this.email = "";
        this.object = "";
        this.body = "";
        this.sending = false;

        if (status === 200) {
          this.success = data.success;

          if (!data.success) {
            this.errors = data.errors;
            console.log(this.errors)
          }
        }
        // this.message = '';
      }).catch(error => {
        console.log(error);
      })
    }

  },
};
</script>

<style lang="scss" scoped>
.main {
  .flex {
    display: flex;
    flex-direction: column;
  }

  .text-box {
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .img-box {
    img {
      width: 100%;
      height: 600px;
      border-radius: 1%;
    }
  }

  .description-text {
    margin-top: 4%;

  }

  .services-box {
    display: flex;

    p {
      margin-left: 3%;
    }

    .services {
      margin-top: 4%;
    }
  }

  .contacts {
    margin-top: 2%;
    margin-bottom: 5%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}


.btn-cta{
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
  width: 300px;
  height: 300px;
  margin-top: 50px;
}

@media only screen and (max-width: 360px) {
  #map {
    width: 225px;
    height: 225px;
  }
}
</style>

