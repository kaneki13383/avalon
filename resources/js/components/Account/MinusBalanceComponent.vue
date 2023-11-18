<template>
  <div>
    <h2>Создать заявку на вывод средств</h2>
    <p>
      <a href="">Главная</a>
      <i class="bx bx-chevron-right"></i> Личный кабинет
      <i class="bx bx-chevron-right"></i>
      <span>Вывести деньги</span>
    </p>
  </div>

  <div class="pay">
    <h2>Выберите платежную систему</h2>
    <div class="all">
      <div class="card" @click="modal = true">
        <p class="mini_text">Перевод на карту</p>
        <img src="/img/card-get-loan.png" alt="" />
        <h3>Банковская карта</h3>
        <p>Комиссия 0%</p>
        <button>Пополнить</button>
      </div>
      <div class="card">
        <img src="/img/bitcoin_btc.svg" alt="" />
        <h3>BitCoin (BTC)</h3>
        <p>Комиссия 0%</p>
        <button>Пополнить</button>
      </div>
      <div class="card">
        <img src="/img/ethereum-etc.svg" alt="" />
        <h3>Ethereum (ETH)</h3>
        <p>Комиссия 0%</p>
        <button>Пополнить</button>
      </div>
      <div class="card">
        <img src="/img/usdt-ico.svg" alt="" />
        <h3>Tether (ERC-20)</h3>
        <p>Комиссия 0%</p>
        <button>Пополнить</button>
      </div>
    </div>
  </div>

  <div class="modal" v-if="modal == true">
    <div class="modal_main">
      <div class="modal_header">
        <h4>Перевод на карту</h4>
        <i class="bx bx-x" @click="modal = false"></i>
      </div>
      <div class="modal_body">
        <h5>На карту какого банка Вам удобнее сделать вывод?</h5>
        <div class="banks">
          <div
            class="card"
            @click="(modal = false), (modal2 = true), (bank = 'sber')"
          >
            <img src="/img/logo-sber.svg" alt="" />
          </div>
          <div
            class="card"
            @click="(modal = false), (modal2 = true), (bank = 'tinkof')"
          >
            <img src="/img/logo-tinkof.svg" alt="" />
          </div>
          <div
            class="card"
            @click="(modal = false), (modal2 = true), (bank = 'alfa')"
          >
            <img src="/img/alfabank.svg" alt="" />
          </div>
          <div
            class="card vtb"
            @click="(modal = false), (modal2 = true), (bank = 'vtb')"
          >
            <img src="/img/logo-vtb.svg" alt="" />
          </div>
          <div
            class="card"
            @click="(modal = false), (modal2 = true), (bank = 'raiffeisen')"
          >
            <img src="/img/raiffeisen-bank-logo.svg" alt="" />
          </div>
          <div
            class="card"
            @click="(modal = false), (modal2 = true), (bank = 'mts')"
          >
            <img src="/img/mts-bank-logo.svg" alt="" />
          </div>
        </div>
      </div>
      <div class="modal_footer">
        <button @click="modal = false">Закрыть</button>
      </div>
    </div>
  </div>

  <div class="modal" v-if="modal2 == true">
    <div class="modal_main" id="modal2">
      <div class="modal_header">
        <h4>Вывести деньги на банковскую карту</h4>
        <i class="bx bx-x" @click="modal2 = false"></i>
      </div>
      <div class="modal_body">
        <div class="msg">
          <h6>Инструкция по выводу средств</h6>
          <ul>
            <li>
              <i class="bx bx-caret-right"></i> Выберите платежную систему
            </li>
            <li>
              <i class="bx bx-caret-right"></i> Введите сумму (минимальная сумма
              для вывода - 100 ₽)
            </li>
            <li>
              <i class="bx bx-caret-right"></i> Внимание! Убедитесь в
              правильности Ваших платежных реквизитов
            </li>
          </ul>
          <p>
            В течение 24-х часов вы получите выплату на выбранный Вами
            электронный кошелёк. <br />
            Лимиты: В течении рабочего дня заявка на вывод средств может быть
            создана один раз. Интервал между созданием заявок должен составлять
            не менее 24-х часов.
          </p>
        </div>
        <div class="balance">
          <p>Доступные средства</p>
          <div>
            <p>{{ me.balance }} ₽</p>
          </div>
        </div>
        <h5>Введите номер карты:</h5>
        <input
          type="number"
          v-model="num_card"
          min="100"
          placeholder="Введите номер карты"
        />
        <h5>Введите сумму вывода:</h5>
        <input
          type="number"
          v-model="balance"
          min="100"
          placeholder="Введите сумму"
        />
        <button @click="OutputBalance()">
          <i class="bx bx-check" style="color: #fff"></i> Вывести средства
        </button>
      </div>
      <div class="modal_footer">
        <button @click="modal2 = false">Закрыть</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      modal: false,
      bank: null,
      modal2: false,
      balance: 1000,
      go: false,
      num_card: null,
      me: [],
    };
  },
  updated() {
    if (this.balance != 1000) {
      if (this.balance > 500000) {
        this.balance = 500000;
      }
      if (this.balance < 1) {
        this.balance = 1000;
      }
    }
  },
  mounted() {
    this.GetMe();
  },
  methods: {
    GoNext() {
      this.go = true;
      this.modal2 = false;
      let pay = document.querySelector(".pay");
      pay.classList.add("none");
    },

    GetMe() {
      axios
        .get("/api/getme")
        .then((result) => {
          this.me = result.data.content;
        })
        .catch((err) => {});
    },
    OutputBalance() {
      axios
        .post("/api/output/balance", {
          summ: this.balance,
          card: this.num_card,
          bank: this.bank,
        })
        .then((res) => {
          this.GetMe();
        });
    },
  },
};
</script>

