<template>
  <div class="kupaneg">
    <div class="agotiptip-detaliza">
      <LogoComponentVue />
      <LogoNoTextComponentVue />
    </div>
    <ul class="upegedsa">
      <li>
        <a href="http://127.0.0.1:5500/index.html">
          <i class="bx bx-chevrons-left"></i>
          <span class="link_name">Главная</span>
        </a>
        <ul class="kaned-sakopa blank">
          <li>
            <a class="link_name" href="http://127.0.0.1:5500/index.html"
              >Главная</a
            >
          </li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bxs-bank"></i>
            <span class="link_name">Ваши депозиты</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="kaned-sakopa">
          <li><a class="link_name" href="#">Ваши депозиты</a></li>
          <li>
            <router-link
              to="/account/deposits"
              @click="url = '/account/deposits'"
              >Ваши депозиты</router-link
            >
          </li>
          <li>
            <router-link
              to="/account/create/deposits"
              @click="url = '/account/create/deposits'"
              >Статистика аккаунта и <br />
              список депозитов</router-link
            >
          </li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bx-wallet"></i>
            <span class="link_name">Пополнить баланс</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="kaned-sakopa">
          <li><a class="link_name" href="#">Пополнить баланс</a></li>
          <li>
            <router-link
              to="/account/balance/plus"
              @click="url = '/account/balance/plus'"
              >Выбрать способ<br />
              пополнения баланса</router-link
            >
          </li>
          <li>
            <router-link
              to="/account/balance/plus/history"
              @click="url = '/account/balance/plus/history'"
              >История пополнения<br />
              баланса</router-link
            >
          </li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bx-credit-card-front"></i>
            <span class="link_name">Вывести деньги</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="kaned-sakopa">
          <li><a class="link_name" href="#">Вывести деньги</a></li>
          <li>
            <router-link
              to="/account/balance/minus"
              @click="url = '/account/balance/minus'"
              >Создать заявку на<br />
              вывод средств</router-link
            >
          </li>
          <li>
            <router-link
              to="/account/balance/minus/history"
              @click="url = '/account/balance/minus/history'"
              >История вывода<br />
              средств</router-link
            >
          </li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class="bx bx-file"></i>
            <span class="link_name">Партнерская программа</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="kaned-sakopa">
          <li><a class="link_name" href="#">Партнерская программа</a></li>
          <li>
            <router-link to="/account/parents" @click="url = '/account/parents'"
              >Партнерские ссылки</router-link
            >
          </li>
        </ul>
      </li>
      <li @click="logout()">
        <a href="#">
          <i class="bx bx-exit"></i>
          <span class="link_name">Выход</span>
        </a>
        <ul class="kaned-sakopa blank">
          <li><a class="link_name" href="#">Выход</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <section class="doma-sazdelun">
    <div class="domasa-konvaena">
      <!-- <span class="text">Открыть</span> -->
      <div class="modal" v-if="modal == true">
        <div class="modal_main">
          <div class="modal_header">
            <h2>Контактный центр</h2>
            <i class="bx bx-x" @click="modal = false"></i>
          </div>
          <div class="modal_body">
            <div class="first">
              <p>
                Подпишитесь на наши социальные сети чтобы <br />
                всегда быть в курсе событий:
              </p>
              <div class="all">
                <div class="card">
                  <img src="/img/telegram-logo.png" alt="" />
                  <div>
                    <p>@Avalon_ltd</p>
                    <a href="">подписаться</a>
                  </div>
                </div>
                <div class="card">
                  <img src="/img/VK.com-logo.png" alt="" />
                  <div>
                    <p>/avalon_ltd</p>
                    <a href="">подписаться</a>
                  </div>
                </div>
                <div class="card">
                  <img src="/img/YouTube_play1.png" alt="" />
                  <div>
                    <p>Avalon</p>
                    <a href="">подписаться</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="first">
              <p>
                Контакты консультантов и технической <br />
                поддержки:
              </p>
              <div class="all">
                <div class="card">
                  <img src="/img/VK.com-logo.png" alt="" />
                  <div>
                    <p>/avalon_ltd</p>
                    <a href="">написать</a>
                  </div>
                </div>
                <div class="card">
                  <img src="/img/email-logo-hi.png" alt="" />
                  <div>
                    <p>support@avalon.cc</p>
                    <a href="">написать</a>
                  </div>
                </div>
                <div class="card">
                  <img src="/img/chatraio.png" alt="" />
                  <div>
                    <p>Live-консультант</p>
                    <a href="">написать</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal_footer">
            <button @click="modal = false">Закрыть окно</button>
          </div>
        </div>
      </div>
      <header class="header">
        <div>
          <i class="bx bx-menu" style="z-index: 1"></i>
        </div>
        <div>
          <ul>
            <li @click="modal = true" style="cursor: pointer">
              <i class="bx bx-phone-call bx-xs"></i>
              <p class="adaptive">Контактный центр</p>
            </li>
            <li>
              <i class="bx bx-bell bx-xs bx-tada"></i>
              <p class="adaptive">Новости</p>
            </li>
            <li>
              <i class="bx bx-message-detail bx-xs"></i>
              <p class="adaptive">Отзывы</p>
            </li>
            <li
              @click="
                if (mini_modal == true) {
                  mini_modal = false;
                } else {
                  mini_modal = true;
                }
              "
              style="cursor: pointer"
            >
              <i class="bx bxs-user-circle bx-md"></i>
              <p class="adaptive">Здравствуйте, {{ name }}</p>
              <i class="bx bx-chevron-down bx-sm"></i>
            </li>
          </ul>
        </div>
        <div class="mini_modal" v-if="mini_modal == true">
          <ul>
            <li>
              <router-link to="/account/deposits"
                ><i class="bx bxs-bank"></i> Создать депозит</router-link
              >
            </li>
            <li>
              <router-link to="/account/create/deposits"
                ><i class="bx bx-dollar-circle"></i> Статистика аккаунта и
                список депозитов</router-link
              >
            </li>
            <li>
              <router-link
                to="/account/balance/plus"
                style="color: #45b300; font-weight: bold"
                ><i class="bx bx-wallet"></i> Пополнить баланс</router-link
              >
            </li>
            <li>
              <router-link to="/account/balance/plus/history"
                ><i class="bx bx-briefcase"></i> История пополнения
                баланса</router-link
              >
            </li>
            <li>
              <router-link to="/account/balance/minus"
                ><i class="bx bx-credit-card-front"></i> Вывести
                средства</router-link
              >
            </li>
            <li>
              <router-link to="/account/balance/minus/history"
                ><i class="bx bx-list-ul"></i> История вывода
                средств</router-link
              >
            </li>
            <li>
              <router-link to="/account/parents"
                ><i class="bx bx-file-blank"></i> Партнерская
                программа</router-link
              >
            </li>
            <li>
              <a><i class="bx bx-cog"></i> Настройки профайла</a>
            </li>
            <li @click="logout()">
              <a><i class="bx bx-power-off"></i> Выйти с аккаунта</a>
            </li>
          </ul>
        </div>
      </header>
      <div class="test">
        <!-- <DepositsComponentVue v-if="url == '/account/deposits'" />
        <CreateDepositComponentVue v-if="url == '/account/create/deposits'" />
        <PlusBalanceComponentVue v-if="url == '/account/balance/plus'" />
        <HistoryBalanceComponentVue
          v-if="url == '/account/balance/plus/history'"
        />
        <HistoryBalanceMinusVue
          v-if="url == '/account/balance/minus/history'"
        />
        <ParentsProgrammComponentVue v-if="url == '/account/parents'" />
        <MinusBalanceComponent v-if="url == '/account/balance/minus'" /> -->
        <router-view></router-view>
        <FooterComponentVue />
      </div>
    </div>
  </section>
