<template>
  <div class="">
    <vue-simple-suggest
      v-model="chosen"
      :list="onInputChanged"
    ></vue-simple-suggest>

    <p>Chosen element: {{ chosen }}</p>
  </div>
</template>

<script>
import Axios from "axios";
import VueSimpleSuggest from "vue-simple-suggest";
import "vue-simple-suggest/dist/styles.css";
export default {
  name: "SearchComponent",
  components: {
    VueSimpleSuggest,
  },
  data() {
    return {
      chosen: "",
      items: [],
    };
  },
  methods: {
    onInputChanged() {
      delete axios.defaults.headers.common["X-Requested-With"];
      this.items = [];
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/" +
          this.chosen +
          ".json?storeResult=false&limit=5&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK"
      ).then((risp) => {
        const array = risp.data.results;
        array.forEach((element) => {
          console.log(typeof element.address.freeformAddress);
          if (!this.items.includes(element.address.freeformAddress)) {
            this.items.push(element.address.freeformAddress);
          }
        });
        console.log(this.items);
      });
      return this.items;
    },
  },
};
</script>

<style>
</style>