<template>
  <div class="content-admin">
    <div class="top">
      <h1><i class="bx bxs-user-circle" style="color: #ffffff"></i> Admin</h1>
    </div>
    <div class="main-admin">
      <div class="first">
        <h1>Данные по сайту</h1>
        <div class="info">
          <div>
            <div>
              <h2>{{ count_plus }}</h2>
              <p>Пополнений</p>
            </div>
            <i class="bx bx-wallet" style="color: #37c936; font-size: 60px"></i>
          </div>
          <div>
            <div>
              <h2>{{ count_minus }}</h2>
              <p>Выводов</p>
            </div>
            <i
              class="bx bx-credit-card-front"
              style="color: #ffcc00; font-size: 60px"
            ></i>
          </div>
          <div>
            <div>
              <h2>115</h2>
              <p>Рефералы</p>
            </div>
            <i
              class="bx bxs-user-plus"
              style="color: #0f9aee; font-size: 60px"
            ></i>
          </div>
        </div>
        <div class="user-list">
          <h2>Список пользователей</h2>
          <table>
            <thead>
              <tr>
                <td>Логин</td>
                <td>ФИО</td>
                <td>Почта</td>
                <td>Действие</td>
              </tr>
            </thead>
            <tbody>
              <tr v-for="user in users" :key="user">
                <td>{{ user.login }}</td>
                <td>{{ user.name }} {{ user.surname }}</td>
                <td>{{ user.email }}</td>
                <td><button @click="DeleteUser(user.id)">Удалить</button></td>
              </tr>
            </tbody>
          </table>
          <div><button class="more">Подробнее</button></div>
        </div>
      </div>
      <div class="last">
        <h2>Новости</h2>
        <form action="">
          <input type="text" v-model="title" placeholder="Заголовок" />
          <textarea
            cols="30"
            rows="6"
            v-model="text"
            placeholder="Ваш текст"
          ></textarea>
          <input
            type="file"
            id="file"
            ref="file"
            v-on:change="handleFileUpload()"
          />
          <button type="submit" @click.prevent="CreateNews()">
            Опубликовать
          </button>
        </form>
        <div class="news" v-for="ne in news" :key="ne">
          <h3>{{ ne.title }}</h3>
          <p>
            {{ ne.text }}
          </p>
          <img :src="ne.img" alt="" />
          <button @click="DeleteNews(ne.id)">Удалить</button>
        </div>
        <!-- <button class="more">Подробнее</button> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
      title: "",
      text: "",
      file: null,
      news: [],
      count_plus: 0,
      count_minus: 0,
    };
  },
  mounted() {
    this.GetUsers();
    this.GetNews();
    this.CountApplication();
    this.CountOutput();
  },
  methods: {
    CountApplication() {
      axios.get("/api/application/all").then((res) => {
        let arr = res.data;
        this.count_plus = arr.length;
      });
    },
    CountOutput() {
      axios.get("/api/balance/all").then((res) => {
        let arr = res.data;
        this.count_minus = arr.length;
      });
    },
    GetUsers() {
      axios.get("/api/all_users").then((res) => {
        this.users = res.data;
      });
    },
    GetNews() {
      axios.get("/api/news/all").then((res) => {
        this.news = res.data;
      });
    },
    DeleteUser(id) {
      axios.delete(`/api/delete/${id}`).then((res) => {
        this.GetUsers();
      });
    },
    handleFileUpload() {
      this.file = this.$refs.file.files[0];
    },
    CreateNews() {
      let formData = new FormData();
      formData.append("title", this.title);
      formData.append("text", this.text);
      formData.append("file", this.file);
      axios
        .post("/api/create/news", formData, {
          Headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          this.GetNews();
        });
    },
    DeleteNews(id) {
      axios.delete(`/api/news/delete/${id}`).then((res) => {
        this.GetNews();
      });
    },
  },
};
</script>

