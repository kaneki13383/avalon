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
    <div style="width: 40%">
      <h1>Доступные средства</h1>
      <div><p>0.00 ₽</p></div>
      <p>
        Доступные средства - это сумма на вашем персональном балансе, которая доступна как
        для вывода так и для депозитирования
      </p>
      <h2>Ваши возможности:</h2>
      <div class="buttons">
        <button><i class="bx bx-wallet"></i> Пополнить свой баланс</button>
        <button><i class="bx bxs-bank"></i> Создать новый депозит</button>
        <button><i class="bx bx-credit-card-front"></i> Вывести средства</button>
      </div>
    </div>
    <div style="width: 60%">
      <h1>Ваша финансовая статистика</h1>
    </div>
  </div>
</template>

<script>
export default {};
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
.all_list {
  display: flex;
  flex-direction: row;
  margin: 30px 30px 0px 30px;
  gap: 30px;
  div {
    padding: 0;
    width: max-content;
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
</style>
