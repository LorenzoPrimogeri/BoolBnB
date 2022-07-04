<template>
<div>
<a href="/login" class="btn btn-primary">Accedi</a>
<a href="/register" class="btn btn-primary">Registrati</a>
  <div class="container d-flex justify-content-center">
        <SearchComponent />
  </div>
  </div>
</template>

<script>
import SearchComponent from "../components/SearchComponent.vue";

export default {
  name: "HomeComponent",
  components: {
    SearchComponent
  },
};
</script>

 <style>
</style>