<style lang="scss" scoped>
.content-admin {
  width: 100%;
  height: 100%;
}
.top {
  display: flex;
  flex-direction: row;
  justify-content: end;
  align-items: center;
  width: 100%;
  height: 65px;
  background-color: #303644;
}
.top h1 {
  margin-right: 150px;
  color: #fff;
  font-size: 18px;
  display: flex;
  flex-direction: row;
  gap: 10px;
  align-items: center;
  i {
    font-size: 30px;
  }
}
.main-admin {
  display: flex;
  flex-direction: row;
}
.main-admin h1 {
  text-align: center;
  margin: 35px 0;
  color: #000;
  font-size: 25px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
}
.first {
  width: 1097px;
  margin: 0 40px;
}
.info {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  height: 135px;
}
.info > div {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  width: 31%;
  height: 100%;
  border-radius: 14px;
  background: #fff;
  box-shadow: 0px 0px 14px 3px rgba(0, 0, 0, 0.1);
}
.info > div > div {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.info > div > div h2 {
  color: #000;
  font-size: 35px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
}
.info > div > div p {
  margin-top: 10px;
  color: #9c96a9;
  font-size: 16px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
}
.user-list {
  padding: 35px 60px 20px 60px;
  margin-top: 45px;
  border-radius: 14px;
  background: #fff;
  box-shadow: 0px 0px 13px 4px rgba(0, 0, 0, 0.1);
}
.user-list h2 {
  color: #000;
  font-size: 20px;
  font-weight: 700;
  margin-bottom: 30px;
}
table {
  border-collapse: collapse;
  width: 100%;
}
table thead tr,
table tbody tr {
  border-bottom: 2px solid #d9d9d9;
}
table tr td:first-child {
  padding-left: 20px;
}
table tr td:last-child {
  padding-right: 20px;
}
table thead tr td {
  padding: 12px 0;
  color: #000;
  font-size: 18px;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
}
table tbody tr td {
  color: #000;
  font-size: 16px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  padding: 40px 0;
}
table tbody tr td button {
  width: 60%;
  border-radius: 12px;
  border: none !important;
  background: #f93a3a;
  padding: 6px;
  color: white;
  color: #fff;
  text-align: center;
  font-size: 13px;
  font-style: normal;
  cursor: pointer;
}
.user-list {
  max-height: 509px;
  overflow-y: auto;
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px rgb(230, 230, 230);
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: rgba(0, 0, 0, 0.1);
  border-radius: 10px;
}

/* Handle on hover */
// ::-webkit-scrollbar-thumb:hover {
//   cursor: pointer;
//   background: #1d1b31;
// }
.user-list div {
  display: flex;
  flex-direction: row;
  justify-content: center;
  width: 100%;
}
.more {
  width: 308px;
  height: 45px;
  border-radius: 11px;
  background: #1d1b31;
  color: #fff;
  border: none;
  font-weight: 700;
  text-align: center;
  font-size: 16px;
  margin-top: 35px;
  text-align: center;
  cursor: pointer;
}
.last {
  padding: 40px 26px 25px 40px;
  border-radius: 14px;
  background: #fff;
  box-shadow: 0px 0px 13px 4px rgba(0, 0, 0, 0.1);
  margin-top: 100px;
  margin-right: 40px;
  height: max-content;
}
.last h2 {
  color: #000;
  font-size: 24px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  margin-bottom: 25px;
}
.last form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 364px;
}
.last form input,
.last form textarea {
  width: 100%;
  border-radius: 14px;
  padding-left: 20px;
  height: 58px;
  border: 0.2px solid rgba(0, 0, 0, 0.2);
  background: #fff;
  color: #8e8e8e;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
  margin-bottom: 20px;
  outline: none;
}
.last form textarea {
  height: auto !important;
  padding-top: 15px;
  resize: none;
}
.last form button {
  border-radius: 12px;
  background: #1d1b31;
  color: #fff;
  text-align: center;
  font-size: 13px;
  padding: 7px 33px;
  cursor: pointer;
  border: none;
}
.news {
  width: 314px;
  border-radius: 14px;
  background: #fff;
  box-shadow: 0px 0px 13px 4px rgba(0, 0, 0, 0.05);
  padding: 20px 30px;
  margin-top: 20px;
}
.news h3 {
  color: #000;
  font-size: 18px;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
  margin-bottom: 10px;
}
.news button {
  border-radius: 12px;
  border: none !important;
  background: #f93a3a;
  padding: 6px;
  color: white;
  text-align: center;
  font-size: 13px;
  font-style: normal;
  cursor: pointer;
}
.news p {
  color: #8e8e8e;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}
.news img {
  width: 300px;
  margin-top: 20px;
}
.last .more {
  margin-left: 40px;
  margin-top: 15px !important;
}
</style>
