<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        Qui stampo l'apartamento
        {{ apartment }}
      </div>
    </div>
    <div class="row">
      <div class="col6 offset-3">prova</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ApartmentComponent",
  data() {
    return {
      apartment: undefined,
      lat: 0,
      lng: 0,
    };
  },
  mounted() {
    const id = this.$route.params.id;
    const url = "/api/apartments/" + id;
    window.axios.get(url).then((result) => {
      this.apartment = result.data.results;
      //console.log(this.apartment.lat);
      this.lat = this.apartment.lat;
      this.lng = this.apartment.lng;
    });
  },
};
</script>

 <style>
</style>


