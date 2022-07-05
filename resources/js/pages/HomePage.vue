<template>
  <div>
    <HeaderComponent />
    <MainComponent />
    <FooterComponent />
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
    FooterComponent,
  },
};
</script>

 <style>
 @import url('../../../public/css/layout-preset.css');
 
 #search,
 .cnt-result-adress {
   display: flex;
 }
 
 .main-usr-set {
   display: flex;
 }
 
 .cnt-btn-filter {
   display: none !important;
 }
 </style>

