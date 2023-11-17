<template>
  <div class="content-admin">
    <div class="top">
      <h1>Admin</h1>
    </div>
    <div class="main-admin">
      <div class="first">
        <h1>Данные по сайту</h1>
        <div class="info">
          <div>
            <div>
              <h2>96</h2>
              <p>Пополнений</p>
            </div>
            <img src="img/cash24.png" alt="No Ethernet" />
          </div>
          <div>
            <div>
              <h2>85</h2>
              <p>Вывод</p>
            </div>
            <img src="img/cash24.png" alt="No Ethernet" />
          </div>
          <div>
            <div>
              <h2>115</h2>
              <p>Рефералы</p>
            </div>
            <img src="img/cash24.png" alt="No Ethernet" />
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
              <tr>
                <td>kek111</td>
                <td>Иванов Андрей</td>
                <td>ivanovtop@mail.ru</td>
                <td><button>Удалить</button></td>
              </tr>
              <tr>
                <td>kek111</td>
                <td>Иванов Андрей</td>
                <td>ivanovtop@mail.ru</td>
                <td><button>Удалить</button></td>
              </tr>
              <tr>
                <td>kek111</td>
                <td>Иванов Андрей</td>
                <td>ivanovtop@mail.ru</td>
                <td><button>Удалить</button></td>
              </tr>
            </tbody>
          </table>
          <div><button class="more">Подробнее</button></div>
        </div>
      </div>
      <div class="last">
        <h2>Новости</h2>
        <form action="">
          <input type="text" placeholder="Заголовок" />
          <textarea cols="30" rows="6" placeholder="Ваш текст"></textarea>
          <button type="submit">Опубликовать</button>
        </form>
        <div class="news">
          <h3>Отмыли 2 млрд с мефа</h3>
          <p>
            Да да да это мистер пидорарти и решил попробоватьсвой продукт. Я съел какашку
          </p>
        </div>
        <div class="news">
          <h3>Отмыли 2 млрд с мефа</h3>
          <p>
            Да да да это мистер пидорарти и решил попробоватьсвой продукт. Я съел какашку
          </p>
        </div>
        <button class="more">Подробнее</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="css" scoped>
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
  height: 95px;
  background-color: #303644;
}
.top h1 {
  margin-right: 150px;
  color: #fff;
  font-family: Montserrat;
  font-size: 18px;
}
.main-admin {
  display: flex;
  flex-direction: row;
}
.main-admin h1 {
  text-align: center;
  margin: 35px 0;
  color: #000;
  font-family: Montserrat;
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
  font-family: Montserrat;
  font-size: 35px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
}
.info > div > div p {
  margin-top: 10px;
  color: #9c96a9;
  font-family: Montserrat;
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
  font-family: Montserrat;
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
  font-family: Montserrat;
  font-size: 18px;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
}
table tbody tr td {
  color: #000;
  font-family: Comfortaa;
  font-size: 16px;
  font-style: normal;
  font-weight: 700;
  line-height: normal;
  padding: 40px 0;
}
table tbody tr td button {
  width: 60%;
  border-radius: 12px;
  border: none;
  background: #f93a3a;
  padding: 6px;
  color: white;
  color: #fff;
  text-align: center;
  font-family: Comfortaa;
  font-size: 13px;
  font-style: normal;
  cursor: pointer;
}
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
  font-weight: 700;
  text-align: center;
  font-family: Montserrat;
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
  height: 677px;
}
.last h2 {
  color: #000;
  font-family: Montserrat;
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
  font-family: Montserrat;
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
  font-family: Montserrat;
  font-size: 13px;
  padding: 7px 33px;
  cursor: pointer;
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
  font-family: Montserrat;
  font-size: 18px;
  font-style: normal;
  font-weight: 600;
  line-height: normal;
  margin-bottom: 10px;
}
.news p {
  color: #8e8e8e;
  font-family: Montserrat;
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: normal;
}
.last .more {
  margin-left: 40px;
  margin-top: 15px !important;
}
</style>
