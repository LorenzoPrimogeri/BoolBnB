// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// let address = [];
//     function array(){
//         var indirizzo = document.getElementById('myInput').value;
//         if(indirizzo.length >3){
//        address=[];
//         axios
//       .get('https://api.tomtom.com/search/2/geocode/' +indirizzo+'.json?storeResult=false&&limit=3&view=Unified&key=GpuJFPNSTUcwZDlHR1mIhVAs6Z457GsK')
//       .then((response) => {

//         console.log(response);

//         if (response.data.results[0]) {
//         this.result = response.data.results[0].address.freeformAddress;
//         }
//         if(response.data.results[1]){
//         this.result2 = response.data.results[1].address.freeformAddress;
//         }
//         if(response.data.results[2]){
//         this.result3 = response.data.results[2].address.freeformAddress;
//         }
//         if(!address.includes(this.result)||!address.includes(this.result2)||!address.includes(this.result3)){
//         address.push(this.result,this.result2,this.result3);
//         }
//         autocomplete(document.getElementById("myInput"), address);
//       });
//     }
//         return address;
//     }
//     function autocomplete(inp, arr) {
//   /*the autocomplete function takes two arguments,
//   the text field element and an array of possible autocompleted values:*/
//   var currentFocus;
//   /*execute a function when someone writes in the text field:*/
//   inp.addEventListener("input", function(e) {
//       var a, b, i, val = this.value;
//       /*close any already open lists of autocompleted values*/
//       closeAllLists();
//       if (!val) { return false;}
//       currentFocus = -1;
//       /*create a DIV element that will contain the items (values):*/
//       a = document.createElement("DIV");
//       a.setAttribute("id", this.id + "autocomplete-list");
//       a.setAttribute("class", "autocomplete-items");
//       /*append the DIV element as a child of the autocomplete container:*/
//       this.parentNode.appendChild(a);
//       /*for each item in the array...*/
//       for (i = 0; i < arr.length; i++) {
//         /*check if the item starts with the same letters as the text field value:*/
//      //  if (arr[i].substr(0, val.length).toLowerCase() == val.toLowerCase()){
//           /*create a DIV element for each matching element:*/
//           b = document.createElement("DIV");
//           /*make the matching letters bold:*/
//           b.innerHTML = "<span>" + arr[i].substr(0, val.length) + "</span>";
//           b.innerHTML += arr[i].substr(val.length);
//           /*insert a input field that will hold the current array item's value:*/
//           b.innerHTML += "<input type='hidden' value='" + arr[i].replace("'", "`") + "'>";
//           /*execute a function when someone clicks on the item value (DIV element):*/
//               b.addEventListener("click", function(e) {
//                 /*insert the value for the autocomplete text field:*/



//                 inp.value = this.getElementsByTagName("input")[0].value;

//                 console.log(inp.value);

//                 //checkString.replace("'", "\'");

//               /*close the list of autocompleted values,
//               (or any other open lists of autocompleted values:*/
//               closeAllLists();
//           });
//           a.appendChild(b);
//     // }
//       }
//   });
//   /*execute a function presses a key on the keyboard:*/
//   inp.addEventListener("onkeyup", function(e) {
//       var x = document.getElementById(this.id + "autocomplete-list");
//       if (x) x = x.getElementsByTagName("div");
//       if (e.keyCode == 40) {
//         /*If the arrow DOWN key is pressed,
//         increase the currentFocus variable:*/
//         currentFocus++;
//         /*and and make the current item more visible:*/
//         addActive(x);
//       } else if (e.keyCode == 38) { //up
//         /*If the arrow UP key is pressed,
//         decrease the currentFocus variable:*/
//         currentFocus--;
//         /*and and make the current item more visible:*/
//         addActive(x);
//       } else if (e.keyCode == 13) {
//         /*If the ENTER key is pressed, prevent the form from being submitted,*/
//         e.preventDefault();
//         if (currentFocus > -1) {
//           /*and simulate a click on the "active" item:*/
//           if (x) x[currentFocus].click();
//         }
//       }
//   });
//   function addActive(x) {
//     /*a function to classify an item as "active":*/
//     if (!x) return false;
//     /*start by removing the "active" class on all items:*/
//     removeActive(x);
//     if (currentFocus >= x.length) currentFocus = 0;
//     if (currentFocus < 0) currentFocus = (x.length - 1);
//     /*add class "autocomplete-active":*/
//     x[currentFocus].classList.add("autocomplete-active");
//   }
//   function removeActive(x) {
//     /*a function to remove the "active" class from all autocomplete items:*/
//     for (var i = 0; i < x.length; i++) {
//       x[i].classList.remove("autocomplete-active");
//     }
//   }
//   function closeAllLists(elmnt) {
//     /*close all autocomplete lists in the document,
//     except the one passed as an argument:*/
//     var x = document.getElementsByClassName("autocomplete-items");
//     for (var i = 0; i < x.length; i++) {
//       if (elmnt != x[i] && elmnt != inp) {
//       x[i].parentNode.removeChild(x[i]);
//     }
//   }
// }
// /*execute a function when someone clicks in the document:*/
// document.addEventListener("click", function (e) {
//     closeAllLists(e.target);
// });
// }
// autocomplete(document.getElementById("myInput"), address);

        var options = {
            searchOptions: {
                key: 'NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0',
                language: 'it-IT',
                limit: 5
            },
            autocompleteOptions: {
                key: 'NJWytmtgnBFV1Gj4fOdLxqoKVCnhN4c0',
                language: 'it-IT'
            }
        };
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML();


         
         var div = document.querySelector('.autocomplete');
        if (div) {
            div.append(searchBoxHTML);
        } else {
            console.log('else funziona');
        }



        ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
            console.log(data.data.text);
            inputValue = data.data.text;
            input = document.getElementById('inputValue');
            console.log(input);
            input.value = inputValue;
            console.log(input.value);
        });

