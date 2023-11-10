<template>
  <div>
    <h2>Выбор тарифных планов</h2>
    <p>
      <a href="">Главная</a>
      <i class="bx bx-chevron-right"></i> Личный кабинет
      <i class="bx bx-chevron-right"></i> <span>Создать депозит</span>
    </p>
  </div>
  <h3>Выберите тарифный план</h3>
  <div class="tarifs">
    <div class="tarif">
      <div class="card one" @click="(checked = 'one'), stylecard()">
        <label for="one">
          <ul>
            <li>
              <i class="bx bx-question-mark"></i> Вклад «на 24 часа»
              <input name="card" id="one" type="radio" checked />
            </li>
            <li><i class="bx bx-check"></i> 1.3% ставка в день</li>
            <li><i class="bx bx-check"></i> Возврат депозита через 24 часа</li>
          </ul>
        </label>
      </div>
      <div class="card two" @click="(checked = 'two'), stylecard()">
        <label for="two">
          <ul>
            <li>
              <i class="bx bx-dollar"></i> Вклад «на 7 дней»
              <input name="card" id="two" type="radio" />
            </li>
            <li><i class="bx bx-check"></i> 1.3% ставка в день</li>
            <li><i class="bx bx-check"></i> Капитализация: да</li>
            <li><i class="bx bx-check"></i> Бонус в конце депозита: + 0.37%</li>
          </ul>
        </label>
      </div>
      <div class="card three" @click="(checked = 'three'), stylecard()">
        <label for="three">
          <ul>
            <li>
              <i class="bx bx-smile"></i> Вклад «на 14 дней»
              <input name="card" id="three" type="radio" />
            </li>
            <li><i class="bx bx-check"></i> 1.3% ставка в день</li>
            <li><i class="bx bx-check"></i> Капитализация: да</li>
            <li><i class="bx bx-check"></i> Бонус в конце депозита: + 0.86%</li>
          </ul>
        </label>
      </div>
      <div class="card four" @click="(checked = 'four'), stylecard()">
        <label for="four">
          <ul>
            <li>
              <i class="bx bx-check-shield"></i> Вклад «на 28 дней»
              <input name="card" id="four" type="radio" />
            </li>
            <li><i class="bx bx-check"></i> 1.3% ставка в день</li>
            <li><i class="bx bx-check"></i> Капитализация: да</li>
            <li><i class="bx bx-check"></i> Бонус в конце депозита: + 1.79%</li>
          </ul>
        </label>
      </div>
    </div>
    <div class="info_tarif">
      <TarifComponentVue
        v-if="checked == 'one'"
        :tarif="tarif"
        :capitalization="capitalization"
        :bonus="bonus"
      />
      <TarifComponentVue
        v-if="checked == 'two'"
        :tarif="tarif"
        :capitalization="capitalization"
        :bonus="bonus"
      />
      <TarifComponentVue
        v-if="checked == 'three'"
        :tarif="tarif"
        :capitalization="capitalization"
        :bonus="bonus"
      />
      <TarifComponentVue
        v-if="checked == 'four'"
        :tarif="tarif"
        :capitalization="capitalization"
        :bonus="bonus"
      />
    </div>
  </div>
</template>

<script>
import TarifComponentVue from "./Deposit/TarifComponent.vue";

