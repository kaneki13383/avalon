<template>
  <div class="main-content">
    <aside>
      <div><LogoComponentVue></LogoComponentVue></div>
      <ul>
        <li><p>Главная</p></li>
        <li><p>Пополнение баланса</p></li>
        <li><p>Вывод кэша</p></li>
        <li @click="logout()">
          <p>Выход</p>
        </li>
      </ul>
    </aside>
    <MainComponentVue></MainComponentVue>
  </div>
</template>

<script>
import LogoComponentVue from "../../../components/LogoComponent.vue";
import MainComponentVue from "../../../components/Admin/MainComponent.vue";

export default {
  components: { MainComponentVue, LogoComponentVue },
  data() {
    return {};
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

<style lang="css" scoped>
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
}
aside ul li p {
  color: white;
  font-size: 15px;
  cursor: pointer;
  padding: 5px 0;
}
.main-content {
  display: flex;
  flex-direction: row;
  width: 100vw;
  height: 100vh;
}
</style>
