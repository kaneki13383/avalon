<template>
  <div class="bank_card">
    <!-- <img class="logo_sber" src="/img/vtb-logo.svg" alt="" /> -->
    <img class="logo_nfc" src="/img/nfc-logo.svg" alt="" />
    <p class="number_card">5246 0292 2590 9805</p>
    <img class="logo_mir" src="/img/mastercard-2.svg" alt="" />
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.bank_card {
  width: 300px;
  height: 190px;
  border-radius: 7px;
  background: url("/img/mtsbank-bg.jpg");
  background-size: cover;
  .logo_sber {
    position: relative;
    top: 20px;
    left: 20px;
  }
  .logo_nfc {
    position: relative;
    top: 40px;
    right: 10px;
    float: right;
  }
  .number_card {
    position: relative;
    z-index: 2;
    top: 80px;
    left: 40px;
    color: #fff;
    font-size: 22px;
  }
  .name {
    position: relative;
    z-index: 2;
    color: #fff;
    font-size: 14px;
    top: 105px;
    left: 20px;
  }
  .logo_mir {
    position: relative;
    width: 70px;
    height: 58px;
    top: 95px;
    float: right;
    right: 10px;
  }
}
</style>