<template>
  <main>
    <div class="container w-100">
      <CardComponent />
      <div v-for="(apartment,index) in apartments" :key="index">
      <h2>{{apartment.title}}</h2>
      </div>
    </div>
  </main>
</template>

<script>
import CardComponent from "../components/CardComponent.vue";
export default {
  name: "MainComponent",
  components: {
    CardComponent,
  },
  props: {
    apartments:Array,
  }
};
</script>

<style scoped lang="scss">
main {
  display: flex;
  width: 100%;
  margin: 180px auto;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
</style>
