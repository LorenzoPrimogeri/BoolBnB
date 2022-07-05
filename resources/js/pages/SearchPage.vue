<template>
  <div>
    <HeaderComponent />
    <FilterComponent />
    <MainComponent />
    <FooterComponent />
  </div>
</template>


<script>
import HeaderComponent from "../components/HeaderComponent.vue";
import MainComponent from "../components/MainComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";
import FilterComponent from "../components/FilterComponent.vue";

export default {
  name: "SearchPage",
  components: {
    HeaderComponent,
    MainComponent,
    FooterComponent,
    FilterComponent,
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
  },
};

</script>

<style scoped lang="scss">
.search-hdr,
.cnt-result-adress {
  display: none !important;
}

.main-usr-set {
  display: none !important;
}

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