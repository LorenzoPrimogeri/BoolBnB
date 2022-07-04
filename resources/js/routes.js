import Vue from "vue";
import VueRouter from "vue-router";

import HomeComponent from "./pages/HomeComponent";
import NotFoundComponent from "./pages/NotFoundComponent";
import ApartmentComponent from "./pages/ApartmentComponent";
import SearchPage from "./pages/SearchPage";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomeComponent,
        },
        {
            path: "/home/:id",
            name: "single-apartment",
            component: ApartmentComponent,
        },
        {
            path: "/search",
            name: "search",
            component: SearchPage,
        },
        {
            path: "/*",
            name: "notFound",
            component: NotFoundComponent,
        },
        
    ],
});

export default router;
