<template>
  <main id="Main">
    <div class="container w-100">
      <CardComponent />
    </div>
  </main>
</template>

<script>
import CardComponent from "../components/CardComponent.vue";
export default {
  name: "MainComponent",
  components: {
    CardComponent,
  }
}
</script>

<style scoped lang="scss">
#Main {
  display: flex;
  width: 100%;
  margin: 180px auto;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;

  //   padding: 130px 0 0;
  //   width: 100vw;
  //   height: 85vh;
}
</style>