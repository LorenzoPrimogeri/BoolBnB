
 function SelezTT() {

     let i = 0;
     let checked = false;
     const modulo = document.modulo.elements;

     for (i = 0; i < modulo.length; i++) {
         if (modulo[i].type === "checkbox" && modulo[i].checked) {
             checked = true;
         } 
     }

     console.log(checked)

     if (!checked) {
        document.getElementById("btn-submit").classList.add("button-disabled")
        document.getElementById('checkdiv').innerHTML = "devi selezionare almeno un servizio!"
     } else {
        document.getElementById("btn-submit").classList.remove("button-disabled")
        document.getElementById('checkdiv').innerHTML = " "
     }
}
 

        document.getElementById("userInput").value = getSavedValue("userInput");    // set the value to this input   // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }

