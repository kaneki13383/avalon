<template>
  <div>
    <h2>Партнерская программа</h2>
    <p>
      <a href="">Главная</a>
      <i class="bx bx-chevron-right"></i> Личный кабинет
      <i class="bx bx-chevron-right"></i>
      <span>Партнерская программа</span>
    </p>
  </div>

  <div class="all">
    <div>
      <h3>Партнерская программа «Avalon»</h3>
      <div>
        <p>Арбитражите или владеете тематическим источником трафика?</p>
        <p>Мы готовы предложить индивидуальные условия</p>
        <p><i class="bx bx-phone-call bx-xs"></i> Контактный центр</p>
      </div>
      <div class="text">
        <p>
          Каждый зарегистрированный участник компании «Avalon» может
          воспользоваться своей реферальной ссылкой для приглашения партнеров и
          получать вознаграждения от первоначального депозита Вашего реферала.
        </p>
        <p>Партнерское вознаграждение: <span>5% от суммы депозита</span></p>
        <p>
          Пример: приглашенный Вами человек вложил 20 000 рублей, Вы
          автоматически получаете на основной баланс партнерское вознаграждение
          1 000 рублей.
        </p>
      </div>
      <div class="rules">
        <p>Соблюдайте правила партнерской программы:</p>
        <div>
          <p>
            Запрещается регистрировать свои аккаунты под свою реферальную
            систему.
          </p>
        </div>
        <div>
          <p>
            Запрещается спамить свою реферальную ссылку в различных группах и в
            комментариях в соц.сети ВКонтакте.
          </p>
        </div>
      </div>
    </div>
    <div>
      <h3>Ваша финансовая статистика:</h3>
      <p class="mini">Ваша ссылка для привлечения рефералов:</p>
      <div>
        <p>https://avalon1.me/?ref={{ me.login }}</p>
      </div>
      <button><i class="bx bxs-copy"></i> Скопировать ссылку</button>
      <div class="cards">
        <div class="card">
          <i class="bx bx-money" style="color: #0f9aee"></i>
          <div>
            <p>Доход с рефералов:</p>
            <p>Общая сумма Ваших доходов с привлеченных партнеров</p>
          </div>
          <div><p>0 ₽</p></div>
        </div>
        <div class="card">
          <i class="bx bx-show" style="color: #0f9aee"></i>
          <div>
            <p>Всего уникальных переходов:</p>
            <p>Общее количество уникальных переходов от 05.02.2021</p>
          </div>
          <div
            style="
              background: #ffcc00;
              border-radius: 50px;
              width: 30px;
              height: 30px;
            "
          >
            <p style="color: #fff">0</p>
          </div>
        </div>
        <div class="card">
          <i class="bx bx-smile" style="color: #0f9aee"></i>
          <div>
            <p>Всего рефералов:</p>
            <p>Общее количество привлеченных Вами партнеров</p>
          </div>
          <div
            style="
              background: #ff3c7e;
              border-radius: 50px;
              width: 30px;
              height: 30px;
            "
          >
            <p style="color: #fff">0</p>
          </div>
        </div>
        <div class="card">
          <i class="bx bx-crown" style="color: #0f9aee"></i>
          <div>
            <p>Всего активных рефералов:</p>
            <p>Активный реферал - это реферал с минимум одним депозитом</p>
          </div>
          <div
            style="
              background: #37c936;
              border-radius: 50px;
              width: 30px;
              height: 30px;
            "
          >
            <p style="color: #fff">0</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="balance">
    <h3>Доступные средства</h3>
    <div>
      <p>{{ me.balance }} ₽</p>
    </div>
    <button><i class="bx bx-coin-stack"></i> Вывести средства</button>
  </div>

  <div class="history">
    <h1>Список ваших партнеров</h1>
    <table>
      <tr>
        <th>Дата регистрации</th>
        <th>Логин реферала</th>
        <th>Пополнил</th>
        <th>Вознаграждение</th>
      </tr>
      <!-- <tr>
        <td>Сумма</td>
        <td>Дата</td>
        <td>Платежная система</td>
        <td>Номер транзакции</td>
      </tr> -->
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      me: [],
    };
  },
  mounted() {
    this.GetMe();
  },
  methods: {
    GetMe() {
      axios
        .get("/api/getme")
        .then((result) => {
          this.me = result.data.content;
          console.log(this.me);
        })
        .catch((err) => {});
    },
  },
};
</script>

