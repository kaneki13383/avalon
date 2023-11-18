<template>
  <div>
    <h2>История вывода финансовых средств</h2>
    <p>
      <a href="">Главная</a>
      <i class="bx bx-chevron-right"></i> Личный кабинет
      <i class="bx bx-chevron-right"></i>
      <span>История вывода средств</span>
    </p>
  </div>

  <div class="history">
    <h1>Статус ваших заявок на вывод средств</h1>
    <table>
      <tr>
        <th>Сумма</th>
        <th>Дата</th>
        <th>Платежная система</th>
        <th>Номер транзакции</th>
        <th>Статус</th>
      </tr>
      <tr v-for="application in applications" :key="application">
        <td>{{ application.summ }}</td>
        <td>{{ application.created_at }}</td>
        <td>{{ application.bank }}</td>
        <td>{{ application.id }}</td>
        <td>{{ application.status }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      applications: [],
    };
  },
  mounted() {
    this.GetOutputBalance();
  },
  methods: {
    GetOutputBalance() {
      axios.get("/api/balance/wait").then((res) => {
        this.applications = res.data;
      });
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
</style>