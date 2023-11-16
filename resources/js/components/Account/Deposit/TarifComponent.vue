<template>
  <div class="top_info">
    <p>Тариф: {{ tarif }}</p>
    <p>Доходность: <span>1.3% в день</span></p>
  </div>
  <div class="balance">
    <div>
      <p>Доступные средства</p>
      <div>
        <p>{{ me.balance }} ₽</p>
      </div>
      <p>Введите сумму депозита:</p>
      <div>
        <input
          type="number"
          min="100"
          max="30000000"
          placeholder="Сумма 0.00"
          v-model="summ"
        />
      </div>
      <p class="mini_text">Вы можете вложить от 100 ₽ до 30 000 000 ₽</p>
      <button @click="CreateVklad()">
        <i class="bx bx-like"></i> Создать депозит
      </button>
    </div>
  </div>
  <h2>Персональная информация по депозиту</h2>
  <div class="info_deposit">
    <div>
      <div class="info">
        <i class="bx bx-pie-chart-alt" style="color: #0e99ee"></i>
        <div>
          <p>Начисленная прибыль</p>
          <p style="color: #3cb868 !important">+{{ profit.toFixed(2) }} ₽</p>
        </div>
      </div>
      <div class="info">
        <i class="bx bx-trending-up" style="color: #0e99ee"></i>
        <div>
          <p>Сумма на выходе</p>
          <p>+{{ itogo.toFixed(2) }} ₽</p>
        </div>
      </div>
      <div class="info">
        <i class="bx bx-calendar" style="color: #0e99ee"></i>
        <div>
          <p>Дата окончания депозита</p>
          <p>~{{ date }}</p>
        </div>
      </div>
    </div>
    <div>
      <div class="info">
        <div>
          <p>Ставка:</p>
          <p>1.3% в день.</p>
        </div>
      </div>
      <div class="info">
        <div>
          <p>Бонус:</p>
          <p v-if="bonus != 'Нет.'">
            +{{ bonus }}% в конце депозитного периода.
          </p>
          <p v-else>{{ bonus }}</p>
        </div>
      </div>
      <div class="info">
        <div>
          <p>Капитализация процентов:</p>
          <p>{{ capitalization }}</p>
        </div>
      </div>
      <div class="info">
        <div>
          <p>Ограничение по количеству активных инвестиций:</p>
          <p>Ограничения отсутствуют.</p>
        </div>
      </div>
    </div>
  </div>
  <p class="text_bottom">
    Тело инвестиции возвращается после завершения инвестиционного периода.
    Первое начисление для тарифных планов «на 7 дней», «на 14 дней», «на 30
    дней» происходит через 24 часа после создания депозита, для тарифного плана
    «на 24 часа» начисление происходит моментально.
  </p>
</template>

<script>
import moment from "moment/min/moment-with-locales";

