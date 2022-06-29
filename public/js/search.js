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
    console.log(data.data.text);
    inputValue = data.data.text;
    input = document.getElementById("inputValue");
    console.log(input);
    input.value = inputValue;
    console.log(input.value);
});
