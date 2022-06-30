<template>
  <div class="">
  
  </div>
</template>

<script>
import Axios from "axios";


export default {
  name: "SearchComponent",
  components: {
    
  },
  data() {
    return {
     
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
          console.log(typeof element.address.freeformAddress);
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