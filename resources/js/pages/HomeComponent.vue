<template>
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <div id="speriamo" class="search">
          <main></main>
          <h1>lorenzo</h1>
          <button @click="addSomeThing()"></button>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
/*

pupazzo = document.getElementById("speriamo");
document.body.append(searchBoxHTML);
ttSearchBox.on("tomtom.searchbox.resultselected", function (data) {
  console.log(data);
});
*/
/**
const miaVar = document.querySelector(".tt-search-box-input");
miaVar.setAttribute("name", "address");
const oldAddress = document.getElementById("oldAddress").value;
miaVar.value = oldAddress;
 */

export default {
  name: "HomeComponent",
  data() {
    return {};
  },
  created: {
    options: {
      searchOptions: {
        key: "NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0",
        language: "it-IT",
        limit: 5,
      },
      autocompleteOptions: {
        key: "NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0",
        language: "it-IT",
      },
    },
    ttSearchBox: new tt.plugins.SearchBox(tt.services, options),
    searchBoxHTML: ttSearchBox.getSearchBoxHTML(),
  },
  methods: {
    addSomeThing() {
      this.$el.querySelector(speriamo);
      console.log(this.$el);
    },
  },
};
</script>
 
 <style>
</style>