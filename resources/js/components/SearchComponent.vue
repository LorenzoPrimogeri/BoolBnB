<template>
  <div class="">
    <p>Via dispersi in russia 143</p>
    <input type="text" v-model="input" @input="onInputChanged" />
    <div
      class="row flex-dr-col"
      v-for="(indirizzo, index) in indirizzi"
      :key="index"
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
    <div>
      <p>gli appartamenti Nel raggio di 20 km sono:</p>
      <p v-for="apartment in correctApartaments" :key="apartment.id">
        {{ apartment.title }}
      </p>
    </div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
  name: "SearchComponent",

  data() {
    return {
      input: "",
      lat: 0,
      lng: 0,
      indirizzi: [],
      apartaments: [],
      allApartaments: [],
      correctApartaments: [],
    };
  },
  mounted() {
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data;
      console.log(this.allApartaments);
      console.log(this.apartaments);
    });
  },
  methods: {
    onInputChanged() {
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
      console.log(this.input);
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      ).then((risp) => {
        //prendo lat e long dal indirizzo
        const position = risp.data.results[0].position;
        this.lat = position.lat;
        this.lng = position.lon;
        console.log("lat:" + this.lat + " lng:" + this.lng);
        this.searchApartments(this.allApartaments);
      });
    },
    searchApartments(array) {
      //reset delle variabili
      this.apartaments = [];
      this.allApartaments = [];
      array.forEach((apartment) => {
        this.apartaments.push(apartment);
      });
      console.log(this.apartaments);
      for (let i = 0; i < this.apartaments.length; i++) {
        const apartment = this.apartaments[i];
        const distance = this.distance(
          this.lat,
          this.lng,
          apartment.lat,
          apartment.lng
        );
        console.log("la distanza è: " + distance.toFixed(3) + " km :)");
        if (distance <= 20) {
          this.correctApartaments.push(apartment);
          console.log(this.correctApartaments);
        }
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
    },
  },
};
</script>

<style>
</style>