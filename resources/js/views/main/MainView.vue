<template>
  <Roulette ref="wheel" :items="items" />

  <p>Баланс: {{ balance }}</p>
  <p>Выбранный цвет: {{ color }}</p>
  <input type="number" v-model="bet" />
  <div
    style="width: 50px; height: 50px; background-color: #000"
    @click="color = '#000'"
  ></div>
  <div
    style="width: 50px; height: 50px; background-color: #68bb45"
    @click="color = '#68bb45'"
  ></div>
  <div
    style="width: 50px; height: 50px; background-color: #ee2d2e"
    @click="color = '#ee2d2e'"
  ></div>
  <button @click="launchWheel">Сыграть</button>
</template>

<script>
import { Roulette } from "vue3-roulette";
export default {
  name: "App",
  components: {
    Roulette,
  },
  data() {
    return {
      balance: 1000,
      bet: 0,
      color: null,
      items: [
        {
          id: 1,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#68bb45",
        },
        {
          id: 2,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 3,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 4,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 5,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 6,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 7,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 8,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 9,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 10,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 11,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 12,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 13,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 14,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 15,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 16,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 17,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 18,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 19,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 20,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 21,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 22,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 23,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 24,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 25,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 26,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 27,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 28,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 29,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 30,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 31,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 32,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
        {
          id: 33,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#000",
        },
        {
          id: 34,
          name: "",
          htmlContent: "",
          textColor: "",
          background: "#ee2d2e",
        },
      ],
    };
  },
  methods: {
    launchWheel() {
      // console.log(this.balance);
      // console.log(this.color);
      if (this.balance >= this.bet) {
        if (this.color != null) {
          this.balance = this.balance - this.bet;
          this.$refs.wheel.launchWheel();
          if (
            this.color === "#68bb45" &&
            this.color === this.$refs.wheel.itemSelected.background
          ) {
            this.bet = this.bet * 5;
            this.balance = this.bet + this.balance;
            this.color = null;
            this.bet = 0;
          } else if (this.color === this.$refs.wheel.itemSelected.background) {
            this.bet = this.bet * 2;
            this.balance = this.bet + this.balance;
            this.color = null;
            this.bet = 0;
          }
        }
      }
      this.color = null;
      this.bet = 0;
      // console.log(this.$refs.wheel.itemSelected.background);
    },
  },
};
</script>

<style>
</style>
