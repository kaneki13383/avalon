<template>
  <div class="main-content">
    <aside>
      <div><LogoComponentVue></LogoComponentVue></div>
      <ul>
        <li @click="page = 'main'">
          <p><i class="bx bx-home"></i> Главная</p>
        </li>
        <li @click="page = 'plus'">
          <p><i class="bx bx-wallet"></i> Пополнение баланса</p>
        </li>
        <li @click="page = 'minus'">
          <p><i class="bx bx-credit-card-front"></i> Вывод кэша</p>
        </li>
        <li @click="logout()">
          <p><i class="bx bx-exit"></i> Выход</p>
        </li>
      </ul>
    </aside>
    <MainComponentVue v-if="page == 'main'"></MainComponentVue>
    <PlusBalanceVue v-if="page == 'plus'"></PlusBalanceVue>
    <MinusBalance v-if="page == 'minus'" />
  </div>
</template>

<script>
import LogoComponentVue from "../../../components/LogoComponent.vue";
import MainComponentVue from "../../../components/Admin/MainComponent.vue";
import PlusBalanceVue from "../../../components/Admin/PlusBalance.vue";
import MinusBalance from "../../../components/Admin/MinusBalance.vue";

export default {
  components: {
    MainComponentVue,
    LogoComponentVue,
    PlusBalanceVue,
    MinusBalance,
  },
  data() {
    return {
      page: "main",
    };
  },
  methods: {
    logout() {
      axios
        .get("/api/logout")
        .then((result) => {
          this.$router.push("/login");
          localStorage.removeItem("token");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
aside {
  width: 270px;
  height: 100vh;
  background-color: #303644;
}
aside > div {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 95px;
  background: #1d1b31;
}
aside div svg {
  margin: 0 !important;
}
aside ul {
  margin-top: 30px;
  padding-left: 15px;
  li {
    padding: 15px 0;
  }
}
aside ul li p {
  color: white;
  font-size: 16px;
  cursor: pointer;
  padding: 5px 0;
  display: flex;
  flex-direction: row;
  gap: 10px;
  align-items: center;
  i {
    font-size: 17px;
  }
}
.main-content {
  display: flex;
  flex-direction: row;
  width: 100vw;
  height: 100vh;
}
</style>
