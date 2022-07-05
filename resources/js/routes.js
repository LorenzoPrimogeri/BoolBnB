import Vue from "vue";
import VueRouter from "vue-router";

import HomePage from "./pages/HomePage";
import NotFoundComponent from "./pages/NotFoundComponent";
import ApartmentPage from "./pages/ApartmentPage";
import SearchPage from "./pages/SearchPage";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: HomePage,
        },
        {
            path: "/home/:id",
            name: "single-apartment",
            component: ApartmentPage,
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