<style lang="scss" scoped>
#modal2 {
  margin-top: 20px;
}
.none {
  display: none !important;
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
.pay {
  background: #fff;
  width: 97%;
  height: max-content;
  margin: 25px;
  border-radius: 7px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  h2 {
    padding: 10px 0 10px 20px !important;
    font-size: 17px;
    color: #515365;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  }
  .all {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    margin: 40px;
    .card {
      cursor: pointer;
      transition: 0.5s;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 7px;
      padding: 10px 50px !important;
      padding-bottom: 30px !important;
      .mini_text {
        font-size: 12px;
        padding-bottom: 20px;
        font-weight: bold;
        color: #0c7bbe;
      }
      img:nth-child(2) {
        width: 100px;
        height: 70px;
        padding-top: 0;
      }
      img {
        width: 110px;
        padding-top: 10px;
      }
      button {
        padding: 10px 60px;
        border-radius: 7px;
        border: none;
        color: #fff;
        font-size: 13px;
        background: #ffd11a;
      }
    }
    .card:hover {
      box-shadow: 0 7px 15px rgba(0, 0, 0, 0.07);
    }
  }
}
.modal {
  background: rgba(0, 0, 0, 0.4);
  width: 100%;
  height: 120vh;
  position: absolute;
  top: 0px;
  display: flex;
  justify-content: center;
  .modal_main {
    width: 50%;
    height: max-content;
    margin-top: 100px;
    background: white;
    border-radius: 7px;
    padding: 0 !important;
    .modal_header {
      background: #0f9aee;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      padding: 20px 20px !important;
      border-radius: 7px 7px 0px 0px;
      h4 {
        color: white;
        font-size: 18px;
      }
      i {
        color: white;
        font-size: 20px;
        cursor: pointer;
      }
    }
    .modal_body {
      display: flex;
      flex-direction: column;
      align-items: center;
      .msg {
        padding: 20px;
        background: rgb(222 222 222 / 22%);
        margin-top: 20px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.16),
          0 1px 10px 0 rgba(0, 0, 0, 0.12);
        p {
          width: auto;
          color: #515365;
        }
        ul {
          margin: 20px 0;
          display: flex;
          flex-direction: column;
          gap: 10px;
        }
        ul li {
          font-size: 14px;
          color: #515365;
          i {
            color: #0f9aee;
          }
        }
        h6 {
          font-size: 18px;
          text-align: center;
          color: #515365;
        }
      }
      .balance {
        margin-top: 20px;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 7px;
        p {
          padding: 15px;
          font-size: 18px;
          color: #515365;
        }
        div {
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: center;
          background: #f7fafc;
          p {
            padding: 15px 0;
            font-size: 20px;
            color: #00c292;
          }
        }
      }
      h5 {
        font-size: 16px;
        padding: 20px 0 0 0;
        color: #515365;
      }
      input {
        margin: 20px 0 0 0;
        border-radius: 7px;
        border: none;
        padding: 10px;
        background: #eef2f7;
      }
      input:focus {
        outline: none;
      }
      button {
        cursor: pointer;
        background: transparent;
        border-radius: 7px;
        padding: 15px 30px;
        transition: 0.5s;
        border: none;
        background: #37c936;
        margin-bottom: 20px;
        margin-top: 20px;
        color: #fff;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 5px;
        i {
          font-size: 20px;
        }
      }
      .banks {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        margin: 20px 0;
        gap: 10px;
        .summ {
          cursor: pointer;
          padding: 7px 10px;
          color: #37c936;
          border-radius: 20px;
          font-size: 12px;
          font-weight: bold;
          background: #ebfaeb;
        }
        .card {
          cursor: pointer;
          transition: 0.5s;
          padding: 10px 40px;
          border: 1px solid rgba(0, 0, 0, 0.1);
          width: auto;
          height: max-content;
          border-radius: 7px;
          img {
            width: 120px;
            height: 50px;
          }
        }
        .card:hover {
          background: rgba(0, 0, 0, 0.1);
        }
        .vtb {
          padding: 15px 55px;
          img {
            width: 90px;
            height: 40px;
          }
        }
      }
    }
    .modal_footer {
      border-top: 1px solid rgba(0, 0, 0, 0.1);
      button {
        cursor: pointer;
        margin: 20px 20px 20px 0;
        float: right;
        background: transparent;
        border-color: rgba(0, 0, 0, 0.1);
        border-radius: 7px;
        padding: 10px 20px;
        color: #515365;
        transition: 0.5s;
      }
      button:hover {
        background: rgba(0, 0, 0, 0.1);
      }
    }
  }
}

@media screen and (max-width: 500px) {
  .pay {
    margin-left: 5px;
    .all {
      justify-content: center;
    }
  }
}
@media screen and (max-width: 378px) {
  .pay .all .card {
    padding: 10px 20px !important;
  }
}
@media screen and (max-width: 890px) {
  .modal {
    justify-content: start;
    height: 190vh;
  }
  .modal_main {
    width: 80% !important;
  }
  .modal_body h5 {
    text-align: center;
  }
}
@media screen and (max-width: 425px) {
  .modal {
    justify-content: center;
  }
}
</style>