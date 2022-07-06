<template>
  <div>
    <HeaderComponent @search="userSearched" />
    <FilterComponent />
    <MainComponent :apartments="correctApartments" />
    <FooterComponent />
  </div>
</template>


<script>
import HeaderComponent from "../components/HeaderComponent.vue";
import MainComponent from "../components/MainComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";
import FilterComponent from "../components/FilterComponent.vue";
import axios from "axios";

export default {
  
  name: "SearchPage",
  components: {
    HeaderComponent,
    MainComponent,
    FooterComponent,
    FilterComponent,
  },
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

    console.log('correct apartments', this.correctApartments)
    //prendo tutti gli appartamenti dal database
    axios.get("http://127.0.0.1:8000/api/apartments").then((results) => {
      this.allApartaments = results.data.apartments;
      // console.log(this.allApartaments);
      this.allServices = results.data.services;
      // console.log(this.allServices);
    });

    //prendo lat e long dal indirizzo
    console.log(this.input);
    axios.get(
      "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
      { params: { query: this.input } }
    ).then((risp) => {
      console.log(risp);
      const position = risp.data.results[0].position;
      this.lat = position.lat;
      this.lng = position.lon;
      // console.log("lat:" + this.lat + " lng:" + this.lng);
      this.searchApartments();
    });
  },
  methods: {

    userSearched(userInput) {
      console.log('$emit',userInput);
      return userInput
    },

    takeLatLng() {
      //prendo lat e long dal indirizzo
      console.log(this.input);
      axios.get(
        "https://api.tomtom.com/search/2/geocode/.json?storeResult=false&limit=1&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK",
        { params: { query: this.input } }
      ).then((risp) => {
        const position = risp.data.results[0].position;
        this.lat = position.lat;
        this.lng = position.lon;
        // console.log("lat:" + this.lat + " lng:" + this.lng);
        this.searchApartments();
      });
    },
    searchApartments() {
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
    },
  },
};
</script>

<style  lang="scss">
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
</style>
