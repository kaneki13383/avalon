<template>
  <div class="background">
    <a href="http://127.0.0.1:5500/index.html"
      ><LogoComponent></LogoComponent
    ></a>
    <form>
      <h1>Вход</h1>
      <p>Войдите, чтобы продолжить</p>
      <div :class="{ error: v$.login.$errors.length }">
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
        <input type="text" v-model="v$.login.$model" placeholder="Ваш логин" />
        <div
          class="input-errors"
          v-for="(error, index) of v$.login.$errors"
          :key="index"
        >
          <div class="error-msg">{{ error.$message }}</div>
        </div>
      </div>
      <div :class="{ error: v$.password.$errors.length }">
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
        <input
          type="password"
          v-model="v$.password.$model"
          placeholder="Ваш пароль"
        />
        <div
          class="input-errors"
          v-for="(error, index) of v$.password.$errors"
          :key="index"
        >
          <div class="error-msg">{{ error.$message }}</div>
        </div>
      </div>
      <div>
        <button @click.prevent="Login()">Войти</button>
        <router-link to="/register">Регистрация</router-link>
      </div>
      <div>
        <span
          >У Вас все еще нет аккаунта?
          <router-link to="/">Откройте его прямо сейчас</router-link></span
        >
      </div>
    </form>
  </div>
</template>

<script>
import useVuelidate from "@vuelidate/core";
import { required, email, minLength, helpers } from "@vuelidate/validators";

export function validName(name) {
  let validNamePattern = new RegExp("^[а-яА-Я]+(?:[-'\\s][а-яА-Я]+)*$");
  if (validNamePattern.test(name)) {
    return true;
  }
  return false;
}
import LogoComponent from "../LogoComponent.vue";
export default {
  components: { LogoComponent },
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      login: "",
      password: "",
    };
  },
  validations() {
    return {
      login: {
        required: helpers.withMessage(
          "Обязательное поле для заполнения",
          required
        ),
        min: helpers.withMessage(
          "Минимальное количество символов 3",
          minLength(3)
        ),
      },
      password: {
        required: helpers.withMessage(
          "Обязательное поле для заполнения",
          required
        ),
        min: helpers.withMessage(
          "Минимальное количество символов 8",
          minLength(8)
        ),
      },
    };
  },
  mounted() {
    if (localStorage.getItem("token")) {
      this.$router.push("/account/deposits");
    }
  },
  methods: {
    Login() {
      axios
        .post("/api/login", {
          login: this.login,
          password: this.password,
        })
        .then((result) => {
          let role = result.data.user.role;
          if (role == 0) {
            localStorage.setItem("token", result.data["content"]);
            this.$router.push("/account/deposits");
          } else {
            localStorage.setItem("token", result.data["content"]);
            this.$router.push("/admin");
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.input-errors {
  padding: 5px 0 0 0 !important;
  margin: 0 !important;
}
.error-msg {
  color: red;
  font-size: 12px;
  padding: 0 !important;
  margin: 0 !important;
}
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
        padding-bottom: 4px;
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
    div:nth-child(5) {
      align-items: start;
      flex-direction: row;
      gap: 16px;
      button {
        color: #fff !important;
        background-color: #1b55e2;
        box-shadow: none;
        border: none;
        border-radius: 5px;
        padding: 15px 40px;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
      }
      a {
        color: #fff !important;
        background-color: #8dbf42;
        box-shadow: none;
        border: none;
        text-decoration: none;
        border-radius: 5px;
        padding: 15px 40px;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 600;
      }
    }
    div:nth-child(6) {
      span {
        font-size: 14px;
        font-weight: 600;
        a {
          text-decoration: none;
          color: blue;
          border-bottom: 1px solid blue;
          padding-bottom: 2px;
        }
      }
    }
  }
}
</style>