<template>
  <div>
    <h2>Список депозитов и финансовая статистика аккаунта</h2>
    <p>
      <a href="">Главная</a>
      <i class="bx bx-chevron-right"></i> Личный кабинет
      <i class="bx bx-chevron-right"></i>
      <span>Список депозитов и финансовая статистика аккаунта</span>
    </p>
  </div>
  <div class="all_list">
    <div style="width: 40%; border: 1px solid rgba(0, 0, 0, 0.1)">
      <h1>Доступные средства</h1>
      <div>
        <p>{{ me.balance }} ₽</p>
      </div>
      <p>
        Доступные средства - это сумма на вашем персональном балансе, которая
        доступна как для вывода так и для депозитирования
      </p>
      <h2>Ваши возможности:</h2>
      <div class="buttons">
        <button><i class="bx bx-wallet"></i> Пополнить свой баланс</button>
        <button><i class="bx bxs-bank"></i> Создать новый депозит</button>
        <button>
          <i class="bx bx-credit-card-front"></i> Вывести средства
        </button>
      </div>
    </div>
    <div style="width: 60%; border: 1px solid rgba(0, 0, 0, 0.1)">
      <h1>Ваша финансовая статистика</h1>
      <div class="all_stats">
        <div class="card">
          <i class="bx bx-wallet" style="color: #0f9aee"></i>
          <div>
            <p>Всего пополнено:</p>
            <p>Общая сумма внесенных Вами средств в компанию Avalon</p>
          </div>
          <div style="background-color: #e5f4fd">
            <p style="color: #0f9aee">{{ balance_plus }} ₽</p>
          </div>
        </div>
        <div class="card">
          <i class="bx bx-trending-up" style="color: #0f9aee"></i>
          <div>
            <p>Всего выведено:</p>
            <p>Общая сумма выведенных Вами средств</p>
          </div>
          <div style="background-color: #ffeff4">
            <p style="color: #ff3c7e">{{ balance_minus }} ₽</p>
          </div>
        </div>
        <div class="card">
          <i class="bx bx-briefcase" style="color: #0f9aee"></i>
          <div>
            <p>Активные депозиты:</p>
            <p>Общая сумма всех активных депозитов</p>
          </div>
          <div style="background-color: #ebfaeb">
            <p style="color: #37c936">{{ summ_active }} ₽</p>
          </div>
        </div>
        <div class="card">
          <i class="bx bx-group" style="color: #0f9aee"></i>
          <div>
            <p>Партнерская программа:</p>
            <p>Общая сумма средств, заработанных по реферальной программе</p>
          </div>
          <div style="background-color: #f7f6fe">
            <p style="color: #7774e7">0 ₽</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="history">
    <h1>Список открытых и закрытых депозитов</h1>
    <table>
      <tr>
        <th>Дата депозита, окончания</th>
        <th>Вклад</th>
        <th>Заработано</th>
        <th>Период</th>
        <th>Статус</th>
      </tr>
      <tr v-for="my in vklad" :key="my">
        <td>{{ my.date_end }}</td>
        <td>{{ my.summ }} ₽</td>
        <td>{{ my.profit }} ₽</td>
        <td>{{ my.tarif }}</td>
        <td>{{ my.status }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import moment from "moment/min/moment-with-locales";

moment.locale("ru");
export default {
  data() {
    return {
      me: [],
      vklad: [],
      summ_active: 0,
      balance_plus: 0,
      balance_minus: 0,
    };
  },
  mounted() {
    // console.log(moment(str).isAfter("16/11/2023/1:27:12"));
    this.GetMe();
    this.GetMyVklad();
    this.SummActiveDeposit();
    this.PlusBalanceSumm();
    this.MinusBalanceSumm();
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
    GetMyVklad() {
      axios.get("/api/my/vklad").then((res) => {
        this.vklad = res.data;
        for (let index = 0; index < this.vklad.length; index++) {
          let str = moment().format("YYYY-MM-DDTHH:mm:ss.sss");
          if (moment(str).isAfter(this.vklad[index].date_end) == true) {
            axios.post("/api/return_profit", {
              date_end: this.vklad[index].date_end,
            });
          }
        }
      });
    },
    SummActiveDeposit() {
      axios.get("/api/my/vklad/summ").then((res) => {
        console.log(res.data);
        let arr = res.data;
        let summ = 0;
        for (let index = 0; index < arr.length; index++) {
          summ += arr[index].summ;
        }
        this.summ_active = summ;
      });
    },
    PlusBalanceSumm() {
      axios.get("/api/application/summ").then((res) => {
        let aarr = res.data;
        console.log(aarr);
        for (let index = 0; index < aarr.length; index++) {
          this.balance_plus += aarr[index].summ;
        }
      });
    },
    MinusBalanceSumm() {
      axios.get("/api/balance/summ").then((res) => {
        let aarr = res.data;
        for (let index = 0; index < aarr.length; index++) {
          this.balance_minus += aarr[index].summ;
        }
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.history {
  background: white;
  width: 93.5%;
  margin-left: 2%;
  height: max-content;
  padding: 0px 20px 20px 20px;
  margin-top: 20px;
  border-radius: 7px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  h1 {
    padding: 20px 0 10px 20px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    color: #515365;
    font-size: 18px;
  }
  table {
    margin-top: 20px;
    width: 100%;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-bottom: none;
    tr th {
      height: 50px;
      font-weight: bold;
      font-size: 15px;
    }
    td {
      font-size: 15px;
      text-align: center;
      padding: 10px 0;
    }
    th,
    td {
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      border-right: 1px solid rgba(0, 0, 0, 0.1);
    }
    tr td:last-child {
      border-right: none;
    }
    tr th:last-child {
      border-right: none;
    }
  }
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
.all_list {
  display: flex;
  flex-direction: row;
  margin: 30px 30px 0px 30px;
  gap: 30px;
  div {
    padding: 0;
    height: max-content;
    background: white;
    border-radius: 7px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;

    h1 {
      padding: 20px 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    div:nth-child(2) {
      background: #f7fafc;
      display: flex;
      align-items: center;
      width: 100%;
      p {
        font-size: 31px;
        padding: 20px 0;
        color: #00c292;
      }
    }
    p {
      text-align: center;
      padding: 0px 20px;
    }
    h2 {
      font-size: 20px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      padding-bottom: 20px;
    }
    .buttons {
      width: 100%;
      display: flex;
      flex-direction: row;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 20px;
      button {
        background: white;
        border: 1.5px solid rgba(0, 0, 0, 0.1);
        border-radius: 7px;
        padding: 10px 20px;
        font-size: 13px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        cursor: pointer;
      }
    }
  }
}
.all_stats {
  display: flex;
  flex-direction: column;
  background: white !important;
  .card {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 90% !important;
    height: max-content;
    background: #fff !important;
    padding: 10px;
    padding-bottom: 30px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    i {
      font-size: 30px;
    }
    div:nth-child(2) {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 10px;
      background: #fff !important;
      p:nth-child(1) {
        font-size: 16px;
        color: #000;
        font-weight: bold;
        padding: 0;
      }
      p:nth-child(2) {
        font-size: 14px;
        color: #888da8;
        padding: 0;
      }
    }
    div:nth-child(3) {
      width: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      p {
        width: max-content;
        padding: 10px;
        font-size: 17px;
        font-weight: bold;
      }
    }
  }
  .card:last-child {
    margin-bottom: 20px;
    border: none;
  }
}
@media screen and (max-width: 865px) {
  .all_list {
    flex-direction: column;
    div {
      width: 100% !important;
    }
  }
}
@media screen and (max-width: 686px) {
  .history {
    overflow-x: scroll;
    margin-left: 0;
    table {
      width: 600px;
      overflow-x: scroll;
    }
  }
  .all_stats .card {
    flex-wrap: wrap;
    justify-content: center;
  }
  .all_stats .card div:nth-child(2) {
    align-items: center;
  }
  .all_list div h1 {
    text-align: center;
  }
}
</style>
