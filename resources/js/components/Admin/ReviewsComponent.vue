<template>
  <div class="content-admin">
    <div class="top">
      <h1><i class="bx bxs-user-circle" style="color: #ffffff"></i> Admin</h1>
    </div>
    <div class="main-admin">
      <div class="first">
        <h1>Отзывы</h1>
        <div class="info">
          <div class="card" v-for="review in reviews" :key="review">
            <div>
              <i class="bx bxs-user-circle" style="color: #000"></i>
              <p>{{ review.id_user.login }}</p>
            </div>
            <div>
              <p>{{ review.text }}</p>
              <button @click="DeleteReview(review.id)">Удалить</button>
            </div>
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
      reviews: [],
    };
  },
  mounted() {
    this.GetReviews();
  },
  methods: {
    GetReviews() {
      axios.get("/api/reviews/all").then((res) => {
        this.reviews = res.data.data;
        console.log(this.reviews);
      });
    },
    DeleteReview(id) {
      axios.delete(`/api/reviews/delete/${id}`).then((res) => {
        this.GetReviews();
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
  flex-wrap: wrap;
  align-items: center;
  width: 95%;
  gap: 20px;
  padding: 20px;
  height: max-content;
  background: white;
  border-radius: 7px;
  box-shadow: 0px 0px 14px 3px rgba(0, 0, 0, 0.1);
  .card {
    border: 1px solid rgba(0, 0, 0, 0.2);
    padding: 10px;
    border-radius: 7px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    div {
      display: flex;
      flex-direction: row;
      align-items: center;
      gap: 10px;
      i {
        font-size: 25px;
      }
      p {
        font-size: 20px;
      }
    }
    button {
      background: transparent;
      padding: 5px 10px;
      border-radius: 7px;
      cursor: pointer;
    }
  }
}
</style>