<template>
  <div class="">
    <vue-simple-complete :items="items" @inputChanged="onInputChanged">
    </vue-simple-complete>
  </div>
</template>

<script>
import Axios from "axios";
import VueSimpleComplete from "vue-simple-complete";

export default {
  name: "SearchComponent",
  components: {
    "vue-simple-complete": VueSimpleComplete,
  },
  data() {
    return {
      items: [],
      changedInput: "",
    };
  },
  methods: {
    onInputChanged(value) {
      delete axios.defaults.headers.common["X-Requested-With"];
      this.items = [];
      Axios.get(
        "https://api.tomtom.com/search/2/geocode/" +
          value +
          ".json?storeResult=false&limit=5&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK"
      ).then((risp) => {
        const array = risp.data.results;

        array.forEach((element) => {
          console.log(typeof element);
          if (!this.items.includes(element.address.freeformAddress)) {
            this.items.push(element.address.freeformAddress);
          }
        });
        console.log(this.items);
      });
      this.changedInput = value;
    },
  },
};
</script>

<style>
</style>