export default {
  components: { TarifComponentVue },
  data() {
    return {
      checked: "one",
      tarif: "Вклад «на 24 часа»",
      capitalization: "Нет.",
      bonus: "Нет.",
    };
  },
  mounted() {
    this.stylecard();
  },
  methods: {
    stylecard() {
      let card1 = document.querySelector(".one");
      let card2 = document.querySelector(".two");
      let card3 = document.querySelector(".three");
      let card4 = document.querySelector(".four");
      if (this.checked == "one") {
        card1.classList.add("active");
        this.tarif = "Вклад «на 24 часа»";
        this.capitalization = "Нет.";
        this.bonus = "Нет.";
        card2.classList.remove("active");
        card3.classList.remove("active");
        card4.classList.remove("active");
      }
      if (this.checked == "two") {
        card2.classList.add("active");
        this.tarif = "Вклад «на 7 дней»";
        this.capitalization = "Есть.";
        this.bonus = 0.37;
        card1.classList.remove("active");
        card3.classList.remove("active");
        card4.classList.remove("active");
      }
      if (this.checked == "three") {
        card3.classList.add("active");
        this.tarif = "Вклад «на 14 дней»";
        this.capitalization = "Есть.";
        this.bonus = 0.86;
        card2.classList.remove("active");
        card1.classList.remove("active");
        card4.classList.remove("active");
      }
      if (this.checked == "four") {
        card4.classList.add("active");
        this.tarif = "Вклад «на 28 дней»";
        this.capitalization = "Есть.";
        this.bonus = 1.79;
        card2.classList.remove("active");
        card1.classList.remove("active");
        card3.classList.remove("active");
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.active {
  background: #c2e7ff !important;
  box-shadow: 0 7px 15px rgba(0, 0, 0, 0.07);
}
div:nth-child(1) {
  background: white;
  padding: 16px 0 16px 30px;
  h2 {
    font-size: 20px;
    padding-bottom: 5px;
  }
  p {
    font-size: 14px;
    color: #888da8;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 3px;
    a {
      color: #0f9aee;
      text-decoration: none;
    }
    span {
      color: #99abb4;
    }
    i {
      font-size: 21px;
      color: #a6b7bf;
    }
  }
}
.tarifs {
  display: flex;
  flex-direction: row;
  gap: 15px;
  margin: 0 0 0 40px;
  .tarif {
    display: flex;
    flex-direction: column;
    gap: 15px;
    background: transparent;
    padding: 0;
    margin: 0;
    width: 355px;
    .card {
      width: auto;
      padding: 35px 20px;
      margin: 0;
      transition: 0.5s;
      border-radius: 7px;
      background: white;
      label {
        cursor: pointer;
      }
      ul li {
        display: flex;
        flex-direction: row;
        align-items: center;
        font-size: 14px;
        gap: 20px;
        margin-left: 20px;
        color: #515365;
        input[type="radio"] {
          position: relative;
          top: -2px;
          left: -1px;
          margin-left: 40px;
        }
        input[type="radio"]:after {
          width: 15px;
          height: 15px;
          border-radius: 15px;
          top: -2px;
          left: -1px;
          position: relative;
          background-color: #d1d3d1;
          content: "";
          display: inline-block;
          visibility: visible;
          border: 2px solid white;
        }
        input[type="radio"]:checked:after {
          width: 15px;
          height: 15px;
          border-radius: 15px;
          top: -2px;
          left: -1px;
          position: relative;
          background-color: #c2e7ff;
          content: "";
          display: inline-block;
          visibility: visible;
          border: 2px solid white;
        }
        i {
          color: #37c936;
          font-size: 20px;
        }
      }
      ul li:nth-child(1) {
        font-weight: bold;
        justify-content: space-between;
        font-size: 18px;
        margin: 0;
        margin-bottom: 25px;
        .bx-question-mark {
          color: #7774e7;
          font-size: 35px;
          border: 2px solid #7774e7;
          border-radius: 25px;
        }
        .bx-dollar {
          font-size: 35px;
        }
        .bx-smile {
          font-size: 35px;
          color: #0f9aee;
        }
        .bx-check-shield {
          font-size: 35px;
          color: #ffcc00;
        }
      }
      ul li:nth-child(2) {
        padding-bottom: 15px;
      }
      ul li:nth-child(3) {
        padding-bottom: 15px;
      }
    }
    .card:hover {
      box-shadow: 0 7px 15px rgba(0, 0, 0, 0.07);
    }
  }
  .info_tarif {
    width: 65%;
    height: max-content;
    background: white;
    border-radius: 7px;
    border: 1px solid rgba(0, 0, 0, 0.1);
  }
}
h3 {
  padding: 36px 0 20px 30px;
  font-size: 18px;
}

@media screen and (max-width: 1530px) {
  .tarifs {
    flex-direction: column;
    align-items: center;
    gap: 50px;
    .tarif {
      width: 90%;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
    }
    .info_tarif {
      width: 90%;
    }
  }
}
@media screen and (max-width: 1180px) {
  .tarifs {
    margin: 0;
  }
}
</style>