</template>

<script>
import FooterComponentVue from "../../components/FooterComponent.vue";
import LogoComponentVue from "../../components/LogoComponent.vue";
import LogoNoTextComponentVue from "../../components/LogoNoTextComponent.vue";
// import CreateDepositComponentVue from "./CreateDepositComponent.vue";
// import DepositsComponentVue from "./DepositsComponent.vue";
// import HistoryBalanceMinusVue from "./HistoryBalanceMinus.vue";
// import HistoryBalanceComponentVue from "./HistoryBalancePlusComponent.vue";
// import MinusBalanceComponent from "./MinusBalanceComponent.vue";
// import ParentsProgrammComponentVue from "./ParentsProgrammComponent.vue";
// import PlusBalanceComponentVue from "./PlusBalanceComponent.vue";

export default {
  components: {
    FooterComponentVue,
    LogoComponentVue,
    LogoNoTextComponentVue,
  },
  data() {
    return {
      name: "",
      url: "",
      mini_modal: false,
      modal: false,
    };
  },
  mounted() {
    this.GetMe();

    this.url = window.location.pathname;
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
      });
    }
    let kupaneg = document.querySelector(".kupaneg");
    let kupanegBtn = document.querySelector(".bx-menu");
    let svg = document.querySelector(".text");
    let all_svg = document.getElementById("Шар_1");
    let all_svg2 = document.getElementById("Шар_2");
    let header = document.querySelector(".header");
    kupanegBtn.addEventListener("click", () => {
      kupaneg.classList.toggle("close");
      all_svg2.classList.toggle("none");
      all_svg.classList.toggle("size");
      header.classList.toggle("header2");
    });
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
    GetMe() {
      axios
        .get("/api/getme")
        .then((result) => {
          this.name = result.data.content.name;
        })
        .catch((err) => {});
    },
  },
};
</script>

