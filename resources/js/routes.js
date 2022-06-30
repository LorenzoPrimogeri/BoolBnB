import Vue from "vue";
import VueRouter from "vue-router";

import HomeComponent from "./pages/HomeComponent";
import NotFoundComponent from "./pages/NotFoundComponent";

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
            path: "/*",
            name: "notFound",
            component: NotFoundComponent,
        },
    ],
});

export default router;
