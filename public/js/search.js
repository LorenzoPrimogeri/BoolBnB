var options = {
    searchOptions: {
        key: "NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0",
        language: "it-IT",
        limit: 5,
    },
    autocompleteOptions: {
        key: "NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0",
        language: "it-IT",
    },
};
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

var div = document.querySelector(".autocomplete");
if (div) {
    div.append(searchBoxHTML);
}
ttSearchBox.on("tomtom.searchbox.resultselected", function (data) {
    console.log(data);
});

const miaVar = document.querySelector(".tt-search-box-input");
miaVar.setAttribute("name", "address");
const oldAddress = document.getElementById("oldAddress").value;
miaVar.value = oldAddress;
