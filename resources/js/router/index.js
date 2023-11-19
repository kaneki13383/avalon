import { createRouter, createWebHistory } from "vue-router";
import MainView from '../views/main/MainView.vue';
import RegisterComponent from '../components/Auth/RegisterComponent.vue';
import AccountView from '../views/main/account/AccountView.vue';
import AuthComponent from '../components/Auth/AuthComponent.vue';
import AdminView from '../views/main/admin/AdminView.vue'

import DepositsComponent from '../components/Account/DepositsComponent.vue';
import CreateDepositComponent from '../components/Account/CreateDepositComponent.vue';
import PlusBalanceComponent from '../components/Account/PlusBalanceComponent.vue'
import MinusBalanceComponent from '../components/Account/MinusBalanceComponent.vue'
import HistoryBalancePlusComponent from '../components/Account/HistoryBalancePlusComponent.vue'
import HistoryBalanceMinusComponent from '../components/Account/HistoryBalanceMinus.vue'
import ParentsProgrammComponent from '../components/Account/ParentsProgrammComponent.vue'

const router = new createRouter({
    base: "/",
    history: createWebHistory(),
    routes: [
        { path: "/", component: RegisterComponent },
        { path: "/login", component: AuthComponent },
        { path: "/account/deposits", component: DepositsComponent },
        { path: "/account/create/deposits", component: CreateDepositComponent },
        { path: "/account/balance/plus", component: PlusBalanceComponent },
        { path: "/account/balance/minus", component: MinusBalanceComponent },
        { path: "/account/balance/plus/history", component: HistoryBalancePlusComponent },
        { path: "/account/balance/minus/history", component: HistoryBalanceMinusComponent },
        { path: "/account/parents", component: ParentsProgrammComponent },
        { path: "/admin", component: AdminView },
    ],
});


export default router;