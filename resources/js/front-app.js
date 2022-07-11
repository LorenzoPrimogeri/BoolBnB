require("./bootstrap");

window.axios = require("axios");
window.Vue = require("vue");


let user = document.querySelector("meta[name='user_id']");

if (user) {
    Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');
} else {
    console.log("user non trovato");
}


import AppComponent from "./app/AppComponent";
import router from "./routes";

const app = new Vue({
    el: "#app",
    render: (h) => h(AppComponent),
    router,
});
