<template>
  <div class="bank_card">
    <img class="logo_sber" src="/img/card-tinkof-logo.svg" alt="" />
    <!-- <img class="logo_nfc" src="/img/card-tinkof-bg.svg" alt="" /> -->
    <p class="number_card">2200 7009 3672 2379</p>
    <!-- <p class="name">MIRON SAFRONOV</p> -->
    <img class="logo_mir" src="/img/mir-logo-white.svg" alt="" />
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
  background: black;
  .logo_sber {
    position: relative;
    width: 80px;
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
    top: 50px;
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
    width: 65px;
    height: 20px;
    top: 85px;
    float: right;
    right: 20px;
  }
}
</style>