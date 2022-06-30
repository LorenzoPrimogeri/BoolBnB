<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <SearchComponent />
      </div>
    </div>
  </div>
</template>
 
<script>
import SearchComponent from "../components/SearchComponent.vue";
export default {
  name: "HomeComponent",
  components: {
    SearchComponent,
  },
};
</script>
 
 <style>
</style>