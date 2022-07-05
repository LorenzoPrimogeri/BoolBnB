<template>
  <main>
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
  },
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
