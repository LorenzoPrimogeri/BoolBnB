import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import HomeComponent from "./components/pages/HomeComponent";
import ApartmentComponent from "./components/pages/ApartmentComponent";
/* import notFoundComponent from "./components/notFoundComponent";*/


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeComponent
        },
        {
            path: "/apartment",
            name: "apartment",
            component: ApartmentComponent
        },
        /* {
            path: "/*",
            name: "notFound",
            component: notFoundComponent
        }, */
    ]
});

export default router;
