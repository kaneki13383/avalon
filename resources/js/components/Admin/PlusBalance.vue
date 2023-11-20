<template>
  <div class="content-admin">
    <div class="top">
      <h1><i class="bx bxs-user-circle" style="color: #ffffff"></i> Admin</h1>
    </div>
    <div class="main-admin">
      <div class="first">
        <h1>Заявки пользователей на пополнение</h1>
        <div class="info">
          <div class="history">
            <h2>Заявки</h2>
            <table>
              <tr>
                <th>id Пользователя</th>
                <th>Сумма</th>
                <th>Банк</th>
                <th>ФИО</th>
                <th>Статус</th>
                <th>Действие</th>
              </tr>
              <tr v-for="application in applications" :key="application">
                <td>{{ application.id_user }}</td>
                <td>{{ application.summ }}</td>
                <td>{{ application.bank }}</td>
                <td>{{ application.name }}</td>
                <td>{{ application.status }}</td>
                <td>
                  <button
                    v-if="application.status != 'Принят'"
                    @click="
                      Accept(
                        application.id_user,
                        application.summ,
                        application.id
                      )
                    "
                  >
                    Приянть
                  </button>
                  <button v-if="application.status != 'Принят'">
                    Отклонить
                  </button>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
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
    this.GetApplications();
  },
  methods: {
    GetApplications() {
      axios.get("/api/application/all").then((res) => {
        this.applications = res.data;
      });
    },
    Accept(id_user, balance, id) {
      axios
        .post("/api/application/accept", {
          id_user: id_user,
          balance: balance,
          id: id,
        })
        .then((res) => {
          this.GetApplications();
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
  width: 100%;
  margin: 0 40px;
}
.info {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  width: 95%;
  height: max-content;
  background: white;
  border-radius: 7px;
  box-shadow: 0px 0px 14px 3px rgba(0, 0, 0, 0.1);
}
.history {
  background: white;
  width: 93.5%;
  margin-left: 2%;
  height: max-content;
  padding: 0px 20px 20px 20px;
  margin: 20px;
  border-radius: 7px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  h2 {
    padding: 20px 0 10px 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    color: #000;
    font-size: 18px;
    font-weight: bold;
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
      button:first-child {
        cursor: pointer;
        background: green;
        padding: 5px 20px;
        margin-right: 20px;
        border-radius: 7px;
        color: #fff;
        border: none;
      }
      button:last-child {
        cursor: pointer;
        background: red;
        padding: 5px 20px;
        border-radius: 7px;
        color: #fff;
        border: none;
      }
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
</style>