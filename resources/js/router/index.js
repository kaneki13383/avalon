import { createRouter, createWebHistory } from "vue-router";
import MainView from '../views/main/MainView.vue';
import RegisterComponent from '../components/Auth/RegisterComponent.vue';
import AccountView from '../views/main/account/AccountView.vue';
import AuthComponent from '../components/Auth/AuthComponent.vue';

const router = new createRouter({
    base: "/",
    history: createWebHistory(),
    routes: [
        { path: "/", component: RegisterComponent },
        { path: "/login", component: AuthComponent },
        { path: "/account/deposits", component: AccountView },
        { path: "/account/create/deposits", component: AccountView }
    ],
});


export default router;