<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        Qui stampo l'apartamento
        {{ apartment }}
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  name: "ApartmentComponent",
  data() {
    return {
      apartment: undefined,
    };
  },
  mounted() {
    const id = this.$route.params.id;
    const url = "/api/apartments/" + id;
    window.axios.get(url).then((result) => {
      this.apartment = result;
      console.log(this.apartment);
    });
  },
};
</script>
 
 <style>
</style>