moment.locale("ru");
export default {
  props: ["tarif", "bonus", "capitalization"],
  data() {
    return {
      summ: null,
      profit: 0.0,
      itogo: 0.0,
      me: [],
      date: null,
    };
  },
  updated() {
    if (this.summ == 0) {
      this.summ = null;
    }
    if (this.summ > 30000000) {
      this.summ = 30000000;
    }

    if (this.tarif == "Вклад «на 24 часа»") {
      this.itogo = this.summ + 0.013 * this.summ;
      this.profit = 0.013 * this.summ;
    }
    if (this.tarif == "Вклад «на 7 дней»") {
      this.itogo = this.summ + 0.013 * this.summ;
      this.profit = 0.013 * this.summ;
      for (let index = 0; index < 6; index++) {
        this.itogo = this.itogo + 0.013 * this.itogo;
      }
      let s = (this.itogo / 100) * this.bonus;
      this.itogo = this.itogo + s;
      this.profit = this.itogo - this.summ;
    }
    if (this.tarif == "Вклад «на 14 дней»") {
      this.itogo = this.summ + 0.013 * this.summ;
      this.profit = 0.013 * this.summ;
      for (let index = 0; index < 13; index++) {
        this.itogo = this.itogo + 0.013 * this.itogo;
      }
      let s = (this.itogo / 100) * this.bonus;
      this.itogo = this.itogo + s;
      this.profit = this.itogo - this.summ;
    }
    if (this.tarif == "Вклад «на 28 дней»") {
      this.itogo = this.summ + 0.013 * this.summ;
      this.profit = 0.013 * this.summ;
      for (let index = 0; index < 27; index++) {
        this.itogo = this.itogo + 0.013 * this.itogo;
      }
      let s = (this.itogo / 100) * this.bonus;
      this.itogo = this.itogo + s;
      this.profit = this.itogo - this.summ;
    }
  },
  mounted() {
    this.GetMe();
    this.DateCount();
  },
  methods: {
    GetMe() {
      axios
        .get("/api/getme")
        .then((result) => {
          this.me = result.data.content;
        })
        .catch((err) => {});
    },
    DateCount() {
      if (this.tarif == "Вклад «на 24 часа»") {
        this.date = moment().add(1, "days").format("YYYY-MM-DDTHH:mm:ss.sss");
      }
      if (this.tarif == "Вклад «на 7 дней»") {
        this.date = moment().add(7, "days").format("YYYY-MM-DDTHH:mm:ss.sss");
      }
      if (this.tarif == "Вклад «на 14 дней»") {
        this.date = moment().add(14, "days").format("YYYY-MM-DDTHH:mm:ss.sss");
      }
      if (this.tarif == "Вклад «на 28 дней»") {
        this.date = moment().add(28, "days").format("YYYY-MM-DDTHH:mm:ss.sss");
      }
    },
    CreateVklad() {
      axios
        .post("/api/create/vklad", {
          summ: this.summ,
          itogo: this.itogo,
          profit: this.profit,
          tarif: this.tarif,
          date_end: this.date,
        })
        .then((res) => {
          this.GetMe();
          this.summ = null;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.top_info {
  background: #f5f5f5 !important;
  padding: 20px !important;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  border-bottom: none;
  p:nth-child(1) {
    font-weight: bold;
    font-size: 20px;
  }
  p:nth-child(2) {
    font-size: 14px;
    span {
      font-weight: bold;
      font-size: 20px;
    }
  }
}
.text_bottom {
  margin-top: 20px;
  width: 90%;
  margin-left: 5%;
  font-size: 14px;
  border-top: 1px solid #fbe049;
  padding: 20px 0px 20px 0px;
}
.balance {
  background: white;
  display: flex;
  justify-content: center;
  div:nth-child(1) {
    margin: 20px 0;
    border: 1px solid rgba(0, 0, 0, 0.1);
    width: 60%;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 7px;
    p {
      font-size: 18px;
      padding: 10px 0px;
      color: #515365;
    }
    div:nth-child(2) {
      background: #f5f5f5;
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      p {
        font-size: 31px;
        color: #00c292;
        padding: 20px 0;
      }
    }
    div:nth-child(4) {
      display: flex;
      flex-direction: row;
      width: 90%;
      input {
        width: 100%;
        padding: 8px 12px;
        border-radius: 7px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        font-size: 14px;
        color: #515365;
      }
      input:focus {
        outline: none;
      }
    }
    .mini_text {
      font-size: 10px;
      padding: 5px 0;
    }
    button {
      cursor: pointer;
      padding: 12px 30px;
      width: 80%;
      margin-bottom: 20px;
      border-radius: 7px;
      border: none;
      background: #ffd11a;
      color: white;
      font-size: 17px;
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: center;
      gap: 5px;
      i {
        font-size: 20px;
      }
    }
  }
}
h2 {
  text-align: center;
  color: #515365;
  font-size: 18px;
  margin-top: 25px;
  margin-bottom: 20px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  width: 90%;
  margin-left: 5%;
  padding-bottom: 15px;
}
.info_deposit {
  display: flex;
  flex-direction: row;
  padding: 0 40px 20px;
  gap: 20px;
  div {
    width: 50%;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 7px;
  }
  div {
    display: flex;
    flex-direction: column;
    height: max-content;
    padding: 20px;
    .info {
      padding: 0px 0px 0px 0px;
      margin-bottom: 10px;
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
      width: 95%;
      height: max-content;
      margin-left: 2.5%;
      border-top: none;
      border-left: none;
      border-right: none;
      i {
        font-size: 28px;
      }
      div {
        display: flex;
        flex-direction: column;
        width: max-content;
        gap: 5px;
        border: none;
        p:nth-child(1) {
          font-size: 14px;
          color: #131a2d;
        }
        p:nth-child(2) {
          font-size: 16px;
          font-weight: bold;
        }
      }
    }
    .info:last-child {
      margin-bottom: 0;
      padding-bottom: 0;
      border: none;
    }
  }
}
@media screen and (max-width: 1180px) {
  .info_deposit {
    flex-direction: column;
    align-items: center;
    div {
      width: 100%;
    }
  }
  .balance {
    div:nth-child(1) {
      width: 100%;
    }
  }
}
</style>