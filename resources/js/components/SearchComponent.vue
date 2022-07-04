<template>
  <div class="text-center">
    <p>Ricerca appartamenti:</p>
    <div class="input-group">
        <input
        type="text"
        v-model="input"
        @input="onInputChanged"
        style="width: 500px !important"
        class="form-control"
        />
        <span class="input-group-text" id="basic-addon1" @click="clearInput"><i class="bi bi-trash"></i></span>
    </div>
    <div v-if="isClicked" id="box-search">
        <div
        v-for="(indirizzo, i) in indirizzi"
        :key="i + indirizzo.address"
        >
        <div
            class="ads-label"
            type="text"
            @click="take(indirizzo.address.freeformAddress)"
        >
            {{ indirizzo.address["freeformAddress"] }}
        </div>
        </div>
    </div>
    <button @click="takeLatLng()" class="btn btn-primary mt-3">Cerca!</button>
    <!-- si potrebbe fare un range senza dover scrivere a mano i km -->

    <!-- filtri -->
        <div class="row justify-content-center mt-5">
            <p>km</p>
            <input
            type="number"
            v-model="distanceKm"
            min="20"
            max="1000"
            placeholder="km"
            class="form-control w100"
            />

            <p>stanze</p>
            <input type="number" v-model="room" min="1" max="15" placeholder="stanze" class="form-control w100" />
            <p>letti</p>
            <input type="number" v-model="bed" min="1" max="30" placeholder="letti" class="form-control w100 "/>
        </div>
    <!--  Almeno non disponibile
    <p>Servizi:</p>
    <div v-for="(service, index) in allServices" :key="index + service.id">
      <input
        type="checkbox"
        :id="service.id"
        :name="service.name"
        :value="service.name"
        v-model="services"
      />
      <label for="vehicle1">{{ service.name }}</label
      ><br />
    </div> -->
    <div v-if="correctApartments">
      <p>gli appartamenti Nel raggio di 20 km sono:</p>
      <div v-for="apartment in correctApartments" :key="apartment.id">
        <div class="container">
          <div class="row py-2">
            <div class="col-1 border-bottom">
              <h4>{{ apartment.id }}</h4>
            </div>
            <div class="col-3 border-bottom">
              <h4>{{ apartment.title }}</h4>
            </div>
            <div class="col-3 border-bottom">
              <h4>{{ apartment.description }}</h4>
            </div>
            <div class="col-3 border-bottom">
              <h2 v-for="service in apartment.services" :key="service.name">
                {{ service.name }}
              </h2>
            </div>
            <div class="col-2 border-bottom">
              <router-link
                :to="{
                  name: 'single-apartment',
                  params: { id: apartment.id },
                }"
                >Visualizza</router-link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import ApartmentComponent from "../pages/ApartmentComponent.vue";
export default {
  name: "SearchComponent",
  components: {
    ApartmentComponent,
  },
  data() {
    return {
      input: "",
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
      apartmentService: [],
      isClicked: false,
    };
  },
  mounted() {
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data.apartments;
      console.log(this.allApartaments);
      this.allServices = results.data.services;
      // console.log(this.allServices);
    });
  },
  methods: {
    axiosCall() {},
    onInputChanged() {
        this.isClicked = true;
      // console.log(this.distanceKm);
      //Call axios che restituisce gli indirizzi autocomplete
      delete axios.defaults.headers.common["X-Requested-With"];
      this.indirizzi = [];
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/.json",
        { params: {
            query: this.input,
            storeResult: false,
            limit: 5,
            view: "Unified",
            key: "GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
            language: "it-IT"
            }
        }
      ).then((risp) => {
        const risultati = risp.data.results;
        console.log(risultati);
        this.indirizzi = risultati;
      });
      return this.indirizzi;
    },
    take(indirizzo) {
      this.input = indirizzo;
      this.isClicked = false;
      this.indirizzi = [];
    },
    takeLatLng() {
      //prendo lat e long dal indirizzo
      console.log(this.services);
      console.log(this.input);
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      ).then((risp) => {
        const position = risp.data.results[0].position;
        this.lat = position.lat;
        this.lng = position.lon;
        console.log("lat:" + this.lat + " lng:" + this.lng);
        this.searchApartments();
      });
    },
    searchApartments() {
      //reset degli appartamenti corretti
      this.correctApartments = [];
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
          this.correctApartments.push(apartment);
        }
      }
    },
    distance(lat1, lon1, lat2, lon2) {
      if (lat1 == lat2 && lon1 == lon2) {
        return 0;
      } else {
        let radlat1 = (Math.PI * lat1) / 180;
        let radlat2 = (Math.PI * lat2) / 180;
        let theta = lon1 - lon2;
        let radtheta = (Math.PI * theta) / 180;
        let dist =
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
    clearInput(){
        this.input = "";
        this.isClicked = false;
    }
  },
};
</script>

<style lang="scss" scoped>
#box-search{
    width: 541px;
    position: absolute;
    background-color: white;
    border: 1px solid grey;
}


.ads-label{
    cursor: pointer;
    width: 100%;
    padding: 5px;
    &:hover{
        background-color: rgb(192, 192, 192);
    }
}

#basic-addon1{
    cursor: pointer;
    &:hover{
        color: red;
        transition: 200ms;
    }
}
.w100{
    width: 100px;
}
p{
    margin: 0;
}
</style>