<style lang="scss" scoped>
.modal {
  position: fixed;
  top: 0;
  width: 100%;
  height: 100vh;
  background: rgba(0, 0, 0, 0.5);
  z-index: 4;
  display: flex;
  .modal_main {
    margin: 3% 0 0 20%;
    border-radius: 7px;
    width: auto;
    height: max-content;
    background: white;
    .modal_header {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      align-items: center;
      gap: 400px;
      padding: 10px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      h2 {
        font-size: 18px;
      }
      i {
        font-size: 20px;
      }
    }
    .modal_body {
      display: flex;
      flex-direction: row;
      .first {
        width: 50%;
        margin-top: 20px;
        padding-left: 20px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding-bottom: 20px;
        .all {
          display: flex;
          flex-direction: column;
          gap: 20px;
          .card {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            div {
              display: flex;
              flex-direction: column;
              gap: 5px;
            }
            img {
              width: 50px;
            }
            a {
              color: #0c7bbe;
              text-decoration: none;
            }
          }
        }
      }
    }
    .modal_footer {
      border-top: 1px solid rgba(0, 0, 0, 0.1);
      button {
        cursor: pointer;
        float: right;
        margin: 20px 20px 20px 0;
        background: transparent;
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 10px;
        border-radius: 7px;
        color: #515365;
        transition: 0.5s;
      }
      button:hover {
        background: #515365;
        color: white;
      }
    }
  }
}
@media screen and (max-width: 980px) {
  .modal_main {
    margin-left: 2% !important;
  }
}
@media screen and (max-width: 800px) {
  .modal .modal_main .modal_body {
    flex-direction: column;
    align-items: center;
  }
  .modal_main {
    width: 320px !important;
  }
  .first {
    width: 100% !important;
  }
  .modal_main {
    margin-left: 15% !important;
  }
}
@media screen and (max-width: 500px) {
  .modal_main {
    margin-left: 2% !important;
  }
  .modal_header i {
    display: none;
  }
  .modal_header h2 {
    text-align: center;
  }
}
.mini_modal {
  position: fixed;
  z-index: 2;
  top: 63px;
  right: 0;
  width: 200px;
  height: max-content;
  background: #fff;
  border-radius: 0 0 7px 7px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  padding-top: 15px;
  ul {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
    li {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      width: 100%;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
      padding-bottom: 15px;
      a {
        font-size: 14px;
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
        color: #000;
        text-decoration: none;
        i {
          font-size: 17px;
          padding-left: 10px;
        }
      }
    }
    li:last-child {
      border: none;
    }
  }
}
.test {
  position: absolute;
  top: 63px;
  left: 10px;
  width: calc(100% - 10px);
  // height: 100vh;
}
.header2 {
  width: calc(100% - 78px);
}
header {
  width: calc(100% - 260px);
  height: 65px;
  float: right;
  transition: 0.5s;
  background: #313645;
  color: white;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  z-index: 2;
  position: fixed;

  div:nth-child(1) {
    .bx-menu:before {
      color: white;
    }
  }
  div:nth-child(2) {
    ul {
      display: flex;
      flex-direction: row;
      gap: 20px;
      justify-content: flex-end;
      align-items: center;
      li {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 5px;
        font-size: 14px;
      }
    }
  }
}
.kupaneg {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 270px;
  background: #313644;
  z-index: 100;
  transition: all 0.5s ease;
}
.kupaneg.close {
  width: 88px;
}
.kupaneg .agotiptip-detaliza {
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
  padding-bottom: 35px;
  background: #1d1b31;
  svg {
    margin: 0;
    padding-left: 20px;
    padding-top: 20px;
  }
}
.kupaneg .agotiptip-detaliza i {
  font-size: 30px;
  color: #fff;
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
}
.kupaneg .agotiptip-detaliza .kasnulasu {
  font-size: 22px;
  color: #fff;
  font-weight: 600;
  transition: 0.3s ease;
  transition-delay: 0.1s;
}
.kupaneg.close .agotiptip-detaliza .kasnulasu {
  transition-delay: 0s;
  opacity: 0;
  pointer-events: none;
}
.kupaneg .upegedsa {
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.kupaneg.close .upegedsa {
  overflow: visible;
}
.kupaneg .upegedsa::-webkit-scrollbar {
  display: none;
}
.kupaneg .upegedsa li {
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.kupaneg .upegedsa li:hover {
  background: #1d1b31;
}
.kupaneg .upegedsa li .iocn-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.kupaneg.close .upegedsa li .iocn-link {
  display: block;
}
.kupaneg .upegedsa li i {
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.kupaneg .upegedsa li.showMenu i.arrow {
  transform: rotate(-180deg);
}
.kupaneg.close .upegedsa i.arrow {
  display: none;
}
.kupaneg .upegedsa li a {
  display: flex;
  align-items: center;
  text-decoration: none;
}
.kupaneg .upegedsa li a .link_name {
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  width: 110px;
  transition: all 0.4s ease;
}
.kupaneg.close .upegedsa li a .link_name {
  opacity: 0;
  pointer-events: none;
}
.kupaneg .upegedsa li .kaned-sakopa {
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: #1d1b31;
  display: none;
}
.kupaneg .upegedsa li.showMenu .kaned-sakopa {
  display: block;
}
.kupaneg .upegedsa li .kaned-sakopa a {
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.kupaneg .upegedsa li .kaned-sakopa a:hover {
  opacity: 1;
}
.kupaneg.close .upegedsa li .kaned-sakopa {
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.kupaneg.close .upegedsa li:hover .kaned-sakopa {
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.kupaneg .upegedsa li .kaned-sakopa .link_name {
  display: none;
}
.kupaneg.close .upegedsa li .kaned-sakopa .link_name {
  font-size: 15px;
  opacity: 1;
  display: block;
}
.kupaneg .upegedsa li .kaned-sakopa.blank {
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.kupaneg .upegedsa li:hover .kaned-sakopa.blank {
  top: 50%;
  transform: translateY(-50%);
}
.kupaneg .pronaya-setka {
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #1d1b31;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.kupaneg.close .pronaya-setka {
  background: none;
}
.kupaneg.close .pronaya-setka {
  width: 78px;
}
.kupaneg .pronaya-setka .profile-content {
  display: flex;
  align-items: center;
}
.kupaneg .pronaya-setka img {
  height: 52px;
  width: 52px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #313644;
  transition: all 0.5s ease;
}
.kupaneg.close .pronaya-setka img {
  padding: 10px;
}

.kupaneg .pronaya-setka .profile_name,
.kupaneg .pronaya-setka .job {
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  white-space: nowrap;
}
.kupaneg.close .pronaya-setka i,
.kupaneg.close .pronaya-setka .profile_name,
.kupaneg.close .pronaya-setka .job {
  display: none;
}
.kupaneg .pronaya-setka .job {
  font-size: 12px;
}
.doma-sazdelun {
  position: relative;
  background: #e4e9f7;
  height: 100vh;
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.kupaneg.close ~ .doma-sazdelun {
  left: 78px;
  width: calc(100% - 78px);
}
.doma-sazdelun .domasa-konvaena {
  height: 60px;
  display: flex;
  align-items: center;
}
.doma-sazdelun .domasa-konvaena .bx-menu,
.doma-sazdelun .domasa-konvaena .text {
  color: #11101d;
  font-size: 35px;
}
.doma-sazdelun .domasa-konvaena .bx-menu {
  margin: 0 15px;
  cursor: pointer;
}
.doma-sazdelun .domasa-konvaena .text {
  font-size: 26px;
  font-weight: 600;
}
@media screen and (max-width: 707px) {
  .header div:nth-child(2) ul li {
    p {
      display: none;
    }
    i {
      font-size: 20px !important;
    }
  }
  .kupaneg.close .upegedsa li .kaned-sakopa {
    display: none;
  }
  .header {
    width: 100%;
  }
  .kupaneg.close ~ .doma-sazdelun {
    width: 100% !important;
    left: 0 !important;
  }
  .header2 {
    width: 100%;
  }
  .kupaneg.close {
    display: none;
  }
  .kupaneg {
    width: 58%;
  }
  .doma-sazdelun {
    left: 88%;
  }
  .test {
    width: 100%;
    left: 0;
  }
}
@media (max-width: 420px) {
}
.kupaneg {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 270px;
  background: #313644;
  z-index: 100;
  transition: all 0.5s ease;
}
.kupaneg.close {
  width: 88px;
}
.kupaneg .agotiptip-detaliza {
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
}
.kupaneg .agotiptip-detaliza i {
  font-size: 30px;
  color: #fff;
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
}
.kupaneg .agotiptip-detaliza .kasnulasu {
  font-size: 22px;
  color: #fff;
  font-weight: 600;
  transition: 0.3s ease;
  transition-delay: 0.1s;
}
.kupaneg.close .agotiptip-detaliza .kasnulasu {
  transition-delay: 0s;
  opacity: 0;
  pointer-events: none;
}
.kupaneg .upegedsa {
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.kupaneg.close .upegedsa {
  overflow: visible;
}
.kupaneg .upegedsa::-webkit-scrollbar {
  display: none;
}
.kupaneg .upegedsa li {
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.kupaneg .upegedsa li:hover {
  background: #1d1b31;
}
.kupaneg .upegedsa li .iocn-link {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.kupaneg.close .upegedsa li .iocn-link {
  display: block;
}
.kupaneg .upegedsa li i {
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.kupaneg .upegedsa li.showMenu i.arrow {
  transform: rotate(-180deg);
}
.kupaneg.close .upegedsa i.arrow {
  display: none;
}
.kupaneg .upegedsa li a {
  display: flex;
  align-items: center;
  text-decoration: none;
}
.kupaneg .upegedsa li a .link_name {
  font-size: 15px;
  font-weight: 400;
  width: 132px;
  color: #fff;
  transition: all 0.4s ease;
}
.kupaneg.close .upegedsa li a .link_name {
  opacity: 0;
  pointer-events: none;
}
.kupaneg .upegedsa li .kaned-sakopa {
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: #1d1b31;
  display: none;
}
.kupaneg .upegedsa li.showMenu .kaned-sakopa {
  display: block;
}
.kupaneg .upegedsa li .kaned-sakopa a {
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.kupaneg .upegedsa li .kaned-sakopa a:hover {
  opacity: 1;
}
.kupaneg.close .upegedsa li .kaned-sakopa {
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.kupaneg.close .upegedsa li:hover .kaned-sakopa {
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.kupaneg .upegedsa li .kaned-sakopa .link_name {
  display: none;
}
.kupaneg.close .upegedsa li .kaned-sakopa .link_name {
  font-size: 17px;
  opacity: 1;
  display: block;
}
.kupaneg .upegedsa li .kaned-sakopa.blank {
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.kupaneg .upegedsa li:hover .kaned-sakopa.blank {
  top: 50%;
  transform: translateY(-50%);
}
.kupaneg .pronaya-setka {
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #1d1b31;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.kupaneg.close .pronaya-setka {
  background: none;
}
.kupaneg.close .pronaya-setka {
  width: 78px;
}
.kupaneg .pronaya-setka .profile-content {
  display: flex;
  align-items: center;
}
.kupaneg .pronaya-setka img {
  height: 52px;
  width: 52px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #1d1b31;
  transition: all 0.5s ease;
}
.kupaneg.close .pronaya-setka img {
  padding: 10px;
}

.kupaneg .pronaya-setka .profile_name,
.kupaneg .pronaya-setka .job {
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  white-space: nowrap;
}
.kupaneg.close .pronaya-setka i,
.kupaneg.close .pronaya-setka .profile_name,
.kupaneg.close .pronaya-setka .job {
  display: none;
}
.kupaneg .pronaya-setka .job {
  font-size: 12px;
}
.doma-sazdelun {
  position: relative;
  background: #f6f7fb;
  height: auto;
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.kupaneg.close ~ .doma-sazdelun {
  left: 78px;
  width: calc(100% - 78px);
}
.doma-sazdelun .domasa-konvaena {
  height: 60px;
  display: flex;
  align-items: center;
}
.doma-sazdelun .domasa-konvaena .bx-menu,
.doma-sazdelun .domasa-konvaena .text {
  color: #11101d;
  font-size: 35px;
}
.doma-sazdelun .domasa-konvaena .bx-menu {
  margin: 0 15px;
  cursor: pointer;
}
.doma-sazdelun .domasa-konvaena .text {
  font-size: 26px;
  font-weight: 600;
}
@media screen and (max-width: 425px) {
}
@media screen and (max-width: 375px) {
  .kupaneg {
    width: 56%;
  }
  .doma-sazdelun {
    left: 90%;
  }
}
@media screen and (max-width: 320px) {
  .kupaneg {
    width: 54%;
  }
  .doma-sazdelun {
    left: 99%;
  }
}
</style>