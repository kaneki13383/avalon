<template>
  <div class="background">
    <a href="http://127.0.0.1:5500/index.html"
      ><LogoComponent></LogoComponent
    ></a>
    <form>
      <h1>Регистрация</h1>
      <p>
        Уже есть аккаунт?
        <router-link to="/login">Авторизироваться</router-link>
      </p>
      <div>
        <label for="">логин</label>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-user"
        >
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <input type="text" v-model="login" placeholder="Ваш логин" />
      </div>
      <div>
        <label for="">e-mail</label>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-at-sign register"
        >
          <circle cx="12" cy="12" r="4"></circle>
          <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
        </svg>
        <input type="email" v-model="email" placeholder="Ваш e-mail" />
      </div>
      <div>
        <label for="">пароль</label>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-lock"
        >
          <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
          <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
        </svg>
        <input type="password" v-model="password" placeholder="Ваш пароль" />
      </div>
      <div>
        <label for="">имя</label>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-user"
        >
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <input type="text" v-model="name" placeholder="Ваше имя" />
      </div>
      <div>
        <label for="">фамилия</label>
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
          class="feather feather-user"
        >
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
        <input type="text" v-model="surname" placeholder="Ваша фамилия" />
      </div>
      <div>
        <input type="checkbox" name="" id="" />
        <span>
          Я согласен с условиями использования сервиса Avalon Technologies, а
          также на получения email и sms рассылок
        </span>
      </div>
      <div>
        <button @click.prevent="Register()">Зарегистрироваться</button>
      </div>
    </form>
  </div>
</template>

<script>
import LogoComponent from "../LogoComponent.vue";
export default {
  components: { LogoComponent },
  data() {
    return {
      login: "",
      email: "",
      password: "",
      name: "",
      surname: "",
    };
  },
  mounted() {
    if (localStorage.getItem("token")) {
      this.$router.push("/account/deposits");
    }
  },
  methods: {
    Register() {
      axios
        .post("/api/register", {
          name: this.name,
          login: this.login,
          surname: this.surname,
          email: this.email,
          password: this.password,
        })
        .then((res) => {
          localStorage.setItem("token", res.data["content"]);
          this.$router.push("/account/deposits");
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.background {
  background-image: url("/public/img/auth-bg.jpg");
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  form {
    background: white;
    width: 480px;
    border-radius: 15px;
    padding: 25px;
    h1 {
      font-size: 32px;
      text-align: center;
    }
    p {
      color: #888ea8;
      font-size: 13px;
      margin-bottom: 25px;
      text-align: center;
      a {
        color: blue;
        border-bottom: 1px solid;
        text-decoration: none;
        padding-bottom: 2px;
      }
    }
    div {
      display: flex;
      flex-direction: column;
      align-items: start;
      padding-top: 11px;
      padding-bottom: 16px;
      svg {
        position: relative;
        left: 1.6vh;
        color: #888ea8;
        fill: rgba(0, 23, 55, 0.08);
        width: 20px;
        height: 20px;
        top: 5.5vh;
      }
      label {
        font-size: 10px;
        margin-bottom: -3vh;
        color: #3b3f5c;
        text-transform: uppercase;
      }
      input {
        width: 82%;
        border-radius: 6px;
        color: #3b3f5c;
        font-weight: 600;
        font-size: 16px;
        padding: 13px 35px 13px 46px;
        border: 1px solid #bfc9d4;
        outline: none;
        transition: 0.5s;
        font-weight: 500;
      }
      input:focus {
        border: 1px blue solid;
        box-shadow: 0 0 5px 2px rgba(194, 213, 255);
      }
    }
    div:nth-child(8) {
      flex-direction: row;
      gap: 15px;
      span {
        font-size: 14px;
        color: #888ea8;
        text-align: left;
      }
      input {
        width: 17px;
        height: 17px;
      }
      input:focus {
        border: none;
        box-shadow: none;
      }
    }
    div:nth-child(9) {
      align-items: center;
      button {
        color: #fff !important;
        background-color: #8dbf42;
        box-shadow: none;
        border: none;
        border-radius: 5px;
        padding: 15px 140px;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
      }
    }
  }
}
</style>