<template>
  <div class="text-center">
    <p>Via dispersi in russia 143</p>
    <input type="text" v-model="input" @input="onInputChanged" />
    <!-- si potrebbe fare un range senza dover scrivere a mano i km -->
    <p>km</p>
    <input
      type="number"
      v-model="distanceKm"
      min="20"
      max="1000"
      placeholder="km"
    />

    <p>stanze</p>
    <input type="number" v-model="room" min="1" max="15" placeholder="stanze" />
    <p>letti</p>
    <input type="number" v-model="bed" min="1" max="30" placeholder="letti" />
    <!-- <p>Servizi:</p>
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
    <div
      class="row flex-dr-col"
      v-for="(indirizzo, i) in indirizzi"
      :key="i + indirizzo.address"
    >
      <button
        class="py-4"
        type="text"
        @click="take(indirizzo.address.freeformAddress)"
      >
        {{ indirizzo.address["freeformAddress"] }}
      </button>
    </div>
    <button @click="takeLatLng()">Cerca!</button>
    <div v-if="correctApartments">
      <p>gli appartamenti Nel raggio di 20 km sono:</p>
      <div v-for="apartment in correctApartments" :key="apartment.id">
        <div class="container">
          <div class="row py-2">
            <div class="col-3 border-bottom">
              <h4>{{ apartment.id }}</h4>
            </div>
            <div class="col-3 border-bottom">
              <h4>{{ apartment.title }}</h4>
            </div>
            <div class="col-3 border-bottom">
              <h4>{{ apartment.description }}</h4>
            </div>
                <div class="col-3 border-bottom">
                <router-link
                    :to="{
                    name: 'single-apartment',
                    params: { id: apartment.id },
                    }"
                    >Visualizza</router-link>
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
      sending: false,
      success: false
    };
  },
  mounted() {
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data.apartments;
      console.log(this.allApartaments);
      this.allServices = results.data.services;
      console.log(this.allServices);
    });
  },
  methods: {
    onInputChanged() {
      // console.log(this.distanceKm);
      //Call axios che restituisce gli indirizzi autocomplete
      delete axios.defaults.headers.common["X-Requested-With"];
      this.indirizzi = [];
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=5&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      ).then((risp) => {
        const risultati = risp.data.results;
        console.log(risultati);
        this.indirizzi = risultati;
      });
      return this.indirizzi;
    },
    take(indirizzo) {
      this.input = indirizzo;
    },
    takeLatLng() {
      //prendo lat e long dal indirizzo
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
      console.log(this.services);
      //reset degli appartamenti corretti
      this.correctApartments = [];
      console.log(this.correctApartments);
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
          console.log("la distanza è: " + distance.toFixed(3) + " km :)");
          console.log(apartment.room);
          console.log(apartment.bed);
          console.log("Fatto");
          this.correctApartments.push(apartment);
        } else {
        }
        console.log(this.correctApartments);
      }
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
    }
  },
};
</script>

<style>
</style>
