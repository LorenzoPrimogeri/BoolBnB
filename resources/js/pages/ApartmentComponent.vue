<template>
  <main id="Main">
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
            <h5>Stanze:</h5>
            <p class="">{{ apartment.room }}</p>
          </div>

          <div class="d-flex">
            <h5>Bagni:</h5>
            <p>{{ apartment.bathroom }}</p>
          </div>

          <div class="d-flex">
            <h5>Letti:</h5>
            <p>{{ apartment.bed }}</p>
          </div>

          <div class="d-flex">
            <h5>Metri Quadri:</h5>
            <p>{{ apartment.mq }}mq</p>
          </div>

          <div class="d-flex">
            <h5>Prezzo:</h5>
            <p>{{ apartment.price }}€ /notte</p>
          </div>
        </div>
      </div>

      <div class="col-12 contacts">
        <a href="/" class="btn btn-primary">Vai alla home</a>
        <a href="/" class="btn btn-primary m-2">Contatta</a>
      </div>


      <!-- /map -->

      <!-- <div class="cnt-row col-12">
          <h3>Servizi:</h3>
          @foreach (apartment.services as service)
          <p>{{ service->name }}</p>
          @endforeach
        </div> -->

      <!-- form email -->
      <div class="">
        <form method="POST" @submit.prevent="sendForm()">
          <!-- email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" v-model="email" id="email"
              placeholder="name@example.com" required>
          </div>
          <!-- object -->
          <div class="mb-3">
            <label for="object" class="form-label">Oggetto</label>
            <input type="text" class="form-control" id="object" v-model="object"
              placeholder="Oggetto dell'email" required>
          </div>
          <!-- body -->
          <div class="mb-3">
            <label for="body" class="form-label">Messaggio</label>
            <textarea class="form-control" id="body" rows="3" v-model="body"
              required></textarea>
          </div>

          <button type="submit" :disabled="sending">Invia mail</button>

        </form>
      </div>

    </div>

    <!-- <div v-else>
        <LoaderComponent />
    </div> -->
  </main>
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
main {
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
    margin-top: 5%;
    display: flex;
    justify-content: center;
    align-items: center;
  }



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

