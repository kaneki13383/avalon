<template>
  <div>
    <h2>Пополнение баланса</h2>
    <p>
      <a href="">Главная</a>
      <i class="bx bx-chevron-right"></i> Личный кабинет
      <i class="bx bx-chevron-right"></i>
      <span>Способ пополнения</span>
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
        <h5>На карту какого банка Вам удобнее сделать перевод?</h5>
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
    <div class="modal_main">
      <div class="modal_header">
        <h4>Пополнить баланс через банковскую карту</h4>
        <i class="bx bx-x" @click="modal2 = false"></i>
      </div>
      <div class="modal_body">
        <div class="msg">
          <p>
            Максимальная сумма одного перевода — 500 000 руб. <br />
            Количество переводов: неограниченно
          </p>
        </div>
        <h5>Введите сумму пополнения:</h5>
        <input
          type="number"
          v-model="balance"
          min="100"
          placeholder="Введите сумму"
        />
        <div class="banks">
          <div class="summ" @click="balance = 2500">2500 ₽</div>
          <div class="summ" @click="balance = 5000">5000 ₽</div>
          <div class="summ" @click="balance = 15000">15000 ₽</div>
          <div class="summ" @click="balance = 50000">50000 ₽</div>
          <div class="summ" @click="balance = 100000">100000 ₽</div>
        </div>
        <button @click="GoNext()">Перейти к пополнению</button>
      </div>
      <div class="modal_footer">
        <button @click="modal2 = false">Закрыть</button>
      </div>
    </div>
  </div>
  <PerevodOnCardComponentVue
    v-if="go == true"
    :bank="bank"
    :balance="balance"
  />
</template>

<script>
import PerevodOnCardComponentVue from "./PerevodOnCardComponent.vue";
export default {
  components: { PerevodOnCardComponentVue },
  data() {
    return {
      modal: false,
      bank: null,
      modal2: false,
      balance: 1000,
      go: false,
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
  methods: {
    GoNext() {
      this.go = true;
      this.modal2 = false;
      let pay = document.querySelector(".pay");
      pay.classList.add("none");
    },
  },
};
</script>

<style lang="scss" scoped>
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
  height: calc(100vh - 63px);
  position: absolute;
  top: 0px;
  display: flex;
  justify-content: center;
  .modal_main {
    width: 700px;
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
        background: #ffd11a;
        margin-bottom: 20px;
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
</style>