<style lang="scss" scoped>
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
.all {
  margin: 20px;
  display: flex;
  flex-direction: row;
  gap: 20px;
  div {
    padding: 0;
    width: 50%;
    height: max-content;
    background: white;
    border-radius: 7px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    h3 {
      font-size: 18px;
      color: #515365;
      padding: 15px 0 10px 20px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    div {
      margin: 10px 0;
      border: none;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      background: #0f9aee;
      padding: 20px;
      width: 90%;
      p {
        color: white;
        font-size: 14px;
        text-align: center;
      }
      p:nth-child(2) {
        font-weight: bold;
      }
      p:nth-child(3) {
        i {
          color: white;
        }
      }
    }
    .text {
      background: transparent;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin-bottom: 0;
      padding-bottom: 0;
      p {
        padding: 0 20px 20px 20px;
        color: #888da8;
        text-align: left;
        span {
          color: #37c936;
          font-weight: bold;
        }
      }
    }
    .rules {
      margin-top: 0;
      padding-top: 0;
      display: flex;
      flex-direction: column;
      gap: 1px;
      background: transparent;
      p {
        color: #888da8;
        font-weight: bold;
      }
      div {
        background: #fff3cd;
        p {
          color: #856404;
          text-align: left;
          font-weight: normal;
        }
      }
    }
  }
  div:nth-child(2) {
    .mini {
      margin: 20px 0;
    }
    div {
      background: #f7fafc;
      border: none !important;
      p {
        color: #0f9aee;
      }
    }
    button {
      cursor: pointer;
      background: transparent;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 7px;
      padding: 10px 20px;
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
    }
    .cards {
      display: flex;
      flex-direction: column;
      gap: 10px;
      background: transparent;
      i {
        font-size: 25px;
      }
      .card {
        height: max-content;
        background: transparent;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 20px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1) !important;
        div:nth-child(2) {
          align-items: start;
          margin: 0;
          padding: 0;
          background: transparent;
          p {
            text-align: left;
            color: #000;
          }
          p:first-child {
            font-weight: bold;
          }
          p:last-child {
            font-weight: normal;
            color: #99abb4;
          }
        }
        div:nth-child(3) {
          margin: 0;
          background: #e5f4fd;
          color: #0f9aee;
          padding: 0;
          width: 55px;
          height: 45px;
          display: flex;
          justify-content: center;
          align-items: center;
          p {
            font-weight: bold;
            font-size: 17px;
          }
        }
      }
      .card:nth-child(4) {
        border-bottom: none !important;
        padding-bottom: 0;
      }
    }
  }
}
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
    margin: 20px 0 0 0;
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
.balance {
  display: flex;
  flex-direction: column;
  gap: 20px;
  justify-content: center;
  align-items: center;
  background: white;
  width: 25%;
  margin-left: 35%;
  height: max-content;
  border-radius: 7px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  h3 {
    margin-top: 10px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding-bottom: 10px;
  }
  div {
    background: #f7fafc;
    width: 100%;
    display: flex;
    justify-content: center;
    padding: 20px 0;
    p {
      font-size: 31px;
      color: #00c292;
    }
  }
  button {
    background: transparent;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 10px 20px;
    border-radius: 7px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    i {
      font-size: 15px;
    }
    font-size: 13px;
  }
}
@media screen and (max-width: 895px) {
  .all {
    flex-direction: column;
  }
  .all div {
    width: 100%;
  }
  .balance {
    width: 320px;
  }
}
@media screen and (max-width: 752px) {
  .balance {
    margin-left: 10px;
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
}
@media screen and (max-width: 320px) {
  .all div {
    width: 320px;
    margin-left: -10px;
  }
}
</style>