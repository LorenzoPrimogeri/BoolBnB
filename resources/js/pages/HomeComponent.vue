<template>
<div id="web-body">
  <HeaderComponent />
  <MainComponent />
  <FooterComponent />
  <div class="container d-flex justify-content-center">
  </div>
  </div>
</template>

<script>

import HeaderComponent from "../components/HeaderComponent.vue";
import MainComponent from "../components/MainComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";

export default {
  name: "HomeComponent",
  components: {
    HeaderComponent,
    MainComponent,
    FooterComponent ,
  },
};
</script>

 <style>
 @import url('../../../public/css/layout-preset.css');

  #web-body{
    width: 100vw;
    height: 100vh;
  }
</style>
