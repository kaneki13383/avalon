<template>
  <p @click="logout()">Выход</p>
</template>

<script>
import MainComponentVue from "../../../components/Admin/MainComponent.vue";

export default {
  components: { MainComponentVue },
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

<style lang="scss" scoped>
svg {
  margin-bottom: 0 !important;
}
</style>