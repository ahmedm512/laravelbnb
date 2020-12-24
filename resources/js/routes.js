import VueRouter from "vue-router";
import UserTable from "./table/UserTable";
import Login from "./auth/Login";
import Register from "./auth/Register";
import BarChar from "./graph/BarChar.vue";
//import Example2 from "./components/Example2";

const routes = [
    {
        path: "/users/table",
        component: UserTable,
        name: "table",
    },
    {
        path: "/auth/login",
        component: Login,
        name: "login",
    },
    {
        path: "/auth/register",
        component: Register,
        name: "register",
    },
    {
        path: "/dashboard",
        component: BarChar,
        name: "bar-char",
    },
];

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: "history",
});

